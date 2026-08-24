<?php

class Zonar_AfterSetupTheme{
	
	
	static function return_thme_option($string,$str=null){
		global $zonar;
		if($str!=null)
		return isset($zonar[''.$string.''][''.$str.'']) ? $zonar[''.$string.''][''.$str.''] : null;
		else
		return isset($zonar[''.$string.'']) ? $zonar[''.$string.''] : null;
	}
	
	
}
?>