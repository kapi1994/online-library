<main class="container">
    <div class="row mt-5">
        <div class="col-lg-6 mx-auto">
            <div id="contactResponseMessage"></div>
            <h1 class="text-center">Contact us</h1>
            <form action="#">
                <div class="mb-3">
                    <label for="first_name">First name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control">
                    <em id="first_name_contact_error"></em>
                </div>
                <div class="mb-3">
                    <label for="last_name">Last name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control">
                    <em id="last_name_contact_error"></em>
                </div>
                <div class="mb-3">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control">
                    <em id="email_contact_error"></em>
                </div>
                <div class="mb-3">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="5" class="form-control"></textarea>
                    <em id="message_contact_error"></em>
                </div>
                <div class="me-auto">
                    <button class="btn btn-primary" id="btnContactUs" type="button">Contact us</button>
                </div>
            </form>
        </div>
    </div>
</main>