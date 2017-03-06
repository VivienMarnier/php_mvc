<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $titre; ?></title>

  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">PartageTaVideo</a>

        </div>
        <div id="navbar" class="navbar-collapse collapse">		
			<div class="col-sm-4 col-md-4">
		  <form class="navbar-form" method="GET" action="index.php">
				<div class="form-group">
					<input type="text" placeholder="Recherche ..." name="research" id="research" class="form-control">
					<input type='hidden' name="controleur" value="recherche">;
				</div>
				<button type="submit" class="btn btn-success">OK</button>
		  </form>
			</div>
			
							<form class="navbar-form navbar-right">
					<div class="form-group">
					  <input type="text" placeholder="Email" class="form-control">
					</div>
					<div class="form-group">
					  <input type="password" placeholder="Password" class="form-control">
					</div>
					<button type="submit" class="btn btn-success">OK</button>
				</form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

  

    <div class="container" style="padding-top:120px;">
      <!-- Example row of columns -->
      <?php echo $contenu; ?>

      <hr>

      <footer class='text-center'>
        <p>&copy; 2016 PartageTaVideo, Inc.</p>
      </footer>
    </div> <!-- /container -->



  </body>
</html>