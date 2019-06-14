<script type="text/javascript">
// makes sure the whole site is loaded
jQuery(window).load(function() {
        // will first fade out the loading animation
	jQuery("#status").fadeOut("slow");
        // will fade out the whole DIV that covers the website.
	jQuery("#preloader").delay(5).fadeOut("slow");
})
</script>
<style>
#preloader  {
     position: absolute;
     top: 0;
     left: 0;
     right: 0;
     bottom: 0;
     background-color: #fefefe;
     z-index: 99;
    height: 100%;
 }

#status  {
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 100;
    width: 100vw;
    height: 100vh;

    background-image: url("images/loader.gif");
    background-repeat: no-repeat;
    background-position: center;
 }
</style>

    <div id="preloader">Loading... Please Wait.</div>
		<div id="status">&nbsp;</div>