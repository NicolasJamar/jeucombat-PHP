<?php

class Character{

	//ATTRIBUTES
	private $_id;
	private $_nom;
	private $_forcePerso;
	private $_degats;
	private $_niveau;
	private $_experience;

	//GETTERS
	public function id(){
		return $this->_id;
	}

	public function nom(){
		return $this->_nom;
	}

	public function forcePerso(){
		return $this->_forcePerso;
	}

	public function degats(){
		return $this->_degats;
	}

	public function niveau(){
		return $this->_niveau;
	}

	public function experience(){
		return $this->_experience;
	}

	//HYDRATE
	public function hydrate(array $donnees){
		foreach ($donnees as $key => $value) {
			$method = 'set'.ucfirst($key); //On assigne le setter en reprenant la clé du tableau (où on change la 1ère lettre en majuscule)

			if(method_exists($this, $method)){  //on vérifie que la méthode setter existe. premier paramètre le nom de la class ou une instance de cette class, et en deuxième paramètre le nom de la méthode qui nous intéresse. La méthode renvoie 'true' si la méthode existe, sinon 'false'
			$this->$method($value); // On appelle le setter.
			}
		}
	}

	//SETTERS
	public function setId($id){
			$this->_id = (int) $id; //un id est tjs un nombre (donc, pas besoin de vérifier)
	}

	public function setNom($nom){
		
		if(is_string($nom) AND strlen($nom) <= 30){
			$this->_nom = $nom;
		}
	}

	public function setForcePerso($forcePerso){
		$forcePerso = int ($forcePerso);

		if ($forcePerso >= 1 AND $forcePerso <= 100) {
			$this->_forcePerso = $forcePerso;
		}
	}

	public function setDegats($degats){
		$degats = int ($degats);

		if($degats >= 0 AND $degats <= 100){
			$this->_degats = $degats;
		}
	}

	public function setNiveau($niveau){
		$niveau = int ($niveau);

		if ($niveau >= 1 AND $niveau <= 100) {
			$this->_niveau = $niveau;
		}
	}

	public function setexperience($experience){
		$experience = int ($experience);

		if($experience >= 1 AND $experience <= 100){
			$this->_experience = $experience;
		}
	}
}