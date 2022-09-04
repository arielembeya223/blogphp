<div class="card">
            <div class="card-body"><h5 class="card-title"><?=htmlentities($post->getName())?></h5>
                <p class="text-muted"><?= $post->getCreatedAt()->format('d/m/Y') ?></p>
                <p><?=$post->getExcerpt()?></p>
                <p>
                    <a href="<?= $router->url('post',['id' => $post->getID, 'slug' => $post->getSlug()])?>" class="btn btn-primary">voir plus</a>
                </p>
            </div>
        </div>