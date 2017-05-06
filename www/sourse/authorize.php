<?php
// открываем сессию
session_start();

$SERVER_ROOT = "http://english-testing.ru";

if(preg_match("@$SERVER_ROOT@",$_SERVER["HTTP_REFERER"])) {
    if ($_POST['login']) {

        try { 
            $db = new PDO("mysql:host=localhost;dbname=english_testing", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'")); 
        } 
            catch(PDOException $e) 
                { 
                    echo $e->getMessage();
                    die("Ошибка подключения."); 
                }
                
        $sql = "SELECT `login`,`password` FROM `users` WHERE `password`='1' LIMIT 0,30"; 
        $result = $db->query($sql)->fetchAll();      
     
        foreach ($result as $value)
        {
                if(($_POST['login-field']==$value['login'])&&($_POST['password-field']==$value['password']))
                $matching=true;                    
        }

        if ($matching==true) {
            // запоминаем имя пользователя
            $_SESSION['logged_user'] = $_POST['login-field'];
            // и переправляем его на пользоватльскую страницу
            header("Location: userpage.php");
            exit;
        }
    }
    if ($_POST['logout']) session_destroy();
}

?>
<html><body>
Вы ввели неверный пароль!
</body></html>