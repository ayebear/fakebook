<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style_details.css">
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
echo "<h3>Original Post:</h3>";
echo "<table><tr>";
echo "<th>Author: " . $row['username'] . "</th>";
echo "<th>" . $row['datetime'] . "</th>";
echo "<th>Rank: " . $row['rank'] . "</th>";
echo "</tr><tr>";
echo "<td colspan=\"5\">" . $row['content'] . "</td>";
echo "</tr></table>";
echo "<h3>Comments:</h3>";

$posts = mysqli_query($con, "SELECT * FROM $posts_table WHERE thread_id='$id'");

while ($row = mysqli_fetch_array($posts)) {
    echo "<table><tr>";
    echo "<th>" . $row['post_id'] . "</th>";
    echo "<th>" . $row['username'] . "</th>";
    echo "<th>" . $row['datetime'] . "</th>";
    echo "<th>Rank: " . $row['rank'] . "</th>";
    echo "</tr><tr>";
    echo "<td colspan=\"5\">" . $row['content'] . "</td>";
    echo "</tr></table>";
}

mysqli_close($con);
?>
</table>

<br>
<form action="add_post.php" method="post">
Username: <input type="text" name="username"><br>
Content: <textarea name="content" rows="5" cols="40"></textarea><br>
<input name="id" type="hidden" value="<? echo $id; ?>">
<input type="submit">
</form>

</body>
</html>