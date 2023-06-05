<?php

view('partials/head.php');

view('nav.php');

$heading = $note['slug'];

view('partials/banner.php', ['heading' => $heading]);

?>


<main>

    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

        <h3> <?= $note['slug'] ?></h3>

        <p><?= $note['body'] ?></p>


        <form action="" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <button class="p-4 bg-red-500 text-white-200">Delete</button>
        </form>

        <a href="/note/edit?id=<?= $note['id'] ?>" class="p-4 bg-gray-500 text-black-200">Edit</a>
    </div>



</main>

<?php view('partials/footer.php') ?>