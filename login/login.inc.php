<?php

include "../database_conn.php";

header('Content-Type: text/plain');

if (isset($_POST['login'])) {
    
	$recived = utf8_encode($_POST['login']);
    $login_crd = json_decode($recived);
    $email = $login_crd->email;
    $password = $login_crd->password;

    if (emptyInputLogin($email, $password) !== false) {
            echo '[ERROR] emptyinput';
            exit();
    }
    loginUser($conn, $email, $password);
}
elseif (isset($_POST['register'])) {  
    $recived = utf8_encode($_POST['register']);
    $register_crd = json_decode($recived);
    $name = $register_crd->name;
    $surname = $register_crd->surname;
    $email = $register_crd->email;
    $password = $register_crd->password;
    $password_conf = $register_crd->password_conf;

    if (emptyInput($name, $surname, $email, $password, $password_conf) !== false) {
        echo "[ERROR] empty_input";
        exit();
    }

    if (invalidEmail($email) !== false) {
        echo "[ERROR] invalid_email";
        exit();
    }

    if (passwordMatch($password, $password_conf) !== false) {
        echo "[ERROR] password_dont_match";
        exit();
    }

    if (emailExists($conn, $email) !== false) {
        echo "[ERROR] email_already_exists";
        exit();
    }

    createUser($conn, $name, $surname, $email, $password);

}
elseif (isset($_POST['logout'])) {
    session_start();
    echo $SESSION["user_name"];
    session_unset();
    session_destroy();
    echo "[Status: 3] Logout";
    exit();
}

function emptyInput($name, $surname, $email, $password, $password_conf) {
    if(empty($name) || empty($surname) || empty($email) || empty($password) || empty($password_conf)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    if(!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $email)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function passwordMatch($password, $password_conf) {
    if($password !== $password_conf) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function emailExists($conn, $email) {
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        echo "[ERROR] stmt_failed";
        exit();
    }
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $surname, $email, $password) {
    
    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
    $insert_user = "INSERT INTO users (name, surname, email, password) 
            VALUES ('$name', '$surname', '$email', '$hashedpassword');";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $insert_user)) {
        echo "[ERROR] stmt_failed";
        exit();
    } 

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    echo "[DONE] Insert Completed!";
    exit();
}
function emptyInputLogin($email, $password) {
    if(empty($email) || empty($password)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function  loginUser($conn, $email, $password) {
    $emailExists = emailExists($conn, $email);

    if ($emailExists === false){
        echo "[ERROR] wrong login";
        exit();
    }

    $passwordHashed = $emailExists["password"];
    $chcekpassword = password_verify($password, $passwordHashed);

    if($chcekpassword === false){
        echo "[ERROR] Wrong Login";
        exit();
    }

    else if ($chcekpassword === true ){
        session_start();
        $_SESSION["user_id"] = $emailExists["user_id"];
        $_SESSION["user_name"] = $emailExists["name"];
        $_SESSION["is_admin"] = $emailExists["is_admin"];
        echo "[DONE] Logged In Successfully!";
        echo $_SESSION["user_name"];
        exit();
    }
}