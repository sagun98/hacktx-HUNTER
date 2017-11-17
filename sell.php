<?php

if (isset($_POST['food_name'])){
    if (isset($_POST['description'])){
        if (isset($_POST['price'])){
            if(isset($_POST['location'])){
                if (isset($_POST['quantity'])){
                    if (isset($_POST['category'])){
                        if (isset($_POST['spicy'])){
                            if (isset($_POST['type'])){
                            
                           
    $file=$_FILES['upload1']['name'];
    $food_name= strtolower(trim($_POST['food_name']));
    $description= strtolower(trim($_POST['description']));
    $location= strtolower(trim($_POST['location']));
    $category= $_POST['category'];
    $string_words=""; 
     foreach($category as $words) {
        $words_category.=$words." ";
    }
    $spicy= strtolower(trim($_POST['spicy']));
    $type= strtolower(trim($_POST['type']));
    $price= strtolower(trim($_POST['price']));
    $quantity= strtolower(trim($_POST['quantity']));
    
    // print "file".$file."<br>";
    // print "food name".$food_name."<br>";
    // print "description".$description."<br>";
    // print "location".$location."<br>";
    //print "category".$words_category."<br>";
    // print "spicy".$spicy."<br>";
    // print "type".$type."<br>";
    // print "price".$price."<br>";
    // print "quantity".$quantity."<br>";
    
    // print "file".gettype($file)."<br>";
    // print "food name".gettype($food_name)."<br>";
    // print "description".gettype($description)."<br>";
    // print "location".gettype($location)."<br>";
    // print "category".gettype($category)."<br>";
    // print "spicy".gettype($spicy)."<br>";
    // print "type".gettype($type)."<br>";
    // print "price".gettype($price)."<br>";
    // print "quantity".gettype($quantity)."<br>";
    
    $uploaddir = 'upload/';
    define ('SITE_ROOT', realpath(dirname(__FILE__)));
    $uploadfile = SITE_ROOT.'/upload/'. basename($_FILES['upload1']['name']);
    $uploadfile=str_replace(' ','|',$uploadfile);
    $upload1 = $uploadfile;
    
    		if (move_uploaded_file($_FILES['upload1']['tmp_name'], $uploadfile)) {
    		    echo "";
    		} 
    		
    		
    function insert_sell($phone,$file,$food_name,$description,$location,$words_category,$spicy,$type,$price,$quantity,$time){
        session_start();
        date_default_timezone_set("America/Belize"); 
        $time=time();
        $phone=$_SESSION['phone'];
        include ('connection.php');
        
        $in= $db1->prepare("INSERT INTO sell(phone,file,name,description,location,category,spicy,type,price,quantity,timestamp) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        $in->bind_param ('ssssssssssi', $phone,$file,$food_name,$description,$location,$words_category,$spicy,$type,$price,$quantity,$time);
    		if($in->execute())
    		{
    		    print "Successfully posted your food.";
    	    }
    }
    	
    
    insert_sell($phone,$file,$food_name,$description,$location,$words_category,$spicy,$type,$price,$quantity,$time);
                            }
                        }
                    }
                }
            }
        }
    }
}
?>

<html>
    <head>
     
       
      <!-- Materialize css CDN-->    
      <meta name = "viewport" content = "width = device-width, initial-scale = 1">      
      <link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
      <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
      <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
      </script> 
      <!-- Materialize css CDN ends-->
    
    <!-- Material Design sources-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <!--ends-->
    
     <link rel="stylesheet" href="css/sell.css">
    
        <title>Sell Food</title>
    </head>
    <body>
<!-- Simple header with fixed tabs. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-tabs">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">HUNTER</span>
    </div>
    <!-- Tabs -->
    <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
      <a href="/dashboard.php" class="mdl-layout__tab ">Pick Up</a>
      <a href="/sell.php" class="mdl-layout__tab is-active">Sell</a>
     
    </div>
  </header>
 
  <main class="mdl-layout__content">

    <section class="mdl-layout__tab-panel is-active" id="fixed-tab-2">
        <div class="page-content">
        <!-- Your content goes here -->
               
    <div class="form-container">
          <br>
          <form action="" method="POST" enctype="multipart/form-data">
            
            <br>
            <br>
            
            <label for="Food Picture"> Food Picture</label>  
             <div class="file-field input-field">
          <div class="btn">
            <span>Image</span>
            <input type="file">
          </div>
         
          <div class="file-path-wrapper">
              <input class="file-path validate" type ="file" name="upload1"/>
          </div>
            </div>
            
            
         <br><br><br><br>
            
            <div class="input-field col s6">
                <input id="food_name" name="food_name" type="text" class="validate">
                <label for="food_name">Name of the food</label>
            </div>
            
        
            
             <div class="input-field col s12">
              <textarea name = "description" id= "description" class="materialize-textarea"></textarea>
              <label for="description">Description</label>
            </div>
            
            <div class="input-field col s6">
              <input name="price" id="price" type="number" class="validate" placeholder="$">
              <label for="price">Price of the food</label>
            </div>
        
        
            <div class="input-field col s6">
                <input id="location" name="location" type="text" class="validate">
                <label for="Location">Location</label>
            </div>
            
                        
            <br>
            <br>
            
            			 
			<label for="quantity">Quantity (Number of orders that you can serve )</label>
			<input placeholder="eg. 1,2" type="number" name="quantity" class="validate"/>  
			 
			 <br>
			 <br>
     
            <label for="Category"> Category </label>
             <p>
             <input type="checkbox" name="category[]" id="nepali"  value="nepali"/> 
               <label for="nepali"> Nepali Cuisine</label>
             </p>
             
             <p>
             <input type="checkbox" name="category[]"  id="indian" value="indian"/> 
               <label for="indian"> Indian Cuisine  </label>
            </p>
            
            <p>
             <input type="checkbox" name="category[]"  id="mexican" value="mexican"> 
               <label for="mexican"> Mexican Cuisine</label>
            </p>
            
            <p>
             <input type="checkbox" name="category[]" id="american" value="american"> 
               <label for="american"> American Cuisine</label>
            </p>
            
            <p>
             <input type="checkbox" name="category[]" id="none" value="none"> 
               <label for="none"> Own recipe </label>
            </p>
			 
			 <br>
			 <br>
			 
			<label for="Spicy"> Spicy </label>
			 <br>
			 <input class="with-gap" name="spicy" type="radio" id="1" value="1" />
             <label for="1">1</label>
             <input class="with-gap" name="spicy" type="radio" id="2" value="2" />
             <label for="2">2</label>
             <input class="with-gap" name="spicy" type="radio" id="3" value="3" />
             <label for="3">3</label>
             <input class="with-gap" name="spicy" type="radio" id="4" value="4" />
             <label for="4">4</label>
             <input class="with-gap" name="spicy" type="radio" id="5" value="5" />
             <label for="5">5</label>
          
            <br>
            <br>
            <br>
            <br>
            
 
            <label for="type"> Meal Type </label>
			 <br>
			 <input class="with-gap" name="type" type="radio" id="non-vegetarian" value="non-vegetarian" />
             <label for="non-vegetarian">Non-vegetarian</label>
			 <input class="with-gap" name="type" type="radio" id="vegetarian" value="vegetarian" />
             <label for="vegetarian">Vegetarian</label>
           
        	 
			 <br>
			 <br>
             <br>
			 <br>

              <button class="btn waves-effect waves-light" type="submit" value="submit">Sell your food
                <i class="material-icons right">send</i>
              </button>
            
        </form>  
        </div>
    </section>
  </main>
  </div>
</div>

    
        
    </body>
    
</html>
