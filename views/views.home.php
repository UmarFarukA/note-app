<?php view('partials/head.php') ?>

<?php view('nav.php') ?>

<?php $heading = "Home" ?>

<?php view('partials/banner.php', ['heading' => $heading]) ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <h3>Welcome <?= $_SESSION['user']['Name']; ?></h3>
    </div>
</main>
<?php view('partials/footer.php') ?>