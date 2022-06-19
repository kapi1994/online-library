<main class="container">
    <div class="row mt-5">
        <div class="col-lg-8">
            <div class="table-responsive-sm table-responsive-md">
                <table class="table text-center align-middle">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Full name</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Updated at</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Show books</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Ivo andric</td>
                            <td>11/11/1111</td>
                            <td>11/11/1111</td>
                            <td><button type='button' class="btn btn-sm btn-success" data-id=''>Edit</button></td>
                            <td><button type='button' class="btn btn-sm btn-danger">Show books</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-4">
            <form action="#">
                <input type="hidden" name="author_id" id="author_id">
                <input type="hidden" name="author_index" id="author_index">
                <div class="mb-3">
                    <label for="first_name">First name:</label>
                    <input type="text" name="first_name" id="first_name" class="form-control">
                    <em id="first_name_error"></em>
                </div>
                <div class="mb-3">
                    <label for="last_name">Last name:</label>
                    <input type="text" name="last_name" id="last_name" class="form-control">
                    <em id="last_name_error"></em>
                </div>
                <div class="d-grid"><button class="btn btn-primary" id="btnSaveAuthor" type="button">Save</button></div>
            </form>
        </div>
    </div>
</main>