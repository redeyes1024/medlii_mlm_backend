
$('document').ready(
    function(){
        //alert("##");
        var img = "<?php echo $CFG->wwwroot . "/public/images/" ?>cal.gif";
        //alert(img); 
        $(function(){
            $("#dEventDateTime").datepicker({
                dateFormat: 'yy-mm-dd',
                inline: true,
                changeYear: true,
                buttonText:'Click to Select Date',
                showOn: "both",
                buttonImage: img,
                buttonImageOnly: true,
                minDate : '-0D'
            });
        });
    }
    );   