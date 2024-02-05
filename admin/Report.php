<?php
ob_start(); // Start output buffering
include('includes/header.php');
include("config/dbcon.php");
?>
<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "travel_buddy";

$data = mysqli_connect($host, $user, $password, $db);
$sql = "SELECT * FROM register";
$result = mysqli_query($data, $sql);
?>
<style>
    .table_th {
        padding: 20px;
        font-size: 15px;
        color: whitesmoke;
        background: blue;

    }

    .table_td {
        padding: 20px;
    }

    .table {

        margin-left: 100px;
    }
</style>
<div class="content">
    <center>
        <h2>User Details</h2><br>
            <table class="table table-striped">
                <thead class=table_th>
                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone number</th>
                        <th>Email</th>
                        <th>Profile</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($info = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td class="table_td">
                                <?php echo "{$info['reg_id']}"; ?>
                            </td>
                            <td class="table_td">
                                <?php echo "{$info['first_name']}"; ?>
                            </td>
                            <td class="table_td">
                                <?php echo "{$info['last_name']}"; ?>
                            </td>
                            <td class="table_td">
                                <?php echo "{$info['phone']}"; ?>
                            </td>
                            <td class="table_td">
                                <?php echo "{$info['email']}"; ?>
                            </td>
                            <td class="table_td">
                                <?php echo '<img src="../User/profile_uploads/' . $info['profile_img'] . '" width="100px;" height="100px;" alt="No Profile Found">' ?>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
    </center>
</div>

<?php

if(isset($_POST['trip_delete_btn']))
{
    $id = $_POST['trip_delete_id'];
    $queryJoinRequests="DELETE FROM join_requests WHERE trip_id = '$id'";
    $queryTrip = "DELETE FROM trip WHERE trip_id='$id' ";
    $queryJoinRequests_run = mysqli_query($con, $queryJoinRequests);
    $queryTrip_run = mysqli_query($con, $queryTrip);

    if($queryJoinRequests_run && $queryTrip_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: Trips_created.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: Trips_created.php'); 
    }    
}

ob_end_flush(); // Flush the output buffer
?>
<div class="container-fluid" style="margin-left:5rem;">
    <div class="card shadow mt-7  mb-4">
        <center>
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> Trips </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php
                $query = "SELECT * FROM trip";
                $query_run = mysqli_query($con, $query);
                ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Destination</th>
                            <th>Date-From</th>
                            <th>Date-to</th>
                            <th>Type</th>
                            <th>Work</th>
                            <th>Budget</th>
                            <th>Accomodation</th>
                            <th>Meeting</th>
                            <th>Language</th>
                            <th>Itenary</th>
                            <th>Mode-of-travel</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                                <tr>
                                    <td><?php echo $row['user_email']; ?></td>
                                    <td><?php echo $row['Destination']; ?></td>
                                    <td><?php echo $row['Date_from']; ?></td>
                                    <td><?php echo $row['Date_to']; ?></td>
                                    <td><?php echo $row['Travel_type']; ?></td>
                                    <td><?php echo $row['Travel_work']; ?></td>
                                    <td><?php echo $row['Budget']; ?></td>
                                    <td><?php echo $row['Accomodation']; ?></td>
                                    <td><?php echo $row['Meeting']; ?></td>
                                    <td><?php echo $row['Language']; ?></td>
                                    <td><?php echo $row['Itenary']; ?></td>
                                    <td><?php echo $row['Mode_of_travel']; ?></td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "No Record Found";
                        }
                        ?>
                    </tbody>
                </table>
                    </center>
            </div>
        </div>
    </div>
    <?php
    include('includes/footer.php');
    ?>
</div>
