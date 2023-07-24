<?php
view('partials/head.php');
view('partials/nav.php');
require base_path('views/partials/banner.php');
?>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <p>Hello, <span class="text-red-800/80"> <?= $_SESSION['user']['email'] ?? 'Guest' ?> </span>.<br/> Welcome to the home page</p>
        </div>
    </main>
<?php view('partials/footer.php') ?>
