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
	  var options = {};
	  if ( effect === "scale" ) {
		options = { percent: 100 };
	  } else if ( effect === "size" ) {
		options = { to: { width: 280, height: 185 } };
	  }
	  $(object).show( effect, options, 500, callback );
	}
	
//##############################################################
//############ Fonctions d'affichage des pages #################
//##############################################################

function accueil(){
	$("#mainConteneur").load("_accueil.html");
		
};	
	
function asso(){
	$("#mainConteneur").load("_asso.html");
		
};

function letsZik(){
	$("#mainConteneur").load("_letsZik.html");
};	
	
function cours(){
	$("#mainConteneur").load("_cours.html");
	
};	
	
function contact(){
	$("#mainConteneur").load("_contact.html");
		
	
};	
		
	