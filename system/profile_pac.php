<?php
include 'conn.php';
?>
<h3>Products</h3>

<?php
$products_sql = mysqli_query($conn, "SELECT tbl_property_commodities.pc_type, pr_area, pr_ecosystem, pr_tenant_status FROM tbl_products JOIN tbl_property_commodities on tbl_products.pc_code=tbl_property_commodities.pc_code where 
pi_resident_id='$resid' and pc_category='Pr'");

if ($products_sql) {
    if (mysqli_num_rows($products_sql)) {
?>
        <table class="table table-striped table-bordered" style="width: 100%">
            <thead>
                <tr>
                    <th>TYPE</th>
                    <th>AREA</th>
                    <th>ECOSYSTEM</th>
                    <th>TENANT STATUS</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($products = mysqli_fetch_assoc($products_sql)) {
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($products['pc_type']); ?></td>
                        <td><?php echo htmlspecialchars($products['pr_area']); ?></td>
                        <td><?php echo htmlspecialchars($products['pr_ecosystem']); ?></td>
                        <td><?php echo htmlspecialchars($products['pr_tenant_status']); ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
<?php
    }
}
?>
<hr>
<h3>Animal Products</h3>
<?php
$products_sql = mysqli_query($conn, "SELECT tbl_property_commodities.pc_type, ap_number_of_male, ap_number_of_female, ap_age FROM tbl_animal_products JOIN tbl_property_commodities on tbl_animal_products.pc_code=tbl_property_commodities.pc_code where 
pi_resident_id='$resid' and pc_category='AP'");

if ($products_sql) {
    if (mysqli_num_rows($products_sql)) {
?>
        <table class="table table-striped table-bordered" style="width: 100%">
            <thead>
                <tr>
                    <th>TYPE</th>
                    <th>NUMBER OF MALE</th>
                    <th>NUMBER OF FEMALE</th>
                    <th>AGE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($products = mysqli_fetch_assoc($products_sql)) {
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($products['pc_type']); ?></td>
                        <td><?php echo htmlspecialchars($products['ap_number_of_male']); ?></td>
                        <td><?php echo htmlspecialchars($products['ap_number_of_female']); ?></td>
                        <td><?php echo htmlspecialchars($products['ap_age']); ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
<?php
    }
}
?>

<hr>
<h3>Production facility</h3>
<?php
$prod_facility = mysqli_query($conn, "SELECT  pi_resident_id, tbl_property_commodities.pc_type,pf_quantity,pf_ownership,pf_year_acquired, pf_cost from tbl_production_facilities
JOIN tbl_property_commodities on tbl_production_facilities.pc_code= tbl_property_commodities.pc_code 
where pi_resident_id = '$resid' and pc_category='PF'");

if ($prod_facility) {
    if (mysqli_num_rows($prod_facility) > 0) {
?>
        <table class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>TYPE</th>
                    <th>QUANTITY</th>
                    <th>OWERSHIP</th>
                    <th>YEAR ACQUIRED</th>
                    <th>COST</th>
                </tr>
            </thead>

            <?php
            while ($prod_facility_rec = mysqli_fetch_assoc($prod_facility)) {
            ?>
                <tbody class="table-content">
                    <tr>
                        <td><?php echo htmlspecialchars($prod_facility_rec['pc_type']); ?></td>
                        <td><?php echo htmlspecialchars($prod_facility_rec['pf_quantity']); ?></td>
                        <td><?php echo htmlspecialchars($prod_facility_rec['pf_ownership']); ?></td>
                        <td><?php echo htmlspecialchars($prod_facility_rec['pf_year_acquired']); ?></td>
                        <td><?php echo htmlspecialchars($prod_facility_rec['pf_cost']); ?></td>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>
<?php
    }
}
?>
<h3>
    <a href="red_properties_and_comodities.php?resid=<?php echo $resid ?>">Add Properties and commodities</a>
</h3>