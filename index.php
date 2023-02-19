<?php
// Xalilov Habibulloh
class test
{

	public $argument;

	function __construct($arg)
	{
		$this->argument = $arg;
	}

	function detect($massiv){

		$temp = false;
		foreach (new DirectoryIterator(__DIR__) as $file) {
    		if ($file->isFile())
    			if($file->getFilename() === "log.txt") $temp = true;
  		}

  		if($temp === false){

  			$f = fopen("log.txt", 'w');

  			$str = substr(date("Y-m-d h:i:sa"),0,19)."\t".$massiv[1]."\t";

  			for($i = 2; $i < count($massiv); $i++){

  				if(isset($massiv[$i]) && ($i === 2)){
  					$str .= "\t".strval($massiv[$i]);
  				}

  				if(isset($massiv[$i]) && ($i > 2)){
  					$str .= " ".strval($massiv[$i]);
  				}

  			}

  			$str .= "\n";
  			
  			fwrite($f, $str);

  		}
  		else{

  			$f = fopen("log.txt", 'a');
  			
  			$str = substr(date("Y-m-d h:i:sa"),0,19)."\t".$massiv[1]."\t";

  			for($i = 2; $i < count($massiv); $i++){

  				if(isset($massiv[$i]) && ($i === 2)){
  					$str .= "\t".strval($massiv[$i]);
  				}

  				if(isset($massiv[$i]) && ($i > 2)){
  					$str .= " ".strval($massiv[$i]);
  				}

  			}

  			$str .= "\n";
  			
  			fwrite($f, $str);
  		}

	}

	// asosiy funksiya

	function prosses(){

		if($this->argument[1] === 'summary'){

			if(isset($this->argument[2]) && (!isset($this->argument[3]))){
				echo $this->argument[2];
			}
			elseif(isset($this->argument[2]) && isset($this->argument[3]))
				echo $this->argument[2] + $this->argument[3];

				$this->detect($this->argument);

			}

		if($this->argument[1] === 'generator'){

				if(isset($this->argument[2])){
					echo $this->randomCode($this->argument[2]);
				}
				else echo $this->randomCode(10);

				$this->detect($this->argument);


			}

		if($this->argument[1] === 'logger'){

				//echo "logger";

				$this->detect($this->argument);
				$f = fopen('log.txt','r');

				while(!feof($f)){

					echo fgets($f);

				}

				$this->detect($this->argument);


			}
	}

	function randomCode($n) {
    $belgilar = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
 
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($belgilar) - 1);
        $randomString .= $belgilar[$index];
    }
 
    return $randomString;
}
}


$a = new test($argv);
$a->prosses();



?>
