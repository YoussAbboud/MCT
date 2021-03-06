<?php require 'message.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MCT OMAN</title>

    <!-- load CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/et-line-font.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/vegas.min.css">
    <link rel="stylesheet" href="css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Rajdhani:400,500,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300">
    <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="fontawesome/css/fontawesome-all.min.css"> <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <link rel="stylesheet" href="css/style.css"> <!-- css style -->


    <style>
        .container {
            max-width: 820px;
            margin: 0px auto;
            margin-top: 50px;
        }

        .comment {
            float: left;
            width: 100%;
            height: auto;
        }

        .commenter {
            float: left;
        }

        .commenter img {
            width: 35px;
            height: 35px;
        }

        .comment-text-area {
            float: left;
            width: 100%;
            height: auto;
        }

        .textinput {
            float: left;
            width: 100%;
            min-height: 75px;
            outline: none;
            resize: none;
            border: 1px solid grey;
        }

        input {
            border-radius: 7px;


            border: 0;
            padding: 10px 5px;
            background: white no-repeat;

            background-image: linear-gradient(to bottom, red, red), linear-gradient(to bottom, silver, silver);
            /* sizes for the 2 images (default state) */
            background-size: 0 2px, 100% 1px;
            /* positions for the 2 images. Change both "50%" to "0%" or "100%" and tri again */
            background-position: 50% 100%, 50% 100%;

            /* animation solely on background-size */
            transition: background-size 0.3s cubic-bezier(0.64, 0.09, 0.08, 1);
        }

        input:focus,
textarea:focus{
  /* sizes for the 2 images (focus state) */
	background-size: 100% 2px, 100% 1px;
	outline: none;
}

        textarea {
            border-radius: 7px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;

            width: 100%;
        }

        #sub {
            width: 100%;
            background-color: white;
        }
    </style>


</head>


<body style="background-image:url(img/bg-01.jpg)">


    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav" style="height: 70px;">
        <div class="container-fluid">
            <a class="navbar-brand mx-auto" href="./index.html"
                style="color: whitesmoke    ; font-weight: bold; font-family: 'Cantarell', sans-serif; font-size: 25px;">
                <img src="./img/logo.png" alt="logo" height="42" width="42" id="img1"> MCT OMAN.</a>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto" style="color: black;">
                    <li class="nav-item frame"><a
                            style="font-family: Rajdhani; font-weight: bold; font-size: large; color: white;"
                            class="nav-link js-scroll-trigger" href="./index.html">Go back</a> </li>


                </ul>
            </div>


        </div>

    </nav>


    


    <div class="container mx-auto">

        <div class="row text-center">
            <div class="col-12">
                <h1 style="margin-top: 100px; margin-bottom: 50px; font-weight:700">Careers</h1>
            </div>
        </div>

        <!-- Display submission status -->
<?php if(!empty($statusMsg)){ ?>
    <p><?php echo $statusMsg; ?></p>
<?php } ?>
 
<!-- Display contact form -->
<form method="post" action="" enctype="multipart/form-data">
<div class="row mx-auto">
    <div class="col-lg-5">
    <div class="form-group">
        <input type="text" name="name" class="form-control"  placeholder="Name" required="">
    </div>
    </div>
    <div class="col-lg-7">
    <div class="form-group">
        <input type="email" name="email" class="form-control"  placeholder="Email address" required="">
    </div>
    </div>
    </div>
    <div class="row mx-auto">

    <div class="col-lg-12">
    <div class="form-group">
        <input type="text" name="subject" class="form-control"  placeholder="Subject" required="">
    </div>
    </div>
    </div>
    <div class="row mx-auto">
        <div class="col-lg-12">
    <div class="form-group">
        <textarea name="message" class="form-control" placeholder="Write your message here" required=""></textarea>
    </div>
        </div>
    </div>
    <div class="row mx-auto">
        <div class="col-lg-2">
            <p></p>
        </div>
        <div class="col-lg-8">
            <p style="font-weight: 700;">Please add Resume file without any White Space</p>
        </div>
        <div class="col-lg-2">
            <p></p>
        </div>
    </div>
    <div class="row mx-auto">
    <div class="col-lg-12">
    <div class="form-group">
        <input type="file" name="file" class="form-control" style="padding-bottom: 45px;">
    </div>
    </div>
    </div>

<div class="row ml-auto">
<div class="col-lg-4">    
<div class="submit" style="margin-bottom: 100px">
        <input id="sub" type="submit" name="submit" class="btn" value="SEND MESSAGE">
    </div>
</div>
</div>


</form>
    </div>
    
    </form>











    <!-- Footer-->
    <footer>
        <p class="small tm-copyright-text">Copyright &copy; <span class="tm-current-year">2020</span> MCT OMAN.

            Design: <a rel="nofollow" href="https://www.linkedin.com/in/youssabboud/" target="_blank"
                class="tm-text-highlight">©youss</a></p>
    </footer>



    <!-- load JS -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/vegas.min.js"></script>

    <script src="js/wow.min.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/main.js"></script>
    <script>
        
        /* DOM is ready
        ------------------------------------------------*/
        
    </script>

</body>

</html>