<?php
//Access to database


/* User */
function getUserDetails($db, $id)
{
    $result = null;
    try {
        $sql = "SELECT * FROM user WHERE id_user = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $id); // "i" specifies that the parameter is an integer
        $stmt->execute();
        $result = $stmt->get_result()->fetch_array();
        $stmt->close();
    } catch (Exception $e) {
        echo '<div class="alert alert-danger" role="alert">Error: ' . $e->getMessage() . "</div>\n";
    } finally {
        return $result;
    }
}

function updateUserDetails($db, $id, $email, $username, $password)
{
    try {
        $sql = "UPDATE user SET email = ?, username = ?, password = ? WHERE id_user = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("sssi", $email, $username, $password, $id);
        $stmt->execute();
        $stmt->close();
    } catch (Exception $e) {
        echo '<div class="alert alert-danger" role="alert">Error: ' . $e->getMessage() . "</div>\n";
    }
}

function getUsernames($db)
{
    $users = [];
    try {
        $sql = "SELECT username FROM user ORDER BY id_user";
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row["username"];
            }
        }
    } catch (Exception $e) {
        echo '<div class="alert alert-danger" role="alert">Error: ' . $e->getMessage() . "</div>\n";
    } finally {
        return $users;
    }
}


/* Quizzes */
function getQuizzes($db)
{
    $quizzes = [];
    try {
        $sql = "SELECT * FROM quiz ORDER BY id_quiz";
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $quizzes[] = $row;
            }
        }
    } catch (Exception $e) {
        echo '<div class="alert alert-danger" role="alert">Error: ' . $e->getMessage() . "</div>\n";
    } finally {
        return $quizzes;
    }
}

function getQuizName($db, $quiz_id)
{
    $result = null;
    try {
        $sql = "SELECT name FROM quiz WHERE id_quiz = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $quiz_id); // "i" specifies that the parameter is an integer
        $stmt->execute();
        $result = $stmt->get_result()->fetch_array()["name"];
        $stmt->close();
    } catch (Exception $e) {
        echo '<div class="alert alert-danger" role="alert">Error: ' . $e->getMessage() . "</div>\n";
    } finally {
        return $result;
    }
}

/* Questions */
function getQuestions($db, $quiz_id)
{
    $questions = [];
    try {
        //Fetch all questions for the quiz
        $sql = "SELECT id_question, description as q_desc, image FROM question WHERE fk_quiz = ? ORDER BY id_question";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $quiz_id); //"i" specifies that the parameter is an integer
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                //Fetch answers for each question
                $answers = getAnswersToQuestion($db, $row['id_question']);
                $row['answers'] = $answers; //Add answers as a nested array
                $questions[] = $row;
            }
        }
    } catch (Exception $e) {
        echo '<div class="alert alert-danger" role="alert">Error: ' . $e->getMessage() . "</div>\n";
    } finally {
        return $questions;
    }
}

function getAnswersToQuestion($db, $id_question){
    $answers = [];
    try {
        $sql = "SELECT id_answer, description as a_desc, isCorrectAnswer FROM answer WHERE fk_question = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $id_question); // "i" specifies that the parameter is an integer
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $answers[] = $row;
            }
        }
    } catch (Exception $e) {
        echo '<div class="alert alert-danger" role="alert">Error: ' . $e->getMessage() . "</div>\n";
    } finally {
        return $answers;
    }
}

?>