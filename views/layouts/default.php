<!DOCTYPE html>
<html lang="fr" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title><?=$title ?? 'mon site'?></title>
</head>
<body class="d-flex flex-column h-100">
    
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
<a href="" class="navbar-brand">Mon site</a>
</nav>
<div class="container mt-4">

<?= $content?>
<footer class="bg-light py-4 footer footer mt-auto">
    <div class="container"><?php if(defined(DEBUB_TIME)):?>
        page generee en <?=(microtime(true)-DEBUB_TIME) * 1000?>ms
        <?php endif?>
    </div>
</footer>
</div>
</body>
</html>