<?php require_once("../includes/db_connection.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Bootstrap 3 Responsive Layout Example</title>
</head>
<body>
    <nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Tutorial Republic</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="http://www.tutorialrepublic.com" target="_blank">Home</a></li>
                    <li><a href="http://www.tutorialrepublic.com/about-us.php" target="_blank">About</a></li>
                    <li><a href="http://www.tutorialrepublic.com/contact-us.php" target="_blank">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="jumbotron">
            <h1>Learn to Create Websites</h1>
            <p>In today's world internet is the most popular way of connecting with the people. At <a href="http://www.tutorialrepublic.com" target="_blank">tutorialrepublic.com</a> you will learn the essential of web development technologies along with real life practice example, so that you can create your own website to connect with the people around the world.</p>
            <p><a href="http://www.tutorialrepublic.com" target="_blank" class="btn btn-success btn-lg">Get started today</a></p>
        </div>
        <div class="row">	
			<div class="clearfix visible-sm-block"></div>
            <div class="col-sm-2 col-md-4 col-lg-12">
                <h2>Examples</h2>
                <p>The examples section encloses an extensive collection of examples on various topic that you can try and test yourself using online HTML editor.</p>
                <p><a href="http://www.tutorialrepublic.com/twitter-bootstrap-tutorial/" target="_blank" class="btn btn-success">Learn More &raquo;</a></p>
            </div>
            <div class="clearfix visible-sm-block"></div>
            <div class="col-sm-2 col-md-4 col-lg-12">
                <h2>Examples</h2>
                <p>The examples section encloses an extensive collection of examples on various topic that you can try and test yourself using online HTML editor.</p>
                <p><a href="http://www.tutorialrepublic.com/twitter-bootstrap-tutorial/" target="_blank" class="btn btn-success">Learn More &raquo;</a></p>
            </div>
            <div class="col-sm-2 col-md-4 col-lg-12">
                <h2>FAQ</h2>
                <p>The collection of Frequently Asked Questions (FAQ) provides brief answers to many common questions related to web design and development.</p>
                <p><a href="http://www.tutorialrepublic.com/twitter-bootstrap-tutorial/" target="_blank" class="btn btn-success">Learn More &raquo;</a></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <footer>
                    <p>&copy; Copyright 2013 Tutorial Republic</p>
                </footer>
            </div>
        </div>
    </div>
</body>
</html>
<?php include("../includes/layouts/footer.php"); ?>