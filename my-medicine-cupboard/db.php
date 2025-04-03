<?php 

$conn=mysqli_connect(hostname:"localhost", username:"root", password:"", database: "my_cupboard");

if($conn){
    //echo "Connected";
}else{
    echo "Not connected".mysqli_error($conn);
}

function check_query( $result){
    global $conn;
    if(!$result){
        return "Error" .mysqli_error($conn);
    }

    return true;

}

// delete medicin
function delete_medicin($conn, $id_m){
    $sql1="DELETE FROM medicins WHERE id_medicin='$id_m'";
            return $result=mysqli_query($conn, $sql1);
}

//update medicin
function update_medicin($conn, $id_medicin, $new_name_m,$new_quantity, $new_notes, $new_expire_date){
    $sql="UPDATE medicins SET name_m='$new_name_m', quantity='$new_quantity', notes='$new_notes', expire_date ='$new_expire_date' WHERE  id_medicin=$id_medicin";
    return $result= mysqli_query($conn, $sql);
}




?>
