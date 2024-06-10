<?php
class Auto {
   //teen omadused
    public $varv;
    public $tootja;
    public $kiirus = 0;
    //maarab auto tootja ja varvi
    public function__construct($varv, $tootja) {
        $this->varv = $varv;
        $this->tootja = $tootja;
    }

    //kiirendan kuni kiirus on vaiksem kui 100km/h
    public function kiirendus() {

        while ($this->kiirus < 100) {
            $this->kiirus += 10;
            echo "kiirus on: {$this->kiirus} km/h<br>";
            if ($this->kiirus >= 100) {
                echo "auto liigub 100km/h<br>";
                break;
            }
        }
    }
}


$minuAuto = new Auto('punane', 'Audi');


echo "<br>";
$minuAuto->kiirendus();
?>
