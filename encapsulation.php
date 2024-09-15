<!-- Task 3 -->
<?php

class Employee
{

	private $userId;
	private $name;
	private $salary;


	public function setId($userId)
	{
		$this->userId = $userId;
	}
	public function setName($n)
	{

		$this->name = $n;
	}
	public function setSalary($s)
	{
		$this->salary = $s;
	}

	public function getId()
	{
		return $this->userId;
	}
	public function getName()
	{
		return $this->name;
	}
	public function getSalary()
	{
		return $this->salary;
	}
}

$obj = new Employee();
$obj->setId(4);
$obj->setName('Rohim');
$obj->setSalary('16000');

echo 'User ID :' . $obj->getId() . '<br>';
echo 'Name: ' . $obj->getName() . '<br>';
echo 'Salary: ' . $obj->getSalary() . '<br>';

?>