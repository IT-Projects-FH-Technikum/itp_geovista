<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();

require_once('config/dbaccess.php'); //to retrieve connection detail
require_once('config/db_utils.php'); //functions for database access
$db = new mysqli($host, $user, $password, $database);
if ($db->connect_error) {
    echo "Connection Error: " . $db->connect_error;
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>GeoVista - Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- <script src="res/scripts/XX.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- NAV-BAR -->
    <?php include "./base/nav.php"; ?>

    <!-- USERNAME -->
    <?php include "./base/username.php"; ?>

    <header class="" style="">
        <h1 class="text-center text-primary">Level 1</h1>
    </header>

    <!-- Username -->
    <?php
    ?>

    <main class="m-5">

        <div class="text-center">
            <button class="btn btn-primary" onclick="location.href='index.php';">Zurück zu allen
                Schwierigkeitsstufen</button>
        </div>

        <div class="border border-5 border-black rounded p-4 mt-5 d-flex flex-column align-items-center justify-content-center"
            style="">
            <form action="level1.php" class="card my-2" style="">
                <img class="card-img-top" style="width: 400px;" src="res/img/question_img/oesterreich-in-europa.png"
                    alt="Question1">
                <div class="card-body">
                    <h5 class="card-title">Frage 1</h5>
                    <p class="card-text">Um welches Land handelt es sich?</p>
                    <section>
                        <input type="radio" id="deutschland" name="question1" value="deutschland">
                        <label for="deutschland">Deutschland</label><br>
                        <input type="radio" id="österreich" name="question1" value="österreich">
                        <label for="österreich">Österreich</label><br>
                        <input type="radio" id="ungarn" name="question1" value="ungarn">
                        <label for="ungarn">Ungarn</label><br>
                        <input type="radio" id="tschechien" name="question1" value="tschechien">
                        <label for="tschechien">Tschechien</label>
                    </section>
                </div>
                <button type="submit" class="btn btn-primary">Prüfen</button>
            </form>

            <form action="level1.php" class="card my-2" style="">
                <img class="card-img-top" style="width: 400px;" src="res/img/question_img/question2" alt="Question2">
                <div class="card-body">
                    <h5 class="card-title">Frage 2</h5>
                    <p class="card-text">Um welches Land handelt es sich?</p>
                    <section>
                        <input type="radio" id="schweiz" name="question2" value="schweiz">
                        <label for="schweiz">Schweiz</label><br>
                        <input type="radio" id="kroatien" name="question2" value="kroatien">
                        <label for="kroatien">Kroatien</label><br>
                        <input type="radio" id="luxemburg" name="question2" value="luxemburg">
                        <label for="luxemburg">Luxemburg</label><br>
                        <input type="radio" id="norwegen" name="question2" value="norwegen">
                        <label for="norwegen">Norwegen</label>
                    </section>
                </div>
                <button type="submit" class="btn btn-primary">Prüfen</button>
            </form>
        </div>

    </main>

    <!-- FOOTER -->
    <?php //include "./components/footer.php"; ?>

    <!-- For bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>