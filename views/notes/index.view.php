<?php
view('partials/head.php');
view('partials/nav.php');
require base_path('views/partials/banner.php');
?>
<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <ul>
        <?php foreach($notes as $note) : ?>
            <li>
                <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
                    <?= htmlspecialchars($note['body']) ?>
                </a>
            </li>
        <?php endforeach; ?>
        </ul>
        <div class="mt-10 flex gap-x-6">
          <a href="/note-create" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            New Note
          </a>
        </div>
    </div>
</main>
<?php view('partials/footer.php') ?>
