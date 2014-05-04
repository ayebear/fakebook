<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php

include 'config.php';

$con = mysqli_connect("$host", "$username", "$password", "$db_name");
if (mysqli_connect_errno()) {
    echo "Failed to connect to $host: " . mysqli_connect_error() . "<br>";
}

$result = mysqli_query($con, "SELECT * FROM $threads_table ORDER BY id DESC");

echo "<table class=\"threadTable\">
<tr>
<th>#</th>
<th>Title</th>
<th>Author</th>
<th>Date/Time (Y/M/D)</th>
<th>Rank</th>
</tr>";

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td><a href=\"view_thread.php?id=" . $row['id'] . "\">" . $row['title'] . "</a></td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['datetime'] . "</td>";
    echo "<td>" . $row['rank'] . "</td>";
    echo "</tr>";
}

mysqli_close($con);
?>
<tr>
<td colspan="5"><a href="new_thread.php">New Thread</a></td>
</tr>
</table>
</body>
</html>