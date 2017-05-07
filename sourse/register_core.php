<?php
if (!empty($_POST['login'])&&!empty($_POST['user_name'])&&!empty($_POST['user_surname'])&&!empty($_POST['password-field'])
    &&($_POST['password-field']==$_POST['password_repeat'])) {
    try { 
            $db = new PDO("mysql:host=localhost;dbname=english_testing", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'")); 
        } 
            catch(PDOException $e) 
                { 
                    echo $e->getMessage();
                    die("Ошибка подключения."); 
                }
                $login=$_POST['login'];
                $password=crypt($_POST['password-field']);
                $name=$_POST['user_name'];
                $surname=$_POST['user_surname'];
                
                //проверяем, не существует ли уже такой пользователь
                $sql = "SELECT `login` FROM `users`  
                WHERE `login`='$login'
                LIMIT 0,30";           
               
                if ($db->query($sql)->fetchAll()==NULL){ //если пользователь новый
                    //заносим в базу
                    $db->exec("INSERT INTO users (login,password,name,surname,usermode) VALUES('$login','$password','$name','$surname','2')");

                    session_start();
                    $_SESSION['logged_user'] = $_POST['login'];
                    header("Location: userpage.php");
                } else 
                {
                    echo "Такой пользователь уже существует!";  
                }


}