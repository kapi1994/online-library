<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a href="admin.php?page=autori" class="nav-link
                    <?php
                    if (isset($_GET['page']) && $_GET['page'] == 'autori') : ?>
                        fw-bold active border-bottom
                    <?php endif; ?>
                ">Autori</a></li>
                <li class="nav-item"><a href="admin.php?page=izdavaci" class="nav-link
                    <?php if (isset($_GET['page']) && $_GET['page'] == 'izdavaci') : ?>
                        fw-bold active border-bottom
                    <?php endif; ?>
                ">Izdavaci</a></li>
                <li class="nav-item"><a href="admin.php?page=knjige" class="nav-link">Knjige</a></li>
                <li class="nav-item"><a href="admin.php?page=izdanja" class="nav-link">Izdanja</a></li>
                <li class="nav-item"><a href="admin.php?page=blibliotekari" class="nav-link
                    <?php if (isset($_GET['page']) && $_GET['page'] == 'bibliotekari') : ?>
                        fw-bold active border-bottom 
                    <?php endif; ?>
                ">Bibliotekari</a></li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php if (!isset($_SESSION['user'])) : ?>
                    <li class="nav-item"><a href="index.php?page=login" class="nav-link <?php if (isset($_GET['page']) && $_GET['page'] == 'login') : ?> fw-bold active border-bottom <?php endif; ?>">Prijavi se</a></li>
                    <li class="nav-item"><a href="index.php?page=register" class="nav-link
                    <?php if (isset($_GET['page']) && $_GET['page'] == 'register') : ?>
                        fw-bold active border-bottom    
                    <?php endif; ?>
                ">Registracija</a></li>
                <?php else : ?>
                    <li class="nav-item"><a href="models/loginAndRegistration/logout.php" class="nav-link">Logout</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>