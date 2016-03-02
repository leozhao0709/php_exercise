<!DOCTYPE html>
<html>
	<head>
		<title>EasyBasketball</title>
		<meta name="keywords" content="keyword1,keyword2,keyword3">
		<meta name="description" content="this is my page">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<!-- 		<meta name="viewport" content="width=device-width, initial-scale=1" /> -->

		<link rel="stylesheet" type="text/css" href="css/global.css">
		<style type = "text/css"></style>
		<script type = "text/javascript">

			function resizeImage(){

				//first page bg
				var window_height = document.body.clientHeight;
				var window_width = document.body.clientWidth;
				var obj = document.getElementById("first");
				var bgWidth = obj.style.width;
				var bgHeight = obj.style.height;
				var heightRatio = bgHeight/window_height;
				var widthRatio = bgWidth/window_width;
				if (heightRatio > widthRatio) {
					obj.style.width = "400px";
					obj.style.height = "100%";
				} else {
					obj.style.width = "100%";
					obj.style.height = "530px";
				}

				//menu

			}

			function showMap() {
				var obj = document.getElementById("map");
				var court = document.getElementById("court");

				if (obj.style.display == "none") {
					obj.style.display = "block";
					court.style.display = "block";
				}
				else if (obj.style.display == "block") {
					obj.style.display = "none";
					court.style.display = "none";
				}
			}

			onload = resizeImage

		</script>

	</head>

	<body onresize = "resizeImage()">
		<?php
			
		?>
<!-- 		first part -->
		<div class= "top" style="background-image: url(images/top.png)">
			<div class = "button">
				<a href="#"><img src="images/mapButton1.png" onclick = "showMap()"/></a>
			</div>
			<div class = "title">
				<a href="#"><img src="images/easy1.png"/></a> 
			</div>
			<ul>
				<li class = "signUp">
					<a href="#">Sign  Up</a>
				</li>
				<li class="login">
					<a href="#">Log In</a>
				</li>
			</ul>
			
		</div>
		<div class = "menu">
			<ul>
				<li><a href="#">Search</a></li>
				<li><a href="#">Court Ranking</a></li>
				<li><a href="#">Mobile</a></li>
				<li id = "player"><a href="#">Player</a></li>
			</ul>
		</div>
		<div class= "firstPart" id = "first" style="background-image: url(images/firstBg.png)">
			<div class = "blank">
				<div class = "search">
					<form action = "" method = "post">
						<input class = "searchEngine" type = "text" placeholder = "Where do you want?"/>
						<input type="submit" value = "Search" class = "searchButton">
					</form>
				</div>
			</div>
			<!-- <div class = "third">
				<div class = "mapShow" id = "map" style="display: none">
				<img src="images/map.png">
				</div>
				<div class = "courtIntro" id = "court" style="display: none">
					<span>Venice Beach Basketball</span>
				</div>
			</div>
 -->		</div>
		
	</body>
</html>