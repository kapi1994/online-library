<?php $authors = getAuthors();
$pages = authorsPageCount();
?>
<main class="container">
    <div class="row mt-3">

        <div class="col-lg-3 my-2 my-lg-0">
            <input type="text" name="search_authors" id="search_authors" class="form-control" placeholder="Search authors...">
        </div>
        <div class="col-lg-3 mb-2 my-lg-0">
            <select name="order_authors" id="order_authors" class="form-select">
                <option value="default">Sortirati po</option>
                <option value="first_name_asc">Ime u rastucem</option>
                <option value="first_name_desc">Ime u opadajucem</option>
                <option value="last_name_asc">Prezime u rastucem</option>
                <option value="last_name_desc">Prezime u opadajucem</option>
                <option value="created_at_asc">Datum kreiranja rastucem</option>
                <option value="created_at_desc">Datum kreiranja opadajucem</option>
            </select>
        </div>
        <div class="col-lg-3 mt-2 mt-lg-0 ms-auto">
            <div class="d-grid">
                <a href="models/actions/exportData.php?type=excel" class="btn btn-primary">Export to excel</a>
            </div>
        </div>
    </div>

    <div class="row my-2">
        <div id="authorsResponseMessage"></div>
        <div class="col-lg-8">
            <div class="table-responsive-sm table-responsive-md">
                <table class="table text-center align-middle">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Full name</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Updated at</th>
                            <th scope="col">Status</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Change status</th>
                        </tr>
                    </thead>
                    <tbody id='authors'>
                        <?php
                        $index = 1;
                        foreach ($authors as $author) : ?>
                            <tr id='author_<?= $index ?>'>
                                <th scope="row"><?= $index ?></th>
                                <td><?= $author->first_name . ' ' . $author->last_name ?></td>
                                <td><?= date('d/m/Y H:i:s', strtotime($author->created_at)) ?></td>
                                <td><?= $author->updated_at != null ? $author->updated_at : '-' ?></td>
                                <td><?= $author->is_deleted == 0 ? 'Aktivan' : 'Neaktivan'  ?></td>
                                <td><button type='button' class="btn btn-sm btn-success btn-edit-author" data-id='<?= $author->id ?>' data-index='<?= $index ?>'>Edit</button></td>
                                <td><button class="btn btn-sm btn-danger btn-change-status-author" data-status='<?= $author->is_deleted ?>' data-id='<?= $author->id ?>' data-index='<?= $index ?>'>
                                        <?= $author->is_deleted == 0 ? 'Deaktiviraj' : "Aktiviraj" ?>
                                    </button></td>
                            </tr>
                        <?php
                            $index++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination" id='authorsPagination'>
                        <?php
                        for ($i = 0; $i < $pages; $i++) : ?>
                            <li class="page-item <?php if ($i + 1 == 1) : ?> active <?php endif ?>"><a class="page-link authors-pagination" data-id='<?= $i ?>' href="#"><?= $i + 1 ?></a></li>
                        <?php endfor; ?>
                    </ul>
                </nav>
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