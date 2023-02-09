<header>
    <div class="container d-flex justify-content-between align-items-center">
        <a href="/" class="h-logo">Logo App</a>

        <?php if($_SESSION['login']) : ?>
            <h5>Hello <?= $_SESSION['login']['username']; ?></h5>
        <?php endif; ?>

        <nav>
            <a href="/" class="me-2">Home</a>
            <?php if($_SESSION['login']) : ?>
                <a href="/add-comment" class="me-2">Add comment</a>
                <a href="?p=logout">Logout</a>
            <?php else : ?>
                <a href="/login">Login</a>
            <?php endif; ?>
        </nav>
    </div>
</header>