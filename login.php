<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<title>LinkoDash</title>
		<style>
			::-webkit-scrollbar {
			width: 10px; 
			}
			::-webkit-scrollbar-track {
			box-shadow: inset 0 0 5px grey;
			border-radius: 10px;
			}
			::-webkit-scrollbar-thumb {
			background: #C8C8C8;
			border-radius: 10px;
			}
			::-webkit-scrollbar-thumb:hover {
			background: #C0C0C0;
			}
			.link-unstyled {
			text-decoration: none;
			color: white;
			}
			body {
			background-color: #FCFCFC;
			margin:0;
			padding:0;
			max-width: 100%;
			}
			nav {
			background-color: #2196F3;
			}
			#ld-heading {
			border: 1px solid #fff;
			border-radius: 5px;
			padding: 5px;
			color: #fff;
			}
			footer {
			background-color: #2196F3;
			text-align: center;
			height: 50px;
			font-size: 16px;
			color: white;
			border-top: 1px solid black;
			}
			#footer-text {
			padding-top: 10px;
			}
			#main-primary-row {
			height: 100%;
			}
			#recent-col {
			background-color: #A2A2A2;
			/*overflow-y: auto;*/
			}
			#graph-col {
			background-color: #EBEDEF;
			overflow-y: auto;
			}
			#recent-h1-div {
			height: 100%;  
			display: flex; 
			align-items:center; 
			margin-left: 20px;
			}
			#recent-header {
			background-color: #575757; 
			height: 100%; 
			color: #FFF;
			}
			#recent-icons-div { 
			height: 100%; 
			display : flex; 
			align-items : center;
			}
			.icon-imgs {
			height: 30px;
			width: 30px;
			}
			a {
			cursor: pointer;
			}
			#create-graph-icon {
			margin-right: 10px;
			}
			#recent-header-row {
			height: 10%;
			}
			#cmds-list {
			overflow-y: auto;
			overflow-x: hidden;
			border-right: 1px solid #7F7F7F;
			}
			#recent-container {
			}
			#recent-header-row {
			}
			#recent-table {
			max-width: 100%;
			height:100%; 
			position: relative;
			display: block;
			margin-bottom: 0px;
			}
			#recent-table-head {
			display: none;
			}
			#recent-table-body {
			font-size: 14px;
			color: white;
			}
			#main-container {
			height: 100%;
			}
			#recent-container {
			padding: 0px;
			height: 100%;
			}
			#graph-container {
			padding: 0px;
			height: 100%;
			}
			#graph-row {
			height: 100%;
			}
			header {
			border-bottom: 1px solid black;
			}
			.drop-zone-icon {
			height: 200px;
			width: 200px;
			display:block;
			margin:auto;
			vertical-align: middle;
			}
			.img-verticle-align {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
			}
			#drop-zone-1 {
			height: 100%; 
			width: 100%;
			border-right: 1px solid grey;
			}
			#drop-zone-2 {
			height: 100%; 
			width: 100%;
			border-left: 1px solid grey;
			}
			.drop-zone-col {
			height: 100%;
			padding: 0px;
			}
			#recent-table tr:hover {
			transform:scale(1,1);
			font-size: 15px;
			}
			#recent-table tr {
			cursor: move;
			border-bottom: 1px solid grey;
			display: block;
			}
			.create-modal-label {
			width:90px;
			clear:left;
			text-align:right;
			float: left;
			}
			.create-modal-input {
			padding-left: 30px;
			float: left;
			}
			.create-modal-fieldset {
			padding-bottom: 20px; 
			}
			.inner-create-modal-fieldset {
			display: table-cell; 
			vertical-align: middle;
			}
			.table>tbody>tr>td,
			.table>tbody>tr>th {
			border-top: none;
			}
			.inner-drop-zone-div {
			height: 100%;
			width: 100%; 
			margin: 0 auto; 
			display: none;
			}
			.svg-container {
			height: 100%;
			}
			.svg-header-row {
			height: 10%;
			border-left: 1px solid grey;
			border-right: 1px solid grey;
			}
			.svg-header-col {
			background-color: #575757; 
			height: 100%; 
			color: #FFF;
			}
			.cmds-div {
			height: 100%; 
			display: flex; 
			align-items:center; 
			margin-left: 20px;
			}
			.svg-icons-div {
			height: 100%; 
			display: flex; 
			align-items : center;
			}
			#svg-drop-zone-1 {
			padding-top: 20px;
			}
			#svg-drop-zone-2 {
			padding-top: 20px;
			}
			#svg-div-drop-zone-1 {
			overflow-y: auto; 
			overflow-x: auto;
			}
			#svg-div-drop-zone-2 {
			overflow-y: auto; 
			overflow-x: auto;
			}
			hr {
			display: block;
			height: 1px;
			border: 0;
			border-top: 1px solid #ccc;
			margin: 1em 0;
			padding-left: 0;
			width: 100%;
			}
			#sf-outer-container {
			padding-right: 0;
			padding-left: 0;
			display: none;
			}
			#sf-main-row {
			background-color: #E7E5E5;
			height: 500px;
			padding: 0;
			}
			#sf-container-header {
			padding: 0;
			}
			.sf-data-list {
			columns: 2;
			-webkit-columns: 2;
			-moz-columns: 2;
			list-style-type: square;
			height: 100%; 
			padding-top: 20px; 
			overflow-y: auto; 
			overflow-x: auto; 
			display: block; 
			font-family: Arial, Helvetica, sans-serif;
			}
			.sf-drop-zone {
			height:100%; 
			padding: 0;
			}
			#sf-stats-row {
			height: 100%; 
			padding: 0;
			}
			#sf-stats-container {
			padding: 0;
			}
			/*not sure if this is working*/
			.sf-stats-column {
			height:100%; 
			padding: 0;
			}
			#sf-data-drop-zone-1 {
			border-right: 1px solid grey;
			}
			#sf-data-drop-zone-2 {
			border-left: 1px solid grey;
			}
			#loader {
			border: 16px solid #f3f3f3;
			border-radius: 50%;
			border-top: 16px solid #3498db;
			width: 120px;
			height: 120px;
			-webkit-animation: spin 2s linear infinite; /* Safari */
			animation: spin 2s linear infinite;
			position: fixed;
			z-index: 999;
			overflow: show;
			margin: auto;
			top: 0;
			left: 0;
			bottom: 0;
			right: 0;
			}
			@-webkit-keyframes spin {
			0% { -webkit-transform: rotate(0deg); }
			100% { -webkit-transform: rotate(360deg); }
			}
			@keyframes spin {
			0% { transform: rotate(0deg); }
			100% { transform: rotate(360deg); }
			}
			.filter-form-row {
			padding-top: 5px;
			padding-bottom: 5px;
			border-top: 1px solid #cecece;
			}
			#filter-modal-body {
			height: 500px; 
			overflow-y: auto;
			}
			input[type=number]::-webkit-inner-spin-button, 
			input[type=number]::-webkit-outer-spin-button { 
			-webkit-appearance: none; 
			margin: 0; 
			}
			//maybe?
			.resizable {
			resize: both;
			overflow: scroll;
			border: 1px solid purple;
			}
			.hero-bkg-animated {
			background: gray url(https://subtlepatterns.com/patterns/geometry2.png) repeat 0 0;
			width: 100%;
			margin: 0;
			text-align: center;
			height: 300px;
			box-sizing: border-box;
			-webkit-animation: slide 20s linear infinite;
			}
			.hero-bkg-animated h1 {
			font-family: sans-serif;
			}
			@-webkit-keyframes slide {
			from { background-position: 0 0; }
			to { background-position: -400px 0; }
			}
		</style>
	</head>
	<body>
		<header id="header">
			<nav class="navbar navbar-expand-lg">
				<a class="navbar-brand" href="#">
					<h1 id="ld-heading">LinkoDash</h1>
				</a>
			</nav>
		</header>
		<main id="main" class="hero-bkg-animated" style="border: 1px solid black;">
			<!--HACK removing this border ruins the stying. Not sure why :)-->
			<div style="margin-top: 80px;">
				<div style="visibility: hidden; width: 60%;" class="alert alert-danger mx-auto" role="alert" id="validate-fail-alert">
					Login Information Not Valid
				</div>
				<div class="card mx-auto" style="width: 30%;" >
					<div class="card-body">
						<h5 class="card-title float-left" style="padding-bottom: 20px;">Login</h5>
						<div class="form-group">
							<input  class="form-control" id="username" aria-describedby="emailHelp" placeholder="Username">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="password" placeholder="Password">
						</div>
						<button id="go" class="btn btn-primary">Let's Go</button>
					</div>
				</div>
			</div>
		</main>
		<footer id="footer">
			<p id="footer-text">Created using the LinkShop application which can be found at: <a class="link-unstyled" href="https://github.com/sandialabs/linkshop">https://github.com/sandialabs/linkshop</a></p>
		</footer>
		<!--<script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>-->
		<!--
			<script
				src="https://code.jquery.com/jquery-3.3.1.js"
				integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
				crossorigin="anonymous"></script>
			<script
				src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
				integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
				crossorigin="anonymous"></script>
			-->
		<script src="js/jquery-1.11.3.min.js"></script>
		<script src="js/jquery-ui.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.cookie.js"></script>
		<script>
			
		$.ajaxSetup({
			beforeSend: function () {
				$('#loader').show();
			},
			complete: function () {
				$('#loader').hide();
			}
		});


		$(function () {


			let $header = $('#header'),
				$footer = $('#footer'),
				$main = $('#main');


			let $window = $(window).on('resize', function () {

				let mainHeight = $(this).height() - $header.height() - $footer.height();


				$main.height(mainHeight);


			}).trigger('resize');


		});

		document.getElementById("go").addEventListener("click", function () {


			checkPassword();

			// make this and the createAccount() funciton hidden 
			//createAccount("admin", "linkoadmin");

		});


		function checkPassword() {

			let username = document.getElementById("username").value,
				password = document.getElementById("password").value,
				formData = new FormData();

			formData.append("username", username);
			formData.append("password", password);

			document.getElementById("validate-fail-alert").style.visibility = "hidden";

			$.ajax({

				type: "POST",
				url: "php/verify.php",
				cache: false,
				processData: false,
				contentType: false,
				data: formData,
				success: function (data) {

					if (data === "true") {

						console.log("success");
						$.cookie('linko_auth', 'true', {
							expires: 7
						});
						window.location.replace("index.php");

					} else {

						console.log("fail");
						document.getElementById("validate-fail-alert").style.visibility = "visible";

					}

				}

			});


		}


		
		function createAccount (username, password) {
					
			let	formData = new FormData();
					
			formData.append("username", username);
			formData.append("password", password);
					
			
			$.ajax({
					
			type: "POST",
			url: "php/createUser.php",
			cache: false,
			processData: false,
			contentType: false,
			data: formData,
			success: function (data) {
					
				console.log(data);
					
			}
					
		});
					
					
		}
		
			
		</script>
		<div id="loader" style="display: none;"></div>
	</body>
</html>