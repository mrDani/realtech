<!DOCTYPE html>
<html>
<head>
    <title>RealTech</title>
    <script type="text/javascript" src="js/jquery-min.Js"></script>
    <script type="text/javascript" src="js/bootstrap.min.Js"></script>
    <script type="text/javascript" src="js/jssor.slider.Js"></script>
    <script type="text/javascript" src="js/jquery-1.9.1.min.Js"></script>
    <script type="text/javascript" src="scripts/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="js/jssor.Js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />

    <script>
        var allowsubmit = false;
        $(function(){
            $('#confpass').keyup(function(e){

                var pass = $('#pass').val();
                var confpass = $(this).val();

                if(pass == confpass){

                    $('.error').text('');
                    allowsubmit = true;
                }else{

                    $('.error').text('Password not matching');
                    allowsubmit = false;
                }
            });

            $('#form').submit(function(){
                var pass = $('#pass').val();
                var confpass = $('#confpass').val();


                if(pass == confpass){
                    allowsubmit = true;
                }
                if(allowsubmit){
                    return true;
                }else{
                    return false;
                }
            });
        });
    </script>
    <style type="text/css">
        .bg-image{
            background: url(Images/1.jpg);
            background-size: cover;
            margin-top: 100px;
        }

        #ul li a{
            color: cyan;
            display: inline-block;
            text-decoration: none;
        }
        #ul li a:hover{
            color: black;
            text-decoration: underline;
            background-color: maroon;
        }
        #cont{
            background: url(Images/5.jpg) fixed;
            height: 300px;
            width: 100%;
            background-size: contain;

        }
    </style>
</head>
<body>
            <nav class="navbar navbar-inverse navbar-fixed-top" id="nav">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand"><h3>
                            <span style="color: red;font-family:;">R</span><span style="color: yellow;font-family: monospace;">e</span><span style="color: green;font-family: monospace;">a</span><span style="color: blue;font-family: monospace;">l</span><span style="color: white;font-family: monospace;">Tech</span>
                        </h3></a>

                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="nav nav-pills pull-right" id="ul">
                            <li><a href="#home">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#services">Service</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
<div  id="home" class="container thumbnail">
    <div class="container-fluid bg-image">

        <br><br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12"></div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php

                    if(isset($_POST['submit'])){


                        //echo"<h4>Submited</h4>";

                        $link = mysqli_connect("localhost", "root", "", "realtech");

                        if($link == false){

                            die("Error: Unable to connect " . mysqli_connect_error());

                        }else{

                            //echo "Connection Successful";

                        }

                        $firstname = $_POST['firstname'];
                        $lastname = $_POST['lastname'];
                        $username = $_POST['username'];
                        $age = $_POST['age'];
                        $email = $_POST['email'];
                        $phone_number = $_POST['phone_number'];
                        $pass = $_POST['pass'];


                        $error_check = "";

                        $email_check = filter_var($email, FILTER_VALIDATE_EMAIL);
                        $phone_check = filter_var($phone_number, FILTER_VALIDATE_FLOAT);


                        if($firstname == "" || $lastname == "" || $username== "" || $age == "" || $email == "" || $phone_number == "" ||$pass == ""){

                            $location = "index.php?err=3";

                            header("Location: {$location}");



                        } else if($email_check == false){

                            $location = "index.php?err=4";

                            header("Location: {$location}");



                        }else if($phone_check == false){

                            $location = "index.php?err=2";

                            header("Location: {$location}");


                        }else{

                            $sql_insert = "INSERT INTO list_of_names (firstname, lastname, username, age, email, phone_number, password)
                                VALUES ('$firstname', '$lastname', '$username', '$age', '$email', '$phone_number', '$pass')";

                            if(mysqli_query($link, $sql_insert)){

                                echo "<h5 style='color: green;'>Registration successful</h5>";

                            }else{

                                echo"Oops! There's an error somewhere";
                            }


                            //$uniqid = time()."_uniqid";

                            // echo $firstname." - ".$lastname." - ".$age." - ".$email;
                        }

                    }

                    ?>

                    <?php

                    if(isset($_GET["err"])){

                        $error_msg = $_GET['err'];

                        if($error_msg == "4"){

                            echo "<p style='color: red'>Invalid email addresst</p>";

                            // exit;

                        }else if($error_msg == "2"){

                            echo "<p style='color: red'>Invalid phone number</p>";

                            //exit;

                        }else if($error_msg == "3"){

                            echo "<p style='color: red'>Fields cannot be blank</p>";

                            //exit;
                        }


                    }else if(isset($_GET["success"])){


                        echo "<p style='color: green'>Successfully Signed Up</p>";
                    }

                    ?>

                    <?php

                    if(isset($_POST['login'])){

                        // echo"<h4>Submited</h4>";

                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        $link = mysqli_connect("localhost", "root", "", "realtech");

                        if($link == false){

                            die("Error: Unable to connect " . mysqli_connect_error());

                        }else{

                            //echo "Connection Successful";

                        }


                        $sql_sel = "SELECT * FROM list_of_names WHERE username = '$username' AND password = '$password'";

                        $result = mysqli_query($link, $sql_sel);

                        $login_count = mysqli_num_rows($result);

                        if($login_count >= 1){

                            //  echo "<h5 class='text-center' style='color: green;'>User Found</h5>";
                            $uniqid_db = md5(uniqid() . time());
                            $uniqid_login = md5(uniqid() . time())."_login";

                            // setcookie("realtech", $uniqid_db, time()+60*60*24*30);

                            session_start();

                            $login_data = mysqli_fetch_array($result);

                            $firstname = $login_data['firstname'];
                            $lastname = $login_data['lastname'];
                            $age = $login_data['age'];
                            $email = $login_data['email'];
                            $phone_number = $login_data['phone_number'];




                            $_SESSION["username"] = $username;
                            $_SESSION["password"] = $password;
                            $_SESSION["firstname"] = $firstname;
                            $_SESSION["lastname"] = $lastname;
                            $_SESSION["age"] = $age;
                            $_SESSION["email"] = $email;
                            $_SESSION["phone_number"] = $phone_number;
                            $_SESSION["uniqid"] = $uniqid_login;
                            $_COOKIE[session_name()]= 'realtech';


                            $location = "index_pg.php";

                            header("Location: {$location}");

                        }else{

                            // echo "Login details does not exist in the db";
                            $location = "index.php?err=1";

                            header("Location: {$location}");

                        }
                    }



                    ?>
                    <p class="text-center" style="color:red;">

                        <?php if(isset($_GET["err"])){

                            echo "Username and Password does not match";
                        }

                        ?>

                    </p>

                    <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4">Username</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="text" class="form-control" name="username" placeholder="Username" class="" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4">password</label>
                            <div class="col-md-8 col-sm-8">
                                <input type="password" class="form-control" name="password" placeholder="****" class="" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-6 col-sm-offset-2">
                                <input class="btn btn-success" value="Login" type="submit" name="login"  />
                            </div>
                            <label data-toggle="modal" data-target="#myModal"
                                   class="btn btn-info col-sm-offset-8 col-xs-offset-8">Create a New Account</label>
                        </div>


                    </form>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12"></div>
            </div>
        </div><br><br>



    </div>


    <body style="padding: 0; margin: 0; font-family: Arial, Verdana; background-color: #fff;">
    <!-- it works the same with all jquery version from 1.x to 2.x -->
    <script type="text/javascript" src="../js/jquery-1.9.1.min.js"></script>
    <!-- use jssor.slider.mini.js (40KB) or jssor.sliderc.mini.js (32KB, with caption, no slideshow) or jssor.sliders.mini.js (28KB, no caption, no slideshow) instead for release -->
    <!-- jssor.slider.mini.js = jssor.sliderc.mini.js = jssor.sliders.mini.js = (jssor.js + jssor.slider.js) -->
    <script type="text/javascript" src="../js/jssor.js"></script>
    <script type="text/javascript" src="../js/jssor.slider.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $ArrowKeyNavigation: true,                          //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 800,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0,                                   //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                $ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                },

                $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                    $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                    $AutoCenter: 0,                                 //[Optional] Auto center thumbnail items in the thumbnail navigator container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 3
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange thumbnails, default value is 1
                    $SpacingX: 3,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                    $SpacingY: 3,                                   //[Optional] Vertical space between each thumbnail in pixel, default value is 0
                    $DisplayPieces: 9,                              //[Optional] Number of pieces to display, default value is 1
                    $ParkingPosition: 260,                          //[Optional] The offset position to park thumbnail
                    $Orientation: 1,                                //[Optional] Orientation to arrange thumbnails, 1 horizental, 2 vertical, default value is 1
                    $DisableDrag: false                            //[Optional] Disable drag or not, default value is false
                }
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var bodyWidth = document.body.clientWidth;
                if (bodyWidth)
                    jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 980));
                else
                    window.setTimeout(ScaleSlider, 30);
            }

            ScaleSlider();

            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                $(window).bind('resize', ScaleSlider);
            }


            //if (navigator.userAgent.match(/(iPhone|iPod|iPad)/)) {
            //    $(window).bind("orientationchange", ScaleSlider);
            //}
            //responsive code end
        });
    </script>
    <div style="position: relative; width: 100%; background-color: #003399; overflow: hidden;">
        <div style="position: relative; left: 50%; width: 5000px; text-align: center; margin-left: -2500px;">
            <!-- Jssor Slider Begin -->
            <div id="slider1_container" style="position: relative; margin: 0 auto;
                top: 0px; left: 0px; width: 980px; height: 400px; background: url(../img/major/main_bg.jpg) top center no-repeat;">
                <!-- Loading Screen -->
                <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                    <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;
                        top: 0px; left: 0px; width: 100%; height: 100%;">
                    </div>
                    <div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;
                        top: 0px; left: 0px; width: 100%; height: 100%;">
                    </div>
                </div>
                <!-- Slides Container -->
                <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 980px;
                    height: 400px; overflow: hidden;">
                    <div>
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 10px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <br />
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 52px;
                                color: #FFFFFF;">results driven</span>
                            <br />
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 2.5em; color: #FFFFFF;">
                                iT Solutions & Services
                            </span>
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 1.5em; color: #FFFFFF;">
                                Our professional services help you address the ever evolving business and technological
                                challenges.
                            </span>
                            <br />
                            <br />
                            <a href="#">
                                <img src="../img/major/find-out-more-bt.png" border="0" alt="auction slider" width="215"
                                     height="50" />
                            </a>
                        </div>
                        <img src="../img/major/s2.png" style="position: absolute; top: 23px; left: 480px; width: 500px; height: 300px;" />
                        <img u="thumb" src="../img/major/s2t.jpg" />
                    </div>
                    <div>
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 10px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 52px;
                                color: #FFFFFF;">web design & development</span>
                            <br />
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 2.5em; color: #FFFFFF;">
                                Visually Compelling & Functional
                            </span>
                            <br />
                            <br />
                            <a href="#">
                                <img src="../img/major/find-out-more-bt.png" border="0" alt="ebay slideshow" width="215"
                                     height="50" />
                            </a>
                        </div>
                        <img src="../img/major/s3.png" style="position: absolute; top: 23px; left: 480px; width: 500px; height: 300px;" />
                        <img u="thumb" src="../img/major/s3t.jpg" />
                    </div>
                    <div>
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 10px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 52px;
                                color: #FFFFFF;">Online marketing</span>
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 2.5em; color: #FFFFFF;">
                                We enhance your brand, your website traffic and your bottom line online.
                            </span>
                            <br />
                            <br />
                            <a href="#">
                                <img src="../img/major/find-out-more-bt.png" border="0" alt="listing slider" width="215"
                                     height="50" />
                            </a>
                        </div>
                        <img src="../img/major/s4.png" style="position: absolute; top: 23px; left: 480px; width: 500px; height: 300px;" />
                        <img u="thumb" src="../img/major/s4t.jpg" />
                    </div>
                    <div>
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 10px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <br />
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 52px;
                                color: #FFFFFF;">web hosting</span>
                            <br />
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 2.5em; color: #FFFFFF;">
                                we offer the web's best hosting plans for every site.
                            </span>
                            <br />
                            <br />
                            <a href="#">
                                <img src="../img/major/find-out-more-bt.png" border="0" alt="ebay store slider" width="215"
                                     height="50" />
                            </a>
                        </div>
                        <img src="../img/major/s5.png" style="position: absolute; top: 23px; left: 480px; width: 500px; height: 300px;" />
                        <img u="thumb" src="../img/major/s5t.jpg" />
                    </div>
                    <div>
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 10px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 52px;
                                color: #FFFFFF;">domain name registration</span>
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 2.5em; color: #FFFFFF;">
                                Secure your online identity and register your domain now.
                            </span>
                            <br />
                            <br />
                            <a href="#">
                                <img src="../img/major/find-out-more-bt.png" border="0" alt="listing template slider"
                                     width="215" height="50" />
                            </a>
                        </div>
                        <img src="../img/major/s6.png" style="position: absolute; top: 23px; left: 480px; width: 500px; height: 300px;" />
                        <img u="thumb" src="../img/major/s6t.jpg" />
                    </div>
                    <div>
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 10px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <br />
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 52px;
                                color: #FFFFFF;">video production</span>
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 2.5em; color: #FFFFFF;">
                                Make a greater impact on your clients through interactive Video Production.
                            </span>
                            <br />
                            <br />
                            <a href="#">
                                <img src="../img/major/find-out-more-bt.png" border="0" alt="auction template slider"
                                     width="215" height="50" />
                            </a>
                        </div>
                        <img src="../img/major/s7.png" style="position: absolute; top: 23px; left: 480px; width: 500px; height: 300px;" />
                        <img u="thumb" src="../img/major/s7t.jpg" />
                    </div>
                    <div>
                        <div style="position: absolute; width: 480px; height: 300px; top: 10px; left: 10px;
                            text-align: left; line-height: 1.8em; font-size: 12px;">
                            <span style="display: block; line-height: 1em; text-transform: uppercase; font-size: 52px;
                                color: #FFFFFF;">mobile applications</span>
                            <br />
                            <span style="display: block; line-height: 1.1em; font-size: 2.5em; color: #FFFFFF;">
                                Stay connected to your customers on the go with a MajorMedia custom mobile app.
                                <br />
                                <br />
                                <a href="#">
                                    <img src="../img/major/find-out-more-bt.png" border="0" alt="ebay slider" width="215"
                                         height="50" />
                                </a>
                        </div>
                        <img src="../img/major/s8.png" style="position: absolute; top: 23px; left: 480px; width: 500px; height: 300px;" />
                        <img u="thumb" src="../img/major/s8t.jpg" />
                    </div>
                </div>
                <!-- Arrow Navigator Skin Begin -->
                <style>
                    /* jssor slider arrow navigator skin 07 css */
                    /*
                    .jssora07l              (normal)
                    .jssora07r              (normal)
                    .jssora07l:hover        (normal mouseover)
                    .jssora07r:hover        (normal mouseover)
                    .jssora07ldn            (mousedown)
                    .jssora07rdn            (mousedown)
                    */
                    .jssora07l, .jssora07r, .jssora07ldn, .jssora07rdn {
                        position: absolute;
                        cursor: pointer;
                        display: block;
                        background: url(../img/a07.png) no-repeat;
                        overflow: hidden;
                    }

                    .jssora07l {
                        background-position: -5px -35px;
                    }

                    .jssora07r {
                        background-position: -65px -35px;
                    }

                    .jssora07l:hover {
                        background-position: -125px -35px;
                    }

                    .jssora07r:hover {
                        background-position: -185px -35px;
                    }

                    .jssora07ldn {
                        background-position: -245px -35px;
                    }

                    .jssora07rdn {
                        background-position: -305px -35px;
                    }
                </style>
                <!-- Arrow Left -->
                <span u="arrowleft" class="jssora07l" style="width: 50px; height: 50px; top: 123px;
                    left: 8px;"></span>
                <!-- Arrow Right -->
                <span u="arrowright" class="jssora07r" style="width: 50px; height: 50px; top: 123px;
                    right: 8px"></span>
                <!-- Arrow Navigator Skin End -->
                <!-- ThumbnailNavigator Skin Begin -->
                <div u="thumbnavigator" class="jssort04" style="position: absolute; width: 600px;
                    height: 60px; right: 0px; bottom: 0px;">
                    <!-- Thumbnail Item Skin Begin -->
                    <style>
                        /* jssor slider thumbnail navigator skin 04 css */
                        /*
                        .jssort04 .p            (normal)
                        .jssort04 .p:hover      (normal mouseover)
                        .jssort04 .pav          (active)
                        .jssort04 .pav:hover    (active mouseover)
                        .jssort04 .pdn          (mousedown)
                        */
                        .jssort04 .w, .jssort04 .pav:hover .w {
                            position: absolute;
                            width: 60px;
                            height: 30px;
                            border: #0099FF 1px solid;
                        }

                        * html .jssort04 .w {
                            width: /**/ 62px;
                            height: /**/ 32px;
                        }

                        .jssort04 .pdn .w, .jssort04 .pav .w {
                            border-style: solid;
                        }

                        .jssort04 .c {
                            width: 62px;
                            height: 32px;
                            filter: alpha(opacity=45);
                            opacity: .45;
                            transition: opacity .6s;
                            -moz-transition: opacity .6s;
                            -webkit-transition: opacity .6s;
                            -o-transition: opacity .6s;
                        }

                        .jssort04 .p:hover .c, .jssort04 .pav .c {
                            filter: alpha(opacity=0);
                            opacity: 0;
                        }

                        .jssort04 .p:hover .c {
                            transition: none;
                            -moz-transition: none;
                            -webkit-transition: none;
                            -o-transition: none;
                        }
                    </style>
                    <div u="slides" style="bottom: 25px; right: 30px;">
                        <div u="prototype" class="p" style="position: absolute; width: 62px; height: 32px; top: 0; left: 0;">
                            <div class="w">
                                <thumbnailtemplate style="width: 100%; height: 100%; border: none; position: absolute; top: 0; left: 0;"></thumbnailtemplate>
                            </div>
                            <div class="c" style="position: absolute; background-color: #000; top: 0; left: 0">
                            </div>
                        </div>
                    </div>
                    <!-- Thumbnail Item Skin End -->
                </div>
                <!-- ThumbnailNavigator Skin End -->
                <a style="display: none" href="http://www.jssor.com">jquery photo gallery</a>
            </div>
            <!-- Jssor Slider End -->
        </div>
    </div>
    </body>

</div>


<section id="about">

    <div class="container">
        <h2 style="background-color: #657abc;font-family: monospace;text-align: center;">About Us</h2>
        <div class="row">
            <div class="col-md-6 col-xs-12 thumbnail" style="width: 45%;">
                <h3>We provide realtech informations</h3>
                <p>Lorem ipsum dolor sit amet lorem Lorem ipsum dolor sit amet lorem Lorem ipsum dolor sit amet lorem Lorem ipsum dolor sit amet lorem Lorem ipsum dolor sit amet lorem Lorem ipsum dolor sit amet lorem Lorem ipsum dolor sit amet lorem Lorem ipsum dolor sit amet lorem Lorem ipsum dolor sit amet lorem Lorem ipsum dolor sit amet lorem Lorem ipsum dolor sit amet lorem Lorem ipsum dolor sit amet lorem Lorem ipsum dolor sit amet lorem Lorem ipsum dolor sit amet lorem Lorem ipsum dolor sit amet lorem Lorem ipsum dolor sit amet lorem Lorem ipsum dolor sit amet lorem Lorem ipsum dolor sit amet lorem Lorem ipsum dolor sit amet lorem Lorem ipsum dolor sit amet lorem Lorem ipsum dolor sit amet lorem Lorem ipsum dolor sit amet lorem Lorem ipsum dolor sit amet lorem Lorem ipsum dolor sit amet loremLorem ipsum dolor sit amet Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet lorem </p>
            </div>
            <div class="col-md-6 col-xs-12 thumbnail" style="width: 45%;margin-left: 20px;">
                <div class="col-sm-6 col-xs-12">
                    <img src="Images/5.jpg" class="img-responsive">
                    <br>
                    <img src="Images/1.jpg" class="img-responsive">
                </div>
                <div class="col-sm-6 col-xs-12">
                    <img src="Images/3.jpg" class="img-responsive">
                    <br>
                    <img src="Images/4.jpg" class="img-responsive">
                </div>
            </div>
        </div>
    </div>
</section>

<section id="services">
    <div class="container">
        <h2 style="background-color: #657abc;font-family: monospace;text-align: center;">Services</h2>      
            
        </div>
        <hr>
        <div class="container-fluid" id="cont">
            <div class="container-fluid bg-primary" style="height: 300px;background-color: rgba(102,179,255,0.7);">
                <div class="row">
                    <div class="col-sm-4 col-xs-12">
                        <h5>We provide the best service you can get</h5>
                        <hr>
                        <h5>Latest Technologies</h5>
                        <hr>
                        <h5>New Devices</h5>
                        <hr>
                        <h5>Quantum Technologies</h5>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <img src="Images/001.jpg" alt="what's wrong" class="img-responsive img-circle img-thumbnail">
                      
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <h5>Latest Technologies</h5>
                        <hr>
                        <h5>Latest Technologies</h5>
                        <hr>
                        <h5>Latest Technologies</h5>
                        <hr>
                        <h5>Latest Technologies</h5>
                    </div>
                </div>
            </div>
        </div>
</section>
<section id="contact">
    <div class="container" style="height: 300px;">
        <h2 style="background-color: #657abc;font-family: monospace;text-align: center;">Contact Us</h2> 
        <form class="form-horizontal">
            <div class="form-group">
                <label class="control-label col-sm-3">Username</label>
                <div class="col-sm-9">
                    <input type="text" name="username" placeholder="Username" class="form-control">
                </div>
                
            </div>
                        <div class="form-group">
                <label class="control-label col-sm-3">Message</label>
                <div class="col-sm-9">
                    <textarea type="text" name="username" placeholder="Leave a message" class="form-control"></textarea>
                </div>
                
            </div>

            <button type="submit" class="btn btn-info pull-right">Submit</button>
        </form>
        </form>
    </div>
</section>
<footer>
            <div class="container-fluid"  style="background-color:black;">
            <p style='color:white;' class="text-center ">&copy;<?php echo date("Y"); ?>
                <span style="color: red;font-weight: bold;font-family: sans-serif;">R</span><span style="color: yellow;font-weight: bold;font-family: sans-serif;font-family: ;">e</span><span style="color: green;font-weight: bold;font-family: sans-serif;">a</span><span style="color: blue;font-weight: bold;font-family: sans-serif;">l</span><span style="color: white;font-weight: bold;font-family: sans-serif;">Tech</span>
                All Rights Reserved
             </p>
        </div>
</footer>
</body>
</html>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 style="color:orange;" class="modal-title" id="myModalLabel">Registration</h4>
            </div>
            <div class="modal-body col-sm-8 col-sm-offset-2">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="firstname" placeholder="Enter Your FirstName" required />
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lastname" placeholder="Enter Your LastName" required />
                    </div>
                    <div class="form-group ">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter Your Username" required />
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input type="text" class="form-control" name="age" placeholder="dd-mm-yy" required />
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="text" class="form-control" name="email" placeholder="E-mail address" required />
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="phone_number" placeholder="Enter Your Number not Ur mom's" required/>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="pass" id="pass" placeholder="*****" required/>

                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="confpass" id="confpass" placeholder="*****" required/>

                    </div>
                    <div class="form-group">
                        <span class="error" style="color:red"></span><br />
                    </div>
                    <input class="btn btn-success" value="Sign Up" type="submit" name="submit" />

                </form>
            </div>
        </div>
    </div>
</div>
      <script>
        $('.nav li a').on('click', function (event) {
            event.preventDefault();
            var target = $(this).attr('href');
            var offsetTop = $(target).offset().top;
            $('html, body').animate({
                scrollTop: offsetTop
            }, 1000);

        });
    </script>