<?php
include 'partials/header.php';

///list a table from database
$unu=$_SESSION['username'];
$doi=$_SESSION['id'];

$searchName='Otrivine';
//$sql="SELECT * FROM medicins  INNER JOIN users ON users.id=medicins.id_username WHERE username='$unu' AND name_m='$searchName'";
$sql="SELECT * FROM medicins  INNER JOIN users ON users.id=medicins.id_username WHERE username='$unu'";
$result=mysqli_query($conn, $sql);
$testt=mysqli_fetch_assoc($result);

echo $doi;
$error ="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
   $trei=$testt['id'];
    $id_username=mysqli_escape_string($conn, $_POST['id_username']);
    $name_m=mysqli_escape_string($conn, $_POST['name_m']);
    $quantity=mysqli_escape_string($conn, $_POST['quantity']);
    $notes=mysqli_escape_string($conn, $_POST['notes']);
    $date=mysqli_escape_string($conn, $_POST['expire_date']);

     //echo $name_m.' '.$quantity.' '.$notes.' '.$date;
    
     $sql2="INSERT INTO medicins ( id_username, name_m, quantity, notes, expire_date)VALUES ( '$doi', '$name_m', '$quantity', '$notes', '$date')";

    if(mysqli_query($conn, $sql2)){
        echo "New record create successfuly";
        header("Location: admin.php");
        exit;
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        header("Location: admin.php");
        exit;
    }
     
        
         
    
            // if(mysqli_query($conn, $sql2)){
            //     $_SESSION['logged_in']=true;
            //     $_SESSION['username']=$username;
            //     header("Location: http://localhost/my-projects/my-medicine-cupboard/add_medicin.php");
            //      exit;
            // }else{
            //     $error= "SOMETHING HAPPENED not data inserted" . mysqli_error($conn);
            // };
        }

    

?>

<div class="register">    
    
    <h1>Add a new medicine</h1> 


        <form action="" method='POST'>
        
            <input <?php echo isset($id_username)?$id_username: '' ?> type="hidden" name="id_username" >
            <label for="neme_m">Name medicine:</label>
            <input <?php echo isset($name_m)?$name_m: '' ?> type="text" name="name_m" required>
    
            <label for="quantity">Quantity:</label>
            <input <?php echo isset($quantity)?$quantity: '' ?> type="number"  name="quantity" required>
    
            <label for="notes">Notes:</label>
            <input <?php echo isset($notes)?$notes: '' ?>  type="text" name="notes" >

            <label for="expire_date">Expire date:</label>
            <input <?php echo isset($expire_date)?$expire_date: '' ?>  type="date" name="expire_date" >

            
            <input type="submit" value="Confirm" >
            <hr class="register_hr">

            <div class="anotherbutton">
                <p><a href="admin.php">Go to homepage</a></p>
                <p><a href="logout.php">Logout</a></p>
            </div>
            
                    
    
    
        </form>
    </div>

<?php include 'partials/footer.php' ?>