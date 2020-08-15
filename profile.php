<?php



    session_start();

    if(isset($_GET['logout'])){

        $_SESSION["firstname"] = '';
        $_SESSION["lastname"] = '';
        $_SESSION["avatar"] = '';
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

$_SESSION['username'] = $username;

?>
<?php
if (isset($_POST['submit'])) {
    move_uploaded_file($_FILES['file']['tmp_name'],"photo/".$_FILES['file']['name']);
    $conn = mysqli_connect("localhost", "root", "", "realtech");
    $sql = "UPDATE list_of_names SET avatar = '".$_FILES['file']['name']."' WHERE username = '".$username."'";
    mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>MyProfile</title>
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
        position: fixed;
        margin-top: 50px;
        z-index: 1;
    }
  
                input.hidden {
    position: absolute;
    left: -9999px;
}

#profile-image1 {
    cursor: pointer;
  
     width: 100px;
    height: 100px;
  border:2px solid #03b1ce ;}
  .tital{ font-size:16px; font-weight:500;}
   .bot-border{ border-bottom:1px #f8f8f8 solid;  margin:5px 0  5px 0}

</style>
</head>
<body>

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
                                <a href="index_pg.php" title="">
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

        <div class="container">
            <div class="row">
                      <div class="col-md-7 ">

<div class="panel panel-default">
  <div class="panel-heading">  <h4 >User Profile</h4></div>
   <div class="panel-body">
       
    <div class="box box-info">
        
            <div class="box-body">
                     <div class="col-sm-6">
                     <div  align="center"> 
                                            <?php
    $conn = mysqli_connect("localhost", "root", "", "realtech");
    $q = mysqli_query($conn, "SELECT * FROM list_of_names WHERE username ='".$username."'");

    $row = mysqli_fetch_array($q);

    $avatar =$row['avatar'];


        if ($avatar == "") {
            echo "<img alt='User Pic' src='https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg' id='profile-image1' class='img-circle img-responsive'>";

        }else{
            echo "<img id='profile-image1' class='img-circle img-responsive' src ='photo/".$row['avatar']."'>";
        }
    echo "<div>Click on the image to change profile picture</div>";
    ?>

              <form action="" method="POST" enctype="multipart/form-data">
                     <input id="profile-image-upload" class="hidden" type="file" name="file">
                     <button type="submit" name="submit" class="btn btn-info">Update image</button>
              </form>
                   
                <!--Upload Image Js And Css-->
           
              

                
                
                     
                     
                     </div>
              
              <br>
    
              <!-- /input-group -->
            </div>
            <div class="col-sm-6">
            <h1 style="color:#00b1b1;"><?php echo $firstname ." ". $lastname;?> </h1>
                         
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
    
              
<div class="col-sm-5 col-xs-6 tital " >First Name:</div><div class="col-sm-7 col-xs-6 "><?php echo $firstname;?></div>
     <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Last Name:</div><div class="col-sm-7"><?php echo $lastname;?></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Username</div><div class="col-sm-7"><?php echo $username;?></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Email Address:</div><div class="col-sm-7"><?php echo $email;?></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Date Of Birth:</div><div class="col-sm-7"><?php echo $age;?></div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Phone Number:</div><div class="col-sm-7"><?php echo $phone_number;?></div>

 <div class="clearfix"></div>
<div class="bot-border"></div>




            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
       
            
    </div> 
    </div>
</div>  
    <script>
              $(function() {
    $('#profile-image1').on('click', function() {
        $('#profile-image-upload').click();
    });
});       
              </script> 
       
       
       
            </div>
        </div>



        
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/scrollbar.js"></script>
<script type="text/javascript" src="js/script.js"></script>

</body>
</body>
</html>