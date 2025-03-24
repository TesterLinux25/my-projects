<?php
include "partials/header.php";
include "partials/footer.php"

?>

<div class="container">
    <h1>Welcome to admin <?php echo $_SESSION['username']?></h1>


    
    <table>
        <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Notes</th>
        </tr>

    <?php 
    ///list a table from database
    $unu=$_SESSION['username'];
    $searchName='Otrivine';
    $sql="SELECT * FROM medicins  INNER JOIN users ON users.id=medicins.id_username WHERE username='$unu' AND name_m='$searchName'";
    $result=mysqli_query($conn, $sql);

    $resultCheck=mysqli_num_rows($result);
        if($resultCheck>0){

            while($row=mysqli_fetch_assoc($result)){
                echo 

                           " <tr>
                            <td>".$row['name_m']."</td>
                            <td>".$row['quantity']."</td>
                            <td>".$row['notes']."</td>
                            <td>".$row['username']."</td>
                        </tr>";
                        
                    }
                }
                            
                                               
                ?>
                </table>

<br><br><br>
    <a href="logout.php">Logout</a>
</div>
