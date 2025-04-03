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

/* if GET isn't set exist -> redirect to index.php */
if (!isset($_GET["quiz"])) {
    header("Location: index.php");
    exit();
}

$allQuestions = getQuestions($db, htmlspecialchars($_GET["quiz"]));
$quizName = getQuizName($db, htmlspecialchars($_GET["quiz"]));

function shuffle_question($allQuestions, $count)
{
    $uniqueQuestions = array_unique($allQuestions, SORT_REGULAR);
    shuffle($uniqueQuestions);
    return array_slice($uniqueQuestions, 0, min($count, count($uniqueQuestions)));
}
$questions = shuffle_question($allQuestions, 5);

//Set the current question index
if (!isset($_SESSION['current_question'])) {
    $_SESSION['current_question'] = 0;
} else {
    //move to the next question
    if (isset($_GET['next'])) {
        $_SESSION['current_question']++;
        header("Location: " . $_SERVER['PHP_SELF'] . "?quiz=" . urlencode($_GET['quiz']));
        exit();
    }
}

//Don't go out of bounds
$current_question_index = $_SESSION['current_question'];
$finishedQuiz = false;
$current_question;
$answers;

if ($current_question_index >= count($questions)) {
    $_SESSION['current_question'] = 0;
    $finishedQuiz = true;
} else {
    $current_question = $questions[$current_question_index];
    $answers = getAnswersToQuestion($db, $current_question['id_question']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>GeoVista - Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="res/scripts/evaluateQuestion.js"></script>

</head>

<body class="d-flex flex-column min-vh-100">

    <!-- NAV-BAR -->
    <?php include "./base/nav.php"; ?>

    <!-- USERNAME -->
    <?php include "./base/username.php"; ?>

    <header class="">
        <h1 class="text-center text-primary"><?php echo $quizName ?></h1>
    </header>

    <main class="m-5">

        <div class="text-center">
            <button class="btn btn-primary" onclick="location.href='index.php';">Zurück zu allen
                Schwierigkeitsstufen</button>
        </div>

        <div
            class="border border-5 border-black rounded p-4 mt-5 d-flex flex-column align-items-center justify-content-center">

            <form id="questionForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET"
                class="card my-2" quizState="<?php echo $finishedQuiz ? 'finished' : 'active'; ?>">
                <?php if (isset($_GET['quiz'])): ?>
                    <input type="hidden" name="quiz" value="<?php echo htmlspecialchars($_GET['quiz']); ?>">
                <?php endif; ?>

                <?php if(!$finishedQuiz): ?>
                    
                    <?php if($_GET['quiz'] === '4'): ?>
                        <div id="map"></div>
                    <?php else: ?>
                        <img class="card-img-top" style="width: 400px;" src="<?php echo $current_question["image"] ?>" alt="Bild zu Frage <?php echo $current_question_index + 1; ?> Quiz <?php echo $quizName; ?>">
                    <?php endif; ?>
                    
                    <div class="card-body">
                        <h5 class="card-title">Frage <?php echo $current_question_index + 1; ?></h5>
                        <p class="card-text"><?php echo $current_question['q_desc']; ?></p>
                        <section>
                            <?php foreach ($answers as $answer): ?>
                                <input type="radio" id="<?php echo $answer['id_answer']; ?>"
                                    name="question<?php echo $current_question_index; ?>"
                                    value="<?php echo $answer['a_desc']; ?>"
                                    data-correct="<?php echo $answer['isCorrectAnswer'] == 1 ? 'true' : 'false'; ?>" required>
                                <label for="<?php echo $answer['id_answer']; ?>"><?php echo $answer['a_desc']; ?></label><br>
                            <?php endforeach; ?>
                        </section>
                    </div>
                    <button id="checkQuestionButton" type="submit" class="btn btn-primary" value="1">Prüfen</button>
                <?php else: ?>
                    <p>Quiz fertig</p>
                <?php endif; ?>

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