<?php
include('register_core.php');
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