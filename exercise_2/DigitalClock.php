<?php

class DigitalClock {

	private static $digitConsumtion = [
		0 => 6,
		1 => 2,
		2 => 5,
		3 => 5,
		4 => 4,
		5 => 5,
		6 => 6,
		7 => 3,
		8 => 7,
		9 => 6

	];

	public function maxEnergyConsumptionTime() {
		$maxEnergy = 0;
		$time = "00:00";
		$counter = 0;

		for ($i = 0; $i <= 2 ; $i++) { 
			for ($j = 0; $j <= 3 ; $j++) { 
				for ($k = 0; $k < 5; $k++) { 
					for ($l = 0; $l < 9; $l++) { 
						$consumption = self::$digitConsumtion[$i] + 
									   self::$digitConsumtion[$j] + 
									   self::$digitConsumtion[$k] + 
									   self::$digitConsumtion[$l];	
						if ($consumption > $maxEnergy) {
							$maxEnergy = $consumption;
							$time = $i.$j.":".$k.$l;
						}
					}
				}
			}
		}

		return $time;
	}	
}