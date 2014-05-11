<?php

include 'config.php';

$con = mysqli_connect("$host", "$username", "$password", "$db_name");
if (mysqli_connect_errno()) {
    echo "Failed to connect to $host: " . mysqli_connect_error() . "<br>";
}

$thread_id = $_POST['id'];
$username = $_POST['username'];
$content = $_POST['content'];
$datetime = date("y/m/d h:i:s");

// Get the next post ID
$result = mysqli_query($con, "SELECT MAX(post_id) AS new_id FROM $posts_table WHERE thread_id='$thread_id'");
$post_id = 1;
if ($result) {
    $row = mysqli_fetch_array($result);
    if ($row) {
        $post_id = $row['new_id'] + 1;
    }
}

// Add the post to the database
$sql = "INSERT INTO $posts_table (thread_id, post_id, username, datetime, rank, content)
VALUES ('$thread_id', '$post_id', '$username', '$datetime', '0', '$content')";
$result = mysqli_query($con, $sql);

if ($result) {
    header("Location: view_thread.php?id=$thread_id");
    exit();
}
else {
    echo "Error adding post.<br>";
    echo "<a href=index.php>Go back to homepage</a>";
}

mysqli_close($con);
?>
