<?php
if (isset($_SESSION['user'])) {
    header("Location:index.php?page=errors&code=403");
}
?>
<main class="container">
    <div class="row mt-5">
        <div class="col-lg-4 mx-auto">
            <?php
            if (isset($_SESSION['activateAcc'])) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Your account is reactivated!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                unset($_SESSION['activateAcc']);
            endif;

            ?>
            <div id="loginResponseMessage"></div>

            <form action="#" method='post'>
                <div class="mb-3">
                    <label for="email" class="mb-1">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                    <em id="emailError"></em>
                </div>
                <div class="mb-3">
                    <label for="password" class="mb-1">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                    <em id="passwordError"></em>
                </div>
                <div class="d-grid gap-2">
                    <!-- <input type="submit" value="Login" class="btn btn-primary" id="btnLogin" name='btnLogin'> -->
                    <button class="btn btn-primary" id="btnLogin" type="button">Log in</button>
                </div>
            </form>
            <div class="d-flex mt-2 justify-content-center">
                <span class="me-2">Dont have an account?</span><a href="index.php?page=register" class="text-decoration-none">Register</a>
            </div>
        </div>
    </div>
</main>