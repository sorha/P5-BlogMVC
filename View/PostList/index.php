<?php $this->title = "Mon Blog"; ?>

<?php foreach ($posts as $post):
    ?>
    <article>
        <header>
            <a href="<?= "post/index/" . $this->sanitize($post['id']) ?>">
                <h1 class="titreBillet"><?= $this->sanitize($post['title']) ?></h1>
            </a>
            <time><?= $this->sanitize($post['dateCreation']) ?></time>
        </header>
        <p><?= $this->sanitize($post['content'])  ?></p>
    </article>
    <hr />
<?php endforeach; ?>