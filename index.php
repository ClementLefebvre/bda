<!doctype html>
<html>
	<head>
		<link rel="stylesheet" href="CSS/style.css" />
		<!-- <link rel="icon" type="image/png" href="/images/icone.ico" />-->
		<link rel="shortcut icon" href="images/icone.ico">
		<link rel="stylesheet" href="ism/css/my-slider.css"/>
		<meta charset="UTF-8">
		<title>BDA IG2I</title>
	</head>
<link rel="stylesheet" href="libs/jquery-ui/jquery-ui.css"/>
<script src="libs/jquery.js"></script>
<script src="libs/lib.js"></script>
<script src="libs/jquery-ui/jquery-ui.js"></script>
<script type="text/javascript" script-name="electrolize" src="http://use.edgefonts.net/electrolize.js"></script>
<script>

	$(document).ready(function(e) {
		var waiter = $("<img id=\"giphy\" alt=\"Gif Attent\" src=\"images/ajaxLoader2.gif\"/>");
		$("#mainConteneur").prepend(waiter);

		setTimeout(function() 
		  {
			//console.log("COUCOU");
			$("#giphy").remove();
			accueil();	
		  }, 1000);

		$('#menu input[type=button]').click(clickbutton);

		function clickbutton(){
			console.log("COUCOU");
			var valeur = this.value;
			$("#titre").html(valeur);
			
			switch(this.value)
			{
				case "Accueil": 
					accueil();
				break;
				case "L'asso": 
					asso();
				break;
				case "Let's Zik": 
					letsZik();
				break;
				case "Cours": 
					cours();
				break;
				case "Contact": 
					contact();
				break;
			}	
		};
	   
	});

</script>
<body>
	<div id="cadreLogo">
		<img id="logo" alt="Logo BDA" src="images/LOGO.png"/>
	</div>
	<div id="site">
		<div id="menu">
	           <input type="button" class="boutonMenu" id="accueil" value="Accueil" />
	           <input type="button" class="boutonMenu" id="asso" value="L'asso" />
	           <input type="button" class="boutonMenu" id="cours" value="Cours" />
	           <input type="button" class="boutonMenu" id="letsZik" value="Let's Zik" />
	           <input type="button" class="boutonMenu" id="contact" value="Contact" />
	    </div>
	    <div id="mainConteneur">
	    	
	    </div>
	</div>
</body>
</html>