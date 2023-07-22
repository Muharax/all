<?php 
require_once('../header.php');
?>
<style>
body{
	margin:0!important;
}
	#hello{
		padding:10px;
		background-color:black;
		color:white;
	}
div {
	color:green;
}



body {
  background: #ececec;
}
.lds-dual-ring.hidden { 
display: none;
}
.lds-dual-ring {
  display: inline-block;
  width: 80px;
  height: 80px;
}
.lds-dual-ring:after {
  content: " ";
  display: block;
  width: 64px;
  height: 64px;
  margin: 5% auto;
  border-radius: 50%;
  border: 6px solid #fff;
  border-color: #fff transparent #fff transparent;
  animation: lds-dual-ring 1.2s linear infinite;
}
@keyframes lds-dual-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}


.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    background: rgba(0,0,0,.8);
    z-index: 999;
    opacity: 1;
    transition: all 0.5s;
}

</style>












<div id="hello">HELLO</div>
<hr>
<div>AGAIN GAME <button id="play">Play!</button></div>


<div id="ggame"></div>



<div class="con-out">
	
</div>


<button id='getDataBtn'>Get Data</button>

<div id="richList"></div>


<div id="loader" class="lds-dual-ring hidden overlay"></div>



<?php
class Game {
    public $a = 'aMemberVar Member Variable';
    public $b = 'aMemberFunc';
   
   
    function pprint($a, $b) {
        print $a .' '. $b;
    }
}

$Game = new Game;
$Game->pprint(3,4);
?>

<script>
$(document).on("click", '#play', function() {
  
$("#ggame").load("core/core.php");

});



$('#getDataBtn').click(function() {
                       
$.ajax({
    type: "GET",
    url: "https://forbes400.herokuapp.com/api/forbes400?limit=400",
    dataType: 'json',
    beforeSend: function() {
        $('#loader').removeClass('hidden')
    },
    success: function(data){
        console.log(data);
        let richList = "<ol>";
        for (let i = 0; i < data.length; i++) {
          console.log(data[i].uri);
          richList += "<li>"+data[i].uri+"</li>";
        }
      richList += "</ol>"
      $('#richList').html(richList);
    },
  complete: function(){
        $('#loader').addClass('hidden')
    },
});
  
});

</script>