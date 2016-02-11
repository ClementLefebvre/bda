function runEffect(object) {
	  var selectedEffect = "clip";
	  var options = {};
	  if ( selectedEffect === "scale" ) {
		options = { percent: 100 };
	  } else if ( selectedEffect === "size" ) {
		options = { to: { width: 280, height: 185 } };
	  }
	  //$( "#site" ).show( selectedEffect, options, 500, callback );
	  $( object ).fadeIn(500);
	  //$( "#menu" ).show( selectedEffect, options, 500, callback );
	};
function callback() {
	  /*setTimeout(function() {
		$( "#site:visible" ).removeAttr( "style" ).fadeOut();
	  }, 1000 );*/
	};
	
function effect(object, effect)
	{
	  var selectedEffect = effect;
	  var options = {};
	  if ( selectedEffect === "scale" ) {
		options = { percent: 100 };
	  } else if ( selectedEffect === "size" ) {
		options = { to: { width: 280, height: 185 } };
	  }
	  $(object).show( selectedEffect, options, 500, callback );
	}
	
//##############################################################
//############ Fonctions d'affichage des pages #################
//##############################################################

function accueil(){
		$("#mainConteneur").load("accueil.html");
		
	};	
	
function asso(){
		$("#mainConteneur").load("asso.html");
		
		
	};	
function lz(){
		$("#mainConteneur").load("lz.html");
		
	
		
	
	};	
	
function cours(){
	$(".mainConteneur").html("");
		
	
	};	
	
	function contact(){
	$(".mainConteneur").html("");
		
	
	};	
		
	