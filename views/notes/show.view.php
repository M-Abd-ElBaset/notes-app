<?php
view('partials/head.php');
view('partials/nav.php');
require base_path('views/partials/banner.php');
?>
<main>
    <p class="m-6">
        <a href="/notes" class="text-blue-500 underline">Go back ...</a>
    </p>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 flex flex-row justify-center space-x-5">
        <p class="text-2xl">
            <?= htmlspecialchars($note['body']) ?>
        </p>

        <a href="/note/edit?id=<?= $note['id'] ?>" class="rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 text-center">
            Edit
        </a>
        <form method="POST">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <input type="hidden" name="_method" value="DELETE">
            <button class="rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 text-center">Delete</button>
        </form>
    </div>
</main>
<?php view('partials/footer.php') ?>
