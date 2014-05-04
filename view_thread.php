<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style_details.css">
</head>
<body>
<?php

include 'config.php';

$con = mysqli_connect("$host", "$username", "$password", "$db_name");
if (mysqli_connect_errno()) {
    echo "Failed to connect to $host: " . mysqli_connect_error() . "<br>";
}

$id = $_GET['id'];
$threads = mysqli_query($con, "SELECT * FROM $threads_table WHERE id='$id'");
$row = mysqli_fetch_array($threads);
echo "Original post<br>";
echo "Username: " . $row['username'] . "<br>";
echo "Date/time posted: " . $row['datetime'] . "<br>";
echo "Content: " . $row['content'] . "<br>";
echo "Posts:<br>";

$posts = mysqli_query($con, "SELECT * FROM $posts_table WHERE thread_id='$id'");

while ($row = mysqli_fetch_array($posts)) {
    echo "<table>";
    echo "<tr>";
    echo "<th>" . $row['post_id'] . "</th>";
    echo "<th>" . $row['username'] . "</th>";
    echo "<th>" . $row['datetime'] . "</th>";
    echo "<th>Rank: " . $row['rank'] . "</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>" . $row['content'] . "</td>";
    echo "</tr>";
    echo "</table>";
}

mysqli_close($con);
?>
</table>
</body>
</html>