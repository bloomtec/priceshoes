/**
 * @author Bloomtec
 */
 window.server="/priceshoes/";
$(function(){
	var galeria=function(){
		var that=this;
		ORIGINAL_WIDTH=360;
		ORIGINAL_HEIGHT=360;
		MAX_WIDTH=750;
		MAX_HEIGHT=750;
		DURATION=400;
		var last_width;
		var last_height;
		var last_top;
		var last_left;
		zoom_ratio=50;
		reset=function(){
			$(".imagen-container img").animate({"width":that.ORIGINAL_WIDTH,"height":that.ORIGINAL_HEIGHT,left:0,top:0},that.DURATION);
		}

		change=function($this){
			$.getJSON(server+"galleries/getByNombre/",{"nombre":$this.attr("rel")},function(gallery){
				if(typeof gallery['Image']['0']!="undefined"){
				$("#producto-showcase .galeria .imagen-container").html("<img src="+server+"img/uploads/360x360/"+gallery['Image']['0']['path']+">");
				$("#producto-showcase .galeria .thumbs").html("");
				$.each(gallery['Image'],function(i,image){
					$("#producto-showcase .galeria .thumbs").append("<img src="+server+"img/uploads/100x100/"+image['path']+">");
				});
				/*$(".imagen-container img").draggable({  drag: function(event, ui) {
					if(ui.position.top>=0){// Controla limites horizontales
						ui.position.top=0;
					}
					if(ui.position.left>=0){// Controla limites horizontales
						ui.position.left=0;
					}
					var maxLeft=(parseInt($(".galeria .imagen-container img").attr("width"))-ORIGINAL_WIDTH);
					if(ui.position.left<=-maxLeft){// Controla limites horizontales
						ui.position.left=-maxLeft;
					}
					var maxTop=(parseInt($(".galeria .imagen-container img").attr("height"))-ORIGINAL_HEIGHT);
					if(ui.position.top<=-maxTop){// Controla limites horizontales
						ui.position.top=-maxTop;
					}
				}});*/
				}else{
					//NO HAY GALERIA
				}
				
			});
		}
		guardarEstado=function(){
			last_width=parseInt($(".imagen-container img").attr("width"));
			last_height=parseInt($(".imagen-container img").attr("height"));
			last_top=parseInt($(".imagen-container img").css("top"));
			last_left=parseInt($(".imagen-container img").css("left"));
		}
		//FUNCIONES ZOOM
		$(".zoom-in").live("click",function(){
			guardarEstado();
			var newWidth=last_width+zoom_ratio;
			if(newWidth<=MAX_WIDTH){
				$(".imagen-container img").animate({"width":newWidth,"height":newWidth,left:last_left-(zoom_ratio/2),top:last_top-(zoom_ratio/2)},that.DURATION);
			}
			
		});
		
		$(".zoom-out").live("click",function(){
			guardarEstado();
			var newWidth=last_width-zoom_ratio;
			if(newWidth>=ORIGINAL_WIDTH){
				$(".imagen-container img").animate({"width":newWidth,"height":newWidth,left:last_left+(zoom_ratio/2),top:last_top+(zoom_ratio/2)},that.DURATION);
			}
			
		});
		$(".reset").live("click",function(){
			guardarEstado();
			reset();
		});
		
		//______________________________________
		//Carga la primer galeria li selected
		change($("ul.cuadros-colores li.selected"));
		
		//Carga la galeria cuando se le da click a un cuadro de color
		$("ul.cuadros-colores li").click(function(){
			$("ul.cuadros-colores li").removeClass("selected");
			$(this).addClass("selected");
			that.change($(this));
		});
		
		//Reemplaza la imagen principal cuando se le hace click a un thumb
		$(".galeria .thumbs img").live("click",function(){
			var newSrc=$(this).attr("src").replace("100x100","360x360");
			$(".galeria .imagen-container img").attr("src",newSrc);
		});
		
	}();
	var carrito=function(){
		$(".boton-carrito").click(function(){
			var productTalla=$("ul.cuadros-colores li.selected").attr("rel").split("-");
			var productID=productTalla[0];
			var colorID=productTalla[1];
			var tallaID=$("ul.cuadros-tallas li.selected").attr("rel");
			$.post(server+"carts/ajaxAdd",{product_id:productID,color_id:colorID,talla_id:tallaID},function(data){
				if(data){
					
				}else{
					
				}
			});
		});
		
	}();
})

$(function(){
	$.tools.dateinput.localize("es",  {
   months: 'Enero,Febrero,Marzo,Abril,Mayo,Junio,Julio,Agosto,Septiembre,Octubre,Noviembre,Diciembre',
   shortMonths:  'Ene,Feb,Mar,Abr,May,Jun,Jul,Ago,Sep,Oct,Nov,Dic',
   days:         'Domingo,Lunes,Martes,Miércoles,Jueves,Viernes,Sábado',
   shortDays:    'Dom,Lun,Mar,Mie,Jue,Vie,Sab'
   });

	$(":date").dateinput({
	lang: 'es',
	trigger: true, 
	yearRange: [-60,-10] ,
	format: 'dd/mm/yyyy',	// the format displayed for the user
	selectors: true,             	// whether month/year dropdowns are shown
	offset: [0, 0],            	// tweak the position of the calendar
	speed: 'fast',               	// calendar reveal speed
	firstDay: 1                  	// which day starts a week. 0 = sunday, 1 = monday etc..
	
    });
     $.tools.validator.fn("[data-equals]", "Value not equal with the $1 field", function(input) {
		var name = input.attr("data-equals"),
			 field = this.getInputs().filter("[name='" + name + "']"); 
		return input.val() == field.val() ? true : [name]; 
	});
     $("#UsuarioCrearForm").validator(
     	
     	
     );
    
   
    
})
