$(function() {
    var prevAjaxReturned = true;
    var xhr = null;

    setInterval(function() {
        if( prevAjaxReturned ) {
            prevAjaxReturned = false;
        } else if( xhr ) {
            xhr.abort( );
        }

        xhr = $.ajax({
            type: "POST",
            data: "v1="+v1+"&v2="+v2,
            url: "location/of/server/script.php",
            success: function(html) {
                 // html is a string of all output of the server script.
                $("#element").html(html);
                prevAjaxReturned = true;
           }

        });

    }, 5000);
});