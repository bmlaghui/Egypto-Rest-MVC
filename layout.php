<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Egyptomania</title>

  <!-- Bootstrap core CSS -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="<?= $baseURL; ?>/tmp/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="tmp/css/shop-homepage.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">EGYPTOMANIA</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Acceuil
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=$baseURL?>/epoques">Epoques</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=$baseURL?>/lieux">Lieux</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="<?=$baseURL?>/dynasties">Dynasties</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=$baseURL?>/pharaons">Pharaons</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
 <!-- Page Content -->
  <div class="container">
<?= $content ; ?>
    

  </div>
</main>
 
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; <a href="http://www.mlaghuibrahim.com">MLAGHUI Brahuim</a>  Bachelor web ITIC PARIS 2019-2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="tmp/vendor/jquery/jquery.min.js"></script>
  <script src="tmp/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
