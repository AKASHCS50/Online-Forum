<?php
ob_start();
$name_error = $email_error = $desc_error = "";
$n = $e = $ds = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty($_POST["name"])) {
        $name_error = "Name is required";
    } else {
        $n = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $n)) {
            $name_error = "Only letters and white space allowed";
        }
    }


    if (empty($_POST["email"])) {
        $email_error = "Email is required";
    } else {
        $e = test_input($_POST["email"]);
        if (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
            $email_error = "Invalid email format";
        }
    }
    if (empty($_POST["desc"])) {
        $desc_error = "Description is required";
    } else {
        $ds = test_input($_POST["desc"]);
    }
    if ($name_error == "" and $email_error == "" and $desc_error == "") {

        $t = $_GET["openS"];
        $x = strtolower($t);
        $name_error = $email_error = $desc_error = "";
        $n = $e = $ds = "";
        session_start();
        include('connect.php');
        $name = mysqli_real_escape_string($db, $_POST["name"]);
        $email = mysqli_real_escape_string($db, $_POST["email"]);
        $desc = mysqli_real_escape_string($db, $_POST["desc"]);
        $query = "INSERT INTO `$t`(post_username, post_email, post_desc) VALUES ('$name', '$email', '$desc');";
        mysqli_query($db, $query);
        $query = "UPDATE topics SET topic_no_of_posts=topic_no_of_posts+1 WHERE topic_title = '$t';";
        mysqli_query($db, $query);
        ob_end_clean();
        header('Location:' . $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING']);
        // obr_enf_fluch();
        die;
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
