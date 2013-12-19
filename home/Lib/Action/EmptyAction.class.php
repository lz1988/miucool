<?php
class EmptyAction extends Action{
	function _empty(){
		header("HTTP/1.0 404 not found");
		$this->display();
	}
}
?>