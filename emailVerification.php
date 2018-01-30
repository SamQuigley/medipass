<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>MediPass - Email Verification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/registration.js"></script>
    <script type="text/javascript" src="js/confirmPassword.js"></script>
    <script type="text/javascript" src="js/TandC.js"></script>


    <link href="css/registration-page.css" rel="stylesheet">
    <!-- Custom Stylesheet -->


</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            <a class="navbar-brand topnav" id="medipass_logo" href="index.html"><img src="img/medipass_logo_sm.png" class="img-responsive" alt="MediPass Logo"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#about">About</a>
                    </li>
                    <li>
                        <a href="#services">Services</a>
                    </li>
                    <li>
                        <a href="">Sign In</a>
                    </li>
                    <li>
                        <a href="registration.html">Sign Up</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">



        <!-- Registration form - START -->
        <div id="body-background" class="container">
            <div class="row">
                
                <div class="col-lg-6 regCont"  style="float:right; height:500px; ">
                        <h1>Email Sent</h1>
                        <hr>
                        <h4>An email has been sent to <?php session_start(); echo $_SESSION['myEmailVer'] ?> </h4>
                        <p>Please <u>click here</u>  if you did not recieve an email within 5 minutes</p>
                       
                            

                            </div>
                        </div>
                        </div>
            </div>
        </div>
        <!-- Registration form - END -->
    </div>
</body>

</html>
