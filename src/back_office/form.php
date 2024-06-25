<?php
session_start();
    include '../connect.php' ;

    //$id_from = $_POST['id_from'];
    //$id_to = $_POST['id_to'];
    //$message = $_POST['message'];
    //$date_message = date('Y-m-d H:i:s');
    //$read = 0; // message n'ai pas lu
    
        
   // $stmt = $db->prepare("INSERT INTO messages (id_from, id_to, message, date_message, read) VALUES (:id_from, :id_to, :message, :read, ?)");
   //$stmt->bind_Value("iissi", $id_from, $id_to, $message, $date_message, $read);//
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="" method="POST">
    <p>id_from</p>  
    <input type="text" name="name" style="display: bloc">
    <p>id_to</p>  
      <input type="text" name="name" style="display: bloc">
      <p>Name</p>  
      <input type="text" name="name" style="display: bloc">
      <p>Message</p>
      <textarea name="content" cols="40" rows="10"id=""></textarea>
      <p>date_message</p>  
      <input type="date" name="name" style="display: bloc">
      <p>read</p>  
      <input type="text" name="name" style="display: bloc">
      <input type="submit" value="Envoyer">
    </form>
</body>
</html>