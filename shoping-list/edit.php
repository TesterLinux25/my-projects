<?php 
include "partials/head.php";
?>


<h1>Edit my Shopping List</h1>


<a class="home" href="index.php">Homepage</a>
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
    <tr>
      <td>
        <div class="checkbox">
          <form method="post">
            <input type="checkbox" name="checked" />
          </form>
        </div>
      </td>

      <td style="width: 50%" class="output1">bread</td>
      <td class="output2">12</td>
      <td class="output3">qti</td>
      <td><a class="isDisabled" href="#">Edit</a></td>
      <td>
        <button type="submit">Delete</button>
      </td>
    </tr>
    <tr>
      <td>
        <div class="checkbox">
          <form method="post">
            <input type="checkbox" name="checked" />
          </form>
        </div>
      </td>

      <td class="output1">milk</td>
      <td class="output2">2</td>
      <td class="output3">l</td>
      <td><a class="edit" href="#">Edit</a></td>
      <td>
        <a class="delete" onclick="myConfirmation()" ; href="#">-</a>
      </td>
    </tr>
    <tr>
      <td>
        <div class="checkbox">
          <form method="post">
            <input type="checkbox" name="checked" />
          </form>
        </div>
      </td>

      <td class="output1">flower</td>
      <td class="output2">500</td>
      <td class="output3">ml</td>
      <td><a class="edit" href="#">Edit</a></td>
      <td>
        <a class="delete" onclick="myConfirmation()" ; href="#">-</a>
      </td>
    </tr>
  </table>
</div>
<script>
  function myConfirmation() {
    let text = "Do you want to delete?";
    if (confirm(text) == true) {
      alert("are you sure");
    }
  }
</script>

<?php 
include "partials/footer.php";
?>