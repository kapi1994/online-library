<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <?php
        if (!isset($_SESSION['user']) || isset($_SESSION['user']) && $_SESSION['user']->role_id == 1) :
        ?>
            <a class="navbar-brand" href="index.php">Navbar</a>
        <?php elseif (isset($_SESSION['user']) && $_SESSION['user']->role_id == 2) : ?>
            <a class="navbar-brand" href="admin.php">Navbar</a>
        <?php endif; ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-uppercase">

                <?php
                if (!isset($_SESSION['user']) || (isset($_SESSION['user']) && $_SESSION['user']->role_id == 1)) : ?>
                    <?php
                    $userMenu = userMenu();
                    foreach ($userMenu as $menu) :
                        $link = $menu->name ?>
                        <li class="nav-item"><a href="<?= $menu->route ?>" class="nav-link 
                        <?php if (isset($_GET['page']) && $_GET['page'] == $link) : ?>
                            active fw-bold border-bottom <?php endif ?>
                    "><?= $menu->name ?></a></li>
                <?php endforeach;
                endif; ?>
                <?php if (isset($_SESSION['user']) && $_SESSION['user']->role_id == 2) :
                    $adminMenu = adminMenu();
                    foreach ($adminMenu as $admin) :
                        $link = $admin->name;
                ?>
                        <li class="nav-item"><a href="<?= $admin->route ?>" class="nav-link
                    <?php
                        if (isset($_GET['page']) && $_GET['page'] == $link) : ?>
                        fw-bold active border-bottom
                    <?php endif; ?>
                "><?= $admin->name ?></a></li>

                <?php endforeach;
                endif; ?>

                <!-- kraj dela za admina -->
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-uppercase">
                <?php if (!isset($_SESSION['user'])) : ?>
                    <li class="nav-item"><a href="index.php?page=login" class="nav-link <?php if (isset($_GET['page']) && $_GET['page'] == 'login') : ?> fw-bold active border-bottom <?php endif; ?>">Log in</a></li>
                    <li class="nav-item"><a href="index.php?page=register" class="nav-link
                    <?php if (isset($_GET['page']) && $_GET['page'] == 'register') : ?>
                        fw-bold active border-bottom    
                    <?php endif; ?>
                ">Registration</a></li>
                <?php else : ?>
                    <?php if (isset($_SESSION['user']) && $_SESSION['user']->role_id == 1) : ?>
                        <li class="nav-item"><a href="index.php?page=orders" class="nav-link 
                        <?php if (isset($_GET['page']) && $_GET['page'] == "orders") : ?> fw-bold active border-bottom<?php endif; ?>">Orders</a></li>
                        <li class="nav-item"><a href="index.php?page=wishlist" class="nav-link
                                    <?php if (isset($_GET['page']) && $_GET['page'] == "wishlist") : ?> fw-bold active border-bottom<?php endif; ?>
                                ">Wishlist</a></li>
                        <li class="nav-item"><a href="index.php?page=cart" class="nav-link
                                        <?php if (isset($_GET['page']) && $_GET['page'] == "cart") : ?>
                                            fw-bold active border-bottom <?php endif; ?>
                                ">Cart</a></li>
                    <?php endif; ?>
                    <li class="nav-item"><a href="models/loginAndRegistration/logout.php" class="nav-link">Logout</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>