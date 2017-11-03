<?php 
    session_start();
   
    $cred=file_get_contents("credentials.config");
    $curusers = explode(' ', $cred);

    $user=array();
    $pass=array();

    for ($i=0; $i < count($curusers); $i++){
        $curcred=explode(',',$curusers[$i]);
        $user[$i]=$curcred[0];
        $pass[$i]=$curcred[1];
    }

    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
        header("location=index.php");
    }

    if(isset($_POST['username']) && isset($_POST['password'])){
        for ($i=0; $i < count($curusers); $i++){
            if($_POST['username'] == $user[$i] && $_POST['password'] == $pass[$i]){
                $_SESSION['logged_in'] = true;
                $_SESSION['countcorrect']=0;
                $_SESSION['countall']=0;
                unset($_SESSION['message']);
                header("location:index.php");
            }
        }

        $error= "The username or password is invalid.";
    } 
 ?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Math Game Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    </head>
    <body>
        <div class="contianer">
            <h1 class="col-sm-offset-3">Please login to enjoy our math game.</h1>

            <p class="col-sm-offset-4 text-danger"> <?php if(isset($error)) echo $error ?></p>
            <form class="form-horizontal" role="form" action="login.php" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Email:</label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control" id="username" name="username" placeholder="Email" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="pwd">Password:</label>
                    <div class="col-sm-4">          
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                </div>
               
                <div class="form-group">        
                    <div class="col-sm-offset-4 col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>