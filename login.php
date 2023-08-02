<?php

use function PHPSTORM_META\type;

    session_start();
    require_once('includes/connect.php');


    $errors = array();

    if($_POST){
        $email = isset($_POST['email']) ? mysqli_real_escape_string($connection, $_POST['email']) : false;
        $password = isset($_POST['password']) ? $_POST['password'] : false;

        echo $password . '<br>';
        if(count($errors) === 0){
            // Enable error reporting
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

            try {
                // Your code with the MySQLi query here
                $query = "SELECT * FROM users WHERE email = '$email'";
                $result = mysqli_query($connection, $query);

                if(mysqli_num_rows($result) === 1){
                    $user = mysqli_fetch_assoc($result);

                    $verify = password_verify($password, $user['password']);
                    if($verify){
                        $_SESSION['logged'] = true;
                        $_SESSION['user'] = $user;
                    }else{
                        $errors['incorrectcredentials'] = 'Login incorrecto';   
                    }
                }

            } catch (mysqli_sql_exception $e) {
                // Handle the error gracefully
                    var_dump(mysqli_errno($connection)); 
                    $errors['incorrectcredentials'] = 'Login incorrecto';   
            }
        }

        $_SESSION['errors'] = $errors;      
    }

    header('Location: index.php');

    

?>
