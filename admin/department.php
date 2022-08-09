<?php

include('header.php');

?>

<!-- add Modal -->
<div class="modal fade " id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Add Departments</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" >

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Department</label>

                        <input type="text" name="department" id="" class="form-control">
                    </div>
                    <div class="mb-3">
                      
                      <label for="formFile" class="form-label">image</label><br>

                      <input type="file" name="image" id="" class="form-control">


                  </div>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Department</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>

<!-- edit Modal -->
<div class="modal fade " id="depart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Edit department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post">
                <div class="modal-body">

                    <div class="mb-3">
                        <input type="hidden" id="ids" name="id">
                        <label for="formFile" class="form-label">department</label><br>

                        <input type="text" name="department" id="dep" class="form-control">


                    </div>
                    <div class="mb-3">
                      
                        <label for="formFile" class="form-label">image</label><br>

                        <input type="file" name="image" id="dep" class="form-control">


                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="editService" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- delete Modal -->
<div class="modal fade " id="myModaldel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Department</h5>

                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="">
                    Are you sure you want to delete?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="submit" name="delete" class="btn btn-primary">Yes</button>
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
                <h4 class="mb-3">Add Department</h4>
                <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#addModal">Add Department<i class="fa fa-plus ms-2"></i></button>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">id</th>

                                <th scope="col">Image</th>
                                <th scope="col">Departments</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                               $id = 1;
                            $query = $con->query('select * from departments');
                            while ($row = $query->fetch_assoc()) {

                            ?>
                                <tr>
                                <td scope="row"><?php echo $id++ ?></td>
                                    <td scope="row" style="display:none"><?php echo $row['id'] ?></td>


                                    <td><img src="./img/department/<?php echo $row['image'];?>" alt=""></td>
                                    <td><?php echo $row['department']; ?></td>
                                    <td>
                                        <!-- <button type="button" class="btn btn-lg btn-lg-square btn-success depart" data-bs-toggle="modal" data-bs-target="#editModal">
                                            <i class="fas fa-pen"></i>
                                        </button> -->
                                        <button type="button" class="btn btn-lg btn-lg-square btn-danger delbtn" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table End -->


<?PHP
include('FOOTER.PHP');
?>

<script>
    $(document).ready(function() {
        $('.delbtn').on('click', function() {
            $('#myModaldel').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function() {
                return $(this).text();
            }).get();


            $('#id').val(data[1]);


        });

        $('.depart').on('click', function() {
            $('#depart').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function() {
                return $(this).text();
            }).get();


            $('#ids').val(data[1]);
            $('#dep').val(data[2]);


        });
    });
</script>

<?php
if (isset($_POST['submit'])) {

    $department = $_POST["department"];
    $filename = $_FILES["image"]["name"];

    $img = move_uploaded_file($_FILES["image"]["tmp_name"], "./img/department/" . $filename);


    $sql = "INSERT INTO departments (`department`,`image`) VALUES('$department','$filename')";

    $que =  mysqli_query($con, $sql);
    if ($sql) {

        echo "<script>window.location='department.php?msg=department-Added'</script>";
    } else {
    }
}
?>

<?php
if (isset($_POST['delete'])) {

    $id = $_POST["id"];



    $sql = "DELETE FROM `departments` WHERE id = '$id'";

    $que =    mysqli_query($con, $sql);
    if ($que) {

        echo "<script>window.location='department.php?msg=department-Added'</script>";
    } else {
    }
}
if (isset($_POST["editService"])) {
    $id = $_POST["id"];
    $dep = $_POST["department"];


    $update = "UPDATE `departments` SET `department`= '$dep' where `id` = $id";

    // Execute query
    $file = mysqli_query($con, $update);


    if ($update) {
        echo "<script>window.location='department.php?msg=update-sucessfully'</script>";
    }
}

?>