<?php

    session_start();

    if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false ){
        header("location: login.php");
    }   

    $random1= rand(0,50);
    $random2= rand(0,50);
    $random3= rand(0,1);
   
    if ($random3==0){
        $result= $random1+$random2;
        $_SESSION['sign']="+";
    }else{
        $result= $random1-$random2;
        $_SESSION['sign']="-";
    }

    $_SESSION['result']=$result;
    $_SESSION['random1']=$random1;
    $_SESSION['random2']=$random2;
    

?>

<!DOCTYPE HTML>
<html>

    <head>
        <title>Math Game</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    </head>
    <body>

        <a href="logout.php" class="btn btn-success col-xs-offset-7" >logout</a><br/>
        <h1 class = "col-xs-offset-4">Math Game</h1><br/>

        <div class="row">
            <div class="col-xs-offset-3 col-xs-1" ><?php echo "<h3>". $random1."</h3>"; ?></div>
            <div class="col-xs-1"><?php if($random3==0){echo "<h3>+</h3>";} if($random3==1){echo "<h3>-</h3>";} ?></div>
            <div class="col-xs-1"><?php echo "<h3>". $random2."</h3>"; ?></div>
            <div class="col-xs-2"><h3>=</h3></div>
        </div><br/>    

        <form method="post" action="validate.php" >    
            <div class="row">        
                <div class="col-xs-offset-3 col-xs-4">
                    <input type="text" class="form-control" id="result" name="result" placeholder="Enter Answer" />
                </div>
            </div><br/><br/>

            <div class="row">                
                <input class="col-xs-offset-4 btn btn-primary" type="submit" value="Submit" />               
            </div>
        </form>

        <hr/>            
        
        <?php 
        
        if(isset($_SESSION['message'])){
            if($_SESSION['message'] == "Correct"){
                echo "<p class='col-xs-offset-4 text-success'><b>".$_SESSION['message']."</b></p>";
            }else if ($_SESSION['message'] == "You must enter a number for your answer"){
                echo "<p class='col-xs-offset-3 text-danger'><b>".$_SESSION['message']."</b></p>";
            }else{
                echo "<p class='col-xs-offset-4 text-danger'><b>".$_SESSION['message']."</b></p>";
            } 
        }

        ?>        
      
        <p class="col-xs-offset-4">Score: 
            <?php
            echo $_SESSION['countcorrect']." / ".$_SESSION['countall'];
            ?>
        <p>

    </body>
</html>