<?php
require 'C:\Users\lenovo\Desktop\blog2\vendor\autoload.php';
$pdo = new PDO('mysql:host=localhost;dbname=tutoblog','root','',
[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$pdo->exec('SET FOREIGN_KEY_CHECKS = 0');
$pdo->exec('TRUNCATE TABLE post_category');
$pdo->exec('TRUNCATE TABLE post');
$pdo->exec('TRUNCATE TABLE category');
$pdo->exec('TRUNCATE TABLE user');
$pdo->exec('SET FOREIGN_KEY_CHECKS = 1');
$posts = [];
$categories = [];
$faker = Faker\Factory::create();
for($i = 0;$i <50 ; $i++){
   $pdo->exec("INSERT INTO post SET name ='{$faker->text()}', slug='{$faker->name()}', created_at='2019-05-01 14:00:00',content='{$faker->text()}'"); 
  $posts[] =  $pdo->lastInsertId();
}
for($i = 0;$i <50 ; $i++){
   $pdo->exec("INSERT INTO category SET name ='{$faker->text()}', slug='{$faker->name()}'"); 
   $categories [] = $pdo->lastInsertId();
}
foreach($posts as $post){
   $randomcategories = $faker->randomElements($categories,rand(0,count($categories)));
   foreach($randomcategories as $category){
      $pdo->exec("INSERT INTO post_category SET post_id = $post,category_id=$category");   
   }
}
$password = password_hash('admin',PASSWORD_BCRYPT);
$pdo->exec("INSERT INTO user SET username='admin' , password='$password'");
?>