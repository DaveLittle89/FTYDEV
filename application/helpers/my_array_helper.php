<?php
function array_to_select() {
	$args = func_get_args();
	
	$return = array();
	
	switch(count($args)):
	
		case 3:
			foreach ($args[0] as $itteration):
				if(is_object($itteration)) $itteration = (array) $itteration;
		        $return[$itteration[$args[1]]] = $itteration[$args[2]];
		    endforeach;
		break;
	
		case 2:
			foreach ($args[0] as $key => $itteration):
				if(is_object($itteration)) $itteration = (array) $itteration;
		        $return[$key] = $itteration[$args[1]];
		    endforeach;
		break;
	
		case 1:
			foreach ($args[0] as $itteration):
		        $return[$itteration] = $itteration;
		    endforeach;
		break;
	
		default:
			return FALSE;
		break;
	
	endswitch;
	
	return $return;
}
?>