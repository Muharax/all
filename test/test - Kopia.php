<?php 
		require('../session.php');
		require('../header.php');
		require ('../logo.php');
?>


<div id="reader"></div>
<div id="qr-reader-results">
  <input id="output" name="output" type="text" readonly="readonly">
</div>

<script>

var html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { fps: 10, qrbox: 250 });
        
function onScanSuccess(decodedText, decodedResult) {
    html5QrcodeScanner.clear();
}

html5QrcodeScanner.render(onScanSuccess);



let outputContainer = document.getElementById('output');
const html5QrCode = new Html5Qrcode("reader");

const qrCodeSuccessCallback = (decodedText, decodedResult) => {
	outputContainer.value = decodedText;
	html5QrCode.clear();
};

html5QrCode.stop().then((ignore) => {
  // QR Code scanning is stopped.
}).catch((err) => {
  // Stop failed, handle it.
});

const config = { fps: 10, qrbox: { width: 350, height: 250 } };

html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback);



</script>



== style="transform: translate(0px, 0px);"  ==
<?php
	error_reporting(E_ALL);
	define('URL', 'http://'.$_SERVER['SERVER_NAME']. "/alweb/");
?>

<html style="transform: translate(0px, 0px);">
<div style="width:200px;background-color:black;height:200px;margin-top:20px;"> </div>



<script>
/* // $(document).on("click", 'HTML', function(e) {
	let isMoving = false;
	
	
	// let HTMLL = document.getElementsByTagName("HTML")[0];
	// const style = window.getComputedStyle(HTMLL)
	// const t1 = style.transform || style.webkitTransform || style.mozTransform

document.getElementsByTagName("HTML")[0].addEventListener('mousedown', e => {
		// x = parseInt($('html').css('transform').split(',')[4]);
		// y = parseInt($('html').css('transform').split(',')[5]);
		// var tt = document.getElementsByTagName("HTML")[0].style.transform;
		// xx = e.screenX;
		// yy = e.screenY;
		
		xx = e.clientX;
		yy = e.clientY;
		// console.log(x);
		// console.log(y);
		// console.log(tt);
		// console.log(xx);
		// console.log(yy);
		// document.getElementsByTagName("HTML")[0].style.transform = "translate("+xc+"px, "+yc+"px)";
		isMoving = true;
});
		  
document.getElementsByTagName("HTML")[0].addEventListener('mousemove', e => {
		if (isMoving === true) {
			change(xx, yy, e.clientX, e.clientY);
			
		}
	});
	
	
document.getElementsByTagName("HTML")[0].addEventListener('mouseup', e => {
  
    isMoving = false;
	x = parseInt($('html').css('transform').split(',')[4]);
	y = parseInt($('html').css('transform').split(',')[5]);
	// console.log(x+'/'+y);

});
			
function change(x, y, x1, y1) {
	var div = document.getElementsByTagName("HTML")[0];
	  var rect = div.getBoundingClientRect();
	  xi = rect.left;
	  yi = rect.top;
	  // w = rect.width;
	  // h = rect.height;

	  
	xv = x1 - x;
	yv = y1 - y;
	console.log(xv);
	console.log(yv);
	xv = xi + xv / 12.5;
	yv = yi + yv / 12.5;
	document.getElementsByTagName("HTML")[0].style.transform = "translate("+xv+"px, "+yv+"px)";
	// console.log("L: " + x + ", T: " + y + ", W: " + w + ", H: " + h);
	

}
 */
// ================================================================================
// Make the DIV element draggable:
 /* e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px"; */
	
	
dragElement(document.getElementsByTagName("HTML")[0]);

function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
 
    elmnt.onmousedown = dragMouseDown;


  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
	
	z = parseInt($('html').css('transform').split(',')[4]);
	x = parseInt($('html').css('transform').split(',')[5]);
	
	
	
	y = (x - pos2) + "px";
	x = (z - pos1) + "px";
	
    // elmnt.style.transform = "translate("+x+"px, "+y+"px)";
	
	document.getElementsByTagName("HTML")[0].style.transform = "translate("+x+","+y+")";
	
	// document.getElementsByTagName("HTML")[0].style.left = x;
	// document.getElementsByTagName("HTML")[0].style.top = y;
	
	// elmnt.style.left = x;
	// elmnt.style.top = y;
    
	
	
	console.log(x);
	console.log(y);
    
  }

  function closeDragElement() {
    // stop moving when mouse button is released:
    document.onmouseup = null;
    document.onmousemove = null;
  }
}
// ================================================================================

/* function CameraController(element) {
    var controller = this;
    this.onchange = null;
    this.xRot = 0;
    this.yRot = 0;
    this.scaleFactor = 3.0;
    this.dragging = false;
    this.curX = 0;
    this.curY = 0;

    // Assign a mouse down handler to the HTML element.
    element.onmousedown = function(ev) {
        controller.dragging = true;
        controller.curX = ev.clientX;
        controller.curY = ev.clientY;
    };

    // Assign a mouse up handler to the HTML element.
    element.onmouseup = function(ev) {
        controller.dragging = false;
    };

    // Assign a mouse move handler to the HTML element.
    element.onmousemove = function(ev) {
        if (controller.dragging) {
            // Determine how far we have moved since the last mouse move
            // event.
            var curX = ev.clientX;
            var curY = ev.clientY;
            var deltaX = (controller.curX - curX) / controller.scaleFactor;
            var deltaY = (controller.curY - curY) / controller.scaleFactor;
            controller.curX = curX;
            controller.curY = curY;
            // Update the X and Y rotation angles based on the mouse motion.
            controller.yRot = (controller.yRot + deltaX) % 360;
            controller.xRot = (controller.xRot + deltaY);
            // Clamp the X rotation to prevent the camera from going upside
            // down.
            if (controller.xRot < -90) {
                controller.xRot = -90;
            } else if (controller.xRot > 90) {
                controller.xRot = 90;
            }
            // Send the onchange event to any listener.
            if (controller.onchange != null) {
                controller.onchange(controller.xRot, controller.yRot);
            }
        }
    };
}		  
 */
</script>

<script src="<?php echo URL;?>js/jquery.min.js"></script>

</html>





// #########################################################################


		
<script src="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"></script>
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>NAZWA</th>
                <th>KOD</th>
                <th>LOC</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                 <th></th>
                <th>NAZWA</th>
                <th>KOD</th>
                <th>LOC</th>
            </tr>
        </tfoot>
    </table>
</div>


<script>

 function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>Pełna nazwa </td>'+
            '<td>'+d.name+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Strona</td>'+
            '<td>'+d.extn+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>MIN</td>'+
            '<td>And any further details here (images etc)...</td>'+
        '</tr>'+
		'<tr>'+
            '<td>MAX</td>'+
            '<td>And any further details here (images etc)...</td>'+
        '</tr>'+
		'<tr>'+
            '<td>POJ</td>'+
            '<td>And any further details here (images etc)...</td>'+
        '</tr>'+
    '</table>';
}

  
$(document).ready(function() {
    var table = $('#example').DataTable( {
        "ajax": "../hala-a/objects.txt",
        "columns": [
            {
                "className":      'dt-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
            { "data": "KOD" },
            { "data": "NAZWA" },
            { "data": "LOC" }
        ],
        "order": [[1, 'asc']]
    } );
     
    // Add event listener for opening and closing details
    $('#example tbody').on('click', 'td.dt-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
} );
   
   

   </script>
	