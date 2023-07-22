<style>
div {
	color:white;
}
</style>
<?php 
		require('../session.php');
		require('../header.php');
		require ('../logo.php');

?>
<div class="m">XX</div>
<div class="n">YY</div>
<div class="nn">YY</div>
<div class="market-dane">XXXXXX</div>

<button id="xxx">Uruchom NFC</button>

<script>
function sleep(milliseconds) {
  const date = Date.now();
  let currentDate = null;
  do {
    currentDate = Date.now();
  } while (currentDate - date < milliseconds);
}



document.getElementById("xxx").onclick = async () => {
    const ndef = new NDEFReader();
    await ndef.scan();
    ndef.onreading = event => {
    };
  };

  
  
if ("NDEFReader" in window) {
	ndef.scan().then(() => {
			$(".n").text("1");
		ndef.onreadingerror = (event) => {
			$(".n").text("2");
		};
			
		ndef.addEventListener("reading", ({ message, serialNumber }) => {
			$(".n").text("Serial Number:"+serialNumber);
			$(".nn").text("Serial Number:"+message);
			  
			$.ajax({
				type: "POST",
				url: "test-core.php",
				data: {"z1":serialNumber},
				success: function(msg){
					
					$(".market-dane").text(msg);
					
				},
			});
		});
		
	}).catch((error) => {
		$(".n").text(error);
	});
}else{
	$(".m").text("NIE");
}



  



// const ndef = new NDEFReader();
// await ndef.scan();

// ndef.addEventListener("reading", ({ message, serialNumber }) => {
  // $(".n").text(serialNumber);
  // $(".nn").text(message.records.length);
  // console.log(`> Serial Number: ${serialNumber}`);
  // console.log(`> Records: (${message.records.length})`);
// });

  
  
  // const ndef = new NDEFReader();

// function read() {
  // return new Promise((resolve, reject) => {
    // const ctlr = new AbortController();
    // ctlr.signal.onabort = reject;
    // ndef.addEventListener("reading", event => {
      // ctlr.abort();
      // resolve(event);
    // }, { once: true });
    // ndef.scan({ signal: ctlr.signal }).catch(err => reject(err));
  // });
// }

// read().then(({ serialNumber }) => {
  // $(".m").text(serialNumber);
// });

// const ndef = new NDEFReader();
// ndef.scan().then(() => {
  // $(".n").text("1");
  // ndef.onreadingerror = (event) => {
   // $(".n").text(event);
  // };
  // ndef.onreading = ({ message }) => {
	  
    // $(".c").val({message});
    // $(".n").text(event);
	
  // };
// }).catch((error) => {
  // $(".n").text(error);
// });





// const ndef = new NDEFReader();
// ndef.scan().then(() => {
  // $(".n").text("1");
  // ndef.onreadingerror = (event) => {
   // $(".n").text(event);
  // };
  // ndef.onreading = (event) => {
	  
	// const ndefMessage = event.message;
	// for (const record of ndefMessage.records) {
		// $(".nn").text(record.recordType+"/"+record.mediaType+"/"+record.id);
	// }
	

	// const record = event.message.record;
    // const textDecoder = new TextDecoder(record.encoding);
    // const decodedData = textDecoder.decode(record.data);


    // $(".c").val(decodedData+"/"+textDecoder);
    // $(".n").text(event);
  // };
// }).catch((error) => {
  // $(".n").text(error);
// });









// const ndef = new NDEFReader();
  // ndef.scan().then(() => {
    // $(".n").text("1");
    // ndef.onreadingerror = (event) => {
     // $(".n").text("2");
    // };
    // ndef.onreading = event => {
  // const message = event.message;
  // for (const record of message.records) {
	// $(".nn1").text("Record type:  " + record.recordType);
	// $(".nn2").text("MIME type:    " + record.mediaType);
	// $(".nn3").text("Record id:    " + record.id);
  // }
// };
  // }).catch((error) => {
    // console.log(`Error! Scan failed to start: ${error}.`);
	// $(".n").text(error);
  // });
  
  
  
  
  
  
  
  
  
  




// const ndef = new NDEFReader();
// ndef.scan().then(() => {
  // $(".n").text("1");
  // ndef.onreadingerror = (event) => {
   // $(".n").text(event);
  // };
  
  // addEventListener('reading', (event) => { 
  
  // const ndefMessage = event.message;
	// for (const record of ndefMessage.records) {
		// $(".nn").text(record.recordType+"/"+record.mediaType+"/"+record.id);
	// }
	

	// const record = event.message.records;
    // const textDecoder = new TextDecoder(record.encoding);
    // const decodedData = textDecoder.decode(record.data);


    // $(".c").val(decodedData);
    // $(".n").text(event);
	// });

// }).catch((error) => {
  // $(".n").text(error);
// });













  


</script>



