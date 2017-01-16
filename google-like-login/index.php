<?php session_start();
if (!empty($_REQUEST['logout'])) {
  unset($_SESSION['loggedin']);
  header("location: ./");
  if ( $_REQUEST['logout'] == 'a'){
    session_unset();
  }
}
$email ='';
$data_input = 'user';
$placeholder = 'Email';
$rmvacc ='display:none;';
$data_input_type = 'text';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Script Kiddies Google Like Login</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <!--<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>-->
  <style type="text/css">
    .btn {
      width: 100%;
    }
    img {
      max-width: 200px!important;
    }
    input {
      margin: 0 !important;
    }
    .bottom-0 {
      margin-bottom: 0;
    }
    #error-message {
      color: red;
    }
    .loading-bar {
      display: none;
    }
    .load-bar {
      position: relative;
      margin-top: -4px;
      width: 100%;
      height: 6px;
      background-color: #fdba2c;
    }
    .bar {
      content: "";
      display: inline;
      position: absolute;
      width: 0;
      height: 100%;
      left: 50%;
      text-align: center;
    }
    .bar:nth-child(1) {
      background-color: #da4733;
      animation: loading 3s linear infinite;
    }
    .bar:nth-child(2) {
      background-color: #3b78e7;
      animation: loading 3s linear 1s infinite;
    }
    .bar:nth-child(3) {
      background-color: #fdba2c;
      animation: loading 3s linear 2s infinite;
    }
    @keyframes loading {
        from {left: 50%; width: 0;z-index:100;}
        33.3333% {left: 0; width: 100%;z-index: 10;}
        to {left: 0; width: 100%;}
    }
    footer {
      position: fixed;
      bottom: 0;
      width: 100%;
    }
    .remove-acc {
      width: 35px;
      color: white;
      margin: 0;
      opacity: 0.4;
      background-color: red;
      border-radius: 2px;
      float: right;
    }
    .remove-acc a {
      color: white;
      padding: 5px;
    }
  </style>
</head>
<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo"></a>
      <ul class="right hide-on-med-and-down">
        <?php if (isset($_SESSION['loggedin'])) { ?>
          <li><a href="./?logout=1">Logout</a></li>
        <?php } ?>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <?php if (isset($_SESSION['loggedin'])) { ?>
          <li><a href="./?logout=1">Logout</a></li>
        <?php } ?>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <?php if (!isset($_SESSION['loggedin'])) { ?>
          <h1 class="header center orange-text">Login</h1>
      <?php } ?>
      <div class="row center">
        
      <div class="col s12 m4 offset-m4">
          <?php if (!isset($_SESSION['loggedin'])) {
              $imgsrc = (!empty($_SESSION['image'])) ? $_SESSION['image'] :'images/default.gif';
              if (!empty($_SESSION['email'])) {
                $email = $_SESSION['email'];
                $data_input = 'password';
                $placeholder = 'Password';
              }
              
           ?>
          <form id="form-user" method="post" enctype="multipart/form-data">
            <div class="card-panel grey lighten-5 z-depth-1">
                <?php if (!empty($_SESSION['user'])){
                  $rmvacc ='display:block;';
                  $data_input_type = 'password';
                }
                ?>
                <div class="row valign-wrapper rmv-acc-ctr" style="<?=$rmvacc?>">
                    <div class="col s12">
                        <div class="remove-acc">
                        <a href="./?logout=a" title="remove account">x</a>
                        </div>
                    </div>
                </div>
                <div class="row valign-wrapper">
                    <div class="col s12">
                        <img id="checked-image" src="<?=$imgsrc?>" alt="" class="circle responsive-img">
                    </div>
                </div>

                <div class="row">
                    <div class="col s12">
                        <span id="checked-email"></span>
                    </div>
                    <div class="col s12">
                        <span id="error-message"></span>
                    </div>
                </div>

                <div class="row bottom-0">
                    <div class="col s12 m12">

                        <input id="textfield" data-input="<?=$data_input?>" type="<?=$data_input_type?>" name="username" placeholder="<?=$placeholder?>" autocomplete="off" />
                    </div>
                </div>
                <div class="row loading-bar">
                    <div class="load-bar">
                      <div class="bar"></div>
                      <div class="bar"></div>
                      <div class="bar"></div>
                    </div>
                </div>
                <div class="row valign-wrapper">
                    <div class="col s12 m12">
                        <input type="submit" name="kirim" value="Continue" class="btn m12">
                    </div>
                </div>

            </div>
          </form>         
          <?php } else { ?>

            <div class="card-panel grey lighten-5 z-depth-1">

                <div class="row valign-wrapper">
                    <div class="col s12">
                        <img id="checked-image" src="<?=$_SESSION['image']?>" alt="" class="circle responsive-img">
                    </div>
                </div>
                <div class="row valign-wrapper">
                    <div class="col s12">
                        <span> Welcome, <?=$_SESSION['user']?>!</span>
                    </div>
                </div>
            </div>

          <?php } ?>
      </div>

      </div>
      

    </div>
  </div>


  <div class="container">
    
    </div>
    <br><br>

    <div class="section">

    </div>
  </div>

  <footer class="page-footer blue">
    
      
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" href="http://configboy.com/">Script Kiddies</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="js/jquery-3.1.0.min.js"></script>
  <script src="js/materialize.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){

        $("#form-user").submit(function(e){
                e.preventDefault();

              if ( $("#textfield").attr("data-input") == 'user' ) {
                    if ("" != $("#textfield").val() ) {
                      $(".loading-bar").css('display','block');
                      var user_form = $("#textfield").val();
                      setTimeout(function() {

                        $.post("backend.php",
                        {
                            login : true,
                            user: user_form
                        },
                        function(data, status){
                          if ( status == 'success' ){
                            data = JSON.parse(data);
                            //console.log(data);
                            if ( data.response == 'success'){
                                $("#checked-image").attr("src",data.user.image);
                                $("#checked-email").html(data.user.email);
                                $("#textfield").val('');
                                $("#textfield").attr('placeholder','Password');
                                $("#textfield").attr('type','password');
                                $("#textfield").attr('data-input','password');
                                $(".loading-bar").css('display','none');
                                $("#error-message").html('');
                                $(".rmv-acc-ctr").attr('style','display:block');
                            }
                            else if ( data.response == 'error'){
                                $("#error-message").html(data.message);
                                $(".loading-bar").css('display','none');
                            }
                            else {
                              window.location.href = '';
                            }
                            
                          }
                        });

                      }, 1500);
                        
                        
                    }
                    else {
                      $("#error-message").html('Username cannot be empty');
                    }
              }

              if ( $("#textfield").attr("data-input") == 'password' ) {
                    if ("" != $("#textfield").val() ) {
                        var pass = $("#textfield").val();
                        $(".loading-bar").css('display','block');

                        setTimeout(function() {

                            $.post("backend.php",
                            {
                                login : true,
                                password: pass
                            },
                            function(data, status){
                              if ( status == 'success' ){
                                data = JSON.parse(data);
                                //console.log(data);
                                if ( data.response == 'success'){
                                    window.location.href = '';
                                }
                                else if ( data.response == 'error'){
                                    $("#error-message").html(data.message);
                                    $(".loading-bar").css('display','none');
                                }
                                else {
                                  window.location.href = '';
                                }
                                
                              }

                            });

                        }, 1500);
                    }
                    else{
                      $("#error-message").html('Password cannot be empty');
                    }
              }

                /*$.post("demo_test_post.asp",
                {
                    name: "Donald Duck",
                    city: "Duckburg"
                },
                function(data, status){
                    alert("Data: " + data + "\nStatus: " + status);
                });*/

        });

    });

  </script>

  </body>
</html>
