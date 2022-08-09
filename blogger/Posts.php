<?php

include('header.php');
include('db.php');
// session_start();
$email = $_SESSION["email"];
if($_SESSION["email"]){

}else{
    ?>
    <script>
    window.location = "<?php echo 'signin.php' ?>";
</script>
<?php
}

//  echo "<script>alert('$email')</script>";
 $query = $con->query("select * from blogger where email  = '$email'");
 while ($row = $query->fetch_assoc()) {
     $department = $row['department'];
 ?>




<!-- add Modal -->
<div class="modal fade " id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Add Posts</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Subject</label>
                        <select name="subject" id="cars" class="form-control">
                            <option disabled>Subject related to blog</option>
                            <option value="Study">Study</option>
                            <option value="Event">Event</option>
                            <option value="Notice">Notice</option>
                            <option value="other">Other</option>
                            <option></option>
                        </select>
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control" name="image" type="file" id="formFile">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Post</label>
                        <textarea name="post" class="form-control"></textarea>
                    </div>




                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">POST</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>

<!-- edit Modal -->
<?php
$query = $con->query('SELECT * FROM `postbyblogger`');
while ($row = $query->fetch_assoc()) { ?>
    <!-- edit Modal -->
    <div class="modal fade " id="editexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form role="form" class="text-start" method="POST" action="" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="serId" id="ids" value="">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Subject</label>

                            <select name="subject" id="cat" class="form-control">
                                <option disabled>Subject related to blog</option>
                                <option>Study</option>
                                <option>Event</option>
                                <option>Notice</option>
                                <option>Other</option>
                            </select>
                            <div class="mb-2 mt-3">
                                <label for="exampleInputPassword1" class="form-label">Description</label>
                                <textarea name="desc" class="form-control" id="desc"></textarea>
                            </div>
                            <label for="formFile" class="form-label">Image</label><br>
                            <input type="file" class="form-control mb-3" name="fileToUpload" value="<?php echo $row['image']; ?>" />
                            <input type="hidden" name="old" value="<?php echo $row['image']; ?>">
                            <!-- <img src="./img/adminpost/<?php echo $row['image'] ?>" width="70px" height="70px"> -->
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
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
            <div class="modal-body">
                <!-- <input type="text" name="id" id="id" value=""> -->
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
                <h4 class="mb-3">Add Posts</h4>
                <button type="button" class="btn btn-primary my-4" data-bs-toggle="modal" data-bs-target="#addModal">Add Posts<i class="fa fa-plus ms-2"></i></button>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" &nbsp;>id</th>
                              
                                <th scope="col">&nbsp; Image</th>
                                <th scope="col">Posts</th>
                                <th scope="col">Categories</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php
                       $id = 1;
                       

                            $query = $con->query("SELECT * FROM `postbyblogger` WHERE email = '$email'");
                            while ($row = $query->fetch_assoc()) {
                             
                              ?>
                            <tr>
                                <td scope="row"><?php echo $id++ ?></td>
                                <td scope="row"  style="display:none;"><?php echo $row['id'];?></td>
                                <td><img src="../admin/img/bloggerpost/<?php echo $row['image']; ?>" alt="" width="200px" height="130px"></td>
                                <td><?php echo $row['post']; ?></td>
                                <td><?php echo $row['subject']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-lg btn-lg-square btn-success editbtn" data-bs-toggle="modal" data-bs-target="#editModal">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                    <button type="submit" class="btn btn-lg btn-lg-square btn-danger delbtn" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
<?php
                            }
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

            // $('#id').val(data[0]);
            $('#id').val(data[1]);
        
        });


        $('.editbtn').on('click', function() {
            $('#editexampleModal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function() {
                return $(this).text();
            }).get();


            $('#ids').val(data[1]);
            $('#imagepost').val(data[2]);
            $('#desc').val(data[3]);
            $('#cat').val(data[4]);


        });
    });
</script>






<?php
if (isset($_POST['submit'])) {

$name = $_POST["subject"];
 $post = $_POST["post"];
$filename = $_FILES["image"]["name"];
$email = $_SESSION["email"];
$query = $con->query("select * from blogger where email='$email'");

 while ($row = $query->fetch_assoc()) {
$department = $row['department'];
$bloggername = $row['name'];
$email= $row['email'];
}
 

$img = move_uploaded_file($_FILES["image"]["tmp_name"], "../admin/img/bloggerpost/" . $filename);
$sql = "INSERT INTO postbyblogger(`subject`,`image`,`post`,`department`,`name`,`email`) VALUES('$name','$filename','$post','$department','$bloggername','$email')";

     mysqli_query($con, $sql);
  
if($sql){
     echo "<script>window.location='Posts.php?msg=Post-Added'</script>";
}
    }

    if(isset($_POST['delete']))
    {
       
        $id = $_POST['id'];
        $query = $con->query("DELETE FROM `postbyblogger` WHERE id = '$id'");

   
      if($query){
        echo "<script>window.location='Posts.php?msg=Post-delete'</script>";
      }
    }

    if (isset($_POST["editService"])) {
        $id = $_POST["serId"];
        $cat = $_POST["subject"];
        $desc = $_POST["desc"];
        $filename = $_FILES["fileToUpload"]["name"];
        $tempname = $_FILES["fileToUpload"]["tmp_name"];
        // unlink("./img/adminpost/" . $filename);
        $folder = "../admin/img/bloggerpost/" . $filename;
        $old = $_POST['old'];
        if ($filename == '') {
            $check = $old;
        } else {
            $check = $_FILES["fileToUpload"]["name"];
        }
    
        $update = "UPDATE `postbyblogger` SET `subject`= '$cat', `image` = '$check', `post` = '$desc' where `id` = $id";
    
        // Execute query
        $file = mysqli_query($con, $update);
    
        // Now let's move the uploaded image into the folder: image
        move_uploaded_file($tempname, $folder);
        if ($update) {
            echo "<script>window.location='Posts.php?msg=update-sucessfully'</script>";
        }
    }
    

?>

