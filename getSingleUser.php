<?php
//عشان اجيب بيانات مستخدم واحد عن طريق id اله
//$_SERVER['REQUESR_URI']:بتجيب الرابط كامل مع id: http://localhost/api-project/api/getusers.php/2

/*explode('/',$url):بتقسم الرابط بناء على / وبتحطهم في اريه
 * Array
(
    [0] => 
    [1] => api-project
    [2] => api
    [3] => getSingleUser.php
    [4] => 2
)
 */
 //end($urlArray): عشان احصر على اخر عنصر بالاريه وهو 2 وهو عبارة عن ال id
  
 //هيك بحكي للفرونت اند انه عندك اند بوينت
 //end point:get data about user using his id

 //Mysqli_fetch_assoc($query):لاني بدي ارجع داتا لعنصر واحد فبستحدم assoc not all

include ('./connection.php');
if($_SERVER['REQUEST_METHOD']=='GET'){
    $url=$_SERVER['REQUEST_URI'];
    $urlArray=explode('/',$url);
    $id=end($urlArray);
    $sql="select * from `users` where `id`=$id ";
    $query=Mysqli_query($conn,$sql);
    $users=Mysqli_fetch_assoc($query);
    echo json_encode($users);
 
}else{
    echo 'method not allowed';
    http_response_code(405);
}
?>