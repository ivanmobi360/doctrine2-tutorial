<?php 

/**
 * 
 * @Entity(repositoryClass="BugRepository") @Table(name="bugs")
 *
 */
class Bug
{
	
	/**
	 * 
	 * @Id @Column(type="integer") @GeneratedValue
	 */
	protected $id;
	
	
	/**
	 * 
	 * @Column(type="string")
	 */
	protected $description;
	
	
	/**
	 * 
	 * @Column(type="datetime")
	 */
	protected $created;
	
	/**
	 * @Column(type="string")
	 * @var string
	 */
	protected $status;
	
	/**
	 * @return the $id
	 */
	public function getId() {
		return $this->id;
	}


	public function getDescription() {
		return $this->description;
	}


	public function getCreated() {
		return $this->created;
	}


	public function getStatus() {
		return $this->status;
	}


	public function setDescription($description) {
		$this->description = $description;
	}


	public function setCreated(DateTime $created) {
		$this->created = $created;
	}


	public function setStatus($status) {
		$this->status = $status;
	}

	
}