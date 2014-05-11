<?php

include 'config.php';
include 'header.php';

# connect to the database
$con = mysqli_connect("$host", "$username", "$password", "$db_name");
if (mysqli_connect_errno()) {
    echo "Failed to connect to $host: " . mysqli_connect_error() . "<br>";
}

# count the number of rows in threads table
$queryStr = "select count(*) as total from ".$threads_table.";";
$result = mysqli_query($con, $queryStr);
$data = mysqli_fetch_assoc($result);
$threadCount = $data['total'];

# initialize page to 1, set to $_GET['page'] if user has changed page number
$page = 1;
if (isset($_GET['page']))
	$page = $_GET['page'];

# calculate the offset for our mysql query
$lowerLimit;
if ($page < 1)
  	$page = 1;
else if ($page > ((int)($threadCount / 10)) + 1)
	$page = ((int)($threadCount / 10)) + 1;
$lowerLimit = ($page - 1) * 10;


# get the threads from the database - note that the first parameter to 'limit'
# is an offset from 0, and that the second paremeter is a length relative
# to the offset. so if we do limit 10,10 we're returning the first 10 rows
# from row 10 onwards
$queryStr = "select * from ".$threads_table." order by datetime desc 
  				limit ".$lowerLimit.",10;";
$result = mysqli_query($con, $queryStr);

echo "<div class='content'>";

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
<tr><td colspan="5"><a href="new_thread.php">New Thread</a></td></tr>
<tr>
  <td colspan="5">
	<?php
	  echo "<a href='index.php?page=".($page-1)."'>Prev</a> ";
	  echo "<a href='index.php?page=".($page+1)."'>Next</a>";
	?>
  </td>
</tr>
</table>

</div>

<?php include('footer.php'); ?>
