<?php
class Console{
	private $name;
	private $image_path;

	public function __construct($name, $path){
		$this->name = $name;
		$this->image_path = $path;
	}
	public function __destruct(){

	}
	public function getName(){
		return $this->name;
	}
	public function getPathToImage(){
		return $this->image_path;
	}
}

?>