<?php 
session_start(); 
include_once "accueil.php";
?>
<!doctype html>
<html>
<head>
<style>
#logo{
	width: 30%;
	margin-left:35%;
}
#mainConteneur{
	background-color: grey;
	width: 80%;
	border: solid 1px black;
	height: auto;
	margin-left: 10%;
}
table{
	background-color: #EEEEEE;
	width: 80%;
	border: solid 2px black;
	height: 60px;
	margin-left: 10%;
}
tr{
text-align:center;	
}
td{
	border: solid 1px black;
}
td:hover{
background-color: lightgrey;
}
#titre{
text-align:center;	
margin-top: 60px;
}
.articles{
border: 1px solid black;
width: 60%;
margin-left: 5%;	
background-color: #EEEEEE;
margin-top: 50px;
text-align:left;
font-size: 16px;
}
#foot{
	
	background-color: #EEEEEE;
	height: 60px;
	padding: 5px;
	text-align:center;
	
}
.cadre{
	position: absolute;
	width: 300px;
	height: 400px;
	border: 2px solid grey;	
}
.tete{
	width: 300px;
	height: 50px;
	border-bottom: 2px solid grey;
	background-color: lightgrey;
}
.titre2
{
	display: inline;
	margin: 0px;
	padding-top: 15px;
	padding-left: 5px;
}
.connexion
{
	float: right;
	margin-right: 20px;	
	margin-left: 20px;
}
.label
{
	float: right;
 
}
</style>
<meta charset="UTF-8">
<title>BDA IG2I</title>
</head>
<link rel="stylesheet" href="libs/jquery-ui/jquery-ui.css"/>
<script src="libs/jquery.js"></script>
<script src="libs/lib.js"></script>
<script src="libs/jquery-ui/jquery-ui.js"></script>
<script>
$(document).ready(function(e) {
	var titre = $("<h2 id=\"titre\"> Accueil </h2>");
	$("#mainConteneur").prepend(titre);
	
	$.getJSON("data.php",{action:"connexion",login: "tom" ,passe:"bou"},function(){ 
			});	 
			
			
	$("#site").hide();	
	
	
	function connection(){
	var p = $("<br><br><p class=\"label\">Pseudo : <input class=\"connexion\" id=\"pseudo\" type=\"text\" value=\"\" /></p>");
	$(".tete").append(p);
	p = $("<br><p class=\"label\">Mot de Passe : <input class=\"connexion\" id=\"mdp\" type=\"text\" value=\"\" /></p>");
	$(".tete").append(p);
	p = $("<br><input class=\"connexion\" id=\"submit\" type=\"button\" value=\"Connection\"/>");
	$(".tete").append(p);
	}
	
	connection();
	function ajoutArticle(){
	var p = $("<br><br><p class=\"label\">Titre : <input class=\"connexion\" id=\"pseudo\" type=\"text\" value=\"\" /></p>");
	$(".tete").append(p);
	p = $("<br><p class=\"label\">Contenu : <input class=\"connexion\" id=\"mdp\" type=\"textarea\" value=\"\" /></p>");
	$(".tete").append(p);
	p = $("<br><input class=\"connexion\" id=\"submit\" type=\"button\" value=\"Publier\"/>");
	$(".tete").append(p);
	}
	
	
	$(document).on("click","input",function()
	{
		if($(this).val() == "Connection")
		{
			$.getJSON("data.php",{action:"connexion",login: $("#pseudo").val(),passe:$("#mdp").val()},function(){});	
			$(".cadre").hide();
			runEffect("#site");
			
		}
		console.log("HERE <?php echo $_SESSION['login'];?>");
	});
	
	function accueil(){
		$(".articles").remove();
		$.getJSON("data.php",{"action":"getP"},function(oRep){
			console.log(oRep);
			for(i=oRep.articles.length -1; i>=0 ; i--)
			{
				//console.log(i);
			var dataP1 = oRep.articles[i];
			
			//console.log(dataP1);
			var nextA = $("<div class=\"articles\"><p>" + "(" + dataP1.date +" || "+ dataP1.time +") " + dataP1.corps +  "</p></div>").data("dataP",dataP1);
			$("#titre").append(nextA);
			$(".articles").hide();
			}
			
			$(".articles").show();
			//$( "#site" ).show( "fold", 500);
			//effect(".articles","fold");
		});
	
	};
		
		
	$(document).on("click", "td", function(){
			var valeur = $(this).text();
			console.log(valeur);
			$("#titre").html(valeur);
			if( $(this).text() == "Accueil")
			{
				//console.log("HERE");
				accueil();
			}
			if( $(this).text() == "Contact")
			{
				//Pour les test la case contact sert de deconnexion
				//console.log("HERE");
				$.getJSON("data.php",{action:"logout"},function(){ 
				});	
				$("#site").hide();
				runEffect(".cadre");
			}
	});
	$("#foot").click(function(e) {
        ajoutArticle();
		runEffect(".cadre");
    });
   
});

</script>
<body>
<img id="logo" alt="Logo BDA" src="images/LOGO.png"/>
<div class="cadre" >
	<div class="tete">
    	<p class="titre2">Connexion</p> 
    </div>
</div>
<div id="site">
<?php echo "Bonjour: ".$_SESSION["login"];?>
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
    	<div id="foot"><h2>Ajouter article</h2></div>
    </div>
</div>
</body>
</html>