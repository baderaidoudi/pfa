<?php

namespace Pfa\ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Assignments
 *
 * @ORM\Table(name="assignments")
 * @ORM\Entity
 */
class Assignments
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="commit_date", type="datetime")
     */
    private $commitDate;

    /**
     * @var string
     *
     * @ORM\Column(name="commit_emp_desc", type="string")
     */
    private $commitEmpDesc;

    /**
     * @var string
     *
     * @ORM\Column(name="commit_mgr_desc", type="string")
     */
    private $commitMgrDesc;

    /**
     * @var \Pfa\ProjectBundle\Entity\Projects
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="Pfa\ProjectBundle\Entity\Projects", cascade={"persist"})
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
     * @ORM\ManyToOne(targetEntity="Pfa\ProjectBundle\Entity\Employees", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="employee_id", referencedColumnName="employee_id")
     * })
     */
    private $employee;


}

