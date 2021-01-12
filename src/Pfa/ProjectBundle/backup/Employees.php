<?php

namespace Pfa\ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Employees
 *
 * @ORM\Table(name="employees", indexes={@ORM\Index(name="fk1_emp", columns={"department_id"}), @ORM\Index(name="fk2_emp", columns={"manager_id"})})
 * @ORM\Entity
 */
class Employees
{
    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=true)
     */
    private $firstName = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=true)
     */
    private $lastName = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email = '\'springabcxyzboot@gmail.com\'';

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=50, nullable=true)
     */
    private $phone = '\'22125144\'';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hiredate", type="date", nullable=true)
     */
    private $hiredate = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="job", type="string", length=255, nullable=true)
     */
    private $job = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="salary", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $salary = 'NULL';

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

