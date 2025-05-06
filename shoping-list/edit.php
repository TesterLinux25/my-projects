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
  if(isset($_POST['updatename'])){

     $shopping->name=$_POST['name'];
     $shopping->updatename($_POST['id']);

  }elseif(isset($_POST['updatequantity'])){
      
     $shopping->quantity=$_POST['quantity'];
     $shopping->updatequantity($_POST['id']);
   
  
  }elseif(isset($_POST['updateum'])){
      
    $shopping->um=$_POST['um'];
    $shopping->updateum($_POST['id']);
  
 
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


<h1>Edit my Shopping List</h1>

<a class="home" href="index.php">Home</a>




<div class="result">
  <table>

    <tr>
      <th>Done</th>
      <th>Name item</th>
      <th>Units</th>
      <th>UM</th>
     
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
      
        <td class="output1 " >
          <form  method="post">
              <input type="hidden" name="id" value="<?php echo $list['id']; ?>">
                <input 
                    style="text-decoration:<?php echo $list['done']==1?'line-through':'none'?>" 
                    type="text" 
                    class="updatel"
                    name="name" 
                    size='10'
                    placeholder="<?php echo $list['name']?>" 
                  
                >
                <button class="editbutton" type="submit" name="updatename">OK</button>
          </form>
         </td>
          
          <td   >
            <form  method="post">
                <input type="hidden" name="id" value="<?php echo $list['id']; ?>">
                  <input 
                    style=" text-decoration:<?php echo $list['done']==1?'line-through':'none'?>" 
                    type="text" 
                    class="updatel"
                    oninput="this.value=this.value.replace(/[^0-9 OR ^.]/g, '')"
                    size="3"
                    name="quantity" 
                    placeholder="<?php echo $list['quantity'] ?>"
                  
                    >
                    <button class="editbutton" type="submit" name="updatequantity">OK</button>
               </form>
              </td>
          </td>
          <td >
          <form  method="post">
                  <input type="hidden" name="id" value="<?php echo $list['id']; ?>">
                  <select name="um" >
                    <option value="Select" selected><?php echo $list['um'] ?></option>
                    <option value="qti">qty</option>
                    <option value="kg">kg</option>
                    <option value="g">g</option>
                    <option value="l">l</option>
                    <option value="ml">ml</option>
                </select>
            <button class="editbutton" type="submit" name="updateum">OK</button>
          </form>  
          </td>
         
       
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