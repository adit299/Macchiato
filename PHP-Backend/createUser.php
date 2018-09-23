<?php 
    include_once 'accessDB.php';
    
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    
    addUser($user, $pass);
    
    function addUser($user, $pass) {
        $user = sanitizeString($user);
        $pass = encryptString($pass);
        $query = "INSERT INTO users (user_name, password) VALUES ('$user','$pass')";
        queryMysql($query);
    }

?>