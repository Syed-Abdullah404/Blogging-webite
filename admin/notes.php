<?php

include('header.php');

?>


<!-- add Modal -->
<div class="modal fade " id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Add Notes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">department</label>
                        
                        <select name="department" id="cars" class="form-control">
                        <option disabled>department</option>
                        <?php
			$query = $con->query('select * from departments');
			while ($row = $query->fetch_assoc()) {
			?>
				<div class="online-list">

					<div class="online">
						<img src="images/member-1.png">
					</div>

					<span style="color: #1876F2;"></span>
                    <option><?php echo $row['department']; ?></option>

		
				</div>
				<?php
			}
				?>
                           
                        </select>
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control" name="image" type="file" id="formFile">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">title</label>
                        <input name="title" class="form-control">
                        <label for="exampleInputPassword1" class="form-label">description</label>
                        <textarea name="desc" class="form-control"></textarea>
                    </div>




                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Notes</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>

<!-- edit Modal -->
<?php
$query = $con->query("SELECT * FROM `notes`");
while ($row = $query->fetch_assoc()) { ?>
    <!-- edit Modal -->
    <div class="modal fade " id="editexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Notes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form role="form" class="text-start" method="POST" action="" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="text" name="serId" id="ids" value="">
                        <div class="mb-3">
                        <label for="formFile" class="form-label">Department</label><br>

                            <input type="text" name="department" id="department" class="form-control">
                        <label for="formFile" class="form-label">Title</label><br>

                            <input type="text" name="title" id="title" class="form-control">                           
                            <label for="formFile" class="form-label">Image</label><br>
                            <input type="file" class="form-control mb-3" name="fileToUpload" value="<?php echo $row['image']; ?>" />
                            <input type="hidden" name="old" value="<?php echo $row['image']; ?>">
                       
                       
                            <div class="mb-2 mt-3">
                                <label for="exampleInputPassword1" class="form-label">Description</label>
                                <textarea name="desc" class="form-control" id="desc"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="editService">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
<!-- delete Modal -->
<div class="modal fade " id="myModaldel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
             
            </div>
            <div class="modal-body">
            <input type="hidden" name="id" id="id" value="">
                Are you sure you want to delete <span style="color: red;">Notes?</span> 
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
                <h4 class="mb-3">Add Notes</h4>
                <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#addModal">Add Notes<i class="fa fa-plus ms-2"></i></button>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>

                                <th scope="col">department</th>
                                <th scope="col">image</th>
                                <th scope="col">Title</th>
                                <th scope="col">description</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $id = 1;
                            $query = $con->query('select * from notes');
                            while ($row = $query->fetch_assoc()) {
                             $image = $row['image'];
                            ?>
                            <tr>
                                <td scope="row"><?php echo $id++ ?></th>
                                <td scope="row" style="display: none;"><?php echo $row['id'] ?></th>

                                <td><?php echo $row['department']; ?></td>
                                <?php
                                if($image){
                                    ?>
                                    <td><img src="img/notes/<?php echo $image; ?>" alt="" width="130px" height="140px"></td>
                                    <?php
                                }else{
                                    ?>
                                    <td><img src="" alt="avatar" width="130px" height="140px"  ></td>
<?php
                                }
                                ?>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['desc']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-lg btn-lg-square btn-success editbtn" data-bs-toggle="modal" data-bs-target="#editModal">
                                        <i class="fas fa-pen"></i>
                                    </button>
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

        $('.editbtn').on('click', function() {
            $('#editexampleModal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function() {
                return $(this).text();
            }).get();


            $('#ids').val(data[1]);
            $('#department').val(data[2]);
            $('#title').val(data[4]);
            $('#desc').val(data[5]);
         


        });

    });
</script>

<?php
if (isset($_POST['submit'])) {

$department = $_POST["department"];
$filename = $_FILES["image"]["name"];
$title = $_POST["title"];
$desc = $_POST["desc"];



    move_uploaded_file($_FILES["image"]["tmp_name"], "img/notes/" . $filename);
    $sql = "INSERT INTO notes(`department`,`image`,`title`,`desc`) VALUES('$department','$filename','$title','$desc')";

    mysqli_query($con, $sql);
if($sql){
    
    echo "<script>window.location='notes.php?msg=notes-Added'</script>";
   
    }
   
}
if (isset($_POST['delete'])) {

    $id = $_POST["id"];
    
    
       
         $sql = "DELETE FROM `notes` WHERE id = '$id'";
    
     $que =    mysqli_query($con, $sql);
    if($que){
    
        echo "<script>window.location='notes.php?msg=department-Added'</script>";
    }else{
    
    }
    
    
    }




    if (isset($_POST["editService"])) {
        $id = $_POST["serId"];
        $department = $_POST["department"];
        $title = $_POST["title"];
        $desc = $_POST["desc"];
        $filename = $_FILES["fileToUpload"]["name"];
        $tempname = $_FILES["fileToUpload"]["tmp_name"];
        // unlink("./img/adminpost/" . $filename);
        $folder = "./img/notes/" . $filename;
        $old = $_POST['old'];
        if ($filename == '') {
            $check = $old;
        } else {
            $check = $_FILES["fileToUpload"]["name"];
        }
    
        $update = "UPDATE `notes` SET `department`= '$department', `image` = '$check', `title` = '$title', `desc` = '$desc' where `id` = $id";
    
        // Execute query
        $file = mysqli_query($con, $update);
    
        // Now let's move the uploaded image into the folder: image
        move_uploaded_file($tempname, $folder);
    if($update){
        echo "<script>window.location='notes.php?msg=update-sucessfully'</script>";
    }
    }
?>