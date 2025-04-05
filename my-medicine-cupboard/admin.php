<?php
include "partials/header.php";






///list a table from database
$unu=$_SESSION['username'];
//$searchName='Otrivine';
$sql="SELECT * FROM medicins  INNER JOIN users ON users.id=medicins.id_username WHERE username='$unu' ";
$result=mysqli_query($conn, $sql);
if($_SERVER["REQUEST_METHOD"]==="POST"){
    if(isset($_POST['search_medicin'])){
       // echo 'unu';
        $searchName1=mysqli_real_escape_string($conn, $_POST['search']);
       // echo $searchName1;
        $sql="SELECT * FROM medicins  INNER JOIN users ON users.id=medicins.id_username WHERE username='$unu' ";
             $result=mysqli_query($conn, $sql);
        if($searchName1){
            $sql="SELECT * FROM medicins  INNER JOIN users ON users.id=medicins.id_username WHERE username='$unu' AND name_m LIKE '%$searchName1%' ";
            $result=mysqli_query($conn, $sql); 
            header("admin.php");
        }else{
            $sql="SELECT * FROM medicins  INNER JOIN users ON users.id=medicins.id_username WHERE username='$unu' ";
             $result=mysqli_query($conn, $sql);
             header("admin.php");
        }
    }}

//$sql="SELECT * FROM medicins  INNER JOIN users ON users.id=medicins.id_username WHERE username='$unu' AND name_m='$searchName'";






if($_SERVER["REQUEST_METHOD"]==="POST"){
    if(isset($_POST['delete_medicin'])){
        $id_m=mysqli_real_escape_string($conn, $_POST['id_medicin']);
        $name_m=mysqli_real_escape_string($conn, $_POST['name_m']);
        echo $id_m;
        $sql1="DELETE FROM medicins WHERE id_medicin='$id_m'";
        $query_status=check_query(delete_medicin($conn, $id_m));
         $_SESSION['message']="Medicine $name_m delete succesfully";
         $_SESSION['msg_type']='success';
        if($query_status=== true){
            header("Location:http://localhost/my-projects/my-medicine-cupboard/admin.php");
            exit;

        }}
    }





?>
    <div class="admin">
        <h3>Welcome  <?php echo $_SESSION['username']?></h3>
    
    
        <h1 class="title">Medicines list</h1>
    <?php if(isset($_SESSION['message'])): ?>
    <div class="notification <?php  echo $_SESSION['msg_type']; ?>">
        <?php 
        
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            unset($_SESSION['msg_type']);
        
        ?>
    </div>
<?php endif; ?>
        
        <form action="" class="search_form" method="POST">
        <input type="hidden" name="id_medicin" value="<?php echo $row["id_medicin"]; ?>">
          <input type="hidden" name="name_m" value="<?php echo $row["name_m"]; ?>">
          <input class="search_input" placeholder="Search for a medicine" type="text" name="search" id="search">
          <button class="search_button"  type="submit" name="search_medicin"><i class="fa fa-search"></i></button>
        </form>
        
        <table>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Notes</th>
                <th>Expire Date</th>
                <th>Modify</th>
                <th>Delete</th>
            </tr>
            <?php while($row=mysqli_fetch_assoc($result)): ?>

                            <tr>
                            <td><?php echo $row['name_m'] ?></td>
                            <td><?php echo $row['quantity'] ?></td>
                            <td><?php echo $row['notes'] ?></td>
                            <td><?php echo $row['expire_date'] ?></td>
                            <td>
                               <form action="edit.php" method="post">
                                <input type="submit" value="Edit">
                               </form>
                                                          
                                
                
                            </td>
                            <td>
                                <form method="POST" class="table_form" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this medicine?');">
                                    <input type="hidden" name="id_medicin" value="<?php echo $row["id_medicin"]; ?>">
                                    <input type="hidden" name="name_m" value="<?php echo $row["name_m"]; ?>">
                                    <button class="delete"  type="submit" name="delete_medicin">Delete</button>
                                </form>
                            </td>                          
                        </tr>
                       
                        
               
                            
            <?php endwhile; ?>                                   
            
                </table>

<br><br><br>
<div class="anotherbutton">
    
    <a href="add_medicin.php">Add a new medicine</a><br>
    <a href="logout.php">Logout</a>
</div>

</div>
<?php
     include "partials/footer.php";
     mysqli_close($conn)
     
?>
