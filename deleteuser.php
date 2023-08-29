<?php
include ('./connection.php');

if($_SERVER['REQUEST_METHOD']=='DELETE'){
    $url=$_SERVER['REQUEST_URI'];
    $urlArray=explode('/',$url);
    $id=(int)end($urlArray);
    $sql="select * from `users` where `id`=$id ";
    $query=Mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)>0){
   
    $sql="DELETE FROM `users`  Where `id`=$id";
    Mysqli_query($conn,$sql);
    echo 'user Deleted';

    }else{
        echo 'no user found';
        http_response_code(405);
    }
    
    
   
}else{
    echo 'method not allowed';
    http_response_code(405);
}

?>