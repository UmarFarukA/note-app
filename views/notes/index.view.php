<?php

view('partials/head.php');

view('nav.php');

view('partials/banner.php', ['heading' => $heading]);

?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <?php foreach ($notes as $note) : ?>
            <div class="p-2 text-gray-700 text-lg hover:underline">
                <a href="/note?id=<?= $note['id'] ?>">
                    <?= $note['slug'] ?>
                </a>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="mt-6 ml-4">
        <a href="/note-create" class="p-2 bg-blue-400 text-white text-xl">Create Note</a>
    </div>
</main>
<?php view('partials/footer.php') ?>