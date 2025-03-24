<?php
include 'partials/header.php';

$error ="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=mysqli_escape_string($conn, $_POST['username']);
    $email=mysqli_escape_string($conn, $_POST['email']);
    $password=mysqli_escape_string($conn, $_POST['password']);
    $confirm_password=mysqli_escape_string($conn, $_POST['confirm_password']);

    if($password !==$confirm_password){
        $error= "Password do not match";
    } else {
        //check if username already exists
        $sql="SELECT * FROM users WHERE username='$username' LIMIT 1";
        $result=mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)===1){
            $error="Username already exists, Please choose another";
        }else{
        ///hashing password
            $passwordHash=password_hash($password, PASSWORD_DEFAULT);
        
            $sql="INSERT INTO users (username,email, password) VALUES('$username', '$email', '$passwordHash')";
    
            if(mysqli_query($conn, $sql)){
                $_SESSION['logged_in']=true;
                $_SESSION['username']=$username;
                header("Location: admin.php");
                 exit;
            }else{
                $error= "SOMETHING HAPPENED not data inserted" . mysqli_error($conn);
            };
        }



        ///show result
        // if($result){
        //     echo"<pre>";
        //     var_dump($result);
        //     echo"</pre>";
        // }


        ///insert data in database
    }
}
?>

<div class="register">    
    
    <h1>Register Form</h1> 

    <?php if($error): ?>
                <p style="color:red">
                    <?php echo $error ?>
                </p>
                <?php endif ?>

        <form action="" method='POST'>
            <label for="username">Username</label>
            <input <?php echo isset($username)?$username: '' ?> type="text" name="username" required>
    
            <label for="email">Email:</label>
            <input <?php echo isset($email)?$email: '' ?> type="email" name="email" required>
    
            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" required>

            <hr class="register_hr">

            <input type="submit" value="Confirm" >

            <div class="register_login">
                <p>Already have an account: <a href="login.php">Sign in</a></p>
            </div>
                    
    
    
        </form>
    </div>

<?php include 'partials/footer.php' ?>