<?php
header("Content-type:application/json");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    require_once '../../config/connection.php';
    require '../function.php';

    $fileData  = fopen('../../data/logFile.txt', 'r');
    $rows = file('../../data/logFile.txt');
    fclose($fileData);

    $stats = [];

    $pages = ['home' => 0, 'books' => 0, 'contact' => 0, 'aboutme' => 0];
    $pages24 = ['home' => 0, 'books' => 0, 'contact' => 0, 'aboutme' => 0];

    $total = 0;
    $total24 = 0;


    foreach ($rows as $row) {
        $data = explode("\t", $row);
        $url = $data[0];
        $url = explode('?', $url);
        $mainUrl = $url[0];
        $visited = explode("/", $mainUrl);
        $index = $visited[count($visited) - 1];


        if ($index != 'index.php') {
            continue;
        }

        if (count($url) == 1) {
            $pages['home']++;
            $total++;
        } else {
            $page = $url[1];
            $page = explode("&", $page)[0];
            $page = explode("=", $page);
            if ($page[0] == "page" && count($page) > 1) {
                if (array_key_exists($page[1], $pages)) {
                    $pages[$page[1]]++;
                    $total++;

                    if (inTheLast24H($data[1])) {
                        $pages24[$page[1]]++;
                    }
                }
            }
        }
    }

    $logins = loggedInToday();
    $registeredUsers = registeredUsers();
    $totalOrders  = totalOrders();

    echo json_encode([
        'overallViews' => $pages,
        'todayViews' => $pages24,
        'todayLogin' => $logins,
        'registeredUsers' => $registeredUsers,
        'totalOrders' => $totalOrders
    ]);
} else {
    http_response_code(404);
}
