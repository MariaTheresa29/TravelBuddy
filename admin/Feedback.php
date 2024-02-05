<?php
include('includes/header.php');
include("config/dbcon.php");
?>
<?php
if(isset($_POST['Feedback_delete_btn']))
{
    $id = $_POST['Feedback_delete_id'];

    $query = "DELETE FROM feedback WHERE f_id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: Feedback.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: Feedback.php'); 
    }    
}
?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> Feedback </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php
                $query = "SELECT * FROM feedback";
                $query_run = mysqli_query($con, $query);
                ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Ratings</th>
                            <th>Comments</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                                <tr>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['rating']; ?></td>
                                    <td><?php echo $row['comment']; ?></td>
                                    <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="Feedback_delete_id" value="<?php echo $row['f_id']; ?>">
                                            <button type="submit" name="Feedback_delete_btn" class="btn btn-danger"> DELETE</button>
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
