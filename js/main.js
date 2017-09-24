var api ="AIzaSyBf48Ulu7zn9_9EGvsbhixb2Lx28YNowqA";

function initMap() {





	var uluru = {
		lat: -7.176365, 
		lng: -78.496198
	};

	var map = new google.maps.Map(document.getElementById('mapa'), {
		zoom: 17,
		center: uluru
	});
	var marker = new google.maps.Marker({
		position: uluru,
		map: map
	});
	var infoWindow = new google.maps.InfoWindow({map: map});

	infoWindow.setPosition(uluru);
	infoWindow.setContent('<h2>Grupo Multiservis.</h2>');

	var contenido="<h2>Multiservis</h2>"+
	"<p>Visitanos</p>";
	var informacion = new google.maps.InfoWindow(
	{
		content:contenido
	});
	marker.addListener('click',function(){
		informacion.open(map,marker);
	});

	map.setCenter(uluru);

	var cityCircle = new google.maps.Circle({
		strokeColor: '#e1e1e1',
		strokeOpacity: 0.3,
		strokeWeight: 2,
		fillColor: '#fe4918',
		fillOpacity: 0.35,
		map: map,
		center: map.center,
		radius: 50});


}

(function(){

	'use strict';
	var regalo = document.getElementById("regalo");

	document.addEventListener('DOMContentLoaded',function(){


		//datos usuarios
		var nombre=document.getElementById("nombre");
		var apellido =document.getElementById("apellido");
		var email=document.getElementById('email');


		//campos bases

		var pase_dia=document.getElementById('pase_dia');
		var pase_dosdias=document.getElementById('pase_dosdias');
		var pase_completo=document.getElementById('pase_completo');


		//botones

		var calcular = document.getElementById('calcular');
		var errorDiv = document.getElementById('error');
		var botonregistro = document.getElementById('btnRegistro');
		var lista_productos = document.getElementById('lista-productos');
		var suma=document.getElementById("suma-total");

		//extras
		var camisas =document.getElementById("camisa_evento");
		var etiquetas=document.getElementById("etiquetas");

		if (calcular != null)
		{
			calcular.addEventListener('click',calcularMontos);
			pase_dia.addEventListener('blur',mostrarDias);
			pase_dosdias.addEventListener('blur',mostrarDias);
			pase_completo.addEventListener('blur',mostrarDias);

			nombre.addEventListener('blur',validarCampos);
			apellido.addEventListener('blur',validarCampos);
			email.addEventListener('blur',validarCampos);
			email.addEventListener('blur',validarMail);
			
			botonregistro.disabled=true;
		}




		function validarMail(){
			if(this.value.indexOf("@")>-1){
				errorDiv.style.display="none";
				this.style.border="1px solid #cccccc";
			}
			else {
				errorDiv.style.display="block";
				errorDiv.innerHTML="Email es obligatorio";
				this.style.border="1px solid red";
				errorDiv.style.border="1px solid red";
			}
		}
		function validarCampos(){
			if(this.value==''){
				errorDiv.style.display="block";
				errorDiv.innerHTML="este campo es obligatorio";
				this.style.border="1px solid red";
				errorDiv.style.border="1px solid red";
			}
			else {
				errorDiv.style.display="none";
				this.style.border="1px solid #cccccc";

			}
		}
		function calcularMontos(event){
			event.preventDefault();
			//console.log("click en calcular");


			if(regalo.value===""){
				alert("Debes elegir un regalo");
				regalo.focus();
			}
			else {
				var boletoDia =parseInt(pase_dia.value,10)||0,
				boletos2Dias = parseInt(pase_dosdias.value,10)||0,
				boletoCompleto=parseInt(pase_completo.value,10)||0,
				cantCamisas =parseInt(camisas.value,10)||0,
				cantetiquetas=parseInt(etiquetas.value,10)||0;

				var totalPagar=(boletoDia*30)+
				(boletos2Dias*45)+
				(boletoCompleto*50)+
				(cantCamisas*10*.93)+
				cantetiquetas*2;

				var listadoProductos =[];
				
				if(boletoDia>=1)
				{
					listadoProductos.push(boletoDia+' Pases por dia');
				}
				if(boletos2Dias>=1)
				{
					listadoProductos.push(boletos2Dias+' Pases por 2 dias');
				}
				if(boletoCompleto>=1)
				{
					listadoProductos.push(boletoCompleto+' Pases completos');
				}

				if(cantCamisas>=1)
				{
					listadoProductos.push(cantCamisas+' Camisas');

				}
				if(cantetiquetas>=1)
				{
					listadoProductos.push(cantetiquetas+' Etiquetas');	
				}
				lista_productos.style.display="block";
				lista_productos.innerHTML='';
				for(var  i=0;i<listadoProductos.length;i++){
					lista_productos.innerHTML+= listadoProductos[i]+"<br/>";
				}

				suma.innerHTML="$ "+totalPagar.toFixed(2);
				botonregistro.disabled=false;
				$("#total_pedido").val(totalPagar);
			}
		}

		function mostrarDias(){

			var boletoDia =parseInt(pase_dia.value,10)||0,
			boletos2Dias = parseInt(pase_dosdias.value,10)||0,
			boletoCompleto=parseInt(pase_completo.value,10)||0;

			var diaselegidos=[];
			if(boletoDia >0){
				diaselegidos.push('viernes');
			}
			if(boletos2Dias>0){
				diaselegidos.push('viernes','sabado');
			}
			if(boletoCompleto>0){
				diaselegidos.push('viernes','sabado','domingo');
			}
			for(var i=0;i<diaselegidos.length;i++){
				document.getElementById(diaselegidos[i]).style.display="block";
			}


		}

	});//domcontentloaded
})();


$(function() {

	//filtro pagado no pagado

	$("#filtros a").on("click",function(){
		
		$("#filtros a").removeClass("activo");
		$(this).addClass("activo");
		$(".registrados tbody tr").hide();

		if($(this).attr("id")=="pagados"){
			$(".registrados tbody tr.pagado").show();
		}else {
			$(".registrados tbody tr.no_pagado").show();
		}


		return false;
	});


	//menu fijo
	
	var windowheight=$(window).height();
	var barraAltura=$(".barra").innerHeight();

	$(window).scroll(function(){

		var scroll = $(window).scrollTop();

		if(scroll> windowheight)
		{
			$(".barra").addClass("fixed");
			$("body").css({"margin-top":barraAltura+"px" });
		}else {
			
			$(".barra").removeClass("fixed");
			$("body").css({"margin-top":"0px"});
		}

	});


	//menu responsive


	$(".menu-movil").on("click",function(){
		$(".navegacion-principal").slideToggle();

	});

	$("body.conferencia .navegacion-principal a:contains('Conferencia')").addClass("activo");	$('body.calendario .navegacion-principal a:contains("Calendario")').addClass("activo");
	$('body.invitados .navegacion-principal a:contains("Invitados")').addClass("activo");
	$("body.calendario .navegacion-principal a:contains('Calendario')").addClass("activo");	$('body.calendario .navegacion-principal a:contains("Calendario")').addClass("activo");



	//color box

	if (typeof $(".invitado-info").colorbox !== 'undefined')
	{
		$(".invitado-info").colorbox({inline:true,width:"50%"});
	}
	$(".boton_newsletter").colorbox({inline:true,width:"50%"});


	//lettering

	$(".nombre-sitio").lettering();




	$(".menu-programa a:first").addClass("activo");

	$(".info-curso:first").show();

	$(".menu-programa a").on("click",function(){


		$(".menu-programa a").removeClass("activo");
		$(this).addClass("activo");
		$(".ocultar").hide();
		var enlace = $(this).attr("href");


		$(enlace).fadeIn(1000);
		return false;
	});

	$(".resumen-evento li:nth-child(1) p").animateNumber({number:6},1200);
	$(".resumen-evento li:nth-child(2) p").animateNumber({number:15},1200);
	$(".resumen-evento li:nth-child(3) p").animateNumber({number:3},1200);
	$(".resumen-evento li:nth-child(4) p").animateNumber({number:9},1200);


	//cuenta regresiva 
	$(".cuenta-regresiva").countdown('2017/07/25 00:00:00',function(e){
		$("#dias").html(e.strftime('%D'));
		$("#horas").html(e.strftime('%H'));
		$("#minutos").html(e.strftime('%M'));
		$("#segundos").html(e.strftime('%S'));
		
	});

});