
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Allure Marinduque</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">


    <!-- Favicons -->
<!-- <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico"> -->
<meta name="theme-color" content="#7952b3">

  
  </head>
  <body>
    
  <header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/tourist"><strong class="text-success">ALLURE</strong> Marinduque &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
         
        </ul>
        <form class="d-flex" action="pages/explore.php">  
          <input class="form-control me-2" value="<?php echo isset($_GET['search']) ? $_GET['search'] : '' ?>" style="width: 500px" type="search" name="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</header>

<main>
  <!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

<!-- Indicators/dots -->
<div class="carousel-indicators">
  <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
  <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
  <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
</div>

<!-- The slideshow/carousel -->
<div class="carousel-inner">
  <div class="carousel-item active">
    <img src="images/slider1.jpg" alt="Poctoy Beach Resort" class="d-block" style="width:100%; height: 500px">
  </div>
  <div class="carousel-item">
    <img src="images/slider2.jpg" alt="Elephant Island" class="d-block" style="width:100%; height: 500px">
  </div>
  <div class="carousel-item">
    <img src="images/slider3.jpg" alt="Luzon Datum" class="d-block" style="width:100%; height: 500px">
  </div>
  <div class="carousel-item">
    <img src="images/slider4.jpg" alt="New York" class="d-block" style="width:100%; height: 500px">
  </div>
</div>

<!-- Left and right controls/icons -->
<button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
  <span class="carousel-control-next-icon"></span>
</button>
</div>


<br><br>

  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      
      <?php
          $xml_spots = simplexml_load_file('xml/spots.xml');
          $ctr = 0;
          foreach ($xml_spots->spot as $spot) {
            if ($ctr < 6) {
      ?>
        <div class="col-lg-4 mb-5">
            <img width="350px" height="250px" style="object-fit: cover;" src="images/<?php echo $spot->image ?>" alt=""> <br><br>
            <h4><?php echo $spot->name ?></h4>
            <p><?php echo $spot->location ?></p>
            <a class="btn btn-primary" href="pages/view-spot.php?id=<?php echo $spot->id?>">Explore &raquo;</a>
          </div><!-- /.col-lg-4 -->
      <?php
            }
            $ctr++;
          }
      ?>
  
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">About Us. <span class="text-muted"> "ALLURE MARINDUQUE"</span></h2>
        <p class="lead">
        
Allure Marinduque started in the summer of 2023. This founder has the vision to spread excitement that turns into great memories. Giving the ultimate high-quality photos and quality time adventure. Beautiful smile with beautiful nature. Creativity that brought perfection to the visitors. 

This web application will help everyone to locate a lot of places in Marinduque.

To make life easier for travelers who wish to enjoy all Marinduque has to offer, we created this online application. We decided to utilize this as our starting point since we believe that our province needs it when they discover more about it.

Simply we produce good information ideas that the visitors may use. 

"OUR GOAL IS TO PROVIDE YOU WITH THE BEST AND HAPPIEST ADVENTURE WITH US"
        </p>
      </div>
      <div class="col-md-5">
        
        <video width="500" height="400" controls>
          <source src="images/video.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>
    </div>
    <hr>
    <img width="100%" style="object-fit: cover;" src="images/map.jpg" alt=""> <br><br>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="pages/admin.php">Go to Admin</a></p>
    <p>&copy; Integrative Programming & Technology. </p>
  </footer>
</main>


    <script src="js/bootstrap.bundle.js"></script>

      
  </body>
</html>
