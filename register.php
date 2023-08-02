<?php
    session_start();
    require_once('includes/connect.php');

    if($_POST){
        $name = isset($_POST['name']) ? mysqli_real_escape_string($connection, $_POST['name']) : false;
        $lastname = isset($_POST['lastname']) ? mysqli_real_escape_string($connection, $_POST['lastname']) : false;
        $email = isset($_POST['email']) ? mysqli_real_escape_string($connection, $_POST['email']) : false;
        $password = isset($_POST['password']) ? mysqli_real_escape_string($connection, $_POST['password']) : false;

        $errors = array();

        if(!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)){
            $validatedName = true;
        }else{
                $errors['name'] =  "El nombre no es válido";
        }
    
        if(!empty($lastname) && !is_numeric($lastname) && !preg_match("/[0-9]/", $lastname)){
            $validatedLastName = true;
        }else{
            $errors['lastName'] =  "El apellido no es válido";
        }

        if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
            $validatedEmail = true;
        }else{
            $errors['email'] =  "El email no es válido";
        }

        if(!empty($password)){
            $validatedPassword= true;
        }else{
            $errors['password'] =  "La contraseña no es válida";
        }

        $saveUser = false;
        if(count($errors) === 0){
            $saveUser = true;
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Enable error reporting
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

            try {
                // Your code with the MySQLi query here
                $query = "INSERT INTO users VALUES(NULL,'" .$name. "','" .$lastname. "','" .$email. "','" .$hashedPassword. "', NOW())";
                $save = mysqli_query($connection, $query);
                
                // Continue with the rest of your code if the query is successful
                $_SESSION['registered'] = 'El registro a sido exitoso!';

            } catch (mysqli_sql_exception $e) {
                // Handle the error gracefully
                var_dump(mysqli_errno($connection));
                    if(mysqli_errno($connection) == 1062){
                        $errors['duplicated'] = 'El email que has introducido ya existe';
                    }else{
                        $errors['general'] = 'El usuario no ha podido ser registrado';
                    } 
                
            }
        }

        $_SESSION['errors'] = $errors;      
    }    

?>