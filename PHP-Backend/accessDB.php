<?php 
    include_once 'auth.php';
    $connection = new mysqli($hostname, $username, $password, $database);
    
    function queryMysql($query) {
        global $connection;
        $result = $connection->query($query);
        if(!$result) die($connection->error);
        return $result;
    }
    
    function destroySession() {
        $_SESSION = array();
        
        if (session_id() != "" || isset($_COOKIE[session_name()]))
            setcookie(session_name(), '', time()-2592000, '/');
            
            session_destroy();
    }
    
    function sanitizeString($str) {
        global $connection;
        $var = strip_tags($str);
        $var = htmlentities($str);
        $var = stripslashes($str);
        
        return $connection->real_escape_string($str);
    }
    
    function encryptString($str) {
        $saltBeginning = "w4Q!*";
        $saltEnd = "6t$2B";
        $str = $saltBeginning . $str . $saltEnd;
        $str = hash("sha256", $str);
        
        return $str;
    }
?>