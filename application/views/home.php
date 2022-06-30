<ul class="collection">
    <?php foreach($home_post as $data) : ?>
    <li class="collection-item avatar">
        <img src="<?=site_url("upload/post/". $data["filename"]) ?>" class="circle">
        <p class="title"><?= $data["name"] ?></p>
        <small><?= $data["description"] ?></small>
        <a href="<?=site_url("welcome/index/". $data["id"]) ?>" class="secondary-content">
            <i class="material-icons">visibility</i>
        </a>
    </li>
    <?php endforeach ?>
</ul>

<button class"btn red" style="margin-bottom : 10px">
        <a href="<?=site_url('welcome/deleteAll') ?>" class="blue-text">DELETE All</a>
</button>