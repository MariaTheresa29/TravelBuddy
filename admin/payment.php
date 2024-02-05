<?php
include('includes/header.php');
include("config/dbcon.php");
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> Payment </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php
                $query = "SELECT * FROM payment";
                $query_run = mysqli_query($con, $query);
                ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>card_num</th>
                            <th>Expiration</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                                <tr>
                                    <td><?php echo $row['card_name']; ?></td>
                                    <td><?php echo $row['card_num']; ?></td>
                                    <td><?php echo $row['exp']; ?></td>
                                    <td><?php echo $row['btnradio']; ?></td>
                         
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