<!doctype html>
<html lang="pl-PL">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html">
	<title>Zadanie</title>
	<meta name="author" content="kania0507">  
    
    <script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="js/script.js" type="text/javascript"></script>
    
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="all" href="css/style.css">	 
</head>

<body>

    
<div class="container">
 <div class="row header"> 
	<div class="col-md-12">
		<img src="img/header.png" class="img-responsive img-full-width" />
	</div>
 </div>
 <div class="row">
	<div class="col-md-3">
		<sidebar id="first">s1</sidebar>
		<sidebar id="second">s2</sidebar>		
	</div>
	
	<div class="col-md-9 content">
        <ul class="nav nav-tabs ">
			<li ><a data-toggle="tab" href="#home">Hotele</a></li>
			<li class="active"><a data-toggle="tab" href="#menu1">Rozkład lotów</a></li>
			<li><a data-toggle="tab" href="#menu2">Życie nocne</a></li>
			<li><a data-toggle="tab" href="#menu3">Kultura</a></li>
		</ul>

		<div class="tab-content">
			<div id="home" class="tab-pane fade ">
				<h3>Hotele</h3>
				<p>Some content in menu 1.</p>
			</div>
			<div id="menu1" class="tab-pane fade in active">
				
                <div class="box">
                      <div class="form-group box-left" >

                        <input type="text" class="form-control" id="search_input" name="search_input" placeholder="Miasto" />  
                        <br><span>Godzina odjazdu: </span>
                        <select name="dep_time" id="dep_time">
                            <option value=''>-</option>
                            <?php
                                for ($i=11; $i<=18; $i++)
                                {   
                                    echo "<option value='".$i.":00'>".$i.":00</option>
                                        <option value='".$i.":30'>".$i.":30</option>";
                                }
                            ?>

                        </select>

                        </div>
                    
                    <div class="box-right" >
                    <form id="search-form"><span class="input-group-btn"><button type="submit" id="search" class="btn btn-default pull-right" ><span class="glyphicon glyphicon-refresh"></span></button></span></form>
                    </div>
                </div>
				
				<div id="show-data"></div>                
            
			</div>
			<div id="menu2" class="tab-pane fade">
				<h3>Życie nocne</h3>
				<p>Some content in menu 3.</p>
			</div>
			<div id="menu3" class="tab-pane fade">
				<h3>Kultura</h3>
				<p>Some content in menu 4.</p>
			</div>
		</div>		

	</div>

  </div>
</div>
</body>
</html>