
<?php 



$pdo= new PDO('mysql:host=localhost;port=3306;dbname=products_crud','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$errors=[];
$title='';
$price='';
$description='';

if ($_SERVER['REQUEST_METHOD']==='POST'){
$title= $_POST['title'];
$description= $_POST['desc'];
$price= $_POST['price'];
$date=date('Y-m-d H:i:s');

if(!$title){
  $errors[]="Product title is required";
}
if(!$price){
  $errors[]="Product price is required";
}

if(empty($errors)){
$statement=$pdo->prepare("INSERT INTO products(title,description,image,price,create_date) VALUES ( :title, :description,:image,:price,:date)");
$statement->bindValue(':title',$title);
$statement->bindValue(':image','');
$statement->bindValue(':description',$description);
$statement->bindValue(':price',$price);
$statement->bindValue(':date',$date);
$statement->execute();
}
}
?>

<!DOCTYPE html>
<html>
<style>
<?php 
include 'style.css'; 

?>

</style>
<body>



<div class="create-page">
  <div class="form">
    <?php if(!empty($errors)):?>
    <div class="error">
      <?php foreach($errors as $error):?>
        <div><?php echo $error;?></div>
      <?php endforeach; ?>
    </div>
    <?php endif;?>
    <form action="create.php" method="post" class="create-form">
      <label>Product Image</label>
      <input type="file" name="image" />
      <label>Product Title</label>
      <input type="text" name="title" value="<?php echo $title?>"/>
      <label>Description</label>
      <textarea name="desc" ><?php echo $description?></textarea>
      <label>Price</label>
      <input type="number" step=".01" name="price" value="<?php echo $price?>"/>
      <button  type="submit" value="submit">Create</button>
    </form>
  </div>
</div>
 
</body>
</html>
