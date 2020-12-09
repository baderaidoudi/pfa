<?php

namespace Pfa\ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Employees
 *
 * @ORM\Table(name="employees", uniqueConstraints={@ORM\UniqueConstraint(name="uk1_emp", columns={"email"})}, indexes={@ORM\Index(name="fk1_emp", columns={"department_id"}), @ORM\Index(name="fk2_emp", columns={"manager_id"})})
 * @ORM\Entity
 */
class Employees
{
    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=50, nullable=true)
     */
    private $phone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hiredate", type="date", nullable=true)
     */
    private $hiredate;

    /**
     * @var string
     *
     * @ORM\Column(name="job", type="string", length=255, nullable=true)
     */
    private $job;

    /**
     * @var string
     *
     * @ORM\Column(name="salary", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $salary;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, nullable=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=true)
     */
    private $enabled = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255, nullable=true)
     */
    private $role;

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
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="department_id", referencedColumnName="department_id")
     * })
     */
    private $department;

    /**
     * @var \Pfa\ProjectBundle\Entity\Employees
     *
     * @ORM\ManyToOne(targetEntity="Pfa\ProjectBundle\Entity\Employees")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="manager_id", referencedColumnName="employee_id")
     * })
     */
    private $manager;


}

