<?php
include ('connection.php');
session_start();
$search_value=trim(strtolower($_SESSION['search_value']));

$main_array=array();

$food_name=$_SESSION['food_name'];
$food_description=$_SESSION['food_description'];
$food_category=$_SESSION['food_category'];
$food_location=$_SESSION['food_location'];

if (in_array($search_value,$_SESSION['myArr'])){

	if (in_array($search_value, $food_name)) {
      $sq = "SELECT id FROM sell WHERE name=?";
			$st= $db->prepare($sq);
			$st-> bind_param('s',$search_value);
			$st-> execute();
			$st-> bind_result($id);
		  while($st->fetch()) {
		    $main_array[]=$id;
			}
	}
	
	if (in_array($search_value, $food_description)) {
			$sq1 = "SELECT id FROM sell WHERE description=?";
			$st1= $db->prepare($sq1);
			$st1-> bind_param('s',$search_value);
			$st1-> execute();
			$st1-> bind_result($id);
		  while($st1->fetch()) {
		    $main_array[]=$id;
			}
	}
	
	if (in_array($search_value, $food_category)) {
			$sq2 = "SELECT id FROM sell WHERE category=?";
			$st2= $db->prepare($sq2);
			$st2-> bind_param('s',$search_value);
			$st2-> execute();
			$st2-> bind_result($id);
		  while($st2->fetch()) {
		    $main_array[]=$id;
			}
			
	}
	
	if (in_array($search_value, $food_location)) {

	}
}

else {
	//=explode();
} 

print_r($main_array);

/**
if (!empty($_SESSION['name'])){
	$d = split(" ", $_SESSION['name']);
//	echo $d[0];
  if(array_key_exists(1, $d))
  	$sql = ("SELECT id,first_name,last_name,degree,department,address,phone,email,rating,points FROM ulm_teachers WHERE ( `last_name` LIKE '%".$d[0]."%' and `first_name` LIKE '%".$d[1]."%') OR (`last_name` LIKE '%".$d[1]."%' and `first_name` LIKE '%".$d[0]."%')");
  else
  	$sql = ("SELECT id,first_name,last_name,degree,department,address,phone,email,rating,points FROM ulm_teachers WHERE `last_name` LIKE '%".$d[0]."%' or `first_name` LIKE '%".$d[0]."%' ");
  $stmt=$conn->prepare($sql);
	$stmt->execute();
	$stmt->bind_result($id,$first_name, $last_name,$degree,$department,$address,$phone,$email,$rating,$points);
	$count=1;
	while($stmt->fetch()) {
		$_SESSION['login']=true;
		$_SESSION['staff']=true;
		
   		?> <div style="margin-left: 20px"> <?echo "<h4>"."<br/>".$count.". ".'<a href="view.php?email='.$email.'">' .$first_name ." ".$last_name." -- "."(View details)".'</a>'."</h4>"; ?> </div>
  
	        	<div style="margin-left: 20px;"><?echo "->  Degree: ".$degree;?> </div>
	     
	        	<div style="margin-left: 20px;"><?echo "->  Department: ".$department;?> </div>
	 **/      
?>
