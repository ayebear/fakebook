<?php

include 'config.php';

$con = mysqli_connect("$host", "$username", "$password", "$db_name");
if (mysqli_connect_errno()) {
    echo "Failed to connect to $host: " . mysqli_connect_error() . "<br>";
}

$title = $_POST['title'];
$username = $_POST['username'];
$content = $_POST['content'];

$datetime = date("d/m/y h:i:s");

$sql = "INSERT INTO $threads_table(title, username, datetime, rank, content)VALUES('$title', '$username', '$datetime', '100', '$content')";
$result = mysqli_query($con, $sql);

echo $result;

if ($result) {
    echo "Successful<BR>";
    echo "<a href=index.php>View your topic</a>";
}
else {
    echo "ERROR";
}

mysqli_close($con);
?>