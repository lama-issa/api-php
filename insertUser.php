
<?php
include ('./connection.php');
//POST:عشان بدي ابعث ادخل داتا
//extract($_POST): استقبلنا الداتا الي بدنا اياها من خلال post
if($_SERVER['REQUEST_METHOD']=='POST'){
    $allData=file_get_contents("php://input"); //حولت الداتا على شكل json
    $data=json_decode($allData,true); //بتحول الداتا على شكل assositive array =>
    $name=$data['name'];
    $email=$data['email'];
    $sql="INSERT INTO `users`(`name`,`email`) VALUES ('$name','$email')";
    Mysqli_query($conn,$sql);
    echo 'user created';
}else{
    echo 'method not allowed';
    http_response_code(405);
}

?>