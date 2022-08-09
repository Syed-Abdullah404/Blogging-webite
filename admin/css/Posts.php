<?php

include('header.php');
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
                            <option>Study</option>
                            <option>Event</option>
                            <option>Notice</option>
                            <option>Other</option>
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
<div class="modal fade " id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Edit Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Subject</label>
                        <select name="cars" id="cars" class="form-control">
                            <option value="volvo" disabled>Subject related to blog</option>
                            <option value="volvo">Study</option>
                            <option value="saab">Event</option>
                            <option value="opel">Notice</option>
                            <option value="audi">Other</option>
                        </select>
                        <label for="formFile" class="form-label">Image</label>
                        <input class="form-control" type="file" id="formFile">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Post</label>
                        <textarea name="" class="form-control"></textarea>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Edit</button>
            </div>
        </div>
    </div>
</div>
<!-- delete Modal -->
<div class="modal fade " id="myModaldel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
             
            </div>
            <div class="modal-body">
            <input type="text" name="id" id="id" value="">
                Are you sure you want to delete?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary">Yes</button>
            </div>
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
                                <th scope="col">#</th>

                                <th scope="col">Image</th>
                                <th scope="col">Posts</th>
                                <th scope="col">Categories</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query = $con->query('select * from postbyadmin');
                            while ($row = $query->fetch_assoc()) {
                                $id = 1;
                            ?>
                            <tr>
                                <th scope="row"><?php echo $id ?></th>

                                <td><img src="img/adminpost/<?php echo $row['image']; ?>" alt=""></td>
                                <td><?php echo $row['post']; ?></td>
                                <td><?php echo $row['subject']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-lg btn-lg-square btn-success " data-bs-toggle="modal" data-bs-target="#editModal">
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
        $('.editbtn').on('click', function() {
            $('#myModaldel').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function() {
                return $(this).text();
            }).get();


            $('#id').val(data[0]);
        

        });
    });
</script>

<?php
if (isset($_POST['submit'])) {

$name = $_POST["subject"];
 $post = $_POST["post"];
$filename = $_FILES["image"]["name"];
$byadmin = "by admin";

    move_uploaded_file($_FILES["image"]["tmp_name"], "img/adminpost/" . $filename);
    $sql = "INSERT INTO postbyadmin(`subject`,`image`,`post`,`byadmin`) VALUES('$name','$filename','$post','$byadmin')";

    mysqli_query($con, $sql);

    echo "<script>window.location='Posts.php?msg=products-Added'</script>";

}
?>