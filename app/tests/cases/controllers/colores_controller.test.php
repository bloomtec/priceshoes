<?php
/* Colores Test cases generated on: 2011-03-24 11:43:12 : 1300981392*/
App::import('Controller', 'Colores');

class TestColoresController extends ColoresController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ColoresControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.color', 'app.inventory', 'app.product', 'app.category', 'app.talla', 'app.colore', 'app.gallery');

	function startTest() {
		$this->Colores =& new TestColoresController();
		$this->Colores->constructClasses();
	}

	function endTest() {
		unset($this->Colores);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

	function testAdminIndex() {

	}

	function testAdminView() {

	}

	function testAdminAdd() {

	}

	function testAdminEdit() {

	}

	function testAdminDelete() {

	}

}
?>