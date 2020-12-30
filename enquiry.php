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

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300">  <!-- Google web font "Open Sans" -->
        <link rel="stylesheet" href="/css/bootstrap.min.css">                                  <!-- https://getbootstrap.com/ -->
        <link rel="stylesheet" href="fontawesome/css/fontawesome-all.min.css">                <!-- https://fontawesome.com/ -->
        <link rel="stylesheet" type="text/css" href="slick/slick.css"/>                       
        <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
        <link rel="stylesheet" href="/css/style.css">                               <!-- css style -->
    
     
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
    </style>

        
    </head>
    

<body  style="background-color: rgb(29, 28, 28); padding-bottom: 200px;">


	<!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav" style="height: 70px;">
        <div class="container-fluid">
            <a class="navbar-brand mx-auto" href="./index.html"
                style="color: whitesmoke    ; font-weight: bold; font-family: 'Cantarell', sans-serif; font-size: 25px;"> <img
                    src="./img/logo.png" alt="logo" height="42" width="42" id="img1"> MCT OMAN.</a>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto" style="color: black;">
                    <li class="nav-item frame" ><a style="font-family: Rajdhani; font-weight: bold; font-size: large; color: white;" class="nav-link js-scroll-trigger" href="./index.html">Go back</a> </li>
                    
                    
                </ul>
            </div>
            
              
        </div>
        
    </nav>


    <?php 
if(isset($_POST["submit"]))
{
if(isset($_POST["message"]) && isset($_POST["email"]) && isset($_POST["user"]) && isset($_POST["subject"]))
{
$name = $_POST["user"];
$email = $_POST["email"];
$message = $_POST["message"];
$subject = $_POST["subject"];

$to = 'support@mctoman.com';

$headers = "From: ".$name."\r\n";
$send = mail($to, $subject, $message, $headers);

if($send)
{
    echo "<script type='text/javascript'>alert('Thank You for Contacting our Support, will get to you shortly');</script>";

mail($email,"Customer Support","Thank you For Contacting Customer Support, Will get to you shortly", "Customer Support at MCT OMAN");

}
else
{
?>
<span class="popuptext" id="myPopup">Try Again Later</span>
<?php
}
}
}
?>

  
  <div class="container mx-auto">
  
<div class="row text-center">
<div class="col-12">
        <h1 style="margin-top: 200px; margin-bottom: 50px;">Contact us</h1>
        </div>
</div>

    <div class="row" style="margin-bottom: 20px;">
        

      <div class="col-lg-12 col-md-2 ml-auto">

      <form method="post" action="enquiry.php">
        <input style="margin-right: 20px;" type="text" name="user" id="input-name" placeholder="Name">
        <input type="email" name="email" id="input-email" placeholder="Email address">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <input type="text" name="subject" id="input-subject" placeholder="Subject" style="width: 300px;">
        </div>
      
      <div class="col-lg-12 col-md-6 mx-auto comment" style="margin-top: 20px;">
        <textarea class="textinput" name="message" type="text" id="input-message" placeholder="Message" style="width: 500px; heigth: 300px"></textarea>
      </div>
      
      
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-3 mx-auto">
        <input type="submit" name="submit" value="Submit" id="input-submit">
      </div>
    </div>
  </div>

</form>

   


   


   
    
    
    
    <!-- Footer-->
    <footer>
        <p class="small tm-copyright-text">Copyright &copy; <span class="tm-current-year">2020</span> MCT OMAN. 
        
        Design: <a rel="nofollow" href="https://www.linkedin.com/in/youssabboud/" target="_blank" class="tm-text-highlight">©youss</a></p>
    </footer>



<!-- load JS -->
<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.min.js"></script>

<script src="/js/vegas.min.js"></script>

<script src="/js/wow.min.js"></script>
<script src="/js/smoothscroll.js"></script>
<script src="/js/main.js"></script>  
<script>      

function setupFooter() {
    var pageHeight = $('.tm-site-header-container').height() + $('footer').height() + 100;

    var main = $('.tm-main-content');

    if($(window).height() < pageHeight) {
        main.addClass('tm-footer-relative');
    }
    else {
        main.removeClass('tm-footer-relative');   
    }
}

/* DOM is ready
------------------------------------------------*/
$(function(){

    setupFooter();

    $(window).resize(function(){
        setupFooter();
    });

    $('.tm-current-year').text(new Date().getFullYear());  // Update year in copyright           
});

</script>             

</body>

</html>
