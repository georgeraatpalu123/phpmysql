<?php
include('config.php');

class Auto {
    
    public $varv;
    public $tootja;
    public $kiirus = 0;

   //maarab auto tootja ja varvi
    public function __construct($varv, $tootja) {
        $this->varv = $varv;
        $this->tootja = $tootja;
    }

      //kiirendan kuni kiirus on 100km/h
    public function kiirendus() {
        while ($this->kiirus < 100) {
            $this->kiirus += 10;
            echo "Kiirus on: {$this->kiirus} km/h<br>";
            if ($this->kiirus >= 100) {
                echo "Auto liigub 100 km/h<br>";
                break;
            }
        }
    }
}

//teen auto ja varvi
$minuAuto = new Auto('punane', 'Audi');


echo "<br>";
$minuAuto->kiirendus();
?>
