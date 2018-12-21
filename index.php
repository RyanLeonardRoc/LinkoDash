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
		</style>
	</head>
	<body>
		<div id="loader" style="display: none;"></div>
		<header id="header">
			<nav class="navbar navbar-expand-lg">
				<a class="navbar-brand" href="#">
					<h1 id="ld-heading">LinkoDash</h1>
				</a>
			</nav>
		</header>
		<main id="main">
			<div class="container-fluid" id="main-container">
				<div class="row"  id="main-primary-row">
					<div class="col-md-3" id="recent-col">
						<div class="container-fluid" id="recent-container">
							<div class="row" id="recent-header-row">
								<div class="col-md-12" id="recent-header">
									<div class="float-left" id="recent-h1-div">
										<h2>Recent</h2>
									</div>
									<div class="float-right" id="recent-icons-div">
										<a onclick="showCreateModal()"><img id="create-graph-icon" class="icon-imgs" src="img/add.png" alt="create graph"></a>
										<a onclick="showFilterModal()"><img class="icon-imgs" src="img/search.png" alt="filter graphs"></a>
									</div>
								</div>
							</div>
							<div class="row" id="cmds-list">
								<table id="recent-table" class="table table-hover borderless w-100 d-block d-md-table">
									<thead id="recent-table-head">
										<tr>
											<th>Remover</th>
											<th>Commands</th>
											<th>DateTime</th>
										</tr>
									</thead>
									<tbody id="recent-table-body">
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-md-9" id="graph-col">
						<div class="container-fluid" id="graph-container">
							<div class="row" id="graph-row">
								<div class="col-md-6 drop-zone-col">
									<div id="drop-zone-1" class="drop-zone" ondrop="drop(event, this)" ondragover="allowDrop(event)" ondragleave="leaveDrop(event)">
										<img class="drop-zone-icon img-verticle-align" src="img/drop.png" alt="drop zone" id="drop-zone-1-img">
										<div class="inner-drop-zone-div" id="inner-drop-zone-1">
											<div class="container-fluid svg-container">
												<div class="row svg-header-row">
													<div class="col-md-12 svg-header-col">
														<div class="float-left cmds-div">
															<h2 id="cmds-drop-zone-1"></h2>
															<p></p>
														</div>
														<div class="float-right svg-icons-div">
															<a><img class="icon-imgs" src="img/close.png" alt="close graphs" onclick="resetDropZone('drop-zone-1')"></a>
														</div>
													</div>
												</div>
												<div class="row" id="svg-div-drop-zone-1">
													<div class="col-md-12" id="svg-drop-zone-1">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 drop-zone-col">
									<div id="drop-zone-2" class="drop-zone" ondrop="drop(event, this)" ondragover="allowDrop(event)" ondragleave="leaveDrop(event)">
										<img class="drop-zone-icon img-verticle-align" src="img/drop.png" alt="drop zone" id="drop-zone-2-img">
										<div class="inner-drop-zone-div" id="inner-drop-zone-2">
											<div class="container-fluid svg-container">
												<div class="row svg-header-row">
													<div class="col-md-12 svg-header-col">
														<div class="float-left cmds-div">
															<h2 id="cmds-drop-zone-2"></h2>
														</div>
														<div class="float-right svg-icons-div">
															<a><img class="icon-imgs" src="img/close.png" alt="close graphs" onclick="resetDropZone('drop-zone-2')"></a>
														</div>
													</div>
												</div>
												<div class="row" id="svg-div-drop-zone-2">
													<div class="col-md-12" id="svg-drop-zone-2">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<hr/>
						<div class="container-fluid" id="sf-outer-container">
							<div class="row" id="sf-main-row">
								<div class="col-md-12">
									<div class="container-fluid" id="sf-container-header">
										<div class="row" id="sf-header-row">
											<div class="col-md-12 svg-header-col">
												<div class="float-left cmds-div">
													<h2>Session Features</h2>
												</div>
												<div class="float-right svg-icons-div">
													<a><img class="icon-imgs" src="img/report.png" alt="close graphs" onclick="exportSessionFeatures()"></a>
												</div>
											</div>
										</div>
										<div class="container" id="sf-stats-container">
											<div class="row" id="sf-stats-row">
												<div class="col-md-6" class="sf-stats-column" style="padding: 0; height: 100%;">
													<!--inline padding seems to be neccessary here-->
													<div id="sf-drop-zone-1" class="sf-drop-zone">
														<ul class="sf-data-list" id="sf-data-drop-zone-1"></ul>
													</div>
												</div>
												<div class="col-md-6" class="sf-stats-column" style="padding: 0; height: 100%;">
													<!--inline padding seems to be neccessary here-->
													<div id="sf-drop-zone-2" class="sf-drop-zone">
														<ul class="sf-data-list" id="sf-data-drop-zone-2"></ul>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<footer id="footer">
			<p id="footer-text">Created using the LinkShop application which can be found at: <a class="link-unstyled" href="https://github.com/sandialabs/linkshop">https://github.com/sandialabs/linkshop</a></p>
		</footer>
		<div class="modal fade" tabindex="-1" role="dialog" id="create-modal">
			<div class="modal-dialog" role="document">
				<!--modal-dialog-centered-->
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Create Graph</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div>
										<i>*All files must be .json format</i>
										<br><br>
										<form id="create-form" enctype="multipart/form-data">
											<fieldset class="create-modal-fieldset">
												<div class="inner-create-modal-fieldset">
													<label class="create-modal-label" for="abstraction">Abstraction:</label>
													<input class="create-modal-input" type="file"
														id="abstraction" name="abstraction"
														accept=".json,application/json" required />
												</div>
											</fieldset>
											<fieldset class="create-modal-fieldset">
												<div class="inner-create-modal-fieldset">
													<label class="create-modal-label" for="ontology">Ontology:</label>
													<input class="create-modal-input" type="file"
														id="ontology" name="ontology"
														accept=".json,application/json" required />
												</div>
											</fieldset>
											<fieldset class="create-modal-fieldset">
												<div class="inner-create-modal-fieldset">
													<label class="create-modal-label" for="commands">Commands:</label>
													<input class="create-modal-input" type="file"
														id="commands" name="commands"
														accept=".json,application/json" required />
												</div>
											</fieldset>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button id="create-modal-submit-button" name="submit" type="submit" form="create-form" type="button" class="btn btn-primary">Create</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" tabindex="-1" role="dialog" id="delete-modal">
			<div class="modal-dialog" role="document">
				<!--modal-dialog-centered-->
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Delete Graph</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Are you sure that you would like to delete the following graph?
						<br><br>
						<p id="delete-confirm-item-info"></p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button id="delete-modal-submit-button" onclick="hideDeleteModal()" class="btn btn-primary">Delete</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" tabindex="-1" role="dialog" id="filter-modal">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Filter</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="filter-modal-body">
					<form id="filter-form">
						<div class="container" id="filter-rows">
							<div class="row">
								<div class="col-md-5">
									<select class="form-control" id="feature-select-main" onchange='updateSelects()'>
									</select>
								</div>
								<div class="col-md-2">
									<select class="form-control">
										<option selected="selected">=</option>
										<option>>=</option>
										<option><=</option>
										<option>></option>
										<option><</option>
									</select>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input type="number" class="form-control"  placeholder="Value">
									</div>
								</div>
								<div class="col-md-1">
									<button type="button" class="close" onclick='removeFilterSelector(this)'>
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
							</div>
						</div>
						<div class="container">
							<div class="row">
								<div class="col-md-12 text-center">
									<a><img class="icon-imgs" src="img/new-filter.png" onclick="addFilterRow()" style="height: 40px; width: 40px;"></a>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button id="filter-modal-submit-button" type="button" class="btn btn-primary" onclick="handleFilter()">Filter</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!--<script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>-->
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
			
			
			$(function(){
			
			    let $header = $('#header'),
			    	$footer = $('#footer'),
			    	$main = $('#main'),
			    	$createForm = $('#create-form'),
			    	$recentContainer = $('#recent-container'),
			    	$recentHeaderRow = $('#recent-header-row'),
			    	$cmdsList = $('#cmds-list'),
			    	$svgDiv1 = $('#svg-div-drop-zone-1'),
			    	$svgDiv2 = $('#svg-div-drop-zone-2');
			

			    //if ($.cookie('linko_auth') !== "true") {
			
			
			    	//$("body").empty();
			    	//$("body").append("<h1 style='margin-left:20px; margin-top: 20px;'>Permission Denied</h1>");
			
			   // }
			    //else {
			
			    let $window = $(window).on('resize', function(){
			       
			       let mainHeight = $(this).height() - $header.height() - $footer.height();
			       	   
			       	   
			       $main.height(mainHeight);
			
			       let cmdsListHeight = $recentContainer.height() - $recentHeaderRow.height();
			
			       $cmdsList.height(cmdsListHeight);
			       $svgDiv1.height(cmdsListHeight);
			       $svgDiv2.height(cmdsListHeight);
			
			       $('#sf-header-row').height($recentHeaderRow.height());
			       $('#sf-stats-row').height($('#sf-main-row').height() - $('#sf-header-row').height());
			
			    }).trigger('resize'); 
			
			    console.log("running");
			
				initFeatureSelectDropdown("feature-select-main", []);
			
			    loadRecent ();
			
			
				$createForm.submit(function(e){	 
			
					$('#create-modal-submit-button').prop("disabled",true);
					$('#create-modal').modal('hide')
					
					e.preventDefault();
					let formData = new FormData($(this)[0]);
					console.log(formData);
					$.ajax({
			
						url: 'php/createSvg.php',
						type: 'POST',
						data: formData,
						cache: false,
						contentType: false,
						enctype: 'multipart/form-data',
						processData: false,
						success: function (data) {
			
							console.log(data);
							//uncomment
							
						    let responseData = JSON.parse(data);
						    console.log(data);
							
							$('#recent-table-body').prepend("<tr value="  + responseData["time_stamp"] + " id='ts " + responseData["time_stamp"] +  "' draggable='true' ondragstart='drag(event)'><td style='padding-left: 30px;'><a class='newly-created-row'>×</a></td><td style='padding-left: 0px; padding-right: 0px;'>" + responseData["cmd"].slice(0,-5) + "</td><td style='padding-left: 5px;'>" + responseData["date"] + " " + responseData["hour"] +  ":" + responseData["minute"] + ":" + responseData["second"] + " " + responseData["meridiem"]  + "</td></tr>").hide().fadeIn(1000);
			
							//console.log($("#ts " + responseData["time_stamp"])); // figure this out
			
							$( ".newly-created-row" ).each(function( index ) {
							  this.addEventListener("click", function () {
							  	console.log(responseData);
								showDeleteModal(responseData, true);
							});
							});
			
							
			
			
							
						}
					});
					return false;
				});
			
				$(".modal-dialog").draggable({
				    handle: ".modal-header"
				});
			
				//}
			    		   
			});
			
			function removeFilterSelector (node) {
			
				node.parentNode.parentNode.parentNode.removeChild(node.parentNode.parentNode);
				updateSelects();
			
			}
			
			let randomIds = [];
			
			function addFilterRow () {
			
				let container = $("#filter-rows"),
					randomNum,
					selectedValues,
					selects,
					previouslySelectedFeatures = [];
			
				let generateRandomNum = function () {
			
					randomNum = getRandomInt(1,1000);
			
					for (let i=0; i<randomIds.length; i++) {
			
						if (randomIds[i] === randomNum) {
			
							generateRandomNum();
			
						}
			
					}
			
				}
			
				generateRandomNum();
			
				console.log(randomNum);
			
				selects = container[0].querySelectorAll(".row .col-md-5 select");
				
				for (let j=0; j<selects.length; j++) {
			
					previouslySelectedFeatures.push(selects[j].options[selects[j].selectedIndex].text);
			
			
				}
			
				container.append("<div class='row'><div class='col-md-5'><select onchange='updateSelects()' class='form-control' id='row" + randomNum + "'></select></div><div class='col-md-2'><select class='form-control'><option selected='selected'>=</option><option>>=</option><option><=</option><option>></option><option><</option></select></div><div class='col-md-4'><div class='form-group'><input type='number' class='form-control'  placeholder='Value'></div></div><div class='col-md-1'><button type='button' class='close' onclick='removeFilterSelector(this)'><span aria-hidden='true'>&times;</span></button</div></div>");
			
			
			
				
			
				initFeatureSelectDropdown("row" + randomNum, previouslySelectedFeatures);
			
			}
			
			function updateSelects () {
			
			 let features = ["access_next", "access_ratio", "cleanup_next", "cleanup_ratio", "critical_node_count", "entropy",
				"entropy_deviation", "execute_next", "execute_ratio", "graph_differences", "link_index", "look_next",
				"look_ratio", "mean_delay_seconds", "mean_link_coverage", "move_next", "move_ratio", "node_count",
				"percentage_of_links", "range_x", "range_y, second", "session_length_seconds", "session_start_time",
				"sigma_x", "sigma_y", "t_complexity", "top_cover", "transfer_next", "transfer_ratio", "x_bar", "y_bar"];
			
				let container = $("#filter-rows"),
				    selects = container[0].querySelectorAll(".row .col-md-5 select"),
				    currentlySelectedDict = {};
			
			
				 for (let i=0; i<selects.length; i++) {
			
					let selectedText = selects[i].options[selects[i].selectedIndex].text;
					currentlySelectedDict[i] = selectedText;
			
				}
			
			
			
				for (let i=0; i<selects.length; i++) {
			
					let selectedText = selects[i].options[selects[i].selectedIndex].text;
					let excludedFeatures = [];
			
					for (let n=0; n<selects.length; n++) {
			
						if (!selects[i].isEqualNode(selects[n])) {
			
							excludedFeatures.push(currentlySelectedDict[n]);
			
						}
			
					}
			
					initFeatureSelectDropdown(selects[i].id, excludedFeatures);
			
			
					$("#" + selects[i].id + " option").filter(function() {
					    //may want to use $.trim in here
					    return $(this).text() == selectedText; 
					}).prop('selected', true);
			
				}
			
			}
			
			function getRandomInt(min, max) {
			    min = Math.ceil(min);
			    max = Math.floor(max);
			    return Math.floor(Math.random() * (max - min + 1)) + min;
			}
			
			function initFeatureSelectDropdown (id, prevSelected) {
			
				 let features = ["access_next", "access_ratio", "cleanup_next", "cleanup_ratio", "critical_node_count", "entropy",
								"entropy_deviation", "execute_next", "execute_ratio", "graph_differences", "link_index", "look_next",
								"look_ratio", "mean_delay_seconds", "mean_link_coverage", "move_next", "move_ratio", "node_count",
								"percentage_of_links", "range_x", "range_y, second", "session_length_seconds", "session_start_time",
								"sigma_x", "sigma_y", "t_complexity", "top_cover", "transfer_next", "transfer_ratio", "x_bar", "y_bar"];
			
				let select = $("#" + id);
			
				select.empty();
			
				for (let i=0; i<features.length; i++) {
			
					let found = false;
			
					for (let j=0; j<prevSelected.length; j++) {
			
						if (prevSelected[j] === features[i]) {
			
							found = true;
			
						}
			
					} 
			
					if (!found) {
			
						select.append("<option>" + features[i] + "</option>");
			
					}
			
					
			
				}
			
			}
			
			function loadRecent () {
			
			
				$.ajax({
					type: "POST",
					url: "php/fetchRecent.php",
					contentType: "application/json; charset=utf-8",
					dataType: "json",
					success: function (data) {
			
						//TODO padding would not work with normal css. 
			
			
						let tbody = document.getElementById("recent-table-body");
			
						for (let i=0; i<data.length; i++) {
			
							let rowData = JSON.parse(data[i]),
								row = document.createElement("tr"),
								removeAnchor = document.createElement("a"),
								removeTd = document.createElement("td"),
								cmdTd = document.createElement("td"),
								dateTimeTd = document.createElement("td");
			
							row.setAttribute("value", rowData["time_stamp"]);
							row.setAttribute("id", "ts " + rowData["time_stamp"]);
							row.setAttribute("draggable", true);
							row.setAttribute("ondragstart", "drag(event)");
			
							removeAnchor.innerHTML = "&times;";
							removeTd.appendChild(removeAnchor);
							removeTd.style.paddingLeft = "30px";
			
							removeAnchor.addEventListener("click", function () {
								showDeleteModal(rowData);
							});
			
							cmdTd.appendChild(document.createTextNode(rowData["cmd"]));
							cmdTd.style.paddingLeft = "0px";
							cmdTd.style.paddingRight = "0px";
			
							dateTimeTd.appendChild(document.createTextNode(JSON.parse(rowData["date"]) + " "));
							dateTimeTd.appendChild(document.createTextNode(rowData["hour"] + ":"));
							dateTimeTd.appendChild(document.createTextNode(rowData["minute"] + ":"));
							dateTimeTd.appendChild(document.createTextNode(rowData["second"] + " "));
							dateTimeTd.appendChild(document.createTextNode(JSON.parse(rowData["meridiem"])));
							dateTimeTd.style.paddingLeft = "5px";
			
							row.appendChild(removeTd);
							row.appendChild(cmdTd);
							row.appendChild(dateTimeTd);
			
							tbody.appendChild(row);
			
						}
					}
				});
			
			}
			
			function showCreateModal () {
			
				$('#create-modal-submit-button').prop("disabled",false);
			
				$('#create-modal').modal({
				  keyboard: false
				});
			
			}
			
			//newRow is boolean. input must be handled slightly differently in this case.
			function showDeleteModal(rowData, newRow) {
			
				console.log(rowData);
			
				$('#delete-modal-submit-button').prop("disabled",false);
			
				$('#delete-confirm-item-info').empty();
			
				if (newRow) {
			
					$('#delete-confirm-item-info').append("<b>" + rowData["cmd"] + " " + rowData["date"] + " " + rowData["hour"] + ":" + rowData["minute"] + ":" + rowData["second"] + " " + rowData["meridiem"] + "</b>");
			
				}
				else {
				$('#delete-confirm-item-info').append("<b>" + rowData["cmd"] + " " + JSON.parse(rowData["date"]) + " " + rowData["hour"] + ":" + rowData["minute"] + ":" + rowData["second"] + " " + JSON.parse(rowData["meridiem"]) + "</b>");
				}
			
				$('#delete-modal-submit-button').click(function (){
					$(this).prop("disabled",true);
					deleteGraph(rowData["time_stamp"]);
				});
			
				$('#delete-modal').modal({
					keyboard: false
				});
			
			}
			
			function hideDeleteModal() {
			
				$('#delete-modal-submit-button').prop("disabled",true);
				$('#delete-modal').modal('hide')
			
			
			}
			
			function showFilterModal() {
			
			
				$('#filter-modal').modal({
				  keyboard: false
				});
			
			}
			
			function deleteGraph (timestamp) {
			
			
				let row = document.getElementById("ts " + timestamp);
				console.log(row);
			
				let formData = new FormData();
			
				formData.append("time_stamp", timestamp);
			
				$.ajax({
			
					url: 'php/deleteSvg.php',
					type: 'POST',
					data: formData,
					cache: false,
					contentType: false,
					enctype: 'multipart/form-data',
					processData: false,
					success: function (data) {
						
						$(row).remove();
						
					}
				});
			}
			
			function fetchGraph (timestamp, targetId) {
			
				
			
				let formData = new FormData();
			
				formData.append("time_stamp", timestamp);
			
				$.ajax({
					type: "POST",
					url: "php/fetchSvg.php",
					cache: false,
					processData: false,
					contentType: false,
					data: formData,
					success: function (data) {
						fetchSessionFeatures(timestamp, targetId);
						let responseData = JSON.parse(data);
						displayGraph(responseData[0]['svg'], responseData[0]['commands_input_file'], targetId);
			
						 $("svg").draggable();
						 //$("svg").addClass("resizable"); //not working
			
					}
				});
			
			}
			
			
			
			function fetchSessionFeatures (timestamp, targetId) {
			
				let formData = new FormData();
			
				formData.append("time_stamp", timestamp);
			
				$.ajax({
					type: "POST",
					url: "php/fetchSessionFeatures.php",
					cache: false,
					processData: false,
					contentType: false,
					data: formData,
					success: function (data) {
						let responseData = JSON.parse(data)[0],
							sfList = $('#sf-data-' + targetId)[0],
							keys = Object.keys(responseData).sort();
						
						for(let i=0; i<keys.length; i++) {
							let listItem = document.createElement("li");
							listItem.append(keys[i] + ": " + responseData[keys[i]]);
							sfList.append(listItem);
						}
			
					}
				});
			
			} 
			
			function exportSessionFeatures() {
			
				let sfList1 = $('#sf-data-drop-zone-1').children(),
					sfList2 = $('#sf-data-drop-zone-2').children(),
					rows = [];
			
				if (sfList1.length !== 0) {
			
					let names = [],
						values = [];
			
					for (let i=0; i<sfList1.length; i++) {
			
						
						let txt = sfList1[i].firstChild.textContent;
			
						names.push(txt.split(" ")[0]);
						values.push(txt.split(" ")[1]);
						
			
					}
			
					rows.push(names);
					rows.push(values);
			
				}
			
				if (sfList2.length !== 0) {
			
					let names = [],
						values = [];
			
			
					for (let i=0; i<sfList2.length; i++) {
			
						let txt = sfList1[i].firstChild.textContent;
			
						names.push(txt.split(" ")[0]);
						values.push(txt.split(" ")[1]);
						
					}
			
					if (sfList1.length === 0) {
			
						rows.push(names);
			
					}
			
					rows.push(values);
			
				}
			
				let csvContent = "data:text/csv;charset=utf-8,";
				rows.forEach(function(rowArray){
				   let row = rowArray.join(",");
				   csvContent += row + "\r\n";
				}); 
			
				var encodedUri = encodeURI(csvContent);
				window.open(encodedUri);
			
			}
			
			function handleFilter() {
			
			
				let data = {"entries": []},
					rows = $("#filter-rows .row");
			
			
				for (let i=0; i<rows.length; i++) {
			
			
			
					let selects = rows[i].getElementsByTagName("select"),
						feature = selects[0].options[selects[0].selectedIndex].text,
						operator = selects[1].options[selects[1].selectedIndex].text,
						input = rows[i].getElementsByTagName("input"),
						val = input[0].value;
			
					data["entries"].push({"feature": feature, "operator": operator, "value": val});
			
				}
			
			
			    let strData = JSON.stringify(data);
			
			    console.log(strData);
			
				$.ajax({
					type: "POST",
					url: "php/fetchFilteredResults.php",
					cache: false,
					data: {myData: strData},
					success: function (data) {
			
						$('#recent-table-body').empty();
			
						let parsedData = JSON.parse(data);
						let tbody = document.getElementById("recent-table-body");
			
						for (let i=0; i<parsedData.length; i++) {
			
							console.log(parsedData[i]);
			
							
			
							let rowData = parsedData[i],
								row = document.createElement("tr"),
								removeAnchor = document.createElement("a"),
								removeTd = document.createElement("td"),
								cmdTd = document.createElement("td"),
								dateTimeTd = document.createElement("td");
			
							row.setAttribute("value", rowData["time_stamp"]);
							row.setAttribute("id", "ts " + rowData["time_stamp"]);
							row.setAttribute("draggable", true);
							row.setAttribute("ondragstart", "drag(event)");
			
							removeAnchor.innerHTML = "&times;";
							removeTd.appendChild(removeAnchor);
							removeTd.style.paddingLeft = "30px";
			
							removeAnchor.addEventListener("click", function () {
								showDeleteModal(rowData, true);
							});
			
							cmdTd.appendChild(document.createTextNode(rowData["cmd"]));
							cmdTd.style.paddingLeft = "0px";
							cmdTd.style.paddingRight = "0px";
			
			
							dateTimeTd.appendChild(document.createTextNode(rowData["date"] + " "));
							dateTimeTd.appendChild(document.createTextNode(rowData["hour"] + ":"));
							dateTimeTd.appendChild(document.createTextNode(rowData["minute"] + ":"));
							dateTimeTd.appendChild(document.createTextNode(rowData["second"] + " "));
							dateTimeTd.appendChild(document.createTextNode(rowData["meridiem"]));
							dateTimeTd.style.paddingLeft = "5px";
			
							row.appendChild(removeTd);
							row.appendChild(cmdTd);
							row.appendChild(dateTimeTd);
			
							tbody.appendChild(row);
							
			
						}
			
			
					}
				});
			
				
			
			}
			
			function displayGraph (svg, cmd, targetId) {
				
				$('#' + targetId).attr("ondragover", "");
				$('#cmds-' + targetId).append(cmd.slice(0, -5));
				$('#svg-' + targetId).append(svg);
			
				
			}
			
			function allowDrop (ev) {
				ev.preventDefault();
				//$(ev.target).css('border','2px solid grey');
			}
			
			function leaveDrop (ev) {
				//$(ev.target).css('background-color','grey');
			}
			
			function drag (ev) {
			    ev.dataTransfer.setData('Text/html', ev.target.id);
			}
			
			function drop (ev, target) {
			    ev.preventDefault();
			    
			    let id = ev.dataTransfer.getData("text/html"),
			    	droppedRow = document.getElementById(id),
			    	value = droppedRow.getAttribute("value");
			
			
			       $('#' + target.id).children().css("display", "none")
			       $('#inner-' + target.id).css("display", "block");
			       $('#sf-outer-container').css("display", "block");      
			
			    fetchGraph(value, target.id);
			    	
			}
			
			
			
			function resetDropZone (targetId) {
			
				$('#' + targetId).children('img').css("display", "block");
				$('#' + targetId).children('div').css("display", "none");
				$('#cmds-' + targetId).empty();
				$('#svg-' + targetId).empty();
				$('#sf-data-' + targetId).empty();
				$('#' + targetId).attr("ondragover", "allowDrop(event)");
			
				if($('#drop-zone-1-img:visible').length !== 0 && $('#drop-zone-2-img:visible').length !== 0) {
					$('#sf-outer-container').css("display", "none");
				}
			
				
			}
			
			
		</script>
	</body>
</html>