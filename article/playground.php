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

<?php
$con = mysqli_connect('localhost', 'root', '', 'biblioteka');

if (mysqli_connect_errno()) {
    echo "Błąd połączenia z bazą: " . mysqli_connect_error();
    exit();

}
?>

<body class="bg-white">
    <header data-bs-theme="dark">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark px-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="/sqlVsNoSql/index.html">Bazy Danych SQL vs NoSQL</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse flex-row-reverse" id="navbarCollapse">
                    <ul class="navbar-nav mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" target="_blank"
                                href="https://github.com/GooodGod/sqlVsNoSql">GitHub <i
                                    class="fa-solid fa-arrow-up-right-from-square"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="row g-5 py-4 px-4">
        <div class="col-md-8">
            <article class="blog-post">
                <h2 class="blog-post-title">Playground</h2>
                <hr>
                <h3 class="text-title">Otrzymywanie informacji z bazy danych</h3>
                <h4>Przykład: tabela ze wszystkimi użytkownikami biblioteki</h4>
                <div class="table-responsive mb-4">
                    <table class="table table-dark table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Imię</th>
                                <th scope="col">Nazwisko</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $zapytanie1 = "SELECT `id`, `imie`, `nazwisko` FROM `uzytkownicy` ORDER BY `id` ASC;";

                            if (isset($_POST["filterSearch"])) {
                                $filter = $_POST["filterSearch"];
                                $zapytanie1 = "SELECT `id`, `imie`, `nazwisko` FROM `uzytkownicy` WHERE `id` >= '$filter' ORDER BY `id` ASC;";
                            }

                            if (isset($_POST["keywordSearch"])) {
                                $keyword = $_POST["keywordSearch"];
                                $zapytanie1 = "SELECT `id`, `imie`, `nazwisko` FROM `uzytkownicy` WHERE `imie` = '$keyword' ORDER BY `id` ASC;";
                            }

                            $skrypt1 = mysqli_query($con, $zapytanie1);

                            while ($wynik = mysqli_fetch_array($skrypt1)) {
                                echo "<tr>";
                                echo "<th scope='row'>" . $wynik['id'] . "</th>";
                                echo "<td>" . $wynik['imie'] . "</td>";
                                echo "<td>" . $wynik['nazwisko'] . "</td>";
                            }

                            mysqli_close($con);
                            ?>
                        </tbody>
                    </table>
                </div>
                <h3 class="text-title">Dodawanie informacji do bazy danych</h3>
                <h4>Przykład: rejestracja nowego użytkownika biblioteki(po rejestracji pojawi się w tabeli wyżej)
                </h4>
                <form class="mb-4 playgroundForm" method="post" action="/sqlVsNoSql/article/endpoint/addUser.php">
                    <div class="mb-3">
                        <label for="nameInput" class="form-label">Imię</label>
                        <input type="text" class="form-control" id="nameInput" name="nameInput">
                    </div>
                    <div class="mb-3">
                        <label for="surnameInput" class="form-label">Nazwisko</label>
                        <input type="text" class="form-control" id="surnameInput" name="surnameInput">
                    </div>
                    <button type="submit" class="btn learn-more-btn">Zarejestruj się!</button>
                </form>
            <h3 class="text-title">Wyszukiwanie informacji 1</h3>
            <h4>Przykład: filtr użytkowników wg. ID
            </h4>
            <form class="mb-4 playgroundForm" method="post">
                <div class="mb-3">
                    <label for="filterSearch" class="form-label">Min. ID użytkownika do pokazania</label>
                    <input type="number" class="form-control" id="filterSearch" name="filterSearch">
                </div>
                <button type="submit" class="btn learn-more-btn">Filtruj!</button>
            </form>
            <h3 class="text-title">Wyszukiwanie informacji 2</h3>
            <h4>Przykład: wyszukiwarka użytkowników wg. imienia
            </h4>
            <form class="mb-4 playgroundForm" method="post">
                <div class="mb-3">
                    <label for="keywordSearch" class="form-label">Imię szukanego użytkownika</label>
                    <input type="text" class="form-control" id="keywordSearch" name="keywordSearch">
                </div>
                <button type="submit" class="btn learn-more-btn">Wyszukaj!</button>
            </form>
            </article>
        </div>

        <div class="col-md-4">
            <div class="" style="top: 2rem;">
                <div class="p-4 mb-3 bg-light rounded">
                    <h4 class="fst-italic">O tej stronie</h4>
                    <p class="mb-0">Na naszej stronie - nie same teksty! Zobacz, co można zrobić, wykorzystywując nawet
                        prostą bazę danych MariaDB.
                        <br><br>
                        <i>Stronę przygotował: Stepan Honcharenko</i>
                    </p>
                </div>

                <div>
                    <h4 class="fst-italic">Interesuje Ci coś innego?</h4>
                    <ul class="list-unstyled sidebar-list">
                        <li>
                            <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                href="/sqlVsNoSql/article/historyOfDatabases.html">
                                <img src="/sqlVsNoSql/src/img/homepage_slider_1.jpeg" alt="Historia baz danych"
                                    class="bd-placeholder-img sidebar-img">
                                <div class="col-lg-8">
                                    <h6 class="mb-0">Historia baz danych</h6>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                href="/sqlVsNoSql/article/sqlVsNoSqlComparison.html">
                                <img src="/sqlVsNoSql/src/img/homepage_slider_2.jpeg" alt="SQL vs NoSQL"
                                    class="bd-placeholder-img sidebar-img">
                                <div class="col-lg-8">
                                    <h6 class="mb-0">SQL vs NoSQL</h6>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                href="/sqlVsNoSql/article/managementSystems.html">
                                <img src="/sqlVsNoSql/src/img/homepage_slider_4.jpeg" alt="SZBD"
                                    class="bd-placeholder-img sidebar-img">
                                <div class="col-lg-8">
                                    <h6 class="mb-0">SZBD</h6>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top"
                                href="/sqlVsNoSql/article/practicalUsage.html">
                                <img src="/sqlVsNoSql/src/img/homepage_slider_5.jpeg" alt="Zastosowania praktyczne"
                                    class="bd-placeholder-img sidebar-img">
                                <div class="col-lg-8">
                                    <h6 class="mb-0">Zastosowania praktyczne</h6>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row featurette">
        <div class="col-md-5">
        </div>
        <div class="col-md-7">
            <h2 class="featurette-heading scroll-to-top-btn"><span class="text-muted">Powrót na
                    górę</span></h2>
        </div>
    </div>
    <footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
        <script src="/sqlVsNoSql/src/js/main.js"></script>
    </footer>
    </body>
</html>