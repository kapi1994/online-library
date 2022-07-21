<?php
if (!isset($_SESSION['user']) || (isset($_SESSION['user']) && $_SESSION['user']->role_id != 2)) {
    header("Location:index.php?page=errors&code=403");
}
?>
<main class="container">
    <div class="row mt-5">
        <div class="col col-lg-4 mb-1 mt-lg-0">
            <div class="d-grid">
                <div class="card-title" id="viewsTotal"></div>
                <div class="card">
                    <canvas id="ChartTotal"></canvas>
                </div>
                <table class='table mt-2'>
                    <tbody id="Total"></tbody>
                </table>
            </div>
        </div>
        <div class="col col-lg-4 mb-1 mt-lg-0">
            <div class="d-grid">

                <div class="card-title" id="viewsH24"></div>
                <div class="card">
                    <canvas id="Chart24h"></canvas>
                </div>
                <table class='table mt-2'>
                    <tbody id="24h"></tbody>
                </table>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="row">
                <div class="col-12">
                    <div class="card text-center  text-white mb-3">
                        <!-- numbar of posts -->
                        <div class="card-body">
                            <h3 class="text-dark fw-bold">Registered users</h3>
                            <h4 class="display-4 text-dark" id="totalNumberOfUsers">
                                <i class="fas fa-pencil-alt"></i>6
                            </h4>

                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card text-center  text-white mb-3">
                        <!-- numbar of posts -->
                        <div class="card-body">
                            <h3 class="text-dark fw-bold">Total logins</h3>
                            <h4 class="display-4 text-dark" id="todayLogins">
                                <i class="fas fa-pencil-alt"></i>
                            </h4>
                        </div>


                    </div>
                </div>
                <div class="col-12">
                    <div class="card text-center  text-white mb-3">
                        <!-- numbar of posts -->
                        <div class="card-body">
                            <h3 class="text-dark fw-bold">Total orders</h3>
                            <h4 class="display-4 text-dark" id="orderTotal">
                                <i class="fas fa-pencil-alt"></i>
                            </h4>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</main>