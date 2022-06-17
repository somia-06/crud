<?php

require_once("nav.html");
require_once("connection.php");
session_start();
if (empty($_SESSION["user_info"])) {
  header('location: login.html?loginfirst');
} else {
  $user = $_SESSION["user_info"];
}


?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" href="home.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>


<body>


  <section class="h-100 gradient-custom-2">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-9 col-xl-7">
          <div class="card">
            <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
              <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                <img src="ava1-bg.webp" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark" style="z-index: 1;">
                  Edit profile
                </button>
              </div>
              <div class="ms-3" style="margin-top: 130px;">
                <h5><?= $user["user_name"] ?></h5>
                <p>New York</p>
              </div>
            </div>
            <div class="p-4 text-black" style="background-color: #f8f9fa;">
              <div class="d-flex justify-content-end text-center py-1">
                <div>
                  <p class="mb-1 h5">253</p>
                  <p class="small text-muted mb-0">Photos</p>
                </div>
                <div class="px-3">
                  <p class="mb-1 h5">1026</p>
                  <p class="small text-muted mb-0">Followers</p>
                </div>
                <div>
                  <p class="mb-1 h5">478</p>
                  <p class="small text-muted mb-0">Following</p>
                </div>
              </div>
            </div>
               
            <a href="friend_request.php" class="h3 mx-4 my-2"> friend_request </a>

            <div class="card-body p-4 text-black">

              <div class="mb-5">
                <form action="post_create.php" method="post" enctype="multipart/form-data">
                  <!--Material textarea-->
                  <!--Material textarea-->
                  <div class="md-form mb-4 pink-textarea active-pink-textarea">
                    <textarea id="form18" name="body" class="md-textarea form-control" rows="3" placeholder="say caption"></textarea>
                  </div>

                  <div class="file-upload-wrapper">
                    <input type="file" name="imgs[]" id="input-file-max-fs" class="file-upload" data-max-file-size="2M" multiple />
                  </div>

                  <button type="submit" class="btn btn-primary btn-sm mt-3">Share</button>
                </form>
              </div>





      
              <?php
              
              // $qry = "select p.id , p.body, p. create_at , u.user_name  ,post_img.url , post_img.posts_id from users u join posts p on (u.id = p.users_id) join post_img on (post_img.posts_id = p.id) order by p.create_at desc";
              $qry = "select p.id , p.body, p. create_at , u.user_name  ,get_first_img(p.id) url from users u join posts p on (u.id = p.users_id) order by p.create_at desc";


              $rslt = mysqli_query($conn, $qry);
              while ($post = mysqli_fetch_assoc($rslt)) {
              $_SESSION["post_Info"] =$post;
              
              
              ?>


                <div class="d-flex flex-start align-items-center">
                  <img class="rounded-circle shadow-1-strong me-3" src="" alt="avatar" width="60" height="60" />
                  <div>
                    <h6 class="fw-bold text-primary mb-1"><?= $post["user_name"] ?></h6>
                    <p class="text-muted small mb-0">
                      <?= $post["create_at"]  ?>
                    </p>
                  </div>
                </div>



                <div class="d-flex flex-row-reverse">
                  <a href="home.php?id<?= $post["id"] ?>" type="" class="btn btn-dark btn-floating rounded-pill ">Update</a>
                  <a href="delete.php?id=<?= $post["id"] ?>" class="btn btn-info btn-floating rounded-pill ">Delete</a>
                </div>

                <div class="mt-3 mb-4 pb-2">
                  <p class="lead fw-normal mb-0 mt-2"><?= $post["body"] ?></p>
                </div>
                
              
                
                
                <div class="row g-2">
                  <div class="col mb-2">
                    <img src="<?= $post["url"] ?>" alt="image 1" class="w-100 img-fluid  rounded-3">
                </div>


                  <!-- <div class="col mb-2">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(107).webp"
                  alt="image 1" class="w-100 rounded-3">
              </div> -->
                </div>
                

                <div class="large d-flex justify-content-start mb-4">
                  <a href="#!" class="d-flex align-items-center me-3">
                    <i class="far fa-thumbs-up me-2"></i>
                    <p class="mb-0">Like</p>
                  </a>
                  <a href="comment.php" class="d-flex align-items-center me-3">
                    <i class="far fa-comment-dots me-2"></i>
                    <p class="mb-0">Comment</p>
                  </a>
                  <a href="#!" class="d-flex align-items-center me-3">
                    <i class="fas fa-share me-2"></i>
                    <p class="mb-0">Share</p>
                  </a>
                </div>


                
                <hr>

                      

                <!-- <div class="row g-2">
              <div class="col">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(108).webp"
                  alt="image 1" class="w-100 rounded-3">
              </div>
              <div class="col">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(114).webp"
                  alt="image 1" class="w-100 rounded-3">
              </div>
            </div>  -->

              <?php
              }
              mysqli_close($conn);
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  








  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>