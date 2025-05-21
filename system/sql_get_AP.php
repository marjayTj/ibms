<select class="form-control" name="select_AP" id="select_ap"><?php 
include'conn.php';
$select_product = mysqli_query($conn, "SELECT * FROM `tbl_property_commodities` WHERE pc_category = 'AP'");
  
while($row = mysqli_fetch_array($select_product)) {
	echo '<option value="'.$row['pc_code'].'">'.$row['pc_type'].'</option>';
	//$pr_code = uniqid("pr_");
}
?></select>
      
