<?php
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $xml_spots = simplexml_load_file('../xml/spots.xml');
    $xml_feedbacks = simplexml_load_file('../xml/feedbacks.xml');
    $xml_ratings = simplexml_load_file('../xml/ratings.xml');

    function addFeedback($xml_feedbacks) {
        $feedback = $xml_feedbacks->addChild("feedback");
        $feedback->addChild("spot_id", $_GET['id']);
        $feedback->addChild("message", $_POST['message']);
        $feedback->addChild("date", date("Y-m-d"));
        $xml_feedbacks->asXML('../xml/feedbacks.xml');
    }

    function addRating($xml_ratings) {
      $rating = $xml_ratings->addChild("rating");
      $rating->addChild("spot_id", $_GET['id']);
      $rating->addChild("rate", $_POST['rate']);
      $xml_ratings->asXML('../xml/ratings.xml');
  }


    if(isset($_POST['submit_feedback'])) {
        addFeedback($xml_feedbacks);
        addRating($xml_ratings);
        $_SESSION['message'] = "New spot entry added successfully!";
        header("Location: explore.php?notification='Successfully submitted'");
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
                <?php
                    foreach ($xml_spots->spot as $spot) {
                        if ($spot->id == $id) {
                ?>
                        <img style="width:100%" src="../images/<?php echo $spot->image ?>" alt=""> <br><br>
                        <h1><?php echo $spot->name ?></h1>
                        <p><?php echo $spot->details ?></p>
                        <hr>
                        <div class="row">
                            <div class="col-md-9">
                                <h3>Feedback</h3>
                                <div style="max-height:300px; overflow:auto">
                                    <?php
                                        foreach ($xml_feedbacks->feedback as $feedback) {
                                          if ($id == $feedback->spot_id) {
                                    ?>
                                        <table class="table table-no-bordered" style="border-color:transparent">
                                            <tr>
                                                <td width="5px" class="align-top"><i class="fa fa-comments"></i></td>
                                                <td class="text-left"><?php echo $feedback->message ?> <br> <br>
                                                <small class="text-muted pull-right"><?php echo date('M d, Y', strtotime($feedback->date)) ?></small>
                                                </td>
                                            </tr>
                                        </table>
                                        <hr style="color:#d0d0d0">
                                    <?php
                                        }
                                      }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-3">

                            <?php
                                  $r5 = 0; $r4 = 0; $r3 = 0; $r2 = 0; $r1 = 0;
                                  foreach ($xml_ratings->rating as $rating) {
                                    if ($rating->spot_id == $id) {
                                      $rating->rate == 5 ? $r5++ : '';
                                      $rating->rate == 4 ? $r4++ : '';
                                      $rating->rate == 3 ? $r3++ : '';
                                      $rating->rate == 4 ? $r2++ : '';
                                      $rating->rate == 1 ? $r1++ : '';
                                    }
                                  }
                              ?>
                            <h3>Rating</h3>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span> (<?php echo $r5 ?>) <br><br>

                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span> (<?php echo $r4 ?>) <br><br>

                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span> (<?php echo $r3 ?>) <br><br>

                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span> (<?php echo $r2 ?>) <br><br>

                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span> (<?php echo $r1 ?>) <br><br>
                            </div>
                        </div>
                <?php
                        }
                    }
                ?>
                <hr>
                <form action="" method="post">
                    <div class="form-group col-sm-2">
                        <label for="">Your Rate</label>
                        <select name="rate" class="form-control" required>
                            <option value="">--</option>
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label for="">Feedback</label>
                        <textarea name="message" required cols="30" rows="10" class="form-control"></textarea>
                    </div> <br>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" name="submit_feedback" type="submit">Submit</button>
                    </div>
                </form>

            </div>
            <div class="col-md-3">
                <h2>Explore Spots</h2>
                <hr>
                <?php
                    $xml_spots = simplexml_load_file('../xml/spots.xml');
                    foreach ($xml_spots->spot as $spot) {
                      if ($spot->id != $id) {
                        ?>
                    <div class="row">
                        <div class="col-lg-4">
                            <img style="width:100%" src="../images/<?php echo $spot->image ?>" alt="">
                        </div>
                        <div class="col-lg-8">
                            <h6><?php echo $spot->name ?> </h6>
                          <a class="btn btn-sm btn-primary" href="view-spot.php?id=<?php echo $spot->id?>">Explore &raquo;</a>
                        </div>
                    </div>
                    <hr>
                <?php
                    }
                  }
                ?>
            </div>
        </div>
    </div>
            

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="admin.php">Go to Admin</a></p>
    <p>&copy; Integrative Programming & Technology. </p>
  </footer>
</main>

    <script src="js/bootstrap.bundle.js"></script>
  </body>
</html>
