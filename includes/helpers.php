<?php

    function showError($errors, $field){
        $alert = '';

        if(isset($errors[$field]) && !empty($field)) $alert = "<div class='alert alert-error'>" .$errors[$field]. "</div>" ;

        return $alert;
    }

    function deleteErrors(){
        if(isset($_SESSION['errors'])) unset($_SESSION['errors']);
        if(isset($_SESSION['registered'])) unset($_SESSION['registered']);
    }

    function getCategories(){
        global $connection;

        $query = "SELECT * FROM categories";
        $categories = mysqli_query($connection, $query);

        $result = false;
        if($categories && mysqli_num_rows($categories) >= 1 ){
            return $result = $categories;
        }

        return $result;
    }

?>