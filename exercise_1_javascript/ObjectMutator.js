class ObjectMutator {

	/**
	 * Perform an injection of $newKey => $newValue in the specified $position
	 */
	inject(object, position, newKey, newValue) {
	    
	    // if we want to insert it as the last element
	    if (position >= Object.keys(object).length) {
	    	object[newKey] = newValue;
	    	return object;
	    } else {
	    	// insert it somewhere in between
	    	return Object.keys(object).reduce((ac,a,i) => {
				if(i === position) ac[newKey] = newValue;
			    ac[a] = object[a]; 
			    return ac;
			},{})
	    }
	}
	 
	getPosition(object, afterKey) {
	    let position = Object.keys(object).indexOf(afterKey);
	    
	    if (position === -1) {
	        // if afterKey inexistent in object inject position is going to be 
	        //the end of object 
	        position = Object.keys(object).length;
	    } else {
	        // otherwise is going to be 1 position after afterKey
	        position += 1;
	    }

	    return position;

	}

	newKeyAlreadyExists(object, newKey) {
	    let position = Object.keys(object).indexOf(newKey);
	    
	    return position === -1 ? false : true;
	}

	renameKey(object, oldKey, newKey) {
	    if(object[oldKey] == undefined)
	        return object;

	    let newObject = {};

	   	for(let index in object) {
			if (index == oldKey) {
				newObject[newKey] = object[index]; 
			} else {
				newObject[index] = object[index];
			}
		}

		return newObject;
	}

	injectAfter(object, afterKey, newKey, newValue) {
	    let position = this.getPosition(object, afterKey);
	    
	    if (this.newKeyAlreadyExists(object, newKey)) {
	    	// insert the new element with a modified property name (can't 
	        // have 2 object properties with the same name)
	        object = this.inject(object, position, newKey+"_modified", newValue);

	        // delete the old newKey property
	        delete object[newKey];

	        // Rename the key to its original denomination
	        return this.renameKey(object, newKey+"_modified", newKey);

	    } else {
	        return this.inject(object, position, newKey, newValue);
	    }
	}

}

