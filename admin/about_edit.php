<?php
include('includes/header.php');
?>


<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDIT Admin Profile </h6>
        </div>
        <div class="card-body">
        <?php
            include('config/dbcon.php');
            if(isset($_POST['about_edit_btn']))
            {
                $id = $_POST['about_edit_id'];
                
                $query = "SELECT * FROM aboutus WHERE about_id='$id' ";
                $query_run = mysqli_query($con, $query);

                foreach($query_run as $row)
                {
                    ?>

                        <form action="code.php" method="POST">

                            <input type="hidden" name="about_edit_id" value="<?php echo $row['about_id'] ?>">

                            <div class="form-group">
                                <label> Image 1 </label>
                                <input type="file" name="edit_img1" value="<?php echo $row['img_1'] ?>" class="form-control"
                                    placeholder="Enter Title">
                            </div>
                            <div class="form-group">
                                <label> Image 2 </label>
                                <input type="file" name="edit_img2" value="<?php echo $row['img_2'] ?>" class="form-control"
                                    placeholder="Enter Title">
                            </div>
                            <div class="form-group">
                                <label> Image 3 </label>
                                <input type="file" name="edit_img3" value="<?php echo $row['img_3'] ?>" class="form-control"
                                    placeholder="Enter Title">
                            </div>
                             <div class="form-group">
                                <label> Description </label>
                                <input type="text" name="edit_description" value="<?php echo $row['description'] ?>" class="form-control"
                                    placeholder="Enter Description">
                            </div>
                            
                            <center>
                            <a href="about.php" class="btn btn-danger"> CANCEL </a>
                            <button type="submit" name="about_updatebtn" class="btn btn-primary"> Update </button>
                            </center>
                        </form>
                        <?php
                }
            }
        ?>
        </div>
    </div>
</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
</div>