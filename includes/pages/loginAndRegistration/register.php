<?php
if (isset($_SESSION['user'])) {
    header("Location:index.php?page=errors&code=403");
} ?>
<main class="container">
    <div class="row mt-5">
        <div class="col-lg-4 mx-auto">

            <div id="registerResponseMessage"></div>
            <form action="#">
                <div class="mb-3">
                    <label for="firstName" class="mb-1">First name</label>
                    <input type="text" name="firstName" id="firstName" class="form-control">
                    <em id="firstNameError"></em>
                </div>
                <div class="mb-3">
                    <label for="lastName" class="mb-1">Last name</label>
                    <input type="text" name="lastName" id="lastName" class="form-control">
                    <em id="lastNameError"></em>
                </div>
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
                <div class="d-grid gap-3">
                    <button class="btn btn-primary" id="btnRegister" type="button">Registration</button>
                </div>
            </form>
            <div class="d-flex mt-2 justify-content-center">
                <span class="me-2">Allready have an account?</span><a href="index.php?page=login" class="text-decoration-none">Log in</a>
            </div>
        </div>
    </div>
</main>