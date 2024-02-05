<?php
ob_start(); // Start output buffering
include('includes/header.php');
include("config/dbcon.php");
?>
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
<div class="container-fluid">
    <div class="card shadow mb-4">
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
                            <th>DELETE</th>
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
                                    <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="trip_delete_id" value="<?php echo $row['trip_id']; ?>">
                                            <button type="submit" name="trip_delete_btn" class="btn btn-danger"> DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "No Record Found";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
    include('includes/footer.php');
    ?>
</div>
