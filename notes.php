
<?php
include('admin/db.php');



?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>Hello, world!</title>
    <style>
        .bgimg {
            /* background-image: url('images/member-1.png'); */
            background-color: rgb(224, 212, 236);
            background-repeat: no-repeat;
        }

        .font {
            font-family: Georgia, 'Times New Roman', Times, serif;
        }

        .blog {
            font-family: "Times New Roman", Times, serif;
        }
    </style>
    
</head>

<body class="bgimg">

    <div>
        <ul>
            <li><a href=""><i class="fa fa-facebook" aria-hidden="true" style="color: white;"></i></a></li>
            <li><a href=""><i class="fa fab fa-twitter-square" aria-hidden="true" style="color: white;"></i></a></li>
            <li><a href=""><i class="fa fab fa-instagram" aria-hidden="true" style="color: white;"></i></a></li>
            <li><a href=""><i class="fa fab fa-google" aria-hidden="true" style="color: white;"></i></a></li>

        </ul>
        <nav>

            <div class="nav-left ">
                <!-- <img src="images/ucpLogo.png" class="logo" width="30px" height="120px" style="margin-left: 120px;"> -->
            </div>
            <div class="nav-right ">
                <div class="search-box " style="margin-top: 12px; margin-bottom:12px">
                    <button style="border:none;"><img src="images/search.png"></button>
                    <input type="text" style="border:none;" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data" >
                                    
                </div>

            </div>

            <div class="settings-menu">
                <div id="dark-btn">
                    <span></span>
                </div>
                <div class="settings-menu-inner">
                    <div class="user-profile">
                        <img src="images/profile-pic.png">
                        <div>
                            <p>John Nicholson</p>
                            <a href="#">See Your Profile</a>
                        </div>
                    </div>
                    <hr>
                    <div class="user-profile">
                        <img src="images/feedback.png">
                        <div>
                            <p>Give Feedback</p>
                            <a href="#">Help us to improve the new design</a>
                        </div>
                    </div>
                    <hr>


                </div>
            </div>
        </nav>

    </div>

    <div class="container-fluid mt-5 mb-5">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center"><img src="images/ucpLogo.png" alt="">
            </div>

        </div>
    </div>


    <div class="container">

        <div class="row">
            <div class=" col-lg-8">
                <div class=" mb-3" style="max-width: 1000px;">
                    <?php
                    $query = $con->query('select * from notes');
                    while ($row = $query->fetch_assoc()) {
                        $id  = $row['id'];
                      
                    ?>
                        <div class="row g-0">

                            <div class="container  mb-5" style="background-color: #E0D4EC;width:80%">
                                <div class="col-md-4">
                                 
                                    <?php
                                    $image = $row['image'];
                                    if ($image) {
                                    ?>
                                        <img src="./admin/img/notes/<?php echo  $image; ?>" width="400px" height="200px" class="post-img" >
                                    <?php
                                    } else {
                                    }

                                    ?>
                                </div>
<br>
                                <div class="col-md-8 ">
                                    <div class="card-body ">
                                        <b><h3 class="card-title blog"><?php echo $row['title'] ?></h3></b><br>
                                        <p class="card-text blog"><?php echo $row['desc']; ?>
                                        </p>
                        
                                        <p class="card-text align-self-end"><small class="text-muted"><?php echo  $row['time'] ?></small></p>
                                        <a href="./admin/img/notes/<?php echo $row['image']; ?>" download class="btn btn-success btn-sm">Download Notes</a>



                                    </div>



                                </div>
                            </div>






                        </div>
                    <?php
                    }
                    ?>
                </div>

            </div>




            <div class=" col-lg-4 ">
                <div class=" w-75  ">
                    <div class="card-body">
                        <h5 class="card-title font">Card title</h5>
                        <p class="card-text font">With supporting text below as a natural lead-in to additional content.
                        </p>

                    </div>

                </div>
                <hr>
                <div class=" w-75 ">
                    <div class="card-body">
                        <h5 class="card-title font">Categories</h5>
                        <p class="card-text font">With supporting text below as a natural lead-in to additional content.
                        </p>

                    </div>
                </div>
                <hr>
                <div class=" w-75">
                    <div class="card-body">
                        <h5 class="card-title font">Blogroll</h5>
                        <p class="card-text font">With supporting text below as a natural lead-in to additional content.
                        </p>

                    </div>
                </div>


                <hr>
                <div class=" w-75">
                    <div class="card-body">
                        <h5 class="card-title font">Blogroll</h5>
                        <p class="card-text font">With supporting text below as a natural lead-in to additional content.
                        </p>

                    </div>
                </div>

                <hr>
                <div class=" w-75">
                    <div class="card-body">
                        <h5 class="card-title font">Blogroll</h5>
                        <p class="card-text font">With supporting text below as a natural lead-in to additional content.
                        </p>

                    </div>
                </div>


                <hr>
                <div class=" w-75">
                    <div class="card-body">
                        <h5 class="card-title font">Blogroll</h5>
                        <p class="card-text font">With supporting text below as a natural lead-in to additional content.
                        </p>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="container col-lg-4">
                <div class="card " style="border: 1px solid;">
                    <img class="card-img-top" src="images/dep.jpg" alt="Card image cap">
                    <div class="card-body">
                        <title blog>card 1</title>
                        <p class="card-text font">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                    </div>
                </div>
            </div>




            <div class="container col-lg-4">
                <div class="card " style="border: 1px solid;">
                    <img class="card-img-top" src="images/dep1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text font">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                    </div>
                </div>
            </div>




            <div class="container col-lg-4">
                <div class="card " style="border: 1px solid;">
                    <img class="card-img-top" src="images/dep2.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text font">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                    </div>
                </div>
            </div>






        </div>
    </div>



           

           

  



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>