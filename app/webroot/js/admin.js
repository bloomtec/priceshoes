$(function() {
	// Codigo Jquery
	// menu

	var server = '/priceshoes/';

	$(document).ready(function() {
		$('ul.nav').superfish();
	});

	$("ul.galeria li").click(
			function() {
				var categoria = $(this).attr("id");
				$(".foticos").load(
						server + "admin/images/obtenerImagenes/" + categoria);
			});

	 
	 $("ul.galeria li").click(function(){
		 var categoria=$(this).attr("id");
		 $(".foticos ul").load(server+"admin/images/obtenerImagenes/"+categoria);
	 });
	 
	 var matrix=function(){
	 	var inputs=$("td[colorID] input");
		inputs.hide();//OCULTA TODOS LOS INPUTS
		$.each(inputs,function(i,value){
			if($(value).val()==1){
				$(value).after("<div class='check activo'> </div>");
			}else{
				$(value).after("<div class='check inactivo'> </div>");
			}
			
		})
	 	$(".disponibilidad .check").live("click",function(){
	 		if($(this).prev().val()==1){
	 			$(this).prev().val("0");// El input que maneja el valor
	 			$(this).removeClass("activo");
	 			$(this).addClass("inactivo");
	 		}else{
	 			$(this).prev().val("1");// El imput que maneja el valor
	 			$(this).removeClass("inactivo");
	 			$(this).addClass("activo");
	 		}
	 	});
	 }();
});
