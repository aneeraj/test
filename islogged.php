<?php
  session_start();
  function islogged(){
    if (isset($_SESSION["userlogged"],$_SESSION["uname"]) && $_SESSION["userlogged"]=="True") {
      return 1;
    }else if (isset($_COOKIE["userlogged"],$_COOKIE["useremail"],$_COOKIE["isNGO"],$_COOKIE["uname"]) && $_COOKIE["userlogged"]=="True") {
      $_SESSION["userlogged"] = $_COOKIE["userlogged"];
      $_SESSION["useremail"] = $_COOKIE["useremail"];
      $_SESSION["isNGO"] = $_COOKIE["isNGO"];
      $_SESSION["uname"] = $_COOKIE["uname"];
      $_SESSION["hash"] = $_COOKIE["hash"];
      return 1;
    }
    return 0;
  }
?>
