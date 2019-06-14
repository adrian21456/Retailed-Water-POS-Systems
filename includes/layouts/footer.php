<br /><br /><br />
<style>
html, body {
    margin: 0;
    padding: 0;
}
html {
    height: 100%;
}
body {
    position: relative;
    min-height: 100%;
}
.wrapper
{
    position: relative;
    overflow: auto;
}
.footerfix{height:4rem;}
footer{
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
  text-align: left;
  background-color: #4679bd;
  height: 70px;
  color: #FFFFFF;
}
</style>

<div class="footerfix"></div>

<footer>
    <center><p>&copy; 3 in 1 VICTORY Copyright 2015 - <?php echo date("Y"); ?>  <small>Developer: ML Victory</small></p></center>
</footer>










<?php
  // 5. Close database connection
	if (isset($connection)) {
	  mysqli_close($connection);
	}

?>
