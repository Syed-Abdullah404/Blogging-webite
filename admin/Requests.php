<?php

include('header.php');



?>


<!-- delete Modal -->
<div class="modal fade " id="myModalDeacive" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Requests</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
            <div class="modal-body">
                Are you sure you want to delete?
                <input type="hidden" name="deactive" id="id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="submit" name="deactivepost" class="btn btn-primary">Yes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">

        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h4 class="mb-5">Add Requests</h4>
                <!-- <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal"
                                data-bs-target="#addModal">Add Requests<i class="fa fa-plus ms-2"></i></button> -->
                <div class="table-responsive mt-2">
                    <table class="table">

                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Name</th>

                                <th scope="col">email</th>
                                <th scope="col">Image</th>
                                <th scope="col">Department</th>
                                <th scope="col">Roll no</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <form method="post">
                                <?php
                                $id =1;
                                $query = $con->query('select * from blogger');
                                while ($row = $query->fetch_assoc()) {

                                    // $email = $row['email'];
                                    $check =  $row['status'];
                                    if ($check != 'approve' && $check != 'deactive') {
                                    
                                ?>

                                    <tr>
                                        <td><?php echo $id++ ?></td>
                                        <td style="display: none;"><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['email'];?></td>
                                        <td><img src="./img/blogger/<?php echo $row['image']; ?>" alt=""  width="140px" height="130px"></td>
                                        <td><?php echo $row['department']; ?></td>
                                        <td><?php echo $row['rollno']; ?></td>
                                        <td><?php echo $check; ?></td>
                                        <td>
                                       
                                            <button type="button" class="btn btn-lg btn-lg-square btn-danger deactivebtn" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>

                                            <button class="btn  btn-sm btn-success editbtn btn-lg-square" type="button">
                                                <i class="fas  fa-check"></i>
                                            </button>

                                            </button>
                                        </td>
                                    </tr>
                                <?php
                                }
                            }
                                ?>
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table End -->


<div class="modal fade" id="myModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Approve For Student Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <input type="hidden" name="id" id="ide" />
                    <div class="form-group">
                        <label class="fw-bold">Name:</label>
                        <input type="text" class="form-control mb-2" placeholder=" Name" name="name" id="name">

                        <label class="fw-bold">Email:</label>
                        <input type="text" class="form-control mb-2" placeholder=" Name" name="email" id="email">

                        <label class="fw-bold">Department:</label>
                        <input type="text" class="form-control mb-2" name="department" id="department">


                    </div>



           
            <div class="modal-footer bg-light">
                <input type="submit" id="btn3" class="form-control " name="approval" value="Login Approve">
            </div>
            </form>
            </div>
        </div>

    </div>

</div>

<?php
include('footer.php');

?>
<script>
    $(document).ready(function() {
        $('.editbtn').on('click', function() {
            $('#myModalEdit').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function() {
                return $(this).text();
            }).get();


            $('#ide').val(data[1]);
            $('#name').val(data[2]);
            $('#email').val(data[3]);
            $('#department').val(data[5]);

        });
        $('.deactivebtn').on('click', function() {
            $('#myModalDeacive').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function() {
                return $(this).text();
            }).get();


            $('#id').val(data[1]);
 

        });
    });
</script>

<?php



if (isset($_POST['approval'])) {
   
    $id = $_POST['id'];
    $sqli = "select status from blogger where id = '$id'";
    $sql = mysqli_query($con, $sqli);
    while ($row = mysqli_fetch_assoc($sql)) {
        // $pass = $row['status'];

       $update =  mysqli_query($con, "UPDATE `blogger` SET `status`='approve' WHERE id='$id'");

if($update){
    ?>
    <script>
    window.location = "<?php echo 'Requests.php' ?>";
</script>
<?php
}

    }
}
//reject
if (isset($_POST['deactivepost'])) {
   
    $id = $_POST['deactive'];
    $sqli = "select status from blogger where id = '$id'";
    $sql = mysqli_query($con, $sqli);
    while ($row = mysqli_fetch_assoc($sql)) {
        // $pass = $row['status'];

       $update =  mysqli_query($con, "UPDATE `blogger` SET `status`='deactive' WHERE id='$id'");

if($update){
    ?>
    <script>
    window.location = "<?php echo 'Requests.php' ?>";
</script>
<?php
}

    }
}