<?php
include 'config.php';
include 'functions.php';
$categories = get_cat();


if(isset($_GET['category'])){
	$id = (int)$_GET['category'];
	// хлебные крошки
	// return true (array not empty) || return false
	$breadcrumbs_array = breadcrumbs($categories, $id);
	
	if($breadcrumbs_array){
		$breadcrumbs = "<a href='/catalog/'>Главная</a> / ";
		foreach($breadcrumbs_array as $id => $title){
			$breadcrumbs .= "<a href='?category={$id}'>{$title}</a> / ";
		}
		$breadcrumbs = rtrim($breadcrumbs, " / ");
		$breadcrumbs = preg_replace("#(.+)?<a.+>(.+)</a>$#", "$1$2", $breadcrumbs);
	}else{
		$breadcrumbs = "<a href='/catalog/'>Главная</a> / Каталог";
	}

	// ID дочерних категорий
	$ids = cats_id($categories, $id);
	$ids = !$ids ? $id : rtrim($ids, ",");

	if($ids) $products = get_products($ids);
		else $products = null;
}else{
	$products = get_products();
}