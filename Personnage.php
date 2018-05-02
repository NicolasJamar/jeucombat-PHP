<?php

class Personnage {
	private $_degats;
	private $_experience;
	private $_force;
	private $_localisation;

	const FORCE_MIN = 5;
	const FORCE_MOY = 15;
	const FORCE_MAX = 30;

	private static $_texteDeLaMort = "Je vais tous vous tuer, pcq je suis le plus fort!";

	//GETTERS
	// Ceci est la méthode degats() : elle se charge de renvoyer le contenu de l'attribut $_degats.
	public function degats() {
    	return $this->_degats;
	}        

	public function force()	{
    	return $this->_force;
	}

	public function experience() {
	    return $this->_experience;
	}

	//GETTERS
	//setter chargé de modifier la valeur de l'attribut $_force
	public function setForce($force){
		if(in_array($force, [self::FORCE_MIN, self::FORCE_MOY, self::FORCE_MAX] )) {
			
			$this->_force = $force;
		}
	}

	//setter chargé de modifier la valeur de l'attribut $_experience
	public function setExperience($experience){
		if(!is_int($experience)){
			trigger_error("La valeur d'expérience doit être un nombre entier", E_USER_WARNING);
			return;
		}
		if($experience > 100){
			trigger_error("La valeur d'expérience ne peut être plus grande que 100", E_USER_WARNING);
			return;
		}

		$this->_experience = $experience;
	}

	//function constructor
	public function __construct($force, $experience) {

		$this->setForce($force);
		$this->setExperience($experience);
		$this->_degats = 0;
	}

	public function gagnerExperience(){
		$this->_experience = $this->_experience + 1;
	}

	public function frapper(Personnage $persoAfrapper){
		$persoAfrapper->_degats += $this->_force;
	}

	public static function parler(){
    	echo self::$_texteDeLaMort;
  	}
}

