<?php
session_start();

if(is_numeric($_POST['result'])){
    if ($_POST['result'] == $_SESSION['result']){
        $_SESSION['message']="Correct";
        $_SESSION['countcorrect'] +=1;
        $_SESSION['countall']+=1;
    } else{
        $_SESSION['message']="Incorrect, ". $_SESSION['random1'].$_SESSION['sign'].$_SESSION['random2']."=".$_SESSION['result'];
        $_SESSION['countall']+=1;
    }
} else{
    $_SESSION['message']="You must enter a number for your answer";
}

header("location:index.php");
die();

?>