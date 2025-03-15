<?php
include 'partials/header.php'
?>

<div class="register">    
    
    <h1>Register Form</h1> 

        <form action="">
            <label for="username">Username</label>
            <input type="text" name="username" required>
    
            <label for="email">Email:</label>
            <input type="email" name="email" required>
    
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