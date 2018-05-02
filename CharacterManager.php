<?php

class CharacterManager{

	//ATTRIBUTES
	private $_db; /*Instance de PDO*/

	//SETTERS pour modifier la db ?
	public function setDb{
		$this->_db = $db;
	}

	//CONSTRUCTOR
	public function __construct($db){
		$this->setDb($db);
	}

	//CRUD
	public function add(Character $charac){
		//Create new object (=line in db)
		$q = $this->_db->prepare('
			INSERT INTO personnages(nom, forcePerso, degats, niveau, experience) 
			VALUES(:nom, :forcePerso, :degats, :niveau, :experience)');

		$q->bindValue(':nom', $charac->nom());
		$q->bindValue(':forcePerso', $charac->forcePerso(), PDO::PARAM_INT);
		$q->bindValue(':degats', $charac->degats(), PDO::PARAM_INT);
		$q->bindValue(':niveau', $charac->niveau(), PDO::PARAM_INT);
		$q->bindValue(':experience', $charac->experience(), PDO::PARAM_INT);

		$q->execute();

	}

	public function get($id){
		//Read db where id=
		$id = (int) $id;

		$q = $this->_db->query('SELECT * FROM personnages WHERE id = '.$id);

		$donnees = $q->fetch(PDO::FETCH_ASSOC);

		return new Character($donnees);
	}

	public function getList(){
		//Read all db
		$characters = [];

		$q = $this->_db->query('SELECT * FROM personnages ORDER BY nom');

		while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
			$characters[] = new ...;
		}

	}

	public function update(Character $charac){
		//Update object (line in db)

	}

	public function delete(Character $charac){
		//Delete object (line in db)
	}

	//GETTERS

}