<?php
session_start();
if(!isset($_SESSION['config'])){
    header('Location: ./Controladores/ControladorIndex.php');
    exit;
}