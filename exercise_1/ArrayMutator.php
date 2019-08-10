<?php

class ArrayMutator
{

    // Perform an injection of $newKey => $newValue in the specified $position
    private function inject($array, $position, $newKey, $newValue) {
        $injected = array_slice($array, 0, $position, true) +
        array($newKey => $newValue) +
        array_slice($array, $position, count($array) - 1, true) ;

        return $injected;
    }

    // Find the numeric position of $afterKey index
    private function getPosition($array, $afterKey) {
        $position = array_search($afterKey, array_keys($array));
        
        if ($position === false) {
            // if $afterKey inexistent in $array inject position is going to be 
            //the end of array 
            $position = count($array);
        } else {
            // otherwise is going to be 1 position after $afterKey
            $position += 1;
        }

        return $position;

    }


    private function newKeyAlreadyExists($array, $newKey) {
        $position = array_search($newKey, array_keys($array));
        
        return $position === false ? false : true;
    }

    private function renameKey( $array, $oldKey, $newKey ) {
        if( ! array_key_exists( $oldKey, $array ) )
            return $array;

        $keys = array_keys( $array );
        $keys[ array_search( $oldKey, $keys ) ] = $newKey;

        return array_combine( $keys, $array );
    }

    public function injectAfter(array $array, string $afterKey, string $newKey, $newValue) {
        $position = $this->getPosition($array, $afterKey);
        
        if ($this->newKeyAlreadyExists($array, $newKey)) {
            // insert the new element with a modified key (can't 
            // have 2 array elements with the same key name)
            $array = $this->inject($array, $position, $newKey."_modified", $newValue);

            // unset the old $newKey element
            unset($array[$newKey]);

            // for the  
            return $this->renameKey($array, $newKey."_modified", $newKey);
        
        } else {
            return $this->inject($array, $position, $newKey, $newValue);
        }

    }
}