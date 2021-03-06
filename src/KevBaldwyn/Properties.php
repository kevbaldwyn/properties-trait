<?php namespace KevBaldwyn\Traits;

trait Properties {
	
	private $_properties;
	
	protected function _setProperties(array $properties = array()) {
				
		// set defaults
		$this->_properties = $this->_defaultProperties();
		
		if(count($properties) > 0) {	
			$this->_properties = array_merge($this->_properties, $properties);
		}
		
	}
	
	
	public function __get($property) {
		if(array_key_exists($property, $this->_defaultProperties())) {
			return $this->_properties[$property];
		}
		
		return parent::__get($property);
		
	}
	
	
	public function __set($property, $value) {
		if(array_key_exists($property, $this->_defaultProperties())) {
			$this->_properties[$property] = $value;
		}
		
		return parent::__set($property, $value);
	}
	
	
	// defines properties that are defaulted on the class
	abstract protected function _defaultProperties();
	

}