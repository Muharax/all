<style>
.btn-wiad{
	font-size: 20px;
    border: 1px solid;
    background-color: green;
	border-radius:0px 0px 10px 10px;
	
}
.zadania50{
	margin-left:auto;
	margin-right:auto;
	width:50%;
}
.btn-zadania{
	font-size: 20px;
    border: 1px solid;
    background-color: chartreuse;
	border-radius:0px 0px 10px 10px;
	text-align: center;
}
.btn-zadania:hover{
	font-size: 20px;
    border: 1px solid;
    background-color: #0fa1c4;
}

  .container { margin: 70px auto; max-width: 960px; }
  .example-box-2 {
  background-color: #FAFAFA;
  border-radius: 3px;
  box-shadow: 0 1px 8px rgba(0, 157, 10, 0.3);
  overflow: hidden;
  border: 1px solid #18AE30;
}
.example-title-2 {
  display: flex;
  color: #00B725;
  justify-content: center;
  align-items: center;
  font-size: 20px;
  margin: 0;
  padding: 10px;
  background: linear-gradient(#EEFFF1, #d3ffda);
  border-bottom: 1px solid #00DF23;
}
.example-icon-2 {
  display: block;
  max-width: 30px;
  margin-right: 15px;
}
.example-content-2 {
  font-weight: normal;
  font-size: 16px;
  padding: 15px
}
.example-buttons-2 {
  display: flex;
  justify-content: flex-end;
  padding: 0 10px 10px;
}
.example-box-2 button {
  padding: 10px 15px;
  margin: 5px;
}
.example-box-2 .btn-info {
  margin-right: auto;
}
  </style>

<?php 
	require('../session.php');
	require('../header.php');
	require('../logo.php');
?>
<div class="zadania">
<div class="zadania50 btn-zadania">&#9874; &#8484;&#8491;DANIA &#10097;&#10097;&#10097;</div>



    <div class="media-wrapper">
	
	
                <video id="player1" width="640" height="360" style="max-width:100%;" poster="http://www.mediaelementjs.com/images/big_buck_bunny.jpg" preload="none" controls playsinline webkit-playsinline>
                    <source src="../media/zl.mp4" type="video/mp4">
                    <track srclang="en" kind="subtitles" src="mediaelement.vtt">
                    <track srclang="en" kind="chapters" src="chapters.vtt">
                </video>
            </div>
			
			

    <button id="default">Default</button>
    <button id="success">Success</button>
    <button id="error">Error</button>
    <button id="alert">Alert</button>
    <button id="info">Info</button>
    <button id="custom">Custom</button>
  </div>
<script>
$('#default').on('click', function(){
  $().msgpopup({
    text: 'Default Popup Message',
  });
})
$('#success').on('click', function(){
  $().msgpopup({
    text: 'Success Popup Message',
    type: 'success'
  });
})
$('#error').on('click', function(){
  $().msgpopup({
    text: 'Error Popup Message',
    type: 'error'
  });
})
$('#alert').on('click', function(){
  $().msgpopup({
    text: 'Alert Popup Message',
    type: 'alert'
  });
})
$('#info').on('click', function(){
  $().msgpopup({
    text: 'Info Popup Message',
    type: 'info'
  });
})
var someHtmlCode = '\
  <div class="example-box-2">\
    <h2 class="example-title-2">\
      <span><img src="check.png" alt="check" class="example-icon-2" /></span>\
      <span>Need custom HTML?</span>\
    </h2>\
    <div class="example-content-2">This messages are wrapped into custom HTML, uses custom CSS, and doesn\'t have the standard item classes. You can customize it as you want.</div>\
    <div class="example-buttons-2">\
      <button type="button" class="btn btn-info" data-btn-message="hmm">Cool...</button>\
      <button type="button" class="btn btn-error" data-msgpopup-close>Close</button>\
      <button type="button" class="btn btn-success" data-btn-message="ok">Ok!</button>\
    </div>\
  </div>';
$('#custom').on('click', function(){
  $().msgpopup({
    text: someHtmlCode,
    custom: true,
    time: false,
  });
})
</script>
			
</div>