<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   <title>اظهار المدير </title>
    <link rel="stylesheet" href="../style/style.css"/>
</head>
<body>
<?php
require_once('connect.php');

if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
    echo 'مرحبا بك يا '.$_SESSION['name'];

}
else{
    header('Location: admin_logout.php');
}

$sql = "SELECT  name , username, password FROM admin";
$res = mysqli_query($conn, $sql);
     echo '<table>';
    echo '<caption>عرض المديرين</caption>';
    echo '<tr><th>اسم المدير</th><th>المدير </th><th>كلمة المرور</th></tr>';
  
    while ($row = mysqli_fetch_assoc($res)) {
        echo '<tr>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['username'] . '</td>';
        echo '<td>' . $row['password'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
?>
</body>
</html>
