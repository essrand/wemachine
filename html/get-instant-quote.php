<?php	
$sessdir = 'session_dir';
ini_set('session.save_path', $sessdir); 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >
 <!--start of seo-->
    <title>wemachine.in - Get Your Instant Quote</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="canonical" href="https://www.wemachine.in">
    <meta property="og:type" content="Website" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:site_name" content="#No.1 Manufacturing Portal in the Industry for CNC machining, WireCut and Lathe">
    <meta property="og:url" content="https://www.wemachine.in">
    <meta name="identify-url" content="wemachine.in">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!--@if (ViewBag.Title == null)
    {-->
    <meta property="og:title" content="wemachine.in - manufacturing of custom designed products" />
    <!--}
    else
    {
    <meta property="og:title" content="@ViewBag.Title" />
    }-->
    <meta property="og:description" content="Precision Machined Components with quality checks and faster lead times">
    <meta property="og:image" content="">
    <meta property="og:image:secure_url" content="">
    <meta property="og:image:width" content="400">
    <meta property="og:image:height" content="400">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:locale" content="en-US">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@wemachinein">
    <meta name="twitter:creator" content="@wemachinein">
    <meta name="twitter:url" content="https://www.wemachine.in">
    <meta name="twitter:title" content="wemachine.in - manufacturing of custom designed products">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">

    <meta name="category" content="Manufacturing">
    <meta name="coverage" content="worldwide">
    <meta content="index,follow" name="robots">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
       
    <!--@*end of seo*@-->

<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-M7CV9450KB"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-M7CV9450KB');
</script>
</head>
<body>

<!-- Header -->
<header>
<!-- Top Part -->
<div class="top_part">
	<div class="container">
    	<ul>
            <li><a href="mailto:neweraenggworks@gmail.com"><i class="fa fa-envelope"></i> neweraenggworks@gmail.com</a></li>
        </ul>
    </div>
</div>

<!-- Nav Sec -->
<div class="nav_sec" id="header">
	<div class="container">
		<nav class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="images/logo.jpg" width="60" alt="We Machine" class="pull-left" /><span class="logo_text">WeMachine</span><span class="company_tagline">YOU THINK, WE MACHINE<sup> TM</sup></span></a>
            </div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="capability.html">Capability</a></li>
                    <li><a href="whoweare.html">Who We Are</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="get-instant-quote.php">Get Instant Quote</a></li>
                </ul>
			</div>
		</nav>
    </div>
</div>
   
</header>

<!-- Section -->
<section>
<!-- Detail Page -->
<div class="contact_sec">
	<div class="container">
    	
        <h2><strong>Get Instant Quote</strong></h2>
        
    	<div class="row">
        	<!-- Left -->
        	<div class="col-lg-12 col-sm-12 col-xs-12">
				<form id="contact_frm" method="post" action="quotemail.php" enctype="multipart/form-data">
				<div class="add_prod_form getquotefrm">
                <?php 
                if (isset($_SESSION['response']) && $_SESSION['response']==1){ unset($_SESSION["response"]); ?>
                <div class="alert alert-success quote-successmsg" role="alert">
                  Thanks for requesting a quick quote , we will prepare a qoute for you and a consultant will contact you soon.
                </div>
                <?php } else if(isset($_SESSION['response']) && $_SESSION['response']==0) { unset($_SESSION["response"]); ?>
                <div class="alert alert-danger quote-successmsg" role="alert">
                	Server error occured while processing your request. Please try again.
                </div>
                <?php } ?>
                	<div class="col-md-6 col-sm-12 col-xs-12">
                        <label>Upload File<span>*</span></label>
                        <input type="file" name="qfile" class="input_field">
                        <p class="errorForm fieldqfile"></p>
                    </div>
					<div class="col-md-6 col-sm-12 col-xs-12">
                        <label>Name<span>*</span></label>
                        <input type="text" name="fname" class="input_field">
                        <p class="errorForm fieldname"></p>
                    </div>
                    
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <label>Company Name<span>*</span></label>
                        <input type="text" name="cname" class="input_field">
                        <p class="errorForm fieldcname"></p>
                    </div>
                    
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <label>E-mail Address<span>*</span></label>
                        <input type="text" name="email" class="input_field">
                        <p class="errorForm fieldemail"></p>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <label>Message<span>*</span></label>
                        <textarea name="message" class="input_field_2"></textarea>
                        <p class="errorForm fieldmessage"></p>
                    </div>
                    
                   <div class="col-md-12 col-sm-12 col-xs-12">
                        <button class="submit_btn">SUBMIT </button>
                    </div>
				</div> 
                <div class="clearfix"></div><br /><br /><br /><br />
			</form>
            <br /> <br /> <br /> <br />		
            </div>
        </div>
    </div>
    

</div>
</section>


<!-- Footer -->
<footer>
<div class="footer_detail">
	
	
	<!-- Copyright -->
	<div class="copyright">
    	<div class="container">
        	<!-- Payment -->
    		<div class="social">
                <ul>
                    <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
					<li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
					<li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                </ul>
            </div>
            
            <div class="left">© 2017, <a href="#">WEMACHINE</a> | ALL RIGHTS RESERVED WEMACHINE</div>
            
        </div>
    </div>
</div>
</footer>

<!-- Top Arrow -->
<a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>

    
<!-- Js -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>  
<!-- Sticky -->
<script>
	$('#header').affix({
	      offset: {
        top: $('header').height()
      }
	});	
</script>

<!-- Top -->
<script>
// ===== Scroll to Top ==== 
$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});
$('#return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});

$('#contact_frm').submit(function(){
	$('.errorForm').html(' ');
	var qfile=$('input[name=qfile]').val();
	var fname=$('input[name=fname]').val();		
	var cname=$('input[name=cname]').val();
	var email=$('input[name=email]').val();
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var message=$('textarea[name=message]').val();	
	if(qfile=='') {
		$('input[name=qfile]').focus();
		$('.fieldqfile').html('Upload Your File');
		return false;
	} else if(fname=='') {
		$('input[name=fname]').focus();
		$('.fieldname').html('Enter Your Name');
		return false;
	} else if(cname=='') {
		$('input[name=cname]').focus();
		$('.fieldcname').html("Enter Your Company Name");			
		return false;
	} else if(email=='') {
		$('input[name=email]').focus();
		$('.fieldemail').html("Enter your Email Address");
		return false;
	} else if(reg.test(email)==false )
	{
		$('input[name=email]').focus();
		$('.fieldemail').html("Enter your Valid Email Address");
		return false;
	} else if(message=='') {
		$('textarea[name=message]').focus();
		$('.fieldmessage').html("Enter your message");
		return false;
	} else {		
		$('#contact_frm').submit();	
	}
});
</script>

</body>
</html>
