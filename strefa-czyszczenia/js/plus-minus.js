var total1;
// if user changes value in field
$('#count1').change(function(){
  // maybe update the total here?
}).trigger('change');

$('#plus1').click(function() {
  var target = $('#count1', this.parentNode)[0];
  target.value = +target.value + 1;
});

$('#minus1').click(function() {
  var target = $('#count1', this.parentNode)[0];
  if (target.value > 0) {
    target.value = +target.value - 1;
  }
});

var total;
// if user changes value in field
$('#count').change(function(){
  // maybe update the total here?
}).trigger('change');

$('#plus').click(function() {
  var target = $('#count', this.parentNode)[0];
  target.value = +target.value + 1;
});

$('#minus').click(function() {
  var target = $('#count', this.parentNode)[0];
  if (target.value > 0) {
    target.value = +target.value - 1;
  }
});