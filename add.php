<?php

include('config/db_connect.php');

$name = $email = $comment = '';
$error = array('email'=>'', 'name'=>'', 'comment'=> '');

if(isset($_POST['submit'])){

    if(empty($_POST['email'])){
        $error['email'] = 'An email is required <br/>';

    }else{
        $email = $_POST['email'];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error['email'] = 'email must be a valid email address'; }}
     


    if(empty($_POST['name'])){
        $error['name'] = 'A name is required <br/>';

    }else{
        $name = $_POST['name'];
    if(!preg_match('/^[a-zA-Z]+$/' , $name)){
        $error['name'] = 'name must be a valid email address' ;
    }
}


    if(empty($_POST['comment'])){
        $error['comment'] = 'An email is required <br/>';
    
    }else{
        $comment = $_POST['comment'];
    if(!preg_match('/^[a-zA-Z]+$/'  ,$comment)){
        $error['comment'] = 'comment must be valid'; 
    }
}
}


if(array_filter($error)){

}else {
    $name = mysqli_real_escape_string($conn, isset($_POST['name']) ? $_POST['name'] : '');
    $email = mysqli_real_escape_string($conn, isset($_POST['email'])  ? $_POST['email'] : '');
    $comment = mysqli_real_escape_string($conn, isset($_POST['comment']) ?  $_POST['comment'] : '');

    $sql = "INSERT INTO comments(name, email, comment) VALUES('$name','$email','$comment')";
    
    
    if(mysqli_query($conn, $sql)){
       
        
    }else{
        echo 'query error: ' . mysqli_error($conn);
    }
    
        
}

?>

<!DOCTYPE html>
<html>
<?php include('templates/header.php'); ?>

     <section class="container grey-text">
      <h4 class="center">>⩸<</h4>
        <form class="white" action="add.php" method="POST">
           <label>Name:</label>
           <input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>"> 
           <label>Email:</label>
           <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
           <label>Comment:</label>
           <input type="text" name="comment" value="<?php echo htmlspecialchars($comment) ?> ">
           <div class="center">
              <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
           </div>
         </form>
     </section>

<?php include('templates/footer.php');?>
</html>