<?php 
    include_once 'auth.php';
    $connection = new mysqli($hostname, $username, $password, $database);
    
    $users =       "CREATE TABLE users (
                    user_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
                    user_name VARCHAR(32) NOT NULL, 
                    password VARCHAR (32) NOT NULL,
                    disposition CHAR(8),
                    INDEX (user_name(8)),
                    PRIMARY KEY(user_id)) ENGINE MyISAM";
    
    $messages =    "CREATE TABLE messages (
                    message_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
                    sender VARCHAR(32) NOT NULL,
                    reciever VARCHAR(32) NOT NULL,
                    timeSent TIMESTAMP NOT NULL,
                    content VARCHAR(4096),
                    INDEX (sender(6)), 
                    INDEX (reciever(6))) ENGINE MyISAM";

    $result = $connection->query($users);
    if (!$result) die($connection->error);
    else echo "Users table created or already exists<br/>";
    
    $result = $connection->query($messages);
    if (!$result) die($connection->error);
    else echo "Messages table created or already exists <br/>";
?>  