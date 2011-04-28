<?php
class UsersController extends AppController {

	var $name = 'Users';
  	private $directorioFoto="";
	private $administradorRolId=1;
	private $clienteRolId=2;
	private $registradoRolId =3;
  
    function beforeFilter(){
		parent::beforeFilter();
		//$this->Auth->allow('init','reset','register');
		$this->Auth->allow('login','register',"checkEmail");
	
	}
	function index() {
		$favorites=$this->User->Favorite->find("all",array("conditions"=>array("user_id"=>$this->Auth->user("id"))));
		$user=$this->User->read(null,$this->Auth->user("id"));
		$this->set(compact("favorites","user"));
	}
  
	function checkEmail(){
		$checkMail=$this->User->findByEmail($_GET["data"]["User"]["email"]);
			if($checkMail){
				echo json_encode(array("data[User][email]"=>"el email se encuentra registrado"));
				Configure::write("debug",0);
				$this->autoRender=false;
				exit(0);

			}else{
				echo json_encode(true);
				Configure::write("debug",0);
				$this->autoRender=false;
				exit(0);
			}
			Configure::write("debug",0);
				$this->autorender=false;
				exit(0);
	}
	function register(){
		if (!empty($this->data)) {
		  	$this->User->recursive = 0;		  
			$this->User->create();
			$this->data["User"]["role_id"]=2;// Is set as a Basic user for default
			$this->data["UserField"]["fecha_nacimiento"]=date('d/m/Y', strtotime($this->data["UserField"]["fecha_nacimiento"]));
		  if ($this->User->saveAll($this->data,array("validate"=>false))) 
			{
		        $para      = $this->data['User']['email'];
				$asunto    = 'Bienvenido a Tecnocenter';
				$mensaje   = 'Bienvenido, sus datos de ingreso al portal Tecnocenter son los siguientes:<br> Nombre de usuario (email) :'.$this->data['User']['email'].
							 '<br>Contraseña: '.$this->data['User']['password-repetir'];
				 
				$cabeceras = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

				// Cabeceras adicionales
				$cabeceras .= 'From: Tecnocenter <info@tecnocenter.com.co>' . "\r\n";

				/*if(mail($para, $asunto, $mensaje, $cabeceras))
				{
					$this->Session->setFlash(__('Bienvenido', true));
				}else 
				{
						$this->Session->setFlash(__('Bienvenido', true));
					//$this->Session->setFlash(__('Datos de logueo no enviados a su correo, por favor intenta mas tarde', true));
				}*/
			
				//$rol=$this->Session->read("Auth.User.role_id");
				$this->Session->setFlash(__('Su registro ha sido éxitoso', true));
				$this->Auth->login($this->data);
				$this->redirect(array("controller"=>"users",'action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo completar el registro. Por favor, intente de nuevo', true));
			}
		}
	}	
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	
	function edit() {
		$id=$this->Auth->user("id");
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->saveAll($this->data,array("validate"=>false))) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}
	function checkPassword(){
		$this->User->recursive=0;
		$user=$this->User->read(null,$this->Auth->user("id"));
		if($user["User"]["password"]==$this->Auth->password($_GET["data"]["User"]["actualPassword"])){
			$user["User"]["password"]=$this->Auth->password($_GET["data"]["User"]["password"]);
			$this->User->save($user,array("validate"=>false));
			$this->Session->setFlash(__('Se ha modificado su contraseña', true));
			echo json_encode(true);
		}else{
			echo json_encode(array("data[User][actualPassword]"=>"Contraseña Actual no valida"));
		}
		Configure::write("debug",0);
		$this->autoRender=false;
		exit(0);
	}
  	function cambiarContrasena(){
  		if(!empty($this->data)){
  			
  		}
  	}
	function menu(){
		if(!$this->Acl->check(array('model' => 'User', 'foreign_key' => $this->Session->read("Auth.User.id")), 'menu')){
			$this->Session->setFlash(__($this->Auth->authError, true));
			$this->redirect($this->referer());
		}
	}
	function admin_menu(){
		if(!$this->Acl->check(array('model' => 'User', 'foreign_key' => $this->Session->read("Auth.User.id")), 'admin_menu')){
			$this->Session->setFlash(__($this->Auth->authError, true));
			$this->redirect($this->referer());
		}
	}
	function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$aro =& $this->Acl->Aro;
				 $elaro=$aro->find("first",array("conditions"=>array("Model"=>"Role","foreign_key"=>$this->data["User"]["role_id"])));
				$newAro=array(
					"alias"=>$this->data["User"]["username"],
					"parent_id"=>$elaro["Aro"]["id"],
					"foreign_key"=>$this->User->id,
					"model"=>"User",
				);
				$aro->create();
				$aro->save($newAro);
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}

	function admin_edit($id = null) 
	{
		
		//$foto['user']['foto'] = $this->User->find("first", array('fields'=>'foto','conditions'=>array('User.id'=>'$id')));
		
		if (!$id && empty($this->data)) 
		{
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data)) 
		{
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}

	function admin_delete($id = null) 
	{
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

	//LOGIN USER
	function login(){
		$this->set("login",true);
		if($this->Auth->user("id")){
			$this->redirect(array('action' => 'index'));
		}
		
	}
	function admin_login(){
		$this->set("login",true);
	}
	
	//LOGOUT USER
	function logout() 
	{
	   $this->redirect($this->Auth->logout());    
	}
	
	function admin_logout() 
	{
	   $this->redirect($this->Auth->logout());    
	}
		
	//Configurar el reporte
	function admin_selectReport()
	{
		$roles=$this->User->Role->find('list');
		$this->set(compact('roles'));
	}

	//Reporte por tipos de usuario
	function admin_userReports()
	{
		$this->User->recursive = 0;
		$rol = $this->data['User']['role_id'];	
		foreach($this->data['User'] as $indice =>$valor)
		{
			if($valor==1)
			{
				$array[] = $indice;
			}
		}
		$reporte = $this->User->find('all', array('fields'=>$array,'conditions'=>array('User.role_id'=>$rol)));
		$this->set(compact('reporte'));
	}
	
	//$foto array del archivo
    //nombre_foto es igual al username ya que sera unico
	function uploadPicture($foto, $nombre_foto)
	{
		//Caracteristicas de la imagen
		$nombre = $foto['name'];
		$tipo = $foto['type'];
		$tamano = $foto['size'];
		
		//Comprobamos la extensión de la  imagen
		if(strpos($tipo, "gif")) {
			$nombre_foto=$nombre_foto.".gif";
		} else if(strpos($tipo, "jpeg")) {
			$nombre_foto=$nombre_foto.".jpg";
		}
		
		//Directorio donde sera guardada la imagen
		$directorio = WWW_ROOT."img\\fotos\\".$nombre_foto;
		
		//Comprobamos que la extensión y el tamaño sean los adecuados
		if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg")) && ($tamano < 2000000))) 
		{
			$this->Session->setFlash(__("La extensión o el tamaño de la imagen no es correcta, 
						solo se permiten imagenes .gif o .jpg y el tamaño es de 2 mb máximo.", true)); 
		}
		else
		{
			//Copiamos la imagen al directorio, especificado
	   		if (copy($foto["tmp_name"], $directorio))
	   		{
	   			$this->directorioFoto=$directorio;
			   return true;  
	   		}
	   		else
	   		{ 
			   return false; 
	   		}
		}
		
	}

    //Recordar email
	function rememberPassword(){
		if (!empty($this->data)) 
		{
			$datos=$this->User->find("first", array('fields'=>array('email','username','password'), 
									'conditions'=>array('User.email'=>trim($this->data['User']['email']))));
									
			if($datos['User']['email'])
			{				
				$para      = $datos['User']['email'];
				$asunto    = 'Recuperación de datos logueo';
				$mensaje   = 'Hola, sus datos de logueo son :<br> Nombre de usuario :'.$datos['User']['username'].
							 '<br>Contraseña: '.$datos['User']['password'];
						 
				$cabeceras = 'From: webmaster@example.com' . "\r\n" .
				    		 'Reply-To: webmaster@example.com' . "\r\n" .
				    		 'X-Mailer: PHP/' . phpversion();

				if(mail($para, $asunto, $mensaje, $cabeceras))
				{
					$this->Session->setFlash(__('Datos enviados a su correo', true));
				}else 
				{
					$this->Session->setFlash(__('Datos no enviados a su correo, por favor intenta mas tarde', true));
				}
				return;
			}
			else 
			{
				$this->Session->setFlash(__('No existe ningun usuario registrado con ese email', true));
				return;
			}
		}	
	}
}
?>