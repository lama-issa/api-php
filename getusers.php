<?php
//بجيب الداتا لكل اليوزرز الموحودين عنا 
//mysqli_num_rows($query):بتجيب عدد الصفوف الموجودة
//GET: عشان بدي اجيب داتا
include ('./connection.php');
if($_SERVER['REQUEST_METHOD']=='GET'){
    $sql="select * from `users`";
    $query=Mysqli_query($conn,$sql);
    $users=Mysqli_fetch_all($query,MYSQLI_ASSOC);
    if(mysqli_num_rows($query)){
        //بفحص اذا في بيانات بهاي الداتا بيس
        //اذا كانت ترو يعني في داتا يالجدول يعني رجع عدد الصفوف 1 او اكثر
        echo json_encode($users);
        http_response_code(200);
    }else{
        //اذا كانت فولس يعني ما في داتا بالجدول يعني عدد الصفوف =0
        echo 'no users there';
        http_response_code(204);
    }
}else{
    echo 'method not allowed';
    http_response_code(405);
}



?>