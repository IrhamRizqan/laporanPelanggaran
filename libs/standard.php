<?php

class Standard{
	public $config;
	
	function __construct($config){
		$this->config = $config;
	}
	
	function epag($perpage){
		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}else{
			$page = 1;	
		}
		
		if($page <= 1){
			$hal = 1;	
		}else{
			$hal = $page;
		}
		
		return ($hal - 1) * $perpage.", ".$perpage;
		
	}
	
	function ipag($perpage,$total){
		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}else{
			$page = 1;	
		}
		
		if($page <= 1){
			$hal = 1;	
		}else{
			$hal = $page;
		}
		$last = ceil($total/$perpage);
		
		$i = '';
		
		$i .= "<div class='page'>";

		if($page <= 1){
			$prev = 1;
		}else{
			$prev = $hal - 1;
		}
		$forlink = "?";
		if(isset($_GET['k'])){
			$forlink = "?k=".$_GET['k']."&d=".$_GET['d']."&c=".$_GET['c']."&p=".$_GET['p']."&";
		}
		
		$i .= "<a href='".$forlink."page=".$prev."' class='p-n'>&lsaquo;</a>";
		
		for($x=1; $x<= $last; $x++){
			$stat = '';
			if($hal == $x){
				$stat = "p-active";
			}
			$i .= " <a href='".$forlink."page=".$x."' class='p-num ".$stat."'>".$x."</a> ";
		}

		if($hal >= $last){
			$next = $last;	
		}else{
			$next = $hal + 1;
		}
		$i .= "<a href='".$forlink."page=".$next."' class='p-n'>&rsaquo;</a>";

		$i .= "</div>";
		
		echo $i;
		
	}
}
	
?>