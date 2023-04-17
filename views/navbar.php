<nav class="navbar navbar-expand navbar-right bg-right" style="margin-bottom:80px">
    <div class="container d-flex justify-content-between">
        <a href="" class="navbar-brand">
            <h1><i class="fa-solid fa-house"></i></h1>
        </a>
        <h3 class="text-center fw-bold text-secondary">Welcome, <?= $_SESSION['username'] ?></h3>
        <div class="navbar-nav d-flex">
            <form action="../actions/logout.php" method="post" class="d-flex ms-2">
                <button type="submit" class="btn text-danger bg-transparent border-0"><i class="fa-solid fa-user-xmark fa-2x"></i></button>
            </form>
        </div>
    </div>
</nav>
