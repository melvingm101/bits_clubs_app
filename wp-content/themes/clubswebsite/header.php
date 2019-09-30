<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      
   
      
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
      
    <title>BITS Clubs</title>
    
    <style>
        html, body{
            margin-bottom: 0; 
        }
        
        
        .Site {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }
        
        #foot {
            left:0;
            bottom:0;
            height: 50px;
            position: absolute;
            width: 100%;
        }

        .Site-content {
            flex: 1;
        }
       
        .mtc{
            transform: translateY(50px);
            transition: all 1000ms ease-in;
            opacity: 0;
        }

        .mtc-animate{
            transform: translateY(0px);
            opacity: 1;
        }

        .mtc1{
            opacity: 0;
            transition: all 1000ms ease-in;
        }

        .mtc1-animate{
            opacity: 1;
        }
        
        .imageOver{
            opacity: 1;
            transition: 0.5s ease;
        }
        
        
        
        .textOverlay{
            opacity: 0;
            align-text: center;
            transition: 0.5s ease;
        }
        
        
        .middle{
            position: absolute;
            top: 50%;
            
        }
        
        .containerOverlay:hover .textOverlay{
            opacity: 1;
        }
        
        .containerOverlay:hover .imageOver{
            opacity: 0.3;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    
<script>
  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "7c65e474-7bde-4aad-b860-7674dbbc321e",
    });
  });
</script>
    
    <?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); ?>
    <?php wp_head()?>
  </head>
  <body style="position: relative;
  min-height: 100vh; font-family: 'Quicksand', sans-serif; font-weight: 500;">
    <nav class="navbar navbar-expand-lg fixed-top justify-content-between align-items-center navbar-light bg-light" id="navbar" style="min-height: 80px;
    box-shadow: 0px 1px 10px #333;">
        <a class="navbar-brand" href="<?php echo get_home_url(); ?>">
            <img src="https://bitsclubs.azurewebsites.net/wp-content/uploads/2018/10/BC.svg" class="ml-3" width="30" height="30" alt="">
        </a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mx-auto">
                <a class="nav-item nav-link ml-md-5 mr-5 active" href="http://bitsclubs.azurewebsites.net/about-the-website/">About</a>
                <a class="nav-item nav-link ml-md-5 mr-5 active" href="http://bitsclubs.azurewebsites.net/clubs/">Clubs</a>
                <a class="nav-item nav-link ml-md-5 mr-5 active" href="http://bitsclubs.azurewebsites.net/events/">Events</a>
                <a class="nav-item nav-link ml-md-5 mr-5 active" href="http://bitsclubs.azurewebsites.net/announcements/">Announcements</a>
                <a class="nav-item nav-link ml-md-5 mr-5 active" href="http://bitsclubs.azurewebsites.net/complaints/">Complaints</a>
                <a class="nav-item nav-link ml-md-5 mr-5 active" href="http://bitsclubs.azurewebsites.net/wp-admin/">Log In</a>
            </div>
        </div>
    </nav>
      
      