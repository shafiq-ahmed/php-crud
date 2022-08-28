
<?php 
$pdo= new PDO('mysql:host=localhost;port=3306;dbname=products_crud','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$statement=$pdo->prepare('SELECT * FROM products ORDER BY  create_date DESC');
$statement->execute();
$products=$statement->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html>
<style>
<?php include 'style.css'; ?>

</style>
<body>




<div id="demo">
  <h1>Material Design Responsive Table</h1>
  <h2>Table of my other Material Design works (list was updated 08.2015)</h2>
  <p><a href="create.php" class="action-button">Create Produt</a></p>
  <!-- Responsive table starts here -->
  <!-- For correct display on small screens you must add 'data-title' to each 'td' in your table -->
  <div class="table-responsive-vertical shadow-z-1">
  <!-- Table starts here -->
  <table id="table" class="table table-hover table-mc-light-blue">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Price</th>
          <th>Created Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($products as $i=> $product): ?>
        <tr>
          <td data-title="ID"><?php echo $product['id']?></td>
          <td data-title="Name"><?php echo $product['title']?></td>
          <td data-title="Link"><?php echo $product['price']?></td>
          <td data-title="Status"><?php echo $product['create_date']?></td>
          <td><input type="button" name="next" class="edit action-button" value="Edit" /><input type="button" name="next" class="next action-button" value="Delete" /></td>
        </tr>
      <?php endforeach; ?>  
        
      </tbody>
    </table>
  </div>
  
 
</body>
</html>
