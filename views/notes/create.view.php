<?php

view('partials/head.php');

view('nav.php');

view('partials/banner.php', ['heading' => $heading]);

?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <form method="POST">
            <div>
                <label for="body">Slug</label> <br />
                <input type="text" name="slug" id="slug" value="<?= $_POST['slug'] ?? '' ?>">
                <? if (isset($errors['slug'])) : ?>
                    <p class="text-red-400 text-sm"><?= $errors['slug'] ?></p>
                <? endif; ?>
            </div>
            <br>
            <div>
                <label for="body">body</label> <br />
                <textarea class="px-2" name="body" id="body" cols="30" rows="5" require placeholder="Enter note body">
                <?= $_POST['body'] ?? '' ?>
                </textarea>
                <? if (isset($errors['body'])) : ?>
                    <p class="text-red-400 text-sm"><?= $errors['body'] ?></p>
                <? endif; ?>
            </div>
            <div class="mt-3">
                <input type="submit" value="Save" class="px-3 py-2 bg-blue-500 text-white">
            </div>
        </form>
    </div>
</main>
<?php view('partials/footer.php') ?>