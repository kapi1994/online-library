<main class="container">
    <div class="row mt-5">
        <div class="col-lg-8">
            <div class="table-responsive-sm table-responsive-md">
                <table class="table text-center align-middle">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Updated</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Change status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Naziv</td>
                            <td>11/11/1111</td>
                            <td>11/11/1111</td>
                            <td><button class="btn btn-sm btn-success" data-id='' type='button'>Edit</button></td>
                            <td><button class="btn btn-sm btn-danger" type="button">Change status</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-4">
            <form action="">
                <input type="hidden" name="publisher_id" id="publisher_id">
                <input type="hidden" name="publisher_index" id="publisher_index">

                <div class="mb-3">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control">
                    <em id="nameError"></em>
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary" type="button" id='btnPublisher'>Save</button>
                </div>
            </form>
        </div>
    </div>
</main>