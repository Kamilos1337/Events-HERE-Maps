<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HERE & NOW</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/all.css" rel="stylesheet">
  </head>

  <?php include("imports/components/Navbar.php"); ?>

  <body id="page-top">

    <!-- Navigation -->
    <header class="masthead">
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-lg-7 my-auto">
            <div class="header-content mx-auto">
              <h1 class="mb-5">Simple reasons for simple solutions. Find a way to make the change<br> HERE & NOW!</h1>
                <a href="#download" class="btn btn-outline btn-xl js-scroll-trigger">Start Now for Free!</a>
            </div>
          </div>
          <div class="col-lg-5 my-auto">
            <div class="device-container">
              <div class="device-mockup iphone6_plus portrait white">
                <div class="device">
                  <div class="screen">
                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                    <img src="img/map.png" class="img-fluid" alt="">
                  </div>
                  <div class="button">
                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <section id="About">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <img src="img/here.png" class="img-fluid" alt="Responsive image">
          </div>

          <div class="col text-center">
            <h2>How do we work?</h2>
            We are here to encourage people of any city in Poland, to try more social&eco friendly, by having their plans shared, so everyone can get a pice of the pie!

          </div>
        </div>

        <div class="row margin15">
        <div class="col text-center"><br><br>
          We belive that Smart City is not the one which has the most advanced technologies shared among the citizens, but the one which can bring these people together, to make things easier, cheaper and more eco-friendly!
    			You might be asking.. is that smart enough? And there we bring the answer - YES. The amount of work and problems solved together will be counted in hundrets. All thanks to one place on the internet and a lilttle help
    			of <br><strong>HERE MAPS</strong>!
        </div>
        <div class="col text-center">
          <img src="img/world.jpg" class="img-fluid border" alt="Responsive image">
        </div>
      </div>
    </div>
  </section>

  <section id="benefits" style="padding:0px; margin-top:30px;">
    <div class="row benefits">
      <div class="container">
        <div class="row rowBenefits">
          <div class="col text-center">
            <i class="fas fa-user-friends iconB"></i><br>
            <div class="card text-white bg-success mb-3 cardStyle" style="max-width: 18rem;">
              <div class="card-header">MEET NEW PEOPLE</div>
              <div class="card-body">
                <p class="card-text">Our page is the best way you to meet new people. Search for events with your friends or try your luck with strangers. We promise You'll not regret it!</p>
              </div>
            </div>
          </div>
          <div class="col text-center">
            <i class="fas fa-calendar-alt iconB"></i><br>
            <div class="card text-white bg-success mb-3 cardStyle" style="max-width: 18rem;">
              <div class="card-header">ORGANIZE THE EVENT</div>
              <div class="card-body">
                <p class="card-text">Have you been dreaming about being organizator of some kinds of events? You don't neet to worry about it anymore. Our page will let you to become one of them.</p>
              </div>
            </div>
          </div>
          <div class="col text-center">
            <i class="fab fa-envira iconB"></i><br>
            <div class="card text-white bg-success mb-3 cardStyle" style="max-width: 18rem;">
              <div class="card-header">HELP ENVIROMENT</div>
              <div class="card-body">
                <p class="card-text">Pollution can take many forms: the air we breathe, the water we drink, the soil we use to grow our food. We want to encourage you to take part in our city's life and to stand against nowadays civilation problems.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<section id="steps">
  <div class="container">
    <div class="row">
      <div class="col text-center">
        <span class="step">1</span><br>
        <span class="stepText">SIGN IN</span>
      </div>
      <div class="col text-center">
        <span class="step">2</span><br>
        <span class="stepText">SET PREFERENCES</span>
      </div>
      <div class="col text-center">
        <span class="step">3</span><br>
        <span class="stepText">SELECT PLACE</span>
      </div>
      <div class="col text-center">
        <span class="step">4</span><br>
        <span class="stepText">WAIT FOR RESPONSE</span>
      </div>
    </div>
  </div>
</section>

<section id="formBottom">
  <div class="container-fluid">
    <div class="row text-center">
      <h2 class="text-center contact">Contact Us</h2>
      <form class="formhalf">
        <div class="form-group">
          <label for="exampleFormControlInput1 halfinput"></label>
          <input type="email" name="Email" class="form-control" id="exampleFormControlInput1" placeholder="Name">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1 halfinput"></label>
          <input type="email" name="Name" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1"></label>
          <input type="email" name="Topic" class="form-control" id="exampleFormControlInput1" placeholder="Topic">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1"></label>
          <textarea class="form-control" name="Description"  id="exampleFormControlTextarea1" placeholder="Description" rows="3"></textarea>
        </div>
        <button type="button" class="btn btn-danger">Send</button>
      </form>
    </div>
  </div>
</section>

<?php include("imports/components/Footer.php"); ?>



    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/new-age.min.js"></script>

</body></html>
