<?php

namespace Pfa\ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="first_name", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=20)
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

