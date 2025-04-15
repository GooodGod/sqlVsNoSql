
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/sqlVsNoSql/src/css/main.css">
    <script src="https://kit.fontawesome.com/27e046be36.js" crossorigin="anonymous"></script>
    <title>SQl vs NoSQL - Playground</title>
</head>

<body class="bg-white">
<?php
$con = mysqli_connect('localhost', 'root', '', 'biblioteka');

if (mysqli_connect_errno()) {
    echo "Błąd połączenia z bazą: " . mysqli_connect_error();
    exit();

}

if (isset($_POST["nameInput"]) && isset($_POST["surnameInput"])) {
    $imie = $_POST["nameInput"];
    $nazwisko = $_POST["surnameInput"];

    $_POST = array();

    $zapytanie2 = "INSERT INTO `uzytkownicy`(`imie`, `nazwisko`) VALUES('$imie', '$nazwisko')";

    $skrypt2 = mysqli_query($con, $zapytanie2);

    echo "<p class='m-auto mb-4'>Dodałeś użytkownika do bazy</p>";
    echo "<a class='goBackBtn' href='../playground.php'>Powrót</a>";
}

mysqli_close($con);
?>
    </body>

</html>