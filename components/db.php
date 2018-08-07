<?php
/**
 * Получаем объект для работы с бд
 */

function getConnection ()
{
    try {
        $dbConfig = include ('config/db.php');
        $dsn = "mysql:host={$dbConfig['host']};dbname={$dbConfig['db']};charset={$dbConfig['charset']}";
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];
        return new PDO($dsn, $dbConfig['user'], $dbConfig['pass'], $opt);
    } catch (Exception $e) {
        echo 'Error : '.$e->getMessage();
        die;
    }
}

?>