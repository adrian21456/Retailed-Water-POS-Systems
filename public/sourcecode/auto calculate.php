<?php require_once("../includes/db_connection.php"); ?>
<?php include("../includes/layouts/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>


<html>
    <head>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
    </head>
    <body>
        <form id="myForm">
            <input id="Labour" type="text" value = "100"/> <label>Labour</label> <br/>
            <input id="Machinery" type="text"/> <label>Machinery</label> <br/>
            <input id="Material" type="text"/> <label>Material</label><br/>
            <input id="Site" type="text"/> <label>Site Over Head</label><br/>
            <input id="HeadOffice" type="text"/> <label>Head Office Over Head</label><br/>
            <input id="Profit" type="text"/>Profit<br/>
            <input type="submit">  <br/>
        </form>

        <script type="text/javascript">
            $("#myForm input").each(function(){
                $(this).keyup(function(){
                    var labour = $("#Labour").val();
                    var Machinery = $("#Machinery").val();
                    var Material = $("#Material").val();
                    var SiteOverHead = $("#Site").val();
                    var HeadOfficeOverHead = $("#HeadOffice").val();
                    labour = $.isNumeric(labour)?labour:0;
                    Machinery = $.isNumeric(Machinery)?Machinery:0;
                    Material = $.isNumeric(Material)?Material:0;
                    SiteOverHead = $.isNumeric(SiteOverHead)?SiteOverHead:0;
                    HeadOfficeOverHead = $.isNumeric(HeadOfficeOverHead)?HeadOfficeOverHead:0;
                    $("#Profit").val(parseInt(labour)+parseInt(Machinery)+parseInt(Material)+parseInt(SiteOverHead)+parseInt(HeadOfficeOverHead));
                });
            });
        </script>
    </body>
</html>

<?php include("../includes/layouts/footer.php"); ?>