
<?php
include("../conn.php");
include("../Bussiness/home.php");

?>
<style>
    body{
        margin-top:5%;
        margin-right: 3%;
        margin-left: 3%;

    }

</style>
<table class="table table-bordered" id="myTable">
    <thead  class="table-dark">

    <tr>
    <td>SNO</td>
        <td>Facility Name</td>
        <td>Price</td>
        <td>hall type</td>

        <td>Maniplate</td>
    </tr>
    </thead>
    <tbody>

   
    <?php
    
     $id =$_GET['id']; 
     $n=1;
   
    $sql="Select f.*,h.* from facility f join halls h on f.hall_id=h.hall_id where company_id='$id'";
    $query=mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)>0){
        $sql="Select f.*,h.* from facility f join halls h on f.hall_id=h.hall_id where company_id='$id'";
        $query=mysqli_query($conn,$sql);
        while($data=mysqli_fetch_array($query)){

   
        ?>
        <tr>
        <td><?php echo $n; ?></td>
        <td><?php echo $data["facility_name"]?></td>
        <td><?php echo $data["Price"]?></td>  
        <td><?php echo $data["hall_type"]?></td> 
    
       
              
        <td>
        <a  href="fedit.php?fid=<?php echo $data["facility_id"]?>&&id=<?php echo $id?>"class="btn btn-warning">EDIT</a> ||
        <a href="facilityDel.php?fid=<?php echo $data["facility_id"]?>&&id=<?php echo $id?>"class="btn btn-danger">DELETE</a>
        </td>

    </tr>
    <?php
    $n++;

    }
}
    else{
        echo "no data available";
    }
    ?>


</tbody>
</table>
<script>

$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>