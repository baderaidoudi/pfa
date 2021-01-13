<?php

namespace Pfa\ProjectBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\OneToOne;


/**
 * Created by PhpStorm.
 * User: baidoudi
 * Date: 1/11/21
 * Time: 9:17 PM
 */


/**
 * Employees
 *
 * @ORM\Table(name="employees")
 * @ORM\Entity
 */
class Employees
{
    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string")
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string")
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string")
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string")
     */
    private $phone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hiredate", type="date")
     */
    private $hiredate;

    /**
     * @var string
     *
     * @ORM\Column(name="job", type="string", length=255)
     */
    private $job;

    /**
     * @var string
     *
     * @ORM\Column(name="salary", type="decimal", precision=7, scale=2)
     */
    private $salary;

    /**
     * @var integer
     *
     * @ORM\Column(name="employee_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $employeeId;

    /**
     * @var \Pfa\ProjectBundle\Entity\Departments
     *
     * @ORM\ManyToOne(targetEntity="Pfa\ProjectBundle\Entity\Departments")
     * @ORM\JoinColumn(name="department_id", referencedColumnName="department_id")
     */
    private $department;

    /**
     * @var \Pfa\ProjectBundle\Entity\Employees
     *
     * @ORM\ManyToOne(targetEntity="Pfa\ProjectBundle\Entity\Employees")
     * @ORM\JoinColumn(name="manager_id", referencedColumnName="employee_id")
     */
    private $manager;




    /**
     * One product has many features. This is the inverse side.
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @OneToMany(targetEntity="Pfa\ProjectBundle\Entity\Employees", mappedBy="manager")
     */
     private $employees;




    /**
     * One product has many features. This is the inverse side.
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @OneToMany(targetEntity="Pfa\ProjectBundle\Entity\Assignments", mappedBy="employee")
     */
     private $assignments;



    /**
     * One product has many features. This is the inverse side.
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @OneToOne(targetEntity="Pfa\ProjectBundle\Entity\UserCredentials", mappedBy="employee")
     */
private $userCredential;

    /**
     * @return ArrayCollection
     */
    public function getUserCredential()
    {
        return $this->userCredential;
    }

    /**
     * @param ArrayCollection $userCredential
     */
    public function setUserCredential($userCredential)
    {
        $this->userCredential = $userCredential;
    }




    public function __construct() {
        $this->employees = new ArrayCollection();
        $this->assignments = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getEmployees()
    {
        return $this->employees;
    }

    /**
     * @param mixed $employees
     */
    public function setEmployees($employees)
    {
        $this->employees = $employees;
    }

    /**
     * @return Collection
     */
    public function getAssignments()
    {
        return $this->assignments;
    }

    /**
     * @param Collection $assignments
     */
    public function setAssignments($assignments)
    {
        $this->assignments = $assignments;
    }








    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return \DateTime
     */
    public function getHiredate()
    {
        return $this->hiredate;
    }

    /**
     * @param \DateTime $hiredate
     */
    public function setHiredate($hiredate)
    {
        $this->hiredate = $hiredate;
    }

    /**
     * @return string
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * @param string $job
     */
    public function setJob($job)
    {
        $this->job = $job;
    }

    /**
     * @return string
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * @param string $salary
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    /**
     * @return int
     */
    public function getEmployeeId()
    {
        return $this->employeeId;
    }

    /**
     * @param int $employeeId
     */
    public function setEmployeeId($employeeId)
    {
        $this->employeeId = $employeeId;
    }

    /**
     * @return Departments
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @param Departments $department
     */
    public function setDepartment($department)
    {
        $this->department = $department;
    }

    /**
     * @return Employees
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * @param Employees $manager
     */
    public function setManager($manager)
    {
        $this->manager = $manager;
    }


}

