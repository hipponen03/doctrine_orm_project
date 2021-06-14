<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collection\ArrayCollection;

/**
* @Entity
*/
class Article {
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
	* @Column(type="string", unique=true)
	*/
	private $slug;
	/**
	* @Column(type="string")
	*/
	private $image;
	/**
	* @Column(type="text")
	*/
	private $body;
	/**
	* @Column(type="datetime")
	*/
	private $published;
	/**
	* @ManyToOne(targetEntity="Author", inversedBy="articles")
	*/
	private $author;

	/**
	* @ManyToMany(targetEntity="Tag", inversedBy="articles", cascade={"persist"})
	* @JoinTable(name="article_tags")
	* @JoinColumn(referencedColumnName="id", nullable=false)
	*/
	private $tags;

	public function __construct(){
		$this->tags = new \Doctrine\Common\Collections\ArrayCollection();
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

	public function getSlug(){
		return $this->slug;
	}

	public function setSlug($value){
		$this->slug = $value;
	}

	public function getImage(){
		return $this->image;
	}

	public function setImage($value){
		$this->image = $value;
	}

	public function getBody(){
		return $this->body;
	}

	public function setBody($value){
		$this->body = $value;
	}

	public function getPublished(){
		return $this->published;
	}

	public function setPublish(DateTime $value = null){
		$this->published = $value;
	}

	public function getAuthor(){
		return $this->author;
	}

	public function setAuthor($value){
		$this->author = $value;
	}
}