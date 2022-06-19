<?php
function login($email, $password)
{
    global $connection;
    $queryLogin = $connection->prepare('select first_name, last_name, name from user u join role r on u.role_id = r.id where email =? and password =?');
    $queryLogin->execute([$email, md5($password)]);
    $user = $queryLogin->fetch();
    return $user;
}


function queryCheck($table, $columnName, $column, $value)
{
    global $connection;
    return $connection->query("select count(*) as $columnName from $table where $column ='$value'")->fetch();
}

function insertUser($first_name, $last_name, $email, $password, $role_id)
{
    global $connection;
    $queryInsert = $connection->prepare('insert into user (first_name, last_name, email, password, role_id) values(?,?,?,?,?)');
    $queryInsert->execute([$first_name, $last_name, $email, md5($password), $role_id]);
}

function insertAuthor($first_name, $last_name)
{
    global $connection;
    $queryInsert = $connection->prepare('insert into author values(?,?)');
    return $queryInsert->execute([$first_name, $last_name]);
}


function insertUserActivity($email, $action)
{
    $file_path = '../data/logs.txt';
    $date = date('d/m/Y H:i:s');
    $ip = $_SERVER['REMOTE_ADDR'];
    $file_content = $email . "\t" . $date . "\t" . $ip . "\t" . $action . "\n";
    $file = fopen('../../data/logs.txt', 'a');
    fwrite($file, $file_content);
    fclose($file);
}
