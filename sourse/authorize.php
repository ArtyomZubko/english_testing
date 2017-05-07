<?php
// открываем сессию
session_start();


$SERVER_ROOT = "http://english-testing.ru";

if(preg_match("@$SERVER_ROOT@",$_SERVER["HTTP_REFERER"])) { //проверяем, откула было перенаправление
    if (!empty($_POST['login'])) {

        include("db_connection.php");
                
        $passwd = $_POST['password-field'];
        $login = $_POST['login-field'];     
       
        //находим логин+пароль в базе
        $sql = "SELECT `login`,`password` FROM `users`  
                WHERE `login`='$login'
                LIMIT 0,30"; 

        $result = $db->query($sql)->fetchAll();      
        $user_passwd = $result[0]['password'];
         
        if ($result!=NULL && hash_equals($user_passwd,crypt($passwd,$user_passwd))) { //если нашли
            // запоминаем имя пользователя
            $_SESSION['logged_user'] = $_POST['login-field'];
            // и переправляем его на пользоватльскую страницу
            header("Location: userpage.php");
            exit;
        }
    }
    elseif(!empty($_POST['register'])) { //если нажата кнопка регистрации
        header("Location: register.php");
        exit;
     }
    if ($_POST['logout']) session_destroy();
}

?>
