<?php
//شبكنا البروجكت تبعنا بالداتا بيس
$conn=Mysqli_connect('localhost','root','','test');
header('Access-Control-Allow-Origin: *');
//بدون Access-Control-Allow-Origin  اي حد يوخذ اللينك تبعي مش رح يقدر يوخذ الداتا منه
//header('Access-Control-Allow-Origin: *'): عشان اسمح لاي شخص يوخذ اللينك تبعapi  ويتعامل مع الداتا الي فيه
?>

