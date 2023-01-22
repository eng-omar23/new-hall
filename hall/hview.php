<?php
include("../conn.php");
include("../Bussiness/home.php");

?>
<style>
    body {
        margin-top: 5%;
        margin-right: 3%;
        margin-left: 3%;

    }
</style>
<table class="table table-bordered" id="myTable">
    <thead class="table-dark">

        <tr>
            <td>SNO</td>
            <td>Facility Name</td>
            <td>type</td>
            <td>location</td>
            <td>capacity</td>
            <td>charge_perhead</td>
            <td>hall_desc</td>
            <td>EDIT</td>
            <td>DELETE</td>
        </tr>
    </thead>
    <tbody>


        <?php

        $id = $_GET['id'];
        $n = 1;
        $sql = "Select c.*,h.* from halls h join company_reg c on h.hall_id=c.id where company_id='$id'";
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) > 0) {
            $sql = "Select c.*,h.* from halls h join company_reg c on h.hall_id=c.id where company_id='$id'";
            $query = mysqli_query($conn, $sql);
            while ($data = mysqli_fetch_array($query)) {



        ?>
                <tr>
                    <td><?php echo $n; ?></td>
                    <td><?php echo $data["Name"] ?></td>
                    <td><?php echo $data["hall_type"] ?></td>
                    <td><?php echo $data["location"] ?></td>
                    <td><?php echo $data["capacity"] ?></td>
                    <td><?php echo $data["charge_perhead"] ?></td>
                    <td><?php echo $data["hall_desc"] ?></td>
                   <td><a href="fedit.php?hid=<?php echo $data["hall_id"] ?>&&id=<?php echo $id ?>" class="btn btn-warning">EDIT</a></td>
                   <td> <a href="facilityDel.php?hid=<?php echo $data["hall_id"] ?>&&id=<?php echo $id ?>" class="btn btn-danger">DELETE</a></td>

                </tr>
        <?php
                $n++;
            }
        } else {
            echo "no data available";
        }
        ?>


    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>