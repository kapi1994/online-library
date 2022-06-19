<main class="container">
    <div class="row mt-5">
        <div class="col-lg-4 mx-auto">
            <h1 class="text-center mb-3">Ulogujte se</h1>
            <hr>
            <form action="#">
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
                    <button class="btn btn-primary" id="btnLogin" type="button">Uloguj se</button>
                    <a class="btn btn-secondary" href='index.php?page=register'>Nemate nalog? Registruj se</a>
                </div>
            </form>
        </div>
    </div>
</main>