<?php

namespace Pfa\ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Assignments
 *
 * @ORM\Table(name="assignments", indexes={@ORM\Index(name="fk1_assign", columns={"project_id"}), @ORM\Index(name="IDX_308A50DD8C03F15C", columns={"employee_id"})})
 * @ORM\Entity
 */
class Assignments
{
    /**
     * @var string
     *
     * @ORM\Column(name="commit_emp_desc", type="string", length=255, nullable=true)
     */
    private $commitEmpDesc;

    /**
     * @var string
     *
     * @ORM\Column(name="commit_mgr_desc", type="string", length=255, nullable=true)
     */
    private $commitMgrDesc;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="commit_date", type="datetime")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $commitDate;

    /**
     * @var \Pfa\ProjectBundle\Entity\Projects
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Pfa\ProjectBundle\Entity\Projects")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project_id", referencedColumnName="project_id")
     * })
     */
    private $project;

    /**
     * @var \Pfa\ProjectBundle\Entity\Employees
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Pfa\ProjectBundle\Entity\Employees")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="employee_id", referencedColumnName="employee_id")
     * })
     */
    private $employee;


}

