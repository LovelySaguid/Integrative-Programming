<?php
    $xml_spots = simplexml_load_file('../xml/spots.xml');

    function addSpot($xml_spots) {

        $target_dir = "../images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          echo "File is not an image.";
          $uploadOk = 0;
        }

        $spot = $xml_spots->addChild("spot");
        $spot->addChild("id", date("Ymdhis"));
        $spot->addChild("image", $target_file);
        $spot->addChild("name", $_POST['name']);
        $spot->addChild("location", $_POST['location']);
        $spot->addChild("details", $_POST['details']);
        $spot->addChild("date", date("Y-m-d"));
        $xml_spots->asXML('../xml/spots.xml');
    }


    if(isset($_POST['save_spot'])) {
        addSpot($xml_spots);
        header("Location: admin.php?notification='Successfully saved'");
        exit(); 
    }

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
    <link rel="stylesheet" type="text/css" href="../css/style.css">
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
        <form class="d-flex" action="explore.php">
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
            <div class="col-md-9">
                <h1>
                    <a href="admin.php"><i class="fa fa-chevron-left"></i></a>
                    New Spot
                </h1>
                <hr>

                <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Image</label>
                    <input type="file" required class="form-control" name="image">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Spot Name</label>
                    <input type="text" required class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Location</label>
                    <select name="location" required class="form-control">
                        <option value="">--</option>
                        <option value="Gasan">Gasan</option>
                        <option value="Boac">Boac</option>
                        <option value="Buenavista">Buenavista</option>
                        <option value="Mogpog">Mogpog</option>
                        <option value="Sta. Cruz">Sta. Cruz</option>
                        <option value="Torrijos">Torrijos</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Details</label>
                    <textarea name="details" required cols="30" rows="10" class="form-control"></textarea>
                </div>
                <button type="submit" name="save_spot" class="btn btn-primary">Save</button>
                </form>

            </div>
        </div>
    </div>
            

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="#">Back to top</a></p>
    <p>&copy; Integrative Programming & Technology. </p>
  </footer>
</main>

    <script src="js/bootstrap.bundle.js"></script>
  </body>
</html>
