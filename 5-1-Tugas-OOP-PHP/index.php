<?php 
abstract class Hewan { 
	public $nama; 
	public $darah = 50; 
	public $jumlahKaki; 
	public $keahlian; 

	public function atraksi(){

	}
} 
abstract class Fight {
	public $attackPower; 
	public $defencePower; 

	public function serang(){
		public function diserang(){

		}
	}
} 
class Elang extends Hewan { 
	public $nama = "Elang"; 
	public $keahlian = "terbang tinggi"; 
	
	public function __construct(){
		$this->nama = $nama;
		$this->keahlian = $keahlian; 
	} 
	public function grtInfoHewan(){
		echo "keahlian" . $this->keahlian;
	}
} 
class Harimau extends Fight{ 
	public $nama = "Harimau"; 
	public $keahlian = "lari cepat"; 
	
	public function __construct(){
		$this->nama = $nama;
		$this->keahlian = $keahlian; 
	} 
	public function grtInfoHewan(){
		echo "keahlian" . $this->keahlian;
	} 
} 


	
 ?>