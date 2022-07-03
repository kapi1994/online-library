<?php $publishers = getPublishers();
$pages = publisherPagination();
?>
<main class="container">
    <div class="row mt-5">
        <div class="col-lg-3 mb-2 mb-lg-0">
            <input type="text" name="search_publisher" id="search_publisher" class="form-control" placeholder="Search">
        </div>
        <div class="col-lg-3">
            <select name="order_publisher" id="order_publisher" class="form-select">
                <option value="default">Sortirati po</option>
                <option value="name_by_asc">Nazivu u rasutcem</option>
                <option value="name_by_desc">Nazivu u opadajucem</option>
                <option value="created_at_by_asc">Datumu kreiranja u rastucem</option>
                <option value="created_at_by_desc">Datumu krairanja u opadajucem</option>
            </select>
        </div>
    </div>
    <div class="row my-2">
        <div id="publisherResponseMessage"></div>
        <div class="col-lg-8">
            <div class="table-responsive-sm table-responsive-md">
                <table class="table text-center align-middle">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Updated</th>
                            <th scope='col'>Status</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Change status</th>

                        </tr>
                    </thead>
                    <tbody id='publishers'>
                        <?php
                        $index = 1;
                        foreach ($publishers as $publisher) : ?>
                            <tr id='publisher_<?= $index ?>'>
                                <th scope="row"><?= $index ?></th>
                                <td><?= $publisher->name ?></td>
                                <td><?= date('d/m/Y H:i:s', strtotime($publisher->created_at)); ?></td>
                                <td><?= $publisher->updated_at != '' ? date('d/m/Y H:i:s', strtotime($publisher->updated_at)) : "-" ?></td>
                                <td><?= $publisher->is_deleted == 0 ?  'Aktivan' : 'Neaktivan' ?></td>
                                <td><button class="btn btn-sm btn-success btn-edit-publisher" data-id='<?= $publisher->id ?>' data-index='<?= $index ?>' type='button'>Edit</button></td>
                                <td><button class="btn btn-sm btn-danger btn-change-status-publisher" data-id='<?= $publisher->id ?>' data-index='<?= $index ?>' data-status='<?= $publisher->is_deleted ?>'>
                                        <?= $publisher->is_deleted == 0 ? 'Deaktiviraj' : 'Aktiviraj' ?>
                                    </button></td>
                            </tr>
                        <?php $index++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination" id='publisherPagination'>
                        <?php
                        for ($i = 0; $i < $pages; $i++) : ?>
                            <li class="page-item <?php if ($i + 1 == 1) : ?> active <?php endif ?>"><a class="page-link publisher-pagination" data-id='<?= $i ?>' href="#"><?= $i + 1 ?></a></li>
                        <?php endfor; ?>
                    </ul>
                </nav>
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