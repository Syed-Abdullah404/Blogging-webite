<?php

include('header.php');



$query = $con->query('SELECT * FROM `blogger`');
while ($row = $query->fetch_assoc()) { 
    ?>


<!-- edit Modal -->
<div class="modal fade " id="myModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Edit Requests</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
         
            <div class="modal-body">
                <form method="POST">
                    <div class="mb-3">
                        <input type="hidden" class="form-control" name="id" id="ids">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                        <label for="formFile" class="form-label">Image</label><br>
                            <input type="file" class="form-control mb-3" name="fileToUpload" value="<?php echo $row['image']; ?>" />
                            <input type="hidden" name="old" value="<?php echo $row['image']; ?>">
                        <label for="exampleInputEmail1" class="form-label mt-1">Department </label>
                        <input type="text" class="form-control" id="department" name="department">
                        <label for="exampleInputEmail1" class="form-label mt-1">Roll no</label>
                        <input type="text" class="form-control" id="roll" name="roll">
                       
                        <label for="exampleInputEmail1" class="form-label mt-1">Blogger activities</label>
                        <select name="cat" id="cat" class="form-control">
                            <option value="Action" disabled>Action</option>
                            <option value="approve">approve</option>
                            <option value="deactive">Deactive</option>

                        </select>
                    </div>
               


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="editActive" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
<!-- delete Modal -->
<div class="modal fade " id="myModalDeactive" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Requests</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
            <div class="modal-body">
                Are you sure you want to delete?
                <input type="text" name="deactive" id="id">
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
                <h4 class="mb-5">Requests</h4>
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
                                $id = 1;
                                $query = $con->query('select * from blogger');
                                while ($row = $query->fetch_assoc()) {

                                    // $email = $row['email'];
                                    $check =  $row['status'];
                                   
                                    
                                ?>

                                    <tr>
                                        <td scope="row"><?php echo $id++; ?></td>
                                        <td scope="row" style="display: none;"><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['name']; ?></td>

                                        <td><?php echo $row['email'];?></td>
                                        <td><img src="./img/blogger/<?php echo $row['image']; ?>" alt="" width="140px" height="130px"></td>
                                        <td><?php echo $row['department']; ?></td>
                                        <td><?php echo $row['rollno']; ?></td>
                                        <td><?php echo $check; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-lg btn-lg-square btn-success editbtn" data-bs-toggle="modal" data-bs-target="#editModal">
                                                <i class="fas fa-pen"></i>
                                            </button>
                                            <button type="button" class="btn btn-lg btn-lg-square btn-danger deactivebtn" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>

                                        

                                            </button>
                                        </td>
                                    </tr>
                                <?php
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


            $('#ids').val(data[1]);
            $('#name').val(data[2]);
            $('#email').val(data[3]);
            $('#department').val(data[5]);
            $('#roll').val(data[6]);
          

        });

        $('.deactivebtn').on('click', function() {
            $('#myModalDeactive').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function() {
                return $(this).text();
            }).get();


            $('#id').val(data[1]);
 

        });
    });
</script>
<?php




//reject
if (isset($_POST['deactivepost'])) {

    $id = $_POST['deactive'];
    echo $id;
    $reject_stu = mysqli_query($con, "DELETE FROM `blogger` WHERE id='$id'");
    if ($reject_stu) {
    ?>
            <script>
                window.location = "<?php echo 'Active-Deactive.php' ?>";
            </script>
<?php
        }
    }




if (isset($_POST["editActive"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $department = $_POST["department"];
    $roll = $_POST["roll"];
    $cat = $_POST["cat"];
    $filename = $_FILES["fileToUpload"]["name"];
    $tempname = $_FILES["fileToUpload"]["tmp_name"];
    // unlink("./img/adminpost/" . $filename);
    $folder = "./img/blogger/" . $filename;
    $old = $_POST['old'];
    if ($filename == '') {
        $check = $old;
    } else {
        $check = $_FILES["fileToUpload"]["name"];
    }

    $update = "UPDATE `blogger` SET `department`= '$department', `image` = '$check', `name` = '$name', `rollno` = '$roll', `email` = '$email',`status` = '$cat' where `id` = $id";

    // Execute query
    $file = mysqli_query($con, $update);

    // Now let's move the uploaded image into the folder: image
    move_uploaded_file($tempname, $folder);
if($update){
    echo "<script>window.location='Active-Deactive.php?msg=update-sucessfully'</script>";
}
}



?>


