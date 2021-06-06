<?php

   include('config/db_connect.php');

   $sql = 'SELECT * FROM comments';

   $result = mysqli_query($conn, $sql);

   $comments = mysqli_fetch_all($result, MYSQLI_ASSOC);
   
   mysqli_free_result($result);

   mysqli_close($conn);

   

?>

<!DOCTYPE html>
<html>

<?php include('templates/header.php'); ?>




<?php include('templates/footer.php'); ?>
    

</html>
