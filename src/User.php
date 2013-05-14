<?php 

use Doctrine\Common\Collections\ArrayCollection;
/**
 * 
 * @Entity @Table(name="users")
 *
 */
class User
{
	
	/**
	 * 
	 * @Id @GeneratedValue @Column(type="integer")
	 */
	protected $id;
	
	/**
	 * 
	 * @Column(type="string")
	 */
	protected $name;
	
	/**
	 * 
	 * @OneToMany(targetEntity="Bug", mappedBy="reporter")
	 */
	protected $reportedBugs;
	
	/**
	 * 
	 * @OneToMany(targetEntity="Bug", mappedBy="engineer")
	 */
	protected $assignedBugs;
	
	function __construct()
	{
		$this->reportedBugs = new ArrayCollection();
		$this->assignedBugs = new ArrayCollection();
	}
	
	public function getId() {
		return $this->id;
	}

	public function getName() {
		return $this->name;
	}

	public function setName($name) {
		$this->name = $name;
	}

	
	
	
	public function addReportedBug($bug)
	{
		$this->reportedBugs[] = $bug;
	}
	
	public function assignedToBug($bug)
	{
		$this->assignedBugs[] = $bug;
	}
	
	
	
	
	
	
}