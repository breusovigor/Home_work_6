<?php

include 'components/db.php';
include 'components/validation.php';

$dbConnection = getConnection();
if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];

    if (!empty($name) && !empty($age)){
        if (check_length($name, 2, 15) && check_age($age, 18, 100)) {
            $success = true;
            $sth = $dbConnection->prepare('INSERT INTO student
                (name, age, university_id) 
                VALUES 
                (:name, :age, :university_id)');
            $result = $sth->execute([
                'name' => $_POST['name'],
                'age' => $_POST['age'],
                'university_id' => $_POST['university_id']]);
            echo 'Данные корректны';
            } else {
            echo 'Данные введены неверно';
        }
    } else {
       echo 'Заполните пустые поля';
    }
    if ($result) {
        $message = 'User added';

    } else {
        $message = 'Error';
        $success = false;
    }
    header("Location: /?success=$success&message=$message");
}
if (isset($_GET['success'])) {
    echo "<p>{$_GET['message']}</p>";
}

if (isset($_POST['get'])) {
    $getStudent = $dbConnection->prepare('SELECT name, age, university_id FROM student');
    $getStudent->execute();
}

?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
    <form method="post">
        <p>Имя студента: <input type="text" name="name" minlength="2" maxlength="15" required></p>
        <p>Возраст: <input type="number" name="age" min="18" max="100" required></p>
        <p>Университет:
            <select name="university_id">
                <option value="1">ДГМА</option>
                <option value="2">ДИТМ</option>
                <option value="3">КЕГИ</option>
            </select>
        </p>
        <input type="submit" name="send" value="Send">
        <input type="submit" name="get" value="Вывод данных">
    </form>
    </body>
    </html>

<?php
if ($getStudent){
    $resultStudents = $getStudent->fetchAll(PDO::FETCH_ASSOC);
    echo '<pre>';
    print_r($resultStudents);
    echo '</pre>';
}