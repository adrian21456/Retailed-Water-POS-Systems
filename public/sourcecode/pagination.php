<?php require_once("../includes/db_connection.php"); ?>
<?php include("../includes/layouts/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<?php 
$num_rec_per_page=5;

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 
$sql = "SELECT * FROM items LIMIT $start_from, $num_rec_per_page"; 
$rs_result = mysqli_query ($connection, $sql); //run the query
?> 
<table>
<tr><td>Name</td><td>Phone</td></tr>
<?php 
while ($row = mysqli_fetch_assoc($rs_result)) { 
?> 
            <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['description']; ?></td>            
            </tr>
<?php 
}; 
?> 
</table>
<?php 
$sql = "SELECT * FROM items"; 
$rs_result = mysqli_query($connection, $sql); //run the query
$total_records = mysqli_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

echo "<a href='samples.php?page=1'>".'|<'."</a> "; // Goto 1st page  

for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='samples.php?page=".$i."'>".$i."</a> "; 
}; 
echo "<a href='samples.php?page=$total_pages'>".'>|'."</a> "; // Goto last page
?>


<?php include("../includes/layouts/footer.php"); ?>