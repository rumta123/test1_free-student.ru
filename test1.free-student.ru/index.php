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
  
  <?php $categories = get_cat();?>
  <?php $posts =get_posts_by_category($category_id);?>
   <?php $products = get_products($ids = false)?>
  
  
     
<pre>
    <?php VAR_DUMP (get_category_title($id_collection))?>
</pre>

      <?php 
    $category_id =$GET['id'];

  ?>
  <?php foreach ($categories as $category): ?>
  <div class='main_div1'><?=$category["title"]?>
<?php foreach ($products as $product): ?>
  


<div class='two_div'>
    <div>
     <?=$product["title"]?>
     </div>
     <div>
      <?=$product["price"]?>
      </div>
     </div>
   <?php endforeach; ?>
   </div>
 <?php endforeach; ?>







</body>