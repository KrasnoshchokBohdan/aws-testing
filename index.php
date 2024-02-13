<?php

// Встановіть з'єднання з MySQL
$mysqli = new mysqli("localhost", "root", "root", "test1");

// Перевірте з'єднання
if ($mysqli->connect_errno) {
    echo "Не вдалося підключитися до MySQL: " . $mysqli->connect_error;
    exit();
}


// SQL-запит для видалення трьох перших значень
$sql = "DELETE FROM testtable1 LIMIT 3";
// Виконання запиту
$mysqli->query($sql);


// Функція для генерації рандомного числа
function generateRandomNumber() {
    return rand(0, 65535);
}
// Додати 3 значення
for ($i = 0; $i < 3; $i++) {
    // Сформувати рядок для запиту
    $randomNumber1 = generateRandomNumber();
    $randomNumber2 = generateRandomNumber();
    $randomNumber3 = generateRandomNumber();
    $randomNumber4 = generateRandomNumber();
    $randomNumber5 = generateRandomNumber();
    $randomNumber6 = generateRandomNumber();
    $randomNumber7 = generateRandomNumber();
    $randomNumber8 = generateRandomNumber();
    $randomNumber9 = generateRandomNumber();
    $randomNumber10 = generateRandomNumber();
    $randomNumber11 = generateRandomNumber();
    $randomNumber12 = generateRandomNumber();
    $randomNumber13 = generateRandomNumber();
    $randomNumber14 = generateRandomNumber();
    $randomNumber15 = generateRandomNumber();
    $randomNumber16 = generateRandomNumber();
    $sql = "INSERT INTO testtable1 (name) VALUES ('$randomNumber1,$randomNumber2,$randomNumber3,$randomNumber4,$randomNumber5,$randomNumber6,$randomNumber7,$randomNumber8,$randomNumber9,$randomNumber10,$randomNumber11,$randomNumber12,$randomNumber13,$randomNumber14,$randomNumber15,$randomNumber16')";

    // Виконати запит
    $mysqli->query($sql);

    // Перевірити результат
    if ($mysqli->error) {
        echo "Не вдалося додати значення: " . $mysqli->error;
        break;
    }
}



// Отримайте список таблиць
$sql = "SHOW TABLES";
$result = $mysqli->query($sql);
// Перевірте результат
if (!$result) {
    echo "Не вдалося отримати список таблиць: " . $mysqli->error;
    exit();
}

sleep(10);

// Переберіть список таблиць
while ($table = $result->fetch_assoc()) {
    echo "<h2>" . $table['Tables_in_test1'] . "</h2>";

    // Отримайте дані з таблиці
    $sql = "SELECT * FROM " . $table['Tables_in_test1'];
    $data = $mysqli->query($sql);

    // Перевірте результат
    if (!$data) {
        echo "Не вдалося отримати дані з таблиці " . $table['Tables_in_test1'] . ": " . $mysqli->error;
        continue;
    }

    // Виведіть дані таблиці
    echo "<table border='1'>";
    while ($row = $data->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $key => $value) {
            echo "<td>" . $value . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

// Закрийте з'єднання з MySQL
$mysqli->close();

?>
