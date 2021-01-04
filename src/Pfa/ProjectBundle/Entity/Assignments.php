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
    private $commitEmpDesc = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="commit_mgr_desc", type="string", length=255, nullable=true)
     */
    private $commitMgrDesc = 'NULL';

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

    /**
     * @return string
     */
    public function getCommitEmpDesc()
    {
        return $this->commitEmpDesc;
    }

    /**
     * @param string $commitEmpDesc
     */
    public function setCommitEmpDesc($commitEmpDesc)
    {
        $this->commitEmpDesc = $commitEmpDesc;
    }

    /**
     * @return string
     */
    public function getCommitMgrDesc()
    {
        return $this->commitMgrDesc;
    }

    /**
     * @param string $commitMgrDesc
     */
    public function setCommitMgrDesc($commitMgrDesc)
    {
        $this->commitMgrDesc = $commitMgrDesc;
    }

    /**
     * @return \DateTime
     */
    public function getCommitDate()
    {
        return $this->commitDate;
    }

    /**
     * @param \DateTime $commitDate
     */
    public function setCommitDate($commitDate)
    {
        $this->commitDate = $commitDate;
    }

    /**
     * @return Projects
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param Projects $project
     */
    public function setProject($project)
    {
        $this->project = $project;
    }

    /**
     * @return Employees
     */
    public function getEmployee()
    {
        return $this->employee;
    }

    /**
     * @param Employees $employee
     */
    public function setEmployee($employee)
    {
        $this->employee = $employee;
    }


}

