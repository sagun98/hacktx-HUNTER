<!DOCTYPE html>
<html>

<head>
  <title>Dashboard</title>

  <!-- Materialize css CDN-->
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

  </script>
  <!-- Materialize css CDN ends-->
  <!-- Material Design sources-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!--ends-->

  <link rel="stylesheet" href="css/cards.css">
</head>



<body>
  <script src="js/model.js"></script>
  <nav class="nav-extended">
    <div class="nav-wrapper">
      <a href="/dashboard.php" class="brand-logo">HUNTER</a>
      <ul class="right">
          <?php include('search.php')?>
      </ul>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
    <div class="nav-content">
      <div class="row">
          <div class="col s12">
              <ul class="tabs tabs-transparent tabs-fixed-width">
        <li class="tab col s6"><a href="/dashboard.php" class="center">Pick Up</a></li>
        <li class="tab col s6"><a href="/sell.php" class="center">Sell</a></li>
      </ul>
          </div>
      </div>
    </div>
  </nav>
  <!-- Simple header with fixed tabs. -->
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-tabs">
    <header class="mdl-layout__header">
      <div class="mdl-layout__header-row nav-wrapper">
        <!-- Title -->
        <span class="mdl-layout-title">HUNTER</span>
        <ul class="right">
          <?php include('search.php')?>
        </ul>
      </div>
      <!-- Tabs -->
      <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
        <a href="/dashboard.php" class="mdl-layout__tab is-active">Pick Up</a>
        <a href="/sell.php" class="mdl-layout__tab">Sell</a>
      </div>
    </header>


    <main class="mdl-layout__content">
      <section class="mdl-layout__tab-panel is-active" id="fixed-tab-1">
        <div class="page-content">

          <?php 
          date_default_timezone_set("America/Belize");
          //Sql to fetch all the posted food. 
   include ('connection.php');
      $sq = "SELECT phone,file,name,description,location,category,spicy,type,price,quantity,timestamp FROM sell ORDER BY timestamp DESC" ; 
			$st= $db3->prepare($sq);
			$st-> execute();
			$st-> bind_result($phone,$file,$name,$description,$location,$category,$spicy,$type,$price,$quantity,$timestamp);
  while($st->fetch()) {
    $name = ucwords(strtolower($name));
    $description = ucwords(strtolower($description));
    $category = ucwords(strtolower($category));
    $type = ucwords(strtolower($type));
              
?>

          <!--Card Container -->
          <br>
          <div>
            <div class="row card-container">
              <div class="col s12 m6">
                <div class="card blue-grey lighten-4">
                  <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="upload/<?php print $file?>">
                  </div>



                  <div class="card-content activator">
                    <p>
                      <?php print $name." - ".$description?>
                    </p>
                    <br>

                    <div class="circle-container">
                      <div class="circle-left">
                        <a class="btn-floating halfway-fab waves-effect waves-light #3949ab indigo darken-1">
                          <div style="color:white;margin-left:10px;">
                            <?php print $quantity?>
                          </div>
                        </a>
                        <span style="font-size:10px; margin-right:10px;">Orders Left </span>
                      </div>


                      <div class="circle-right">
                        <a class="btn-floating halfway-fab waves-effect waves-light #3949ab indigo darken-1">
                          <div style="color:white;margin-left:10px;">$
                            <?php print $price?>
                          </div>
                        </a>
                        <span style="font-size:10px; margin-right:10px;">Price</span>
                      </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <span style="font-size:10px; margin-right:10px;">Click on the image to see more details</span>
                  </div>

                  <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">
                      <?php print $name;?>
                      <br>
                      <br>
                      <i class="material-icons right">close</i>
                    </span>

                    <?php
                    print $description;
                    print "<br><br>";
                     
                    print "Seller's Phone: ". $phone;
                    print "<br>";
                    print "Pick up location: ".$location;
                     
                    print "<br><br>";
                    
                     
                    print "Category: ".$category;
                    print "<br>";
                    print "Type: ".$type;
                    print "<br>";
                    print "Spicy: ".$spicy;
                    print "<br>";
                    print "Price: $".$price;
                    print "<br><br><br>";
                    print "Posted Date: ";
                    print date('jS  F Y',$timestamp);
                    print "<br>";
                    print "Posted Time: ";
                    print date('h:i:s A',$timestamp);
                ?>
                      <br>

                  </div>

                  <div class="card-action">
                    <?php //include('test.php');?>
                    <button class="btn waves-effect waves-light blue-grey">Confirm Pickup</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <hr>
          <!--Card Container ends -->
          <?php 
   }
?>

        </div>
      </section>


    </main>
  </div>


  <input type="text" name="search" placeholder="Search" />
  <input type="submit" value="search" name="search" />

  <br>
  <br>



</body>

</html>