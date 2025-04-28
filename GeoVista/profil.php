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

//Errors
$errorMessages = [];
$errorFields = []; //Identifying fields for different kinds of errors
$errorFields["email"] = false;
$errorFields["username"] = false;
$errorFields["pwd"] = false;

if (isset($user)) { //$_SESSION["user"]
    $userDetails = getUserDetails($db, '2'); //$_SESSION["userid"]
    $username = $userDetails["username"];
    $pwd = $userDetails["password"];
    $mail = $userDetails["email"];
    $isAdmin = $userDetails["isAdmin"];

    /* Validation */
    if (count($_POST) > 0 && $_SERVER["REQUEST_METHOD"] == "POST") {
        //$isAdmin = (isset($_POST["admin"])) ? $_POST["admin"] : $isAdmin;

        //Email
        if (empty($_POST["email"])) {
            $errorMessages[] = 'Bitte eine E-Mail-Adresse angeben!';
            $errorFields["email"] = true;
        } else if (!preg_match("#^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$#", $_POST["email"])) {
            $errorMessages[] = "Ungültige E-Mail-Adresse!";
            $errorFields["email"] = true;
        } else {
            $mail = $_POST["email"];
        }

        //Username
        if (empty($_POST["username"])) {
            $errorMessages[] = "Username fehlt!";
            $errorFields["user"] = true;
        } else {
            $usernames = getUsernames($db);

            if (in_array($username, $usernames) && $username != $_POST["username"]) {
                $errorMessages[] = "Username existiert bereits!";
                $errorFields["username"] = true;
            } else if (strlen($_POST["username"]) <= 3) {
                $errorMessages[] = "Username muss mindestens 3 Zeichen enthalten!";
                $errorFields["username"] = true;
            } else if (strlen($_POST["username"]) >= 20) {
                $errorMessages[] = "Username darf maximal 20 Zeichen lang sein!";
                $errorFields["username"] = true;
            } else {
                $username = $_POST["username"];
            }
        }

        //Password
        //TODO


    }
}

updateUserDetails($db, '2', $mail, $username, $pwd);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>GeoVista - Profil</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- NAV-BAR -->
    <?php include "./base/nav.php"; ?>

    <!-- USERNAME -->
    <?php include "./base/username.php"; ?>

    <header class="">
        <h1 class="text-center text-primary">Profil bearbeiten</h1>
    </header>

    <main class="container w-75 my-5">
        <p class="text-center text-muted mb-5">Hier können Sie Ihr Profil verwalten und Ihre Stammdaten ändern:</p>

        <form
            action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . (isset($_GET["selectedUserID"]) ? '?selectedUserID=' . $_GET["selectedUserID"] : ''); ?>"
            method="POST">

            <div class="p-5 border rounded-4 shadow-sm bg-white">

                <div class="mb-4">
                    <label for="email" class="form-label fw-semibold">E-Mail-Adresse <span
                            class="text-primary">*</span></label>
                    <!-- <input type="email" class="form-control <?php if ($errorFields['email'])
                        echo 'is-invalid'; ?>"
                        id="email" name="email"
                        value="<?php echo isset($_SESSION['user']) ? htmlspecialchars($mail) : ''; ?>" required> -->

                    <input type="email" class="form-control" id="email" name="email"
                        value="<?php echo isset($user) ? htmlspecialchars($mail) : ''; ?>" required>
                    <!-- $_SESSION['user'] -->
                </div>

                <div class="mb-4">
                    <label for="user" class="form-label fw-semibold">Username <span
                            class="text-primary">*</span></label>
                    <!-- <input type="text" class="form-control <?php if ($errorFields['user'])
                        echo 'is-invalid'; ?>" id="user" name="username"
                        value="<?php echo isset($_SESSION['user']) ? htmlspecialchars($username) : ''; ?>" required> -->

                    <input type="text" class="form-control <?php if ($errorFields['username'])
                        echo 'is-invalid'; ?>" id="user" name="username"
                        value="<?php echo isset($user) ? htmlspecialchars($username) : ''; ?>" required>
                    <!-- $_SESSION['user'] -->
                </div>

                <!-- TODO: PASSWORD -->
                <?php if (empty($_GET["selectedUserID"])): ?>
                    <div class="mb-4">
                        <label for="pwd1" class="form-label fw-semibold">Altes Passwort</label>
                        <input type="password" class="form-control <?php if ($errorFields['pwd'])
                            echo 'is-invalid'; ?>" id="pwd1" name="password1">
                    </div>
                <?php endif; ?>

                <div class="mb-4">
                    <label for="pwd2" class="form-label fw-semibold">Neues Passwort</label>
                    <input type="password" class="form-control <?php if ($errorFields['pwd'])
                        echo 'is-invalid'; ?>" id="pwd2" name="password2">
                </div>

                <div class="mb-4">
                    <label for="pwd3" class="form-label fw-semibold">Neues Passwort wiederholen</label>
                    <input type="password" class="form-control <?php if ($errorFields['pwd'])
                        echo 'is-invalid'; ?>" id="pwd3" name="password3">
                </div>

                <p class="text-center text-muted mb-2">
                    Alle mit <span class="text-primary">*</span> gekennzeichneten Felder sind Pflichtfelder.
                </p>

                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-primary px-5 py-2 rounded-4 fw-bold">
                        Speichern
                    </button>
                    <a href="./index.php" class="btn btn-outline-primary px-5 py-2 rounded-4 fw-bold ms-2">
                        Abbrechen
                    </a>
                </div>

            </div>

        </form>
    </main>


    <!-- FOOTER -->
    <?php //include "./components/footer.php"; ?>

    <!-- For bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>