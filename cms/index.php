<?php
session_start();
if(isset($_SESSION['nomeUser'])){
  require_once("views/cms.php");
}else{
  require_once("views/login-cms.php");
}
?>
