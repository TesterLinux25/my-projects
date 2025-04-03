<?php
include 'partials/header.php';



if(isset($_SESSION['logged_in'])&& $_SESSION['logged_in']===true){
    header("Location: admin.php");
    exit;
}

$error="";


if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=mysqli_escape_string($conn, $_POST['username']);
    $password=mysqli_escape_string($conn, $_POST['password']);

    $sql="SELECT * FROM users WHERE username='$username' LIMIT 1";
    // $sql1="SELECT username FROM users";
    // $result=mysqli_query($conn, $sql1);
    // $user=mysqli_fetch_assoc($result);
    // var_dump($user);

    $result=mysqli_query($conn, $sql);
   // var_dump($result);

    if(mysqli_num_rows($result)===1){
        $user=mysqli_fetch_assoc($result);

        if(password_verify($password, $user['password'])){
            $_SESSION['logged_in']=true;
            $_SESSION['username']=$user['username'];
            header("Location: admin.php");
             exit;
        }else{
            $error= " Invalid username or password";
            
        }
    }else{
        echo " User not found";
    }

}



?>




    <div class="register">    

        <h1>Login Form</h1>  

        <?php if($error): ?>
                <p style="color:red">
                    <?php echo $error ?>
                </p>
                <?php endif; ?>  


            <form action="" method="POST">
                <label for="username">  Username</label>
                <input type="text" name="username" required>
    
    
                <label for="password">Password:</label>
                <input type="password" name="password" required>

                  
                <hr class="register_hr">


                <input type="submit" value="Confirm" >

                <div class="register_login">
                     <p>Dont have an account: <a href="register.php">Register form</a></p>
                </div>
                    
    
    
            </form>
    </div>

    <!-- is optional, but speed up , the server doesn't check if conectin is close ?-->
<?php
mysqli_close($conn);
?>