<?php include 'include/database.php'; ?>
<?php include 'functions.php'; ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Каталог</title>
	<link rel="stylesheet" href="style.css">
</head>


 <style>
      .main_div1{
         display: grid; grid-template-columns: 1fr 1fr 1fr;  grid-gap:20px;
      }
      .two_div{
         display:grid; width: 200px; height: 200px; border: 2px solid red; justify-content: center;  grid-gap:20"
      }
   </style>
  <body style ="display:grid; grid-gap: 20px; justify-content: center;"> 
  
  <pre>
    <?php VAR_DUMP (get_category_title($GET['id']))?>
</pre>

      <?php 
    $category_id =$GET['id'];

  ?>
   <?php 
   
    $category_id =$GET['id'];
    $posts =get_posts_by_category($category_id);
  ?>
  <h1><?php get_category_title() ?></h1>
 
