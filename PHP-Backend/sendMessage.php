<?php 
    include_once 'accessDB.php';
    
    $send = $_POST['sender'];
    $recieve = $_POST['reciever'];
    $content = $_POST['message'];
    
    sendMessage($send, $recieve, $content);
    
    function sendMessage($send, $recieve, $content) {
        $send = sanitizeString($send);
        $recieve = sanitizeString($recieve);
        $content = sanitizeString($content);
        
        $query = "INSERT INTO users (sender, reciever, content) VALUES ('$send','$recieve','$content')";
        queryMysql($query);
    }
?>