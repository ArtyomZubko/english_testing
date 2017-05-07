<?php
// убираем всё лишнее из адресной строки
// функция unset() <освобождает> переменную
unset($_SESSION['logged_user']);

// открываем сессию
session_start();

if(!isset($_SESSION['logged_user'])){
    header("Location: index.php");
    exit;
}
if ($_POST['logout']){
    session_destroy();
    header("Location: ../index.php");
}
?>
<html>
<body>
Привет, <?php echo $_SESSION['logged_user']; ?>, ты на секретной странице!
<form action="" method="post"> <input type="submit" name="logout" value="exit"></form>


</body>
</html>
