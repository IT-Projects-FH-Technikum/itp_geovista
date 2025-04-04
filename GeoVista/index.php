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

$quizzes = getQuizzes($db);

//Reset session variables for new quiz
if (isset($_SESSION['questions']))
    unset($_SESSION['questions']);
if (isset($_SESSION['current_question']))
    unset($_SESSION['current_question']);

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

    <header class="mt-4">
        <h1 class="text-center text-primary">GeoVista</h1>
    </header>

    <!-- Welcome logged in user -->
    <?php
    $user = getUserDetails($db, '2'); //$_SESSION["userid"]
    if ($user)
        echo "<p class='mt-3 text-center'>Hallo, <span class='fw-bold'>" . $user["username"] . "</span>!</p>";
    ?>

    <main class="m-5">

        <p class="pb-4 text-center">Wähle ein Quiz:</p>

        <div class="d-flex justify-content-center flex-wrap gap-4">
            <?php
            if ($quizzes) {
                foreach ($quizzes as $quiz) {
                    echo "<div class='card' style='width: 20rem;' onclick=\"location.href='level.php?quiz=" . $quiz["id_quiz"] . "';\">";
                    echo "<img class='card-img-top' src='" . $quiz["icon"] . "' alt='Quiz zu " . $quiz["name"] . "'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . $quiz["name"] . "</h5>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p class='mt-3 text-center'>Keine Quizzes vorhanden.</p>";
            }
            ?>

            <!-- <div class="card" style="width: 20rem;" onclick="location.href='level.php?quiz=';">
                <img class="card-img-top" src="res/img/level_icons/level1" alt="Level1">
                <div class="card-body">
                    <h5 class="card-title">Level 1</h5>
                </div>
            </div> -->

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