<?php

include 'config.php';

$con = mysqli_connect("$host", "$username", "$password", "$db_name");
if (mysqli_connect_errno()) {
    echo "Failed to connect to $host: " . mysqli_connect_error() . "<br>";
}

$title = $_POST['title'];
$username = $_POST['username'];
$content = $_POST['content'];
$datetime = date("y/m/d h:i:s");

// Add the thread to the database
$sql = "INSERT INTO $threads_table (title, username, datetime, rank, content)
VALUES ('$title', '$username', '$datetime', '0', '$content')";
$result = mysqli_query($con, $sql);

if ($result) {
    header("Location: view_thread.php?id=" . mysqli_insert_id($con));
    exit();
}
else {
    echo "Error adding thread.";
    echo "<a href=index.php>Go back to homepage</a>";
}

mysqli_close($con);
?>
