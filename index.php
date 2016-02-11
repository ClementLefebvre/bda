<!doctype html>
<html>
<head>
<link rel="stylesheet" href="CSS/style.css" />
<!-- <link rel="icon" type="image/png" href="/images/icone.ico" />-->
<link rel="shortcut icon" href="images/icone.ico">
<meta charset="UTF-8">
<title>BDA IG2I</title>
</head>
<link rel="stylesheet" href="libs/jquery-ui/jquery-ui.css"/>
<script src="libs/jquery.js"></script>
<script src="libs/lib.js"></script>
<script src="libs/jquery-ui/jquery-ui.js"></script>
<script>
$(document).ready(function(e) {
	var waiter = $("<img id=\"giphy\" alt=\"Gif Attent\" src=\"images/ajaxLoader2.gif\"/>");
	$("#mainConteneur").prepend(waiter);
	var titre = $("<h2 id=\"titre\"> Accueil </h2>");
	$("#mainConteneur").prepend(titre);
	
	setTimeout(function() 
	  {
		//console.log("COUCOU");
		$("#giphy").remove();
		accueil();	
	  }, 1000);
		

	
		
		
	$(document).on("click", "td", function(){
			var valeur = $(this).text();
			$("#titre").html(valeur);
			
			switch($(this).text())
			{
				case "Accueil": 
					accueil();
				break;
				case "L'asso": 
					asso();
				break;
				case "Let's Zik": 
					lz();
				break;
				case "Cours": 
					cours();
				break;
				case "Contact": 
					contact();
				break;
			}	
	});
   
});

</script>
<body>
<div id="cadreLogo">
<img id="logo" alt="Logo BDA" src="images/LOGO.png"/>
</div>
<div id="site">
	<div id="menu">
    <table>
       <tr>
           <td>Accueil</td>
           <td>L'asso</td>
           <td>Let's Zik</td>
           <td>Cours</td>
           <td>Contact</td>
       </tr>
   
	</table>
    
    </div>
    <div id="mainConteneur">
    	
    </div>
</div>
</body>
</html>