
<?php
require 'C:\Users\lenovo\Desktop\blog2\vendor\autoload.php';
require 'C:\Users\lenovo\Desktop\blog2\src\models\Post.php';
$title = "mon blog";
use App\Helpers\Text;
use App\Model\Post;
$pdo = new PDO('mysql:host=localhost;dbname=tutoblog','root','',
[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$page = $_GET['page'] ?? 1;
if(!filter_var($page,FILTER_VALIDATE_INT)){
    throw new Exception('numero de page n est pas valide');
}
if($page === '1'){
header('Location:' . $router->url('home'));
exit();
}
$current_page =(int)$page;
if($current_page <= 0){
    throw new Exception('numero de page invalide');
}
$count = (int)$pdo->query("SELECT COUNT(id) FROM post LIMIT 1")->fetch(PDO::FETCH_NUM)[0];
$perpage = 12;
$pages = ceil($count/$perpage);
if($current_page > $pages){
    throw new Exception('cette page n existe pas');
}
$offset = $perpage * ($current_page-1);
$query = $pdo->query("SELECT * FROM post ORDER BY created_at DESC LIMIT $perpage OFFSET $offset");
$posts = $query->fetchAll(PDO::FETCH_CLASS,Post::class);

?>
<h1>mon blog</h1>
<div class="row">
<?php foreach($posts as $post):?>
    <div class="col-md-3">
       <?php require 'card.php'?>
    </div>
    <?php endforeach?>
</div>

<div class="d-flex justify-content-between my-4">
    <?php if($current_page > 1):?>
        <?php $link = $router->url('home');
        if($current_page > 2) {
            $link .= '?page' . ($current_page -1);
        }
       ?>
        <a href="<?= $link ?>" class="btn btn-primary">page precedente</a>
    <?php endif ?>
    <?php if($current_page < $pages):?>
        <a href="<?= $router->url('home')?>?page=<?=$current_page + 1?>" class="btn btn-primary ml-auto">page suivante </a>
    <?php endif ?>
</div>