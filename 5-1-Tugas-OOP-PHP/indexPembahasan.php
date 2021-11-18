<?php 
	
	trait Hewan {
		public $nama;
		public $darah = 50;
		public $jumlahKaki;
		public $keahlian;

		public function atraksi()
		{
		echo "($this->nama) sedang ($this->keahlian)";
		}

	}

	abstract class Fight {

		use Hewan;

		public $attackPower; 
		public $defencePower;

		public function serang($hewan)
		{
			echo "($this->nama) sedang menyerang ($hewan->nama)";

			$hewan->diserang($this);
		}

		public function diserang($hewan)
		{
			echo "<br>";
			echo "($this->nama) sedang diserang ($hewan->nama)";

		 	$this->darah = $this->darah - ($hewan->attackPower / $this->defencePower);

		}

		abstract public function getInfoHewan();

	}
	


	class Elang extends Fight { 
	
		public function __construct($nama){
			$this->nama = $nama;
			$this->jumlahKaki = 2;
			$this->keahlian = "terbang tinggi"; 
			$this->attackPower = 10;
			$this->defencePower = 5;
		} 
		public function getInfoHewan(){
			echo "Jenis Hewan : Elang";
			echo "<br>";
			echo "Nama : $this->nama";
			echo "<br>";
			echo "Jumlah Kaki : $this->jumlahKaki";
			echo "<br>";
			echo "Keahlian : $this->keahlian";
			echo "<br>";
			echo "Darah : $this->darah";
			echo "<br>";
			echo "Attack Power : $this->attackPower";
			echo "<br>";
			echo "Defence Power : $this->defencePower";
		}
	}


	class Harimau extends Fight { 
	
	
		public function __construct($nama){
			$this->nama = $nama;
			$this->jumlahKaki = 4;
			$this->keahlian = "lari cepat"; 
			$this->attackPower = 7;
			$this->defencePower = 8;
		} 
		public function getInfoHewan(){
			echo "Jenis Hewan : Harimau";
			echo "<br>";
			echo "Nama : $this->nama";
			echo "<br>";
			echo "Jumlah Kaki : $this->jumlahKaki";
			echo "<br>";
			echo "Keahlian : $this->keahlian";
			echo "<br>";
			echo "Darah : $this->darah";
			echo "<br>";
			echo "Attack Power : $this->attackPower";
			echo "<br>";
			echo "Defence Power : $this->defencePower";
		}
} 


$harimau = new Harimau("Harimau Sumatra");
$harimau->getInfoHewan();
echo "<br>";
echo "==============";
echo "<br>";
$elang = new Elang("Elang Jawa");
$elang->getInfoHewan();
echo "<br>";
echo "==============";
echo "<br>";
$harimau->serang($elang);



 ?>