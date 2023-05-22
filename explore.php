<?php
    $notification = isset($_GET['notification']) ? $_GET['notification'] : '';
    $search = isset($_GET['search']) ? $_GET['search'] : '';
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Allure Marinduque</title>

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="theme-color" content="#7952b3">
  
  </head>

    <style>
        .checked {
            color: orange;
        }
    </style>

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
        <form class="d-flex">
          <input class="form-control me-2" value="<?php echo isset($_GET['search']) ? $_GET['search'] : '' ?>" style="width: 500px" type="search" name="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</header>

<main>
    <br><br><br><br>

    
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php if(isset($_GET['notification'])) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">
                        <i class="fa fa-check"></i>    
                        Well done!</h4>
                        <p>Aww yeah, you successfully submited your feedback and rating to the selected tourist spot. </p>
                        <hr>
                        <p class="mb-0">Try to explore other spots, thank you and have a nice day.</p>
                    </div>
                <?php }
                ?>


                <h1>
                    <?php echo isset($_GET['search']) && $_GET['search'] !== '' ? 'Search Result: "'.$search.'"' : "Explore" ?>
                </h1>
                <hr>
                <?php
                    $xml_spots = simplexml_load_file('../xml/spots.xml');
                    
                    foreach ($xml_spots->spot as $spot) {
                        if (isset($_GET['search']) || $search == '') {
                            if (stripos($spot->name, $search) !== false || stripos($spot->location, $search) !== false) {
                        ?>
                    <div class="row">
                        <div class="col-lg-2">
                            <img style="width:100%" src="../images/<?php echo $spot->image ?>" alt="">
                        </div>
                        <div class="col-lg-10">
                            <h5><?php echo $spot->name ?></h5>
                            <small><?php echo $spot->location ?></small>
                            <a class="btn btn-sm btn-primary pull-right" href="view-spot.php?id=<?php echo $spot->id?>">Explore &raquo;</a>
                        </div>
                    </div>
                    <hr>
                <?php
                            } 
                        }
                    }
                ?>
            </div>
        </div>
    </div>
            

    
    <!-- /END THE FEATURETTES -->
    
</div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="container fixed-bottom">
    <p class="float-end"><a href="admin.php">Go to Admin</a></p>
    <p>&copy; Integrative Programming & Technology. </p>
  </footer>
</main>

    <script src="js/bootstrap.bundle.js"></script>
  </body>
</html>
