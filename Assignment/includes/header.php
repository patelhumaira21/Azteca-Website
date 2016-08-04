<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>ArtztecA Studios Cooperative</title>

    <link href="includes/bootstrap-3.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="includes/bootstrap-3.3.6/docs/examples/starter-template/starter-template.css" rel="stylesheet">
    <link href="includes/bootstrap-3.3.6/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <script src="includes/bootstrap-3.3.6/docs/assets/js/ie-emulation-modes-warning.js"></script>
    <link href="includes/custom.css" rel="stylesheet">
    <script src="javascripts/jquery-1.12.1.min.js"></script>
  </head>

  <body style="background-color:#e6fff7">
  <header class="header">
     <h2><center>ArtztecA Studios Cooperative</center></h2>
      <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <?php if (session_status() != PHP_SESSION_ACTIVE) {
                  session_start();
          }
          require_once ("../constants.php");
          ?>

          <?php if (!isset($_SESSION["Authenticated"])) : ?>
            <a class="navbar-brand" href="#">ArtztecA Studios Cooperative</a>
          <?php endif ?>

          <?php if (isset($_SESSION["Authenticated"])) : ?>
            <a class="navbar-brand" href="#">Welcome,  <?php echo $_SESSION["first_name"] ?> </a>
          <?php endif ?>

        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav"> 
            <!-- adding the class="active" dynamically based on the page that is currently active -->
            <li class="<?= ($activePage == 'home') ? 'active':''; ?>"><a href="."><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li class="<?= ($activePage == 'about') ? 'active':''; ?>"><a href=".?pageId=2"><span class="glyphicon glyphicon-asterisk"></span> About</a></li>
            <li class="<?= ($activePage == 'artist_event') ? 'active':''; ?>"><a href=".?pageId=3"><span class="glyphicon glyphicon-picture"></span> Artist Event</a></li>
            <li class="<?= ($activePage == 'registration') ? 'active':''; ?>"><a href=".?pageId=4"><span class="glyphicon glyphicon-pencil"></span> Registration</a></li>
            <li class="<?= ($activePage == 'best_sellers') ? 'active':''; ?>"><a href=".?pageId=5"><span class="glyphicon glyphicon-thumbs-up"></span> Best Sellers</a></li>

            <?php if (!isset($_SESSION["Authenticated"])) : ?>
              <li class="<?= ($activePage == 'login_page') ? 'active':''; ?>"><a href=".?pageId=6"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <?php endif ?>

            <?php if((isset($_SESSION["Authenticated"]) && ($_SESSION["level"]>=MEMBER) )) : ?>
              <li class="<?= ($activePage == 'member') ? 'active':''; ?>"> <a href=".?pageId=8"><span class="glyphicon glyphicon-user"></span> Members</a></li>
            <?php endif; ?>

            <?php if((isset($_SESSION["Authenticated"]) && ($_SESSION["level"]>=ARTIST) )) : ?>
              <li class="<?= ($activePage == 'my_account') ? 'active':''; ?>"> <a href=".?pageId=7"><span class="glyphicon glyphicon-list-alt"></span> My Account</a></li>
            <?php endif; ?>

          </ul>

          <?php if (isset($_SESSION["Authenticated"])) : ?>
            <ul class="nav navbar-nav navbar-right">
              <li class="<?= ($activePage == 'logout') ? 'active':''; ?>"><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
          <?php endif; ?>  

        </div><!--/.nav-collapse -->
      </div>
    </nav>
  </header>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script>window.jQuery || document.write('<script src="includes/bootstrap-3.3.6/docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="includes/bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="includes/bootstrap-3.3.6/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
    <link rel="stylesheet" href="includes/jquery-ui-1.11.4/jquery-ui.css">
    <script src="includes/jquery-ui-1.11.4/jquery-ui.js"></script>

  </body>
</html>