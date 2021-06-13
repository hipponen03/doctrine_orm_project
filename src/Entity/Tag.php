<?php

namespace App\Entity;

use Doctrine\Common\Collection\ArrayCollection;


/**
* @Entity
*/
class Tag {
	/**
	* @Column(type="integer")
	* @Id
	* @GeneratedValue
	*/
	private $id;
	/**
	* @Column(type="string")
	*/
	private $name;

	/**
	* @OneToMany(targetEntity="Article", mappedBy="tag")
	*/
	private $articles;

	public function __construct(){
		$this->articles = new ArrayCollection();
	}

	public function getId(){
		return $this->id;
	}

	public function setId($value){
		$this->id = $value;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($value){
		$this->name = $value;
	}
}