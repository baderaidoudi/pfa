<?php
/**
 * Created by PhpStorm.
 * User: baidoudi
 * Date: 12/3/20
 * Time: 9:04 PM
 */

namespace Pfa\ProjectBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 *@ORM\Table(name="employees")
 */
class Employee
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
    * @ORM\Column(type="integer")
    */
private $employeeId;

/**
 * @ORM\Column(type="string",length=200)
*/
private $firstName;

    /**
     * @ORM\Column(type="string",length=200)
     */
private $lastName;

    /**
     * @ORM\Column(type="string",length=200)
     */
private $email;

    /**
     * @ORM\Column(type="string",length=20)
     */
private $phone;

    /**
     * @ORM\Column(type="datetime")
     */
private $hiredate;

    /**
     * @ORM\Column(type="string",length=200)
     */
private $job;

    /**
     * @ORM\Column(type="decimal",precision =7, scale = 2)
     */
private $salary;

    /**
     * @Assert\NotBlank(allowNull = true)
     * @ORM\ManyToOne(targetEntity=Employee::class, inversedBy="employee")
     * @ORM\JoinColumn(name="manager_id")
     */
private $manager;

    /**
     * @ORM\OneToMany(targetEntity=Employee::class,,inversedBy="employee",fetch="EXTRA_LAZY")
     */
private $employees;

    /**
     * @ORM\OneToMany(targetEntity=Assignment::class,inversedBy="employee")
     */
private $assignments;


    /**
     * @ORM\ManyToOne(targetEntity=Department::class,mappedBy="employees")
     *@ORM\JoinColumn(name="department_id")
     */
private $department;


    /**
     * @ORM\Column(type="string",length=200)
     */
    private $username;

    /**
     * @ORM\Column(type="string",length=200)
     */
    private $password;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enabled;

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param mixed $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }


    /**
     * @return mixed
     */
    public function getEmployeeId()
    {
        return $this->employeeId;
    }

    /**
     * @param mixed $employeeId
     */
    public function setEmployeeId($employeeId)
    {
        $this->employeeId = $employeeId;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getHiredate()
    {
        return $this->hiredate;
    }

    /**
     * @param mixed $hiredate
     */
    public function setHiredate($hiredate)
    {
        $this->hiredate = $hiredate;
    }

    /**
     * @return mixed
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * @param mixed $job
     */
    public function setJob($job)
    {
        $this->job = $job;
    }

    /**
     * @return mixed
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * @param mixed $salary
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    /**
     * @return mixed
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * @param mixed $manager
     */
    public function setManager($manager)
    {
        $this->manager = $manager;
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
     * @return mixed
     */
    public function getAssignments()
    {
        return $this->assignments;
    }

    /**
     * @param mixed $assignments
     */
    public function setAssignments($assignments)
    {
        $this->assignments = $assignments;
    }

    /**
     * @return mixed
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @param mixed $department
     */
    public function setDepartment($department)
    {
        $this->department = $department;
    }







}