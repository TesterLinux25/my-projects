<?php echo 'Welcome! ' ?>

<?php
include "partials/header.php";






///list a table from database
$unu=$_SESSION['username'];
$searchName='Otrivine';
//$sql="SELECT * FROM medicins  INNER JOIN users ON users.id=medicins.id_username WHERE username='$unu' AND name_m='$searchName'";
$sql="SELECT * FROM medicins  INNER JOIN users ON users.id=medicins.id_username WHERE username='$unu'";
$result=mysqli_query($conn, $sql);

if($_SERVER["REQUEST_METHOD"]==="POST"){
    if(isset($_POST["edit_medicin"])){
        $id_medicin=mysqli_real_escape_string($conn, $_POST['id_medicin']);
        $new_name_m=mysqli_real_escape_string($conn, $_POST['name_m']);
        $new_quantity=mysqli_real_escape_string($conn, $_POST['quantity']);
        $new_notes=mysqli_real_escape_string($conn, $_POST['notes']);
        $new_expire_date=mysqli_real_escape_string($conn, $_POST['expire_date']);
       

        

       
       $query_status=check_query(update_medicin($conn, $id_medicin,$new_name_m, $new_quantity, $new_notes, $new_expire_date));

       $_SESSION['message']='User update succesfully';
       $_SESSION['msg_type']='success';
       if($query_status===true){
           // function create in functions
           header( "Location:http://localhost/my-projects/my-medicine-cupboard/admin.php");
           exit;
           
       }
       
    } 
        
    
}

?>
    <div class="edit">
       <!-- <h3>Welcome <?php echo $_SESSION['username']?></h3>-->
    
    
        <h1 class="title">Update an item</h1>
        
        
        
        <table>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Notes</th>
                <th>Expire Date</th>
                <th>Confirm</th>
                
            </tr>
            <?php while($row=mysqli_fetch_assoc($result)): ?>

                            <tr>
                            
                            <form method="POST"  >
                                <input type="hidden" name="id_medicin" value="<?php echo $row["id_medicin"]; ?>">
                              <td>  <input type="text" name="name_m" value="<?php echo $row["name_m"]; ?>"></td>
                              <td> <input type="number" name="quantity"  value="<?php echo $row["quantity"] ?>" required></td> 
                             <td>   <input type="text" name="notes" value="<?php echo $row["notes"] ?>" required></td>
                             <td> <input type="date" name="expire_date" value="<?php echo $row["expire_date"] ?>" required></td> 
                             
                             <td><button class="edit" type="submit" name="edit_medicin">Confirm</button></td>
                         </form>
                            
                            </tr>
                            
                            
                            
                            <?php endwhile; ?>                                   
                            
                        </table>
                        
<br><br><br>
<div class="anotherbutton">
            <a href="admin.php">Home</a>
    <a href="logout.php">Logout</a>
            </div>
</div>


<?php
     include "partials/footer.php";
     mysqli_close($conn)
     
?>