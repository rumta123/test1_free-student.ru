<?php

/**
* Распечатка массива
**/
function print_arr($array){
	echo "<pre>" . print_r($array, true) . "</pre>";
}

/**
* Получение массива категорий
**/
function get_cat(){
	global $connection;
	$sql = "SELECT * FROM categories";
	$res = mysqli_query($connection, $sql);
 $categories  =mysqli_fetch_all($res, 1);
 return $categories;
 
}

function get_posts(){
	global $connection;
	$sql = "SELECT * FROM posts";
	$res = mysqli_query($connection, $sql);
 $posts  =mysqli_fetch_all($res, 1);
 return $posts;
 
}

/**
* Построение дерева
**/
function map_tree($dataset) {
	$tree = array();

	foreach ($dataset as $id=>&$node) {    
		if (!$node['parent']){
			$tree[$id] = &$node;
		}else{ 
            $dataset[$node['parent']]['childs'][$id] = &$node;
		}
	}

	return $tree;
}

/**
* Дерево в строку HTML
**/
function categories_to_string($data){
	foreach($data as $item){
		$string .= categories_to_template($item);
	}
	return $string;
}

/**
* Шаблон вывода категорий
**/
function categories_to_template($category){
	ob_start();
	include 'category_template.php';
	return ob_get_clean();
}

/**
* Хлебные крошки
**/
function breadcrumbs($array, $id){
	if(!$id) return false;

	$count = count($array);
	$breadcrumbs_array = array();
	for($i = 0; $i < $count; $i++){
		if($array[$id]){
			$breadcrumbs_array[$array[$id]['id']] = $array[$id]['title'];
			$id = $array[$id]['parent'];
		}else break;
	}
	return array_reverse($breadcrumbs_array, true);
}

/**
* Получение ID дочерних категорий
**/
function cats_id($array, $id){
	if(!$id) return false;

	foreach($array as $item){
		if($item['id_collection'] == $id){
			$data .= $item['id'] . ",";
			$data .= cats_id($array, $item['id']);
		}
	}
	return $data;
}

/**
* Получение товаров
**/
/**
* Получение товаров
**/
function get_products($ids){
	global $connection;
	if($ids){
		$query = "SELECT * FROM products WHERE id_collection IN($ids) ORDER BY title";
	}else{
		$query = "SELECT * FROM products ORDER BY title";
	}
	$res = mysqli_query($connection, $query);
	$products = array();
	while($row = mysqli_fetch_assoc($res)){
		$products[] = $row;
	}
	return $products;
}



 function  get_posts_by_category($category_id){
      global $connection;
      $category_id = mysqli_real_escape_string($connection, $category_id);
   
      $sql = 'SELECT * FROM posts WHERE category_id ="'.$category_id.'"';  
     
    $res = mysqli_query($connection, $sql);  
    $posts = mysqli_fetch_all($res, MYSQLI_ASSOC);

    return $posts;
    
}


 function  get_posts_by_title($category_id){
      global $connection;
      $category_id = mysqli_real_escape_string($connection, $category_id);
   
      $sql = 'SELECT * FROM posts WHERE category_id ="'.$category_id.'"';  
     
    $res = mysqli_query($connection, $sql);  
    $posts = mysqli_fetch_all($res, MYSQLI_ASSOC);

    return $posts;
    
}


 function  get_category_title($id_collection){
     
      global $connection;
     // $category_id = mysqli_real_escape_string($connection, $category_id);
     // $sql = 'SELECT * FROM categories WHERE id  ="'.$category_id.'"';  
 
$sql = 'Select * from collections, products where products, id_collection= "'.$category_id.'"'.$id_collection.'"';
      $res = mysqli_query($connection, $sql);  
   

    $collection = mysqli_fetch_all($res, MYSQLI_ASSOC);
    return $collection;
    VAR_DUMP($collection);
     
   
}
 
  //function  get_test($collections_id){
//      global $connection;
//      $category_id =mysqli_real_escape_string($connection, $category_id);
//      $sql = "SELECT * FROM collections, products WHERE products, id_collection=".collections_id.'"';
//
//    $res = mysqli_query($connection, $sql);
//     $category  =mysqli_fetch_all($res, 1);
//    return $category['title'];
//} 

  
     
      
  
  