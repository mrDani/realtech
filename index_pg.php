<?php
    $msg ="";
if (isset($_POST['upload'])) {
    $target = "uploads/".basename($_FILES['image']['name']);

    $db = mysqli_connect("localhost","root", "","realtech");

    $image = $_FILES['image']['name'];
    $text = $_POST['text'];

    $sql = "INSERT into images (image, text) VALUES ('$image', '$text')";
    mysqli_query($db, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

        $msg = "uploaded imagelee successful";
    }else{
        $msg = "La image la fail";
    }
}



?>


<!DOCTYPE html>
<html>

<!-- Mirrored from gambolthemes.net/workwise_demo/HTML/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Jun 2019 10:45:26 GMT -->
<head>
<meta charset="UTF-8">
<title>login page</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
   <script type="text/javascript" src="js/jquery-min.Js"></script>
    <script type="text/javascript" src="js/bootstrap.min.Js"></script>
    <script type="text/javascript" src="js/jssor.slider.Js"></script>
    <script type="text/javascript" src="js/jquery-1.9.1.min.Js"></script>
<script type="text/javascript" src="js/jssor.Js"></script> 
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min(2).css">
<link rel="stylesheet" type="text/css" href="css/line-awesome.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" type="text/css" href="lib/slick/slick.css">
<link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
<style type="text/css">
    #result{
        background: white;
        width: 300px;
        margin-left: 50px;
        position: absolute;
        margin-top: 50px;
        z-index: 1;
        


    }
</style>
</head>


<body>
<?php



    session_start();

    if(isset($_GET['logout'])){

        $_SESSION["firstname"] = '';
        $_SESSION["lastname"] = '';
        $_SESSION["username"] = '';
        $_SESSION["age"] = '';
        $_SESSION["email"] = '';
        $_SESSION["password"] = '';
        $_SESSION["phone_number"] = '';
        $_SESSION["uniqid"] = '';

        setcookie("realtech", "", time()-3600);

    }





$username = $_SESSION['username'];
$password = $_SESSION['password'];
$avatar = '';
$firstname = '';
$lastname = '';
$age = '';
$email = '';
$phone_number = '';
$uniqid = '';

if($username != "" && $password != ""){

    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];
    $age = $_SESSION['age'];
    $email = $_SESSION['email'];
    $phone_number = $_SESSION['phone_number'];
    $uniqid = $_SESSION['uniqid'];

}else{

    $location = "index.php";

    header("Location: {$location}");

}


//echo $username;

?>

    <div class="wrapper">
        


        <header style="background-color: white;">
            <div style="background-color: #0066cc;" class="container thumbnial">
                <div class="header-data">
                    <div class="logo">
                        <a href="index.html" title=""><img src="images/logo.png" alt=""></a>
                    </div><!--logo end-->
                    <div class="search-bar">
                        <form>
                            <input type="text" name="search" id="search" placeholder="Search...">
                            <button type="submit"><i class="la la-search"></i></button>
                        </form>
                        </div><!--search-bar end-->
                        <div class="modal-content" id="result"></div>


                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('#search').keyup(function(){
                                    var txt = $(this).val();
                                    if(txt != '')
                                    {
                                        $('#result').html('');
                                        $.ajax({
                                            url:"fetch.php",
                                            method:"post",
                                            data:{search:txt},
                                            dataType:"text",
                                            success:function(data)
                                            {
                                                $('#result').html(data);
                                            }
                                        });
                                    }
                                    else{
                                        $('#result').html('');
                                    }
                                });
                            });

                        </script>
                        <nav>
                        <ul>
                            
                            <li>
                                <a href="#" title="">
                                    <span><img src="images/icon1.png" alt=""></span>
                                   Home
                                </a>
                            </li>
                            <li>
                                <a href="profile.php" title="">
                                    <span><img src="images/icon4.png" alt=""></span>
                                    Profiles
                                </a>
                               
                            </li>
                           
                            <li>
                                <a href="#" title="" class="not-box-open">
                                    <span><img src="images/icon6.png" alt=""></span>
                                    Messages
                                </a>
                                <div class="notification-box msg">
                                    <div class="nt-title">
                                        <h4>Setting</h4>
                                        <a href="#" title="">Clear all</a>
                                    </div>
                                    <div class="nott-list">
                                        <div class="notfication-details">
                                            <div class="noty-user-img">
                                                <img src="images/resources/ny-img1.png" alt="">
                                            </div>
                                            <div class="notification-info">
                                                <h3><a href="messages.html" title="">Jassica William</a> </h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</p>
                                                <span>2 min ago</span>
                                            </div><!--notification-info -->
                                        </div>
                                        <div class="notfication-details">
                                            <div class="noty-user-img">
                                                <img src="images/resources/ny-img2.png" alt="">
                                            </div>
                                            <div class="notification-info">
                                                <h3><a href="messages.html" title="">Jassica William</a></h3>
                                                <p>Lorem ipsum dolor sit amet.</p>
                                                <span>2 min ago</span>
                                            </div><!--notification-info -->
                                        </div>
                                        <div class="notfication-details">
                                            <div class="noty-user-img">
                                                <img src="images/resources/ny-img3.png" alt="">
                                            </div>
                                            <div class="notification-info">
                                                <h3><a href="messages.html" title="">Jassica William</a></h3>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempo incididunt ut labore et dolore magna aliqua.</p>
                                                <span>2 min ago</span>
                                            </div><!--notification-info -->
                                        </div>
                                        <div class="view-all-nots">
                                            <a href="messages.html" title="">View All Messsages</a>
                                        </div>
                                    </div><!--nott-list end-->
                                </div><!--notification-box end-->
                            </li>
                            <li>
                                <a href="#" title="" class="not-box-open">
                                    <span><img src="images/icon7.png" alt=""></span>
                                    Notification
                                </a>
                                <div class="notification-box">
                                    <div class="nt-title">
                                        <h4>Setting</h4>
                                        <a href="#" title="">Clear all</a>
                                    </div>
                                    <div class="nott-list">
                                        <div class="notfication-details">
                                            <div class="noty-user-img">
                                                <img src="images/resources/ny-img1.png" alt="">
                                            </div>
                                            <div class="notification-info">
                                                <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                                <span>2 min ago</span>
                                            </div><!--notification-info -->
                                        </div>
                                        <div class="notfication-details">
                                            <div class="noty-user-img">
                                                <img src="images/resources/ny-img2.png" alt="">
                                            </div>
                                            <div class="notification-info">
                                                <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                                <span>2 min ago</span>
                                            </div><!--notification-info -->
                                        </div>
                                        <div class="notfication-details">
                                            <div class="noty-user-img">
                                                <img src="images/resources/ny-img3.png" alt="">
                                            </div>
                                            <div class="notification-info">
                                                <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                                <span>2 min ago</span>
                                            </div><!--notification-info -->
                                        </div>
                                        <div class="notfication-details">
                                            <div class="noty-user-img">
                                                <img src="images/resources/ny-img2.png" alt="">
                                            </div>
                                            <div class="notification-info">
                                                <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                                <span>2 min ago</span>
                                            </div><!--notification-info -->
                                        </div>
                                        <div class="view-all-nots">
                                            <a href="#" title="">View All Notification</a>
                                        </div>
                                    </div><!--nott-list end-->
                                </div><!--notification-box end-->
                            </li>
                        </ul>
                    </nav><!--nav end-->
                    <div  class="menu-btn">
                        <a href="#" title=""><i class="fa fa-bars"></i></a>
                    </div><!--menu-btn end-->
                    <div style="background-color: #0066cc !important;" class="user-account">
                        <div style="color: #0066cc !important;" class="user-info">
                            <img src="images/resources/user.png" alt="">
                            <a href="#" title="">John</a>
                            <i class="la la-sort-down"></i>
                        </div>
                        <div class="user-account-settingss">
                            <h3>Online Status</h3>
                            <ul class="on-off-status">
                                <li>
                                    <div class="fgt-sec">
                                        <input type="radio" name="cc" id="c5">
                                        <label for="c5">
                                            <span></span>
                                        </label>
                                        <small>Online</small>
                                    </div>
                                </li>
                                <li>
                                    <div class="fgt-sec">
                                        <input type="radio" name="cc" id="c6">
                                        <label for="c6">
                                            <span></span>
                                        </label>
                                        <small>Offline</small>
                                    </div>
                                </li>
                            </ul>
                            <h3>Custom Status</h3>
                            <div class="search_form">
                                <form>
                                    <input type="text" name="search">
                                    <button type="submit">Ok</button>
                                </form>
                            </div><!--search_form end-->
                            <h3>Setting</h3>
                            <ul class="us-links">
                                <li><a href="profile-account-setting.html" title="">Account Setting</a></li>
                                <li><a href="#" title="">Privacy</a></li>
                                <li><a href="#" title="">Faqs</a></li>
                                <li><a href="#" title="">Terms & Conditions</a></li>
                            </ul>

                            <h3 class="tc"><a href="index_pg.php?logout=1" title="">Logout</a></h3>
                        </div><!--user-account-settingss end-->
                    </div>
                </div><!--header-data end-->
            </div>
        </header><!--header end-->  

        <main>
            <div class="main-section">
                <div class="container">
                    <div class="main-section-data">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                                <div class="main-left-sidebar no-margin">
                                    <div class="user-data full-width">
                                        <div class="user-profile">
                                            <div style="background-color: #0066cc !important;" class="username-dt">
                                                <div class="usr-pic">

                                                    <?php
                                                        $conn = mysqli_connect("localhost", "root", "", "realtech");
    $q = mysqli_query($conn, "SELECT * FROM list_of_names WHERE username ='".$username."'");

    $row = mysqli_fetch_array($q);

    $avatar =$row['avatar'];

                                                     echo "<img class ='img-responsive img-circle' src='photo/".$row['avatar']."' alt=''>";?>
                                                    
                                                </div>
                                            </div><!--username-dt end-->
                                            <div class="user-specs">
                                                <h3><?php echo $firstname." ".$lastname ?></h3>
                                                <span>Graphic Designer at Self Employed</span>
                                            </div>
                                        </div><!--user-profile end-->
                                        <ul class="user-fw-status">
                                            <li>
                                                <h4>Following</h4>
                                                <span>34</span>
                                            </li>
                                            <li>
                                                <h4>Followers</h4>
                                                <span>155</span>
                                            </li>
                                            <li>
                                                <a href="#" title="">View Profile</a>
                                            </li>
                                        </ul>
                                    </div><!--user-data end-->
                                    <div class="suggestions full-width">
                                        <div class="sd-title">
                                            <h3>Suggestions</h3>
                                            <i class="la la-ellipsis-v"></i>
                                        </div><!--sd-title end-->
                                        <div class="suggestions-list">
                                            <div class="suggestion-usd">
                                                <img src="images/resources/s1.png" alt="">
                                                <div class="sgt-text">
                                                    <h4>Jessica William</h4>
                                                    <span>Graphic Designer</span>
                                                </div>
                                                <span><i class="la la-plus"></i></span>
                                            </div>
                                            <div class="suggestion-usd">
                                                <img src="images/resources/s2.png" alt="">
                                                <div class="sgt-text">
                                                    <h4>John Doe</h4>
                                                    <span>PHP Developer</span>
                                                </div>
                                                <span><i class="la la-plus"></i></span>
                                            </div>
                                            <div class="suggestion-usd">
                                                <img src="images/resources/s3.png" alt="">
                                                <div class="sgt-text">
                                                    <h4>Poonam</h4>
                                                    <span>Wordpress Developer</span>
                                                </div>
                                                <span><i class="la la-plus"></i></span>
                                            </div>
                                            <div class="suggestion-usd">
                                                <img src="images/resources/s4.png" alt="">
                                                <div class="sgt-text">
                                                    <h4>Bill Gates</h4>
                                                    <span>C & C++ Developer</span>
                                                </div>
                                                <span><i class="la la-plus"></i></span>
                                            </div>
                                            <div class="suggestion-usd">
                                                <img src="images/resources/s5.png" alt="">
                                                <div class="sgt-text">
                                                    <h4>Jessica William</h4>
                                                    <span>Graphic Designer</span>
                                                </div>
                                                <span><i class="la la-plus"></i></span>
                                            </div>
                                            <div class="suggestion-usd">
                                                <img src="images/resources/s6.png" alt="">
                                                <div class="sgt-text">
                                                    <h4>John Doe</h4>
                                                    <span>PHP Developer</span>
                                                </div>
                                                <span><i class="la la-plus"></i></span>
                                            </div>
                                            <div class="view-more">
                                                <a href="#" title="">View More</a>
                                            </div>
                                        </div><!--suggestions-list end-->
                                    </div><!--suggestions end-->
                                    <div class="tags-sec full-width">
                                        <ul>
                                            <li><a href="#" title="">Help Center</a></li>
                                            <li><a href="#" title="">About</a></li>
                                            <li><a href="#" title="">Privacy Policy</a></li>
                                            <li><a href="#" title="">Community Guidelines</a></li>
                                            <li><a href="#" title="">Cookies Policy</a></li>
                                            <li><a href="#" title="">Career</a></li>
                                            <li><a href="#" title="">Language</a></li>
                                            <li><a href="#" title="">Copyright Policy</a></li>
                                        </ul>
                                        <div class="cp-sec">
                                            
                                            <p><img src="images/cp.png" alt="">Copyright 2019</p>
                                        </div>
                                    </div><!--tags-sec end-->
                                </div><!--main-left-sidebar end-->
                            </div>
                            <div class="col-lg-6 col-md-8 no-pd">
                                <div class="main-ws-sec">
                                    <div class="post-topbar">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="">
                                                                                                <?php
                                                        $conn = mysqli_connect("localhost", "root", "", "realtech");
    $q = mysqli_query($conn, "SELECT * FROM list_of_names WHERE username ='".$username."'");

    $row = mysqli_fetch_array($q);

    $avatar =$row['avatar'];

                                                     echo "<img class ='img-responsive img-circle' src='photo/".$row['avatar']."' alt=''>";?>
                                        </div>
                                            </div>
                                            <div class="col-md-10">
                                                <form action="index_pg.php" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="size" value="1000000">
                                                    <textarea type="text" name="text" class="form-control" placeholder="What's on your mind" style="height:80px;width: 100%;"></textarea>
                                                    <input type="file" name="image">
                                                    <button type="submit" name="upload" class="btn btn-info" style="width: 100%;">Post</button>
                                                </form>
                                                
                                                
                                            </div>
                                        </div>
                                        
                                    </div><!--post-topbar end-->
                                            <?php
                            $db = mysqli_connect("localhost","root", "","realtech");
                            $sql = "SELECT * FROM images";
                                           $result = mysqli_query($db , $sql);
                                       while ($row = mysqli_fetch_array($result)) {
                                        echo "<div class='posts-section'>
                                            <div class='post-bar'>
                                            <div class='post_topbar'>
                                                <div class='usy-dt'>
                                                    <img src='images/resources/us-pic.png' alt=''>
                                                    <div class='usy-name'>
                                                        <h3>$firstname $lastname</h3>
                                                        <span><img src='images/clock.png' alt=''>3 min ago</span>
                                                    </div>
                                                </div>
                                            </div>
                                   <img src='uploads/".$row['image']."' class='img-responsive img-thumbnail'/>
                                            <div class='job_descp'>

                                                <p>".$row['text']."<a href='#' title=''>view more</a></p>
                                            </div>
                                            <div class='job-status-bar'>
                                                <ul class='like-com'>
                                                    <li>
                                                        <a href='#'><i class='la la-heart'></i> Like</a>
                                                        <img src='images/liked-img.png' alt=''>
                                                        <span>25</span>
                                                    </li> 
                                                    <li><a href='#' title='' class='com'><img src='images/com.png' alt=''> Comment 15</a></li>
                                                </ul>
                                                <a><i class='la la-eye'></i>Views 50</a>
                                            </div>
                                        </div>

                                            </div>";
                                        }

        ?>
                                    
                                </div><!--main-ws-sec end-->
                            </div>
                            <div class="col-lg-3 pd-right-none no-pd">
                                <div class="right-sidebar">


 
                                    <div class="widget suggestions full-width">
                                        <div class="sd-title">
                                            <h3>Find Friends</h3>
                                            <i class="la la-ellipsis-v"></i>
                                        </div><!--sd-title end-->
                                        <div class="suggestions-list">
                                            <div class="suggestion-usd">
                                                <img src="images/resources/s1.png" alt="">
                                                <div class="sgt-text">
                                                    <h4>Jessica William</h4>
                                                    <span>Graphic Designer</span>
                                                </div>
                                                <span><i class="la la-plus"></i></span>
                                            </div>
                                            <div class="suggestion-usd">
                                                <img src="images/resources/s2.png" alt="">
                                                <div class="sgt-text">
                                                    <h4>John Doe</h4>
                                                    <span>PHP Developer</span>
                                                </div>
                                                <span><i class="la la-plus"></i></span>
                                            </div>
                                            <div class="suggestion-usd">
                                                <img src="images/resources/s3.png" alt="">
                                                <div class="sgt-text">
                                                    <h4>Poonam</h4>
                                                    <span>Wordpress Developer</span>
                                                </div>
                                                <span><i class="la la-plus"></i></span>
                                            </div>
                                            <div class="suggestion-usd">
                                                <img src="images/resources/s4.png" alt="">
                                                <div class="sgt-text">
                                                    <h4>Bill Gates</h4>
                                                    <span>C &amp; C++ Developer</span>
                                                </div>
                                                <span><i class="la la-plus"></i></span>
                                            </div>
                                            <div class="suggestion-usd">
                                                <img src="images/resources/s5.png" alt="">
                                                <div class="sgt-text">
                                                    <h4>Jessica William</h4>
                                                    <span>Graphic Designer</span>
                                                </div>
                                                <span><i class="la la-plus"></i></span>
                                            </div>
                                            <div class="suggestion-usd">
                                                <img src="images/resources/s6.png" alt="">
                                                <div class="sgt-text">
                                                    <h4>John Doe</h4>
                                                    <span>PHP Developer</span>
                                                </div>
                                                <span><i class="la la-plus"></i></span>
                                            </div>
                                            <div class="view-more">
                                                <a href="#" title="">View More</a>
                                            </div>
                                        </div><!--suggestions-list end-->
                                    </div>
                                </div><!--right-sidebar end-->
                            </div>
                        </div>
                    </div><!-- main-section-data end-->
                </div> 
            </div>
        </main>




        <div class="post-popup pst-pj">
            <div class="post-project">
                <h3>Post a project</h3>
                <div class="post-project-fields">
                    <form>
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="text" name="title" placeholder="Title">
                            </div>
                            <div class="col-lg-12">
                                <div class="inp-field">
                                    <select>
                                        <option>Category</option>
                                        <option>Category 1</option>
                                        <option>Category 2</option>
                                        <option>Category 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <input type="text" name="skills" placeholder="Skills">
                            </div>
                            <div class="col-lg-12">
                                <div class="price-sec">
                                    <div class="price-br">
                                        <input type="text" name="price1" placeholder="Price">
                                        <i class="la la-dollar"></i>
                                    </div>
                                    <span>To</span>
                                    <div class="price-br">
                                        <input type="text" name="price1" placeholder="Price">
                                        <i class="la la-dollar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <textarea name="description" placeholder="Description"></textarea>
                            </div>
                            <div class="col-lg-12">
                                <ul>
                                    <li><button class="active" type="submit" value="post">Post</button></li>
                                    <li><a href="#" title="">Cancel</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div><!--post-project-fields end-->
                <a href="#" title=""><i class="la la-times-circle-o"></i></a>
            </div><!--post-project end-->
        </div><!--post-project-popup end-->

        <div class="post-popup job_post">
            <div class="post-project">
                <h3>Post a job</h3>
                <div class="post-project-fields">
                    <form>
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="text" name="title" placeholder="Title">
                            </div>
                            <div class="col-lg-12">
                                <div class="inp-field">
                                    <select>
                                        <option>Category</option>
                                        <option>Category 1</option>
                                        <option>Category 2</option>
                                        <option>Category 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <input type="text" name="skills" placeholder="Skills">
                            </div>
                            <div class="col-lg-6">
                                <div class="price-br">
                                    <input type="text" name="price1" placeholder="Price">
                                    <i class="la la-dollar"></i>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="inp-field">
                                    <select>
                                        <option>Full Time</option>
                                        <option>Half time</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <textarea name="description" placeholder="Description"></textarea>
                            </div>
                            <div class="col-lg-12">
                                <ul>
                                    <li><button class="active" type="submit" value="post">Post</button></li>
                                    <li><a href="#" title="">Cancel</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div><!--post-project-fields end-->
                <a href="#" title=""><i class="la la-times-circle-o"></i></a>
            </div><!--post-project end-->
        </div><!--post-project-popup end-->



        <div class="chatbox-list">
            <div class="chatbox">
                <div class="chat-mg">
                    <a href="#" title=""><img src="images/resources/usr-img1.png" alt=""></a>
                    <span>2</span>
                </div>
                <div class="conversation-box">
                    <div class="con-title mg-3">
                        <div class="chat-user-info">
                            <img src="images/resources/us-img1.png" alt="">
                            <h3>John Doe <span class="status-info"></span></h3>
                        </div>
                        <div class="st-icons">
                            <a href="#" title=""><i class="la la-cog"></i></a>
                            <a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
                            <a href="#" title="" class="close-chat"><i class="la la-close"></i></a>
                        </div>
                    </div>
                    <div class="chat-hist mCustomScrollbar" data-mcs-theme="dark">
                        <div class="chat-msg">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
                            <span>Sat, Aug 23, 1:10 PM</span>
                        </div>
                        <div class="date-nd">
                            <span>Sunday, August 24</span>
                        </div>
                        <div class="chat-msg st2">
                            <p>Cras ultricies ligula.</p>
                            <span>5 minutes ago</span>
                        </div>
                        <div class="chat-msg">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
                            <span>Sat, Aug 23, 1:10 PM</span>
                        </div>
                    </div><!--chat-list end-->
                    <div class="typing-msg">
                        <form>
                            <textarea placeholder="Type a message here"></textarea>
                            <button type="submit"><i class="fa fa-send"></i></button>
                        </form>
                        <ul class="ft-options">
                            <li><a href="#" title=""><i class="la la-smile-o"></i></a></li>
                            <li><a href="#" title=""><i class="la la-camera"></i></a></li>
                            <li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
                        </ul>
                    </div><!--typing-msg end-->
                </div><!--chat-history end-->
            </div>
            <div class="chatbox">
                <div class="chat-mg">
                    <a href="#" title=""><img src="images/resources/usr-img2.png" alt=""></a>
                </div>
                <div class="conversation-box">
                    <div class="con-title mg-3">
                        <div class="chat-user-info">
                            <img src="images/resources/us-img1.png" alt="">
                            <h3>John Doe <span class="status-info"></span></h3>
                        </div>
                        <div class="st-icons">
                            <a href="#" title=""><i class="la la-cog"></i></a>
                            <a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
                            <a href="#" title="" class="close-chat"><i class="la la-close"></i></a>
                        </div>
                    </div>
                    <div class="chat-hist mCustomScrollbar" data-mcs-theme="dark">
                        <div class="chat-msg">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
                            <span>Sat, Aug 23, 1:10 PM</span>
                        </div>
                        <div class="date-nd">
                            <span>Sunday, August 24</span>
                        </div>
                        <div class="chat-msg st2">
                            <p>Cras ultricies ligula.</p>
                            <span>5 minutes ago</span>
                        </div>
                        <div class="chat-msg">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
                            <span>Sat, Aug 23, 1:10 PM</span>
                        </div>
                    </div><!--chat-list end-->
                    <div class="typing-msg">
                        <form>
                            <textarea placeholder="Type a message here"></textarea>
                            <button type="submit"><i class="fa fa-send"></i></button>
                        </form>
                        <ul class="ft-options">
                            <li><a href="#" title=""><i class="la la-smile-o"></i></a></li>
                            <li><a href="#" title=""><i class="la la-camera"></i></a></li>
                            <li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
                        </ul>
                    </div><!--typing-msg end-->
                </div><!--chat-history end-->
            </div>
            <div class="chatbox">
                <div class="chat-mg bx">
                    <a href="#" title=""><img src="images/chat.png" alt=""></a>
                    <span>2</span>
                </div>
                <div class="conversation-box">
                    <div class="con-title">
                        <h3>Messages</h3>
                        <a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
                    </div>
                    <div class="chat-list">
                        <div class="conv-list active">
                            <div class="usrr-pic">
                                <img src="images/resources/usy1.png" alt="">
                                <span class="active-status activee"></span>
                            </div>
                            <div class="usy-info">
                                <h3>John Doe</h3>
                                <span>Lorem ipsum dolor <img src="images/smley.png" alt=""></span>
                            </div>
                            <div class="ct-time">
                                <span>1:55 PM</span>
                            </div>
                            <span class="msg-numbers">2</span>
                        </div>
                        <div class="conv-list">
                            <div class="usrr-pic">
                                <img src="images/resources/usy2.png" alt="">
                            </div>
                            <div class="usy-info">
                                <h3>John Doe</h3>
                                <span>Lorem ipsum dolor <img src="images/smley.png" alt=""></span>
                            </div>
                            <div class="ct-time">
                                <span>11:39 PM</span>
                            </div>
                        </div>
                        <div class="conv-list">
                            <div class="usrr-pic">
                                <img src="images/resources/usy3.png" alt="">
                            </div>
                            <div class="usy-info">
                                <h3>John Doe</h3>
                                <span>Lorem ipsum dolor <img src="images/smley.png" alt=""></span>
                            </div>
                            <div class="ct-time">
                                <span>0.28 AM</span>
                            </div>
                        </div>
                    </div><!--chat-list end-->
                </div><!--conversation-box end-->
            </div>
        </div><!--chatbox-list end-->

    </div><!--theme-layout end-->



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/scrollbar.js"></script>
<script type="text/javascript" src="js/script.js"></script>

</body>

<!-- Mirrored from gambolthemes.net/workwise_demo/HTML/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Jun 2019 10:46:04 GMT -->
</html>