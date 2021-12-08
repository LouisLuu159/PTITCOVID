<?php 
include('connection.php');
if(isset($_POST['form_id'])){
    $query = "DELETE FROM form WHERE `form`.ID = :form_id";
    $statement = $conn->prepare($query);
    $statement->bindValue(':form_id', $_POST['form_id']);
    $statement->execute();
    $count = $statement->rowCount();
    if($count == 1){
        echo "Success";
    }else{
        echo "Failed";
    }
}
  ?>