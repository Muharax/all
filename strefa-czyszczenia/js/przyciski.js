$( '[id^="a"]' ).each( function() {
  $( this ).click( function() {
    var text = $( this ).val();
    $( "#y" ).val( text );
    $( "#c" ).text( text );

    $( "#c" ).css({"background-color": "green"});
    $( ".button-pojemnik" ).css({"background-color": "white"});
    $( this ).css({"background-color": "#39d739"});
    $( ".tabela-nn-n" ).css({"background-color": "green"});
  });
});





$( document ).ready(function() {
    $("#eney").load("core/dzielnik-edytuj.php");
});


$( "#btn-eney" ).click(function() {
  $( "#eney" ).slideToggle("slow");
});


$(function() {
    $(document).on("click", '#uis', function() {
		$( "#eney" ).toggle();
				
});
});



$(document).on("click", '#mym0', function() {
    var t1 = $( '#mym0' ).val();
	var t2 = $( '#uyu0' ).val();
	$.ajax({
		url: "core/dzielnik-edytuj-core.php",
		type: "POST",
		data: {"z1":t1,
				"z2":t2},
		success: function(msg) {
			alert("ZMIENIONO NA "+t2);
		}
});
});
  
$(document).on("click", '#mym1', function() {
    var t1 = $( '#mym1' ).val();
	var t2 = $( '#uyu1' ).val();
$.ajax({
		url: "core/dzielnik-edytuj-core.php",
		type: "POST",
		data: {"z1":t1,
				"z2":t2},
		success: function(msg) {
			alert("ZMIENIONO NA "+t2);
		}
});
});
  
   $(document).on("click", '#mym2', function() {
    var t1 = $( '#mym2' ).val();
	var t2 = $( '#uyu2' ).val();
$.ajax({
				url: "core/dzielnik-edytuj-core.php",
				type: "POST",
				data: {"z1":t1,
						"z2":t2},
				success: function(msg) {
					alert("ZMIENIONO");
				}
			});
  });
  
     $(document).on("click", '#mym3', function() {
    var t1 = $( '#mym3' ).val();
	var t2 = $( '#uyu3' ).val();
$.ajax({
				url: "core/dzielnik-edytuj-core.php",
				type: "POST",
				data: {"z1":t1,
						"z2":t2},
				success: function(msg) {
					alert("ZMIENIONO");
				}
			});
  });
  
  
       $(document).on("click", '#mym4', function() {
    var t1 = $( '#mym4' ).val();
	var t2 = $( '#uyu4' ).val();
$.ajax({
				url: "core/dzielnik-edytuj-core.php",
				type: "POST",
				data: {"z1":t1,
						"z2":t2},
				success: function(msg) {
					$("#eney").load("core/dzielnik-edytuj.php");
				}
			});
  });
  
     $(document).on("click", '#mym5', function() {
    var t1 = $( '#mym5' ).val();
	var t2 = $( '#uyu5' ).val();
$.ajax({
				url: "core/dzielnik-edytuj-core.php",
				type: "POST",
				data: {"z1":t1,
						"z2":t2},
				success: function(msg) {
					$("#eney").load("core/dzielnik-edytuj.php");
				}
			});
  });
  
   $(document).on("click", '#mym6', function() {
    var t1 = $( '#mym6' ).val();
	var t2 = $( '#uyu6' ).val();
$.ajax({
				url: "core/dzielnik-edytuj-core.php",
				type: "POST",
				data: {"z1":t1,
						"z2":t2},
				success: function(msg) {
					$("#eney").load("core/dzielnik-edytuj.php");
				}
			});
  });
  
  $(document).on("click", '#mym7', function() {
    var t1 = $( '#mym7' ).val();
	var t2 = $( '#uyu7' ).val();
$.ajax({
				url: "core/dzielnik-edytuj-core.php",
				type: "POST",
				data: {"z1":t1,
						"z2":t2},
				success: function(msg) {
					$("#eney").load("core/dzielnik-edytuj.php");
				}
			});
  });

  $(document).on("click", '#mym8', function() {
    var t1 = $( '#mym8' ).val();
	var t2 = $( '#uyu8' ).val();
$.ajax({
				url: "core/dzielnik-edytuj-core.php",
				type: "POST",
				data: {"z1":t1,
						"z2":t2},
				success: function(msg) {
					$("#eney").load("core/dzielnik-edytuj.php");
				}
			});
  });
  
  
    $(document).on("click", '#mym9', function() {
    var t1 = $( '#mym9' ).val();
	var t2 = $( '#uyu9' ).val();
$.ajax({
				url: "core/dzielnik-edytuj-core.php",
				type: "POST",
				data: {"z1":t1,
						"z2":t2},
				success: function(msg) {
					$("#eney").load("core/dzielnik-edytuj.php");
				}
			});
  });
  
     $(document).on("click", '#mym10', function() {
    var t1 = $( '#mym10' ).val();
	var t2 = $( '#uyu10' ).val();
$.ajax({
				url: "core/dzielnik-edytuj-core.php",
				type: "POST",
				data: {"z1":t1,
						"z2":t2},
				success: function(msg) {
					$("#eney").load("core/dzielnik-edytuj.php");
				}
			});
  });
  
    $(document).on("click", '#mym11', function() {
    var t1 = $( '#mym11' ).val();
	var t2 = $( '#uyu11' ).val();
$.ajax({
				url: "core/dzielnik-edytuj-core.php",
				type: "POST",
				data: {"z1":t1,
						"z2":t2},
				success: function(msg) {
					$("#eney").load("core/dzielnik-edytuj.php");
				}
			});
  });
  
    $(document).on("click", '#mym12', function() {
    var t1 = $( '#mym12' ).val();
	var t2 = $( '#uyu12' ).val();
$.ajax({
				url: "core/dzielnik-edytuj-core.php",
				type: "POST",
				data: {"z1":t1,
						"z2":t2},
				success: function(msg) {
					$("#eney").load("core/dzielnik-edytuj.php");
				}
			});
  });

   $(document).on("click", '#mym13', function() {
    var t1 = $( '#mym13' ).val();
	var t2 = $( '#uyu13' ).val();
$.ajax({
				url: "core/dzielnik-edytuj-core.php",
				type: "POST",
				data: {"z1":t1,
						"z2":t2},
				success: function(msg) {
					$("#eney").load("core/dzielnik-edytuj.php");
				}
			});
  });
  
     $(document).on("click", '#mym14', function() {
    var t1 = $( '#mym14' ).val();
	var t2 = $( '#uyu14' ).val();
$.ajax({
				url: "core/dzielnik-edytuj-core.php",
				type: "POST",
				data: {"z1":t1,
						"z2":t2},
				success: function(msg) {
					$("#eney").load("core/dzielnik-edytuj.php");
					
				}
			});
  });
  
  
      $(document).on("click", '#mym15', function() {
    var t1 = $( '#mym15' ).val();
	var t2 = $( '#uyu15' ).val();
$.ajax({
				url: "core/dzielnik-edytuj-core.php",
				type: "POST",
				data: {"z1":t1,
						"z2":t2},
				success: function(msg) {
					$("#eney").load("core/dzielnik-edytuj.php");
				}
			});
  });



// =================
// $(document).on("click", function() {
// $( '[id^="mym"]' ).each( function() {
  // $( this ).click( function() {
    // var t1 = $( this ).val();
	// $( ".logo-w2" ).text( t1 );
// });
// });
// });

// $('input').on('change', function() {
  // alert( this.value );
// });

  // });
  // $( '[id^="mym"]' ).each( function() {
  // $( this ).val( function() {
    // var t2 = $( this ).val();
		// $( ".logo-w2" ).text( t1+t2 );
		
  // });
// });

    // $(document).on("click", "button", function() {
		// var tekst = $(this).val();
		// var tekst1 = $('[id^="uyu"]').val();
		// $( ".logo-w2" ).text( tekst+tekst1 );
		
		
		// $.ajax({
				// url: "core/dzielnik-edytuj-core.php",
				// type: "POST",
				// data: {"z1":tekst},
				// success: function(msg) {
					// $("#puste-opakowania").text(msg);
				// }
			// });
		

// });
















































































 
 // $( "#a1" ).click(function() {
  // var text = $( this ).val();
  // $( "#y" ).val( text );
  // $( "#c" ).text( text );
  // $( ".button-pojemnik" ).css({"background-color": "white"});
  // $( "#a1" ).css({"background-color": "#00f7ad"});
  // $( "#c" ).css({"background-color": "#00f7ad"});
// });

// $( "#a2" ).click(function() {
  // var text = $( this ).val();
  // $( "#y" ).val( text );
  // $( "#c" ).text( text );
  // $( ".button-pojemnik" ).css({"background-color": "white"});
  // $( "#a2" ).css({"background-color": "#00f7ad"});
  // $( "#c" ).css({"background-color": "#00f7ad"});
// });

// $( "#a3" ).click(function() {
  // var text = $( this ).val();
  // $( "#y" ).val( text );
  // $( "#c" ).text( text );
  // $( ".button-pojemnik" ).css({"background-color": "white"});
  // $( "#a3" ).css({"background-color": "#00f7ad"});
  // $( "#c" ).css({"background-color": "#00f7ad"});
// });


// $( "#a4" ).click(function() {
  // var text = $( this ).val();
  // $( "#y" ).val( text );
  // $( "#c" ).text( text );
  // $( ".button-pojemnik" ).css({"background-color": "white"});
  // $( "#a4" ).css({"background-color": "#00f7ad"});
  // $( "#c" ).css({"background-color": "#00f7ad"});
// });

// $( "#a5" ).click(function() {
  // var text = $( this ).val();
  // $( "#y" ).val( text );
  // $( "#c" ).text( text );
  // $( ".button-pojemnik" ).css({"background-color": "white"});
  // $( "#a5" ).css({"background-color": "#00f7ad"});
  // $( "#c" ).css({"background-color": "#00f7ad"});
// });


// $( "#a6" ).click(function() {
  // var text = $( this ).val();
  // $( "#y" ).val( text );
  // $( "#c" ).text( text );
  // $( ".button-pojemnik" ).css({"background-color": "white"});
  // $( "#a6" ).css({"background-color": "#00f7ad"});
  // $( "#c" ).css({"background-color": "#00f7ad"});
// });

// $( "#a7" ).click(function() {
  // var text = $( this ).val();
  // $( "#y" ).val( text );
  // $( "#c" ).text( text );
  // $( ".button-pojemnik" ).css({"background-color": "white"});
  // $( "#a7" ).css({"background-color": "#00f7ad"});
  // $( "#c" ).css({"background-color": "#00f7ad"});
// });

// $( "#a8" ).click(function() {
  // var text = $( this ).val();
  // $( "#y" ).val( text );
  // $( "#c" ).text( text );
  // $( ".button-pojemnik" ).css({"background-color": "white"});
  // $( "#a8" ).css({"background-color": "#00f7ad"});
  // $( "#c" ).css({"background-color": "#00f7ad"});
// });

// $( "#a9" ).click(function() {
  // var text = $( this ).val();
  // $( "#y" ).val( text );
  // $( "#c" ).text( text );
  // $( ".button-pojemnik" ).css({"background-color": "white"});
  // $( "#a9" ).css({"background-color": "#00f7ad"});
  // $( "#c" ).css({"background-color": "#00f7ad"});
// });

// $( "#a10" ).click(function() {
  // var text = $( this ).val();
  // $( "#y" ).val( text );
  // $( "#c" ).text( text );
  // $( ".button-pojemnik" ).css({"background-color": "white"});
  // $( "#a10" ).css({"background-color": "#00f7ad"});
  // $( "#c" ).css({"background-color": "#00f7ad"});
// });

// $( "#a11" ).click(function() {
  // var text = $( this ).val();
  // $( "#y" ).val( text );
  // $( "#c" ).text( text );
  // $( ".button-pojemnik" ).css({"background-color": "white"});
  // $( "#a11" ).css({"background-color": "#00f7ad"});
  // $( "#c" ).css({"background-color": "#00f7ad"});
// });

// $( "#a12" ).click(function() {
  // var text = $( this ).val();
  // $( "#y" ).val( text );
  // $( "#c" ).text( text );
  // $( ".button-pojemnik" ).css({"background-color": "white"});
  // $( "#a12" ).css({"background-color": "#00f7ad"});
  // $( "#c" ).css({"background-color": "#00f7ad"});
// });

// $( "#a13" ).click(function() {
  // var text = $( this ).val();
  // $( "#y" ).val( text );
  // $( "#c" ).text( text );
  // $( ".button-pojemnik" ).css({"background-color": "white"});
  // $( "#a13" ).css({"background-color": "#00f7ad"});
  // $( "#c" ).css({"background-color": "#00f7ad"});
// });

// $( "#a14" ).click(function() {
  // var text = $( this ).val();
  // $( "#y" ).val( text );
  // $( "#c" ).text( text );
  // $( ".button-pojemnik" ).css({"background-color": "white"});
  // $( "#a14" ).css({"background-color": "#00f7ad"});
  // $( "#c" ).css({"background-color": "#00f7ad"});
// });

// $( "#a15" ).click(function() {
  // var text = $( this ).val();
  // $( "#y" ).val( text );
  // $( "#c" ).text( text );
  // $( ".button-pojemnik" ).css({"background-color": "white"});
  // $( "#a15" ).css({"background-color": "#00f7ad"});
  // $( "#c" ).css({"background-color": "#00f7ad"});
// });

// $( "#a16" ).click(function() {
  // var text = $( this ).val();
  // $( "#y" ).val( text );
  // $( "#c" ).text( text );
  // $( ".button-pojemnik" ).css({"background-color": "white"});
  // $( "#a16" ).css({"background-color": "#00f7ad"});
  // $( "#c" ).css({"background-color": "#00f7ad"});
// });




// ==========================================================================================
// ====================================PĘTLA=================================================
// ==========================================================================================



//const nums = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16];

// const nums = new Array(16).fill(1).map((num, i) => num + i);
 
// nums.forEach((num) => {
  // const aIDSelector = `#a${num}`;
 
  // $(aIDSelector).click(function() {
    // const text = $( this ).val();
    // $( "#y" ).val( text );
    // $( "#c" ).text( text );
    // $( ".button-pojemnik" ).css({"background-color": "white"});
    // $( aIDSelector ).css({"background-color": "green"}); // lub $(this).css( .. )
    // $( "#c" ).css({"background-color": "green"});
  // });
// });
