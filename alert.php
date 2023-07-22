<?php 
function alert($info, $color){
	if($color === 1){
		$color = '#00ff08';
	}elseif($color === 2){
		$color = 'orange';
	}elseif($color === 3){
		$color = 'red';
	}else{
		$color = 'yellow';
	}
	
	$_SESSION['alert'] = '
	
	<div class="orange">
		<div class="info" style="color:'.$color.'">'.$info.'</div>
		<button type="button" class="btn-close btn-close-white" aria-label="Close"></button>
	</div>';
	
}

?>