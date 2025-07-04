 <div class="container mt-3">
      <h1 class="text-center">Articles</h1>
      <a href="<?php echo ROOT_PATH?>articles/add" class="btn btn-info">Add new article</a>
      <?php foreach($viewmodel as $item): ?>
      <div class="container p-5 my-5 bg-light text-dark">
        <h1><?php echo $item['title']?></h1>
        <small><?php echo $item['create_at']?></small>
        <hr>
        <p>
         <?php echo $item['content']?>
        </p>
        <p>Author: <?php echo $item['username']?></p>
      </div>
     <?php endforeach; ?>
    </div>