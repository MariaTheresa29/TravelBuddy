<?php
include('includes/header.php');
?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="code.php" method="POST">
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Image 1</label>
                            <input type="file" name="img1" class="form-control" placeholder="Upload Image">
                        </div>
                        <div class="form-group">
                            <label>Image 2</label>
                            <input type="file" name="img2" class="form-control" placeholder="Upload Image">
                        </div>
                        <div class="form-group">
                            <label>Image 3</label>
                            <input type="file" name="img3" class="form-control" placeholder="Upload Image">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea type="text" name="description" class="form-control" placeholder="Enter Description"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="about_save" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">About Us
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add
                </button>
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php
                include('config/dbcon.php');
                $query = "SELECT * FROM aboutus";
                $query_run = mysqli_query($con, $query);
                ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th>Image_1</th>
                            <th>Image_2</th>
                            <th>Image_2</th>
                            <th>Description</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                        ?>
                                <tr>
                                    <td><?php echo $row['about_id']; ?></td>
                                    <td><?php echo $row['img_1']; ?></td>
                                    <td><?php echo $row['img_2']; ?></td>
                                    <td><?php echo $row['img_3']; ?></td>
                                    <td><?php echo $row['description']; ?></td>
                                    <td>
                                        <form action="about_edit.php" method="post">
                                            <input type="hidden" name="about_edit_id" value="<?php echo $row['about_id']; ?>">
                                            <button type="submit" name="about_edit_btn" class="btn btn-success"> EDIT</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="code.php" method="post">
                                            <input type="hidden" name="about_delete_id" value="<?php echo $row['about_id']; ?>">
                                            <button type="submit" name="about_delete_btn" class="btn btn-danger"> DELETE</button>
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