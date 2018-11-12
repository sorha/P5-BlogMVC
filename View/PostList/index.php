<?php $this->title = "Mon Blog"; ?>

<?php foreach ($posts as $post):
    ?>
    <article>
        <header>
            <a href="<?= "post/index/" . $post['id'] ?>">
                <h1 class="titreBillet"><?= $post['title'] ?></h1>
            </a>
            <time><?= $post['dateCreation'] ?></time>
        </header>
        <p><?= $post['content']  ?></p>
    </article>
    <hr />
<?php endforeach; ?>