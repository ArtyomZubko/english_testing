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
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
</head>

<body>
    <header class="main-header">
        <div class="container">

    


    </header>


<section class="registration">
<div class="container">
<h2 class="login-title">Регистрация</h2>
<form action="" class="signin-form" method="post">
    <table>
    <tr>
            <td class="title">
                <label for="login">Логин:</label>
            </td>
            <td class="field">
                <input type="text" id="login" name="login" placeholder="Введите логин">
            </td>
        </tr>
        <tr>
            <td class="title">
                <label for="user-name">Имя:</label>
            </td>
            <td class="field">
                <input type="text" id="user-name" name="user_name" placeholder="Введите имя">
            </td>
        </tr>
            <tr>
            <td class="title">
                <label for="user-surname">Фамилия:</label>
            </td>
            <td class="field">
                <input type="text" id="user-surname" name="user_surname" placeholder="Введите фамилию">
            </td>
        </tr>
        <tr>
            <td class="title">
                <label for="password-field">Пароль:</label>
            </td>
            <td class="field">
                <input type="password" id="password-field" name="password-field" placeholder="Введите пароль">
            </td>
        </tr>
            <td class="title">
                <label for="password-field">Повторите пароль:</label>
            </td>
            <td class="field">
                <input type="password" id="password-repeat-field" name="password_repeat" placeholder="Повторите пароль">
            </td>
        </tr>
        <tr>
            <td class="field">
                <input type="submit" class="btn" value="Регистрация" name="registration_confrm">
            </td>
        </tr>
    </table>
</form>
</div>
</section>




</body>
</html>