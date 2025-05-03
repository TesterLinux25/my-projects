<?php 
include "partials/head.php";
include "config/Db.php";
include "classes/Shoppingl.php";
session_start();




$database= new Db();
$db=$database->connect();

//class list
$shopping=new Shoppingl($db);


//thick 

if($_SERVER['REQUEST_METHOD']==='POST'){
  if(isset($_POST['add_task'])){
    $shopping->name=$_POST['name'];
    $shopping->quantity=$_POST['quantity'];
    $shopping->um=$_POST['um'];
    $shopping->done=0;

    $shopping->create();

  }elseif(isset($_POST['checked'])){
    $shopping->complete($_POST['id']);
    
  }elseif(isset($_POST['unchecked'])){
    $shopping->uncomplete($_POST['id']);
   
        
  }elseif(isset($_POST['delete'])){
    $shopping->delete($_POST['id']);
  }elseif(isset($_POST['deleteall'])){
    $shopping->deleteall();
  }
}




//fetch list
$listll=$shopping->read();
//var_dump($list);



?>


<h1>My Shopping List</h1>

<form method="post">
  <div class="totalinputs">
    <div class="inputs">
      <input type="text" name="name" id="" placeholder="Item"  required/>
      <input
        type="text"
        name="quantity"
        oninput="this.value=this.value.replace(/[^0-9 OR ^.]/g, '')"
        size="5"
        placeholder="QTY/Weight"
        required
      />
      <select name="um">
        <option value="qti">qty</option>
        <option value="kilogram">kg</option>
        <option value="grams">g</option>
        <option value="liter">l</option>
        <option value="mililiter">ml</option>
      </select>
      
     <button class="add" type="submit" name="add_task">+ Add</button>
      
    </div>
  </div>
</form>

<div class="result">
  <table>

    <tr>
      <th>Done</th>
      <th>Name item</th>
      <th>Quantity</th>
      <th>UM</th>
      <th>Update</th>
      <th>Delete</th>
    </tr>
    
      <?php while($list=$listll->fetch_assoc()): ?>
        <tr>
        <td>
        <div class="checkbox">
        <?php if($list['done']==1): ?>
          <form method="POST">
            <input type="hidden" name="id" value="<?php echo $list['id']; ?>">
            
            <button type='submit' name='checked' ><i class="fa-solid fa-check"></i></button>
          </form>
          <?php else: ?>
          <form method="POST">
            <input type="hidden" name="id" value="<?php echo $list['id']; ?>">
            
            <button  type='submit' name='unchecked'><i class="fa-regular fa-rectangle"></i>x</button>
          </form>
          <?php endif;?>
        </div>
          
        </td>
        <td style="width: 50%; text-decoration:<?php echo $list['done']==1?'line-through':'none'?>" class="output1"><?php echo $list['name'] ?> </td>
        <td style=" text-decoration:<?php echo $list['done']==1?'line-through':'none'?>" class="output2" style=''><?php echo $list['quantity'] ?></td>
        <td class="output3"><?php echo $list['um'] ?></td>
        <td><a class="edit" href="edit.php">Edit</a></td>
      <td >
        <form  method="POST" onsubmit="return confirmd()">
          <input type="hidden" name="id" value="<?php echo $list['id']; ?>">
          
          <button  class="delete" type="submit" name="delete"  >-</button>
        </form>
        
      </td>
      </tr>
      <?php endwhile; ?>
    
    <tr>
      
  </table>
  
</div>
<div class="deleteprint">

  <form action="" method="post" onsubmit="return confirmd()">
         
   <button class="deleteall" name="deleteall" type="submit">Delete all</button>
        </form>
        
        <form action="" method="post">
          <button class="print" type="submit" name="print">Print</button>
        </form>
</div>
    
    <script>
      let text="Are you sure  you want to delete";
      function confirmd(){
        
        return confirm(text)
      }
     
      
    </script>

<?php 
include "partials/footer.php";
?>