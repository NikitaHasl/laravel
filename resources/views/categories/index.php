<?php foreach ($categoryList as $key => $item) : ?>
    <div>
        <p><a href="<?= route('categories.show', ['id' => $key]) ?>"><?= $item ?></a></p>
    </div>
<?php endforeach ?>