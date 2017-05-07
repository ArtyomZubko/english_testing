<?php
$dbname="english_testing";//имя БД
$dblogin="root";//логин
$dbpass="";//пароль
try { 
      $db = new PDO("mysql:host=localhost;dbname=$dbname", "$dblogin", "$dbpass", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'")); 
    } 
    catch(PDOException $e) 
         { 
            echo $e->getMessage();
            die("Ошибка подключения."); 
         }