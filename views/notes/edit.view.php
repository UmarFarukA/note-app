<?php

view('partials/head.php');

view('nav.php');

view('partials/banner.php', ['heading' => $heading]);

?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <form accept="" method="POST">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" id="id" value="<?= $node['id'] ?>">
            <div>
                <label for="body">Slug</label> <br />
                <input type="text" name="slug" id="slug" value="<?= $note['slug'] ?>">
                <? if (isset($errors['slug'])) : ?>
                    <p class="text-red-400 text-sm"><?= $errors['slug'] ?></p>
                <? endif; ?>
            </div>
            <br>
            <div>
                <label for="body">body</label> <br />
                <textarea class="px-2" name="body" id="body" cols="30" rows="5" require placeholder="Enter note body">
                <?= $note['body'] ?>
                </textarea>
                <? if (isset($errors['body'])) : ?>
                    <p class="text-red-400 text-sm"><?= $errors['body'] ?></p>
                <? endif; ?>
            </div>
            <div class="mt-3">
                <a href="/notes" class="px-3 py-2 bg-gray-500 text-white">Cancel</a>
                <button type="submit" class="px-3 py-2 bg-blue-500 text-white">Update</button>
            </div>
        </form>
    </div>
</main>
<?php view('partials/footer.php') ?>