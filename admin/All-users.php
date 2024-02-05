<?php
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
        <h2>User Details</h1><br>
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
    <?php
    include('includes/footer.php');
    ?>
</div>