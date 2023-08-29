<?php
include ('./connection.php');

if($_SERVER['REQUEST_METHOD']=='PUT'){
    $url=$_SERVER['REQUEST_URI'];
    $urlArray=explode('/',$url);
    //id بوصلني على شكل سترنج فبحوله ل انتجر
    $id=(int)end($urlArray);
    $sql="select * from `users` where `id`=$id ";
    $query=Mysqli_query($conn,$sql);
//بدنا نشوف اذا في يوزر اله نفس id للشخص الي بدي اعدل ايميله
    if(mysqli_num_rows($query)>0){
        //بدنا نشوف اذا اليوزر الي بدي اعدله موجود ولا لا
        //اذا كان في يوزر عنده نفس ال id الي بعثته في uli 
        //بالتالي روح عدل على ايميل هاد اليوزر 
    $allData=file_get_contents('php://input');
    $data=json_decode($allData,true);//converted from json to associtive array
    $email=$data['email'];
    $sql="UPDATE `users` SET `email`='$email' where `id`=$id";
    Mysqli_query($conn,$sql);
    echo 'user updated';

    }else{
        echo 'no user found';
        http_response_code(405);
    }
    
    
   
}else{
    echo 'method not allowed';
    http_response_code(405);
}

?>