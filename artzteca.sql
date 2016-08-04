-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 05, 2016 at 08:36 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artzteca`
--

-- --------------------------------------------------------

--
-- Table structure for table `artworks`
--

CREATE TABLE `artworks` (
  `artwork_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `description` varchar(512) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `artist_id` int(255) NOT NULL,
  `best_seller` tinyint(1) DEFAULT NULL,
  `thumbnail_size` int(11) NOT NULL,
  `teaser_text` varchar(256) NOT NULL,
  `text_position` varchar(128) NOT NULL,
  `process_action` varchar(256) NOT NULL,
  `author_name` varchar(256) NOT NULL,
  `number_sold` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artworks`
--

INSERT INTO `artworks` (`artwork_id`, `title`, `genre`, `description`, `image_name`, `price`, `status`, `artist_id`, `best_seller`, `thumbnail_size`, `teaser_text`, `text_position`, `process_action`, `author_name`, `number_sold`) VALUES
(1, 'Monalisa', 'Potrait', 'Beautiful potrait', 'fine_art3.jpg', 52, 'Not Published', 2, 0, 64, 'Monalisa', 'top', 'default', 'Sidra Patel', 0),
(2, 'Scenery', 'Landscape', 'Scenic beauty', 'fine_art1.jpg', 120, 'Published', 2, 1, 64, 'Milk Falls', 'bottom', 'emboss', 'Sidra Patel', 4),
(3, 'Sketch', 'Sketch', 'Sketch of wolves', 'img21.jpg', 30, 'Published', 1, 1, 64, 'Sketch of Wolves', 'top', 'default', 'Humaira Patel', 10),
(4, 'M F Hussain', 'Abstract', 'Painting of M.F. Hussain', 'mfhussain2.jpg', 15, 'Published', 4, 0, 64, 'Master of Arts', 'middle', 'mirror', 'Bhavna', 0),
(5, 'History', 'History Painting', 'Historical Character', 'img9.jpg', 70, 'Not Published', 4, 0, 64, 'Character from History', 'top', 'edge', 'Bhavna', 0),
(6, 'Colors', 'Abstract', 'Abstract Painting', 'img1.jpg', 75, 'Published', 4, 1, 256, 'Mirror Image', 'bottom', 'mirror', 'Bhavna', 20),
(7, 'Flower', 'Flower Painting', 'Beautiful ', 'img6.jpg', 35, 'Published', 7, 0, 64, 'Blur Image', 'bottom', 'blur', 'Amal Sayyed', 0),
(8, 'Sunset', 'Landscape', 'Sunset Landscape', 'img7.jpg', 89, 'Not Published', 12, 0, 128, 'Sunset', 'top', 'default', 'Anonymous', 0),
(9, 'Flower', 'Flower Painting', 'Flower Vase', 'img3.jpg', 111, 'Published', 9, 1, 64, 'Mirror Image of Vase', 'top', 'mirror', 'Humi', 5),
(10, 'Tiger', 'Animal Painting', 'Face of a Tiger', 'img4.jpg', 23, 'Not Published', 2, 0, 256, 'FIerce Tiger', 'middle', 'edge', 'Arzteca Author', 0),
(11, 'Abstract', 'Abstract', 'Abstract Painting', 'img2.jpg', 65, 'Published', 4, 1, 128, 'Mirror Image of Face', 'bottom', 'mirror', 'Peswani', 6),
(12, 'Architecture', 'Architecture', 'Structure', 'img15.jpg', 250, 'Published', 4, 0, 128, 'Architecture', 'top', 'emboss', 'Bhavna', 0),
(13, 'Butterfly', 'Mosaic', 'Butterfly Mosaic', 'img17.jpg', 200, 'Published', 2, 0, 64, 'Colorful Butterfly', 'top', 'default', 'Bhavna', 0),
(14, 'Panaroma', 'Panaroma', 'Sunset', 'img18.jpg', 150, 'Published', 2, 1, 128, 'Panaroma', 'middle', 'blur', 'SidrA', 2),
(15, 'Landscape', 'Landscape', 'Beautiful Landscape Painting', 'img8.jpg', 12, 'Published', 1, 1, 64, 'Beautiful Landscape', 'top', 'blur', 'Humaira Patel', 9),
(16, 'Sketch', 'Sketch', 'Sketch', 'img5.jpg', 32, 'Published', 3, 1, 64, 'Making a Sketch', 'top', 'edge', 'Anonymous', 13),
(18, 'Candid Work', 'Abstract', 'Candid pic of my table', 'intro-bg.jpg', 23, 'Published', 1, 1, 64, 'My workplace', 'top', 'edge', 'Ashpak Shaikh', 3),
(22, 'My Desk', 'Abstract', 'Picture of my desk', 'p9.jpg', 35, 'Published', 1, 1, 128, 'Work Time', 'bottom', 'edge', 'H. Patel', 7),
(31, 'Work Time', 'Sketch', 'Making Notes', 'banner-bg.jpg', 12, 'Published', 1, 1, 128, 'Project Work', 'middle', 'default', 'Humaira Patel', 11),
(32, 'Parrot', 'Abstract', 'Parrot', 'parrot.jpg', 12, 'Published', 1, 1, 64, 'Picture of a parrot', 'top', 'default', 'Ashpak Shaikh', 12),
(33, 'Flower', 'Abstract', 'Purple Flower', 'flower.jpg', 23, 'Published', 1, 1, 128, 'I have Exif Data', 'top', 'default', 'H Patel', 24),
(34, 'Leaves', 'Poster', 'Nature', 'yellow.jpg', 21, 'Published', 1, 1, 64, 'Yellow- I have Exif', 'middle', 'edge', 'Patel', 3),
(35, 'Landscape', 'Landscape', 'scenery', 'landscape-geotag.jpg', 35, 'Published', 14, 1, 128, 'Nature', 'top', 'default', 'John Snow', 15);

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `created` datetime NOT NULL,
  `role` varchar(255) NOT NULL,
  `vhash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `dob`, `created`, `role`, `vhash`) VALUES
(1, 'patelhumaira', 'patelhumaira21@gmail.com', 'b48219c2614ddb3ca796bc77052dea57', 'Humaira', 'Patel', '1990-06-13', '2016-03-28 00:00:00', 'ADMIN', 'MD5'),
(2, 'sidra', 'sidra@gmail.com', '91ef1f442f70abbf3f09b7c3cd75ae9b', 'Sidra', 'Patel', '1990-06-13', '2016-03-29 00:00:00', 'ARTIST', 'MD5'),
(3, 'ashpak', 'shaikh@yahoo.com', 'b24331b1a138cde62aa1f679164fc62f', 'Ashpak', 'Shaikh', '1990-10-31', '2016-03-29 00:00:00', 'PUBLISHER', 'MD5'),
(4, 'bhavna', 'bhavna@sdsu.edu', 'e10adc3949ba59abbe56e057f20f883e', 'Bhavna', 'Peswani', '1991-01-15', '2016-03-29 00:00:00', 'ARTIST', 'MD5'),
(5, 'salu', 'salu@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Salonee', 'Mundhada', '1990-11-26', '2016-03-31 14:01:32', 'MEMBER', 'MD5'),
(6, 'nabbo', 'nabbo@ymail.com', 'e80b5017098950fc58aad83c8c14978e', 'Nabila', 'Patel', '1988-10-17', '2016-03-31 14:06:06', 'ARTIST', 'MD5'),
(7, 'amal', 'amal123@gmail.com', 'ea38cd38080f7f48797251b78d5bb0fb', 'Amal', 'Sayyed', '1990-03-07', '2016-04-01 12:07:40', 'PUBLISHER', 'MD5'),
(8, 'aamna', 'aamnapatel@gmail.com', 'ad8543296f13c4a0c65877e7ba950cef', 'Aamna', 'Patel', '1995-01-23', '2016-04-01 12:10:33', 'MEMBER', 'MD5'),
(9, 'patelhumi', 'patelhumi@gmail.com', '072f1fb7f0b254c68fac099ce77194e8', 'Humi', 'Patel', '1990-04-03', '2016-04-03 12:23:52', 'ARTIST', 'MD5'),
(10, 'aqib', 'aquib@tsec.edu', '7172e9ec27d7ac5a576e5764946ab5a7', 'Aqib', 'Shaikh', '2000-08-24', '2016-04-03 20:43:34', 'ARTIST', 'MD5'),
(11, 'reshma', 'resh@yahoo.com', 'a66cfd3d771703664d7ba768b8a7f835', 'Reshma', 'Shaikh', '1990-08-24', '2016-04-03 20:44:57', 'MEMBER', 'MD5'),
(12, 'abc', 'abc@abc.com', '900150983cd24fb0d6963f7d28e17f72', 'ABC', 'XYZ', '2000-04-05', '2016-04-03 00:00:00', 'ARTIST', 'MD5'),
(13, 'rini', 'fernandes@ymail.com', 'b86872751de1e13c142d050acfd09842', 'Rini', 'Fernandes', '1992-05-21', '2016-04-03 20:51:56', 'MEMBER', 'MD5'),
(14, 'snow', 'john_snow@got.com', '827ccb0eea8a706c4c34a16891f84e7b', 'John', 'Snow', '1986-05-04', '2016-05-03 21:18:01', 'PUBLISHER', 'MD5'),
(15, 'white', 'snow_white@disney.com', '900150983cd24fb0d6963f7d28e17f72', 'snow', 'white', '2016-05-09', '2016-05-03 21:38:35', 'PUBLISHER', 'MD5'),
(21, 'humi_shaikh', 'humi_shaikh@sdsu.edu', 'e10adc3949ba59abbe56e057f20f883e', 'Humi', 'shaikh', '1996-05-08', '2016-05-03 23:44:05', 'MEMBER', 'MD5');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `page_name` varchar(512) NOT NULL,
  `title` text NOT NULL,
  `header` text NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `title`, `header`, `body`) VALUES
(1, 'home', '  <head>  \r\n    <meta charset="utf-8">\r\n    <meta http-equiv="X-UA-Compatible" content="IE=edge">\r\n    <meta name="viewport" content="width=device-width, initial-scale=1">\r\n    <meta name="description" content="">\r\n    <meta name="author" content="">\r\n    <link rel="icon" href="/favicon.ico">\r\n    <title>Home</title>\r\n  </head>', '<header>  \r\n      <?php \r\n        require_once ("site_connect.php");\r\n        require_once(''cookies.php'');\r\n        incrVisitCookie(HOME_COOKIE);\r\n        include(''includes/header.php''); \r\n      ?> \r\n      <script src="javascripts/home.js"></script>\r\n    </header>', '<div class="container text-center">\r\n        <h2>Welcome to ArtztecA !!! </h2>\r\n        <!-- Carousel -->\r\n        <div id="publishedImages" class="carousel slide" data-ride="carousel">\r\n            <!-- Indicators -->\r\n            <ol class="carousel-indicators" id="carousel_id"></ol>\r\n            <div class="carousel-inner" id="carousel_inner"></div>\r\n            <a class="left carousel-control" href="#publishedImages" role="button" data-slide="prev">\r\n                <span class="glyphicon glyphicon-chevron-left"></span>\r\n            </a>\r\n            <a class="right carousel-control" href="#publishedImages" role="button" data-slide="next">\r\n                <span class="glyphicon glyphicon-chevron-right"></span>\r\n            </a>\r\n        </div><!-- /.carousel -->\r\n        <div>\r\n          <p align="center">New Artztec Event coming up soon. Visit the Artist Event page to get more details.</p>\r\n        </div>\r\n      </div>'),
(2, 'about', '  <head>\r\n    <meta charset="utf-8">\r\n    <meta http-equiv="X-UA-Compatible" content="IE=edge">\r\n    <meta name="viewport" content="width=device-width, initial-scale=1">\r\n    <meta name="description" content="">\r\n    <meta name="author" content="">\r\n    <link rel="icon" href="/favicon.ico">\r\n    <title>About</title>\r\n  </head>', '<header>  \r\n      <?php\r\n        include(''includes/header.php'');\r\n      ?> \r\n    </header>', '<div class="container">\r\n          <div class="page-header" align="center">\r\n            <h2>About Me</h2>\r\n            <p>A brief introduction about myself</p>\r\n          </div>\r\n\r\n          <div class="row thumbnail"> \r\n             <div class="col-sm-4">\r\n              <h3>Personal Details <span class="glyphicon glyphicon-user" aria-hidden="true"></h3>\r\n              <label class="label-default">Name : </label>\r\n              <label class="control-label">Humaira Patel</label><br/>\r\n              <label class="label-default">Email id : </label>\r\n              <label class="control-label">patelhumaira21@gamil.com</label><br/>\r\n              <label class="label-default">RedID : </label>\r\n              <label class="control-label">819819033</label>\r\n            </div>\r\n\r\n            <div class="col-sm-4">\r\n              <h3>Technical Skills <span class="glyphicon glyphicon-education" aria-hidden="true"></span></h3>\r\n              <ul>\r\n                <li>Java</li>\r\n                <li>Informatica</li>\r\n                <li>PL/SQL</li>\r\n                <li>Data Warehousing</li>\r\n                <li>HTML5 & CSS</li>\r\n                <li>Javascript</li>\r\n                <li>PHP</li>\r\n              </ul>\r\n            </div>\r\n\r\n            <div class="col-sm-4">\r\n              <h3>Work Experience <span class="glyphicon glyphicon-road" aria-hidden="true"></h3>        \r\n              <p>I have 2.5 years of corporate experience working as a Software Engineer at Accenture \r\n                where my domain of work was mainly Data Warehousing and Business Intelligence.</p>\r\n            </div>\r\n          </div>\r\n      </div>'),
(3, 'artist_event', '<head>\r\n    <meta charset="utf-8">\r\n    <meta http-equiv="X-UA-Compatible" content="IE=edge">\r\n    <meta name="viewport" content="width=device-width, initial-scale=1">\r\n    <meta name="description" content="">\r\n    <meta name="author" content="">\r\n    <link rel="icon" href="/favicon.ico">\r\n    <title>Aztec Event</title>\r\n  </head>', '<header>  \r\n      <?php \r\n        //includes the header \r\n        include(''includes/header.php'');  \r\n      ?> \r\n    </header>', '<div class="container-fluid">\r\n        <div class="row">\r\n          <div class="col-sm-3" align="center">\r\n            <img class="img-responsive" src="images/fine_art1.jpg" alt="M. F. Hussain"/><br/><br/>\r\n            <img class="img-responsive" src="images/mfhussain2.jpg" alt="M. F. Hussain"/>\r\n          </div>\r\n          <div class="col-sm-9 "style="text-align:center; color:purple">\r\n              <?php \r\n                  date_default_timezone_set(''America/Los_Angeles'');\r\n                  $today = date("Y-m-d H:i"); \r\n                  $event = date("2016-04-04 17:30");\r\n\r\n                  $eventDate = new DateTime(''2016-04-04 17:30:00'');\r\n                  $startDate = new DateTime() ;          \r\n                  $interval = $startDate->diff($eventDate) ;  //calculates the date difference''\r\n\r\n                  $interval = $interval->format(''%d days %h hours %i minutes'');  //sets the format to be displayed\r\n\r\n                  if($today > $event) {\r\n                     echo "<h3>You missed the event... It was on 4th April 2016 at 5:30 PM. <br/> Wait for the next big event!!!</h3>";\r\n                  }\r\n\r\n                  if($today == $event)\r\n                    echo "<h2>Event is Now!!!</h2>";\r\n\r\n                  if($today < $event ) {\r\n                    echo  ''<h3>ArtztecA Next BIG ART Event is on 4th April.</h3> <br/>'';\r\n                    echo ("<h2> Only <strong>$interval</strong> to go...</h2>\r\n                         <h3> Hurry Up!!!!</h3>");\r\n                  }\r\n              ?>\r\n          </div>\r\n        </div>\r\n      </div>'),
(4, 'registration', '<head>  \r\n    <meta charset="utf-8">\r\n    <meta http-equiv="X-UA-Compatible" content="IE=edge">\r\n    <meta name="viewport" content="width=device-width, initial-scale=1">\r\n    <meta name="description" content="">\r\n    <meta name="author" content="">\r\n    <link rel="icon" href="/favicon.ico">\r\n    <title>Registration</title>\r\n  </head>', '<header>  \r\n      <?php\r\n        include(''includes/header.php''); \r\n      ?> \r\n      <script type="text/javascript">\r\n         $(function() {\r\n         $( "#dob" ).datepicker();\r\n         });\r\n      </script>\r\n      <script src="javascripts/helper.js"></script>\r\n      <script src="javascripts/registration.js"></script>\r\n\r\n    </header>', '<div class="container">\r\n        <form class="form-horizontal" id="register_form" method="post" role="form">\r\n          <h5>Please enter the following information to register:</h5>\r\n            <div class="form-group">\r\n              <label class="control-label col-sm-2" for="last_name">Last Name : </label>\r\n              <div class="col-sm-4">\r\n                <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Enter Last Name">\r\n              </div>\r\n            </div>\r\n\r\n            <div class="form-group">\r\n              <label class="control-label col-sm-2" for="first_name">First Name : </label>\r\n              <div class="col-sm-4">\r\n                <input type="text" id="first_name" name="first_name" class="form-control" placeholder="Enter First Name"/>\r\n              </div>\r\n            </div>\r\n\r\n            <div class="form-group">\r\n              <label class="control-label col-sm-2" for="dob">Date of Birth : </label>\r\n              <div class="col-sm-4">\r\n                <input type="text" id="dob" name="dob" class="form-control" placeholder="mm/dd/yyyy"/>\r\n              </div>\r\n            </div>\r\n\r\n            <div class="form-group">\r\n              <label class="control-label col-sm-2" for="email">Email Id : </label>\r\n              <div class="col-sm-4">\r\n                <input type="text" id="email" name="email" class="form-control" placeholder="example@domain.com"/>\r\n              </div>\r\n            </div>\r\n\r\n            <div class="form-group">\r\n              <label class="control-label col-sm-2" for="user_name">User Name : </label>\r\n              <div class="col-sm-4">\r\n                <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Enter User Name"/>\r\n              </div>\r\n            </div>\r\n\r\n            <div class="form-group">\r\n              <label class="control-label col-sm-2" for="password">Password : </label>\r\n              <div class="col-sm-4">\r\n                <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password"/>\r\n              </div>\r\n            </div>\r\n\r\n            <div class="form-group">\r\n              <div class="col-sm-offset-3 col-sm-9">\r\n                <input type="submit" name="register_submit" id="register_submit" value="Submit" class="btn btn-default"/>\r\n              </div>\r\n            </div>\r\n          </form>      \r\n      </div>'),
(5, 'best_sellers', ' <head>  \r\n    <meta charset="utf-8">\r\n    <meta http-equiv="X-UA-Compatible" content="IE=edge">\r\n\r\n    <meta name="viewport" content="width=device-width, initial-scale=1">\r\n    <meta name="description" content="">\r\n    <meta name="author" content="">\r\n<script src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>\r\n<script src="javascripts/canvasjs.min.js"></script>\r\n<script src="javascripts/chart.js"></script>\r\n    \r\n<link rel="icon" href="/favicon.ico">\r\n    <title>Best Seller</title>\r\n  </head>', '<header>  \r\n      <?php\r\n          require_once(''site_connect.php'');\r\n          require_once(''cookies.php'');\r\n          incrVisitCookie(BEST_SELLER_COOKIE);\r\n        include(''includes/header.php'');\r\n      ?>\r\n    </header>', '<center><h4> Best Selling Artworks of ArtztecA</h4></center>\r\n      <div class="row">\r\n        <?php\r\n          $result = dbSelect(''SELECT * FROM artworks where best_seller = 1'');\r\n          $size = sizeof($result);\r\n          foreach ($result as $row)  :\r\nlist($image_name, $ext) = explode(''.'', $row[''image_name'']); ?>\r\n\r\n          <div class = "col-sm-6 col-md-3 thumbnail">\r\n               <img src = "../tmpmedia/<?php echo $image_name.''_teaser.''.$ext?>" class="img-rounded" style="width:200px;height:150px">\r\n\r\n            <div class = "caption text-center">\r\n             <p><b><?php echo $row["title"] ?> </b><br/>\r\n             Description: <?php echo $row["description"] ?> <br/>\r\n             Price: $ <?php echo $row["price"] ?> </p>\r\n            </div>\r\n          </div>\r\n         <?php endforeach; ?>\r\n      </div>\r\n<div id="chartContainer" style="height: 300px; width: 100%;"></div>\r\n'),
(6, 'login_page', '<head>  \r\n    <title>Login</title>\r\n    <style>\r\n      #status {color:blue;}\r\n    </style>\r\n  </head>', '<header>  \r\n      <?php\r\n         //includes the header\r\n        include(''includes/header.php'');\r\n      ?> \r\n      <script src="javascripts/helper.js"></script>\r\n      <script src="javascripts/login.js"></script>\r\n    </header>', '<div class="container">\r\n        <form class="form-horizontal" id="login_form" method="post" role="form" action="login.php">\r\n          <h4><center>Log In</center></h4>\r\n            <div class="form-group">\r\n              <label class="control-label col-sm-4" for="username">User Name : </label>\r\n              <div class="col-sm-4">\r\n                <input type="text" id="login_user_name" name="username" class="form-control" placeholder="Enter User Name"/>\r\n              </div>\r\n            </div>\r\n\r\n            <div class="form-group">\r\n              <label class="control-label col-sm-4" for="password">Password : </label>\r\n              <div class="col-sm-4">\r\n                <input type="password" id="login_password" name="password" class="form-control" placeholder="Enter Password"/>\r\n              </div>\r\n            </div>\r\n\r\n            <div class="form-group">\r\n              <div class="col-sm-offset-4 col-sm-8">\r\n                <input type="submit" id="login_submit" name="login_submit" value="Log In" class="btn btn-default"/>\r\n              </div>\r\n            </div>\r\n        </form>\r\n        <div class="text-center">\r\n          <h3 id="status"></h3>\r\n        </div>\r\n      </div>'),
(7, 'my_account', '<head>  \r\n    <title>Artist Page</title>\r\n    <meta charset="utf-8">\r\n    <meta name="viewport" content="width=device-width, initial-scale=1">\r\n    <script src="javascripts/jquery-1.12.1.min.js"></script>\r\n  </head>', ' <header>  \r\n      <?php\r\n        require_once ("site_connect.php");\r\n         //includes the header\r\n        include(''includes/header.php''); \r\n        $url = ".?pageId=6";\r\n        if ((!isset($_SESSION["Authenticated"])) || ($_SESSION["level"]<ARTIST))\r\n          header("Location:". BASE_URL . $url);        \r\n      ?> \r\n      <script src="javascripts/my_account.js"></script>\r\n      <script src="javascripts/best_seller.js"></script>\r\n      <script src="javascripts/users.js"></script>\r\n    </header>', '<div id="my_container" class="container">\r\n        <ul class="nav nav-tabs">\r\n          <li class="active myAccountTab"><a data-toggle="pill" href="#add_tab" style="color:#000000">Add Artwork</a></li>\r\n          <li class = "myAccountTab"><a data-toggle="pill" href="#show_tab" style="color:#000000">Show My Artworks</a></li>\r\n\r\n          <?php if((isset($_SESSION["Authenticated"]) && ($_SESSION["level"]>=PUBLISHER) )) : ?>\r\n            <li class = "myAccountTab"><a data-toggle="pill" href="#show_all_tab" style="color:#000000">Show All Artwork</a></li>\r\n            <li class = "myAccountTab"><a data-toggle="pill" href="#best_sellers_tab" style="color:#000000">Edit Best Sellers</a></li>\r\n          <?php endif; ?>\r\n\r\n          <?php if((isset($_SESSION["Authenticated"]) && ($_SESSION["level"]>PUBLISHER) )) : ?>\r\n            <li class = "myAccountTab"><a data-toggle="pill" href="#users_tab" style="color:#000000">Users</a></li>\r\n          <?php endif; ?>\r\n        </ul>\r\n    \r\n          <div class="tab-content">\r\n            <div id="add_tab" class="tab-pane fade in active">\r\n               <?php include(''includes/add_artwork.php''); ?>\r\n            </div>\r\n\r\n            <div id="show_tab" class="tab-pane fade">\r\n              <br/>\r\n               <?php include(''includes/show_tab.php''); ?>\r\n            </div>\r\n\r\n            <div id="show_all_tab" class="tab-pane fade">\r\n              <br/>\r\n              <?php include(''includes/show_all_tab.php''); ?>\r\n            </div>\r\n\r\n\r\n            <div id="best_sellers_tab" class="tab-pane fade">\r\n              <br/>\r\n              <?php include(''includes/best_seller_tab.php''); ?>\r\n            </div>\r\n\r\n            <div id="users_tab" class="tab-pane fade">\r\n                <br/>\r\n              <?php include(''includes/users_tab.php''); ?>\r\n            </div>\r\n\r\n          </div>\r\n        </div>'),
(8, 'member', '<head>  \r\n  <title>Member Page</title>\r\n</head>', ' <header>  \r\n    <?php\r\n      require_once(''site_connect.php''); \r\n       //includes the header\r\n      include(''includes/header.php'');\r\n      \r\n      $url = ".?pageId=6";\r\n      if ((!isset($_SESSION["Authenticated"])) || ($_SESSION["level"]<MEMBER))\r\n        header("Location:".$url);\r\n    ?> \r\n    <script src="javascripts/cart.js"></script>\r\n  </header>', '  <div id = "member_cart">\r\n        <h2><center> You can buy an artwork here !!! </center></h2>\r\n        <form class="form-horizontal" id="member_cart" method="post" role="form" >\r\n          <div class="row">\r\n              <?php\r\n                $result = dbSelect(''SELECT * FROM artworks WHERE price!=0'');\r\n                $size = sizeof($result);\r\n                foreach ($result as $row)  : \r\n                list($image_name, $ext) = explode(''.'', $row[''image_name'']);\r\n                ?>\r\n\r\n                <div class = "col-sm-6 col-md-3 thumbnail">\r\n                     <img src = "../tmpmedia/<?php echo $image_name.''_watermark.''.$ext?>" class="img-rounded" style="width:200px;height:150px">\r\n\r\n                  <div class = "caption text-center">\r\n                   <p><b><?php echo $row["title"] ?> </b><br/>\r\n                   Description: <?php echo $row["description"] ?> <br/>\r\n                   Price: $ <?php echo $row["price"] ?> <br/>\r\n                   <label><input type="checkbox" id="buy_<?php echo $row["artwork_id"] ?>" name="buy" value="<?php echo $row["artwork_id"] ?>"> Add To Cart </label>\r\n                  </p>\r\n                  </div>\r\n                </div>\r\n               <?php endforeach; ?>\r\n            </div> \r\n            <center>\r\n              <input type="button" id="member_submit" class="btn btn-danger" value="Go To Cart"/>\r\n            </center>\r\n        </form>\r\n      </div>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artworks`
--
ALTER TABLE `artworks`
  ADD PRIMARY KEY (`artwork_id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artworks`
--
ALTER TABLE `artworks`
  MODIFY `artwork_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
