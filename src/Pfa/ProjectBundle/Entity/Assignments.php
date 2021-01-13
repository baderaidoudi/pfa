<?php

namespace Pfa\ProjectBundle\Entity;
/**
 * Created by PhpStorm.
 * User: baidoudi
 * Date: 1/11/21
 * Time: 9:17 PM
 */

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Id;

/**
 * Assignments
 *
 * @ORM\Table(name="assignments")
 * @ORM\Entity
 */
class Assignments
{



    /**
     * @var int
     * @Id
     * @ORM\Column(name="assignmentsid", type="bigint")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $assigmentsid;

    /**
     * @return int
     */
    public function getAssigmentsid()
    {
        return $this->assigmentsid;
    }

    /**
     * @param int $assigmentsid
     */
    public function setAssigmentsid($assigmentsid)
    {
        $this->assigmentsid = $assigmentsid;
    }



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
     * @var string
     *
     * @ORM\Column(name="commit_date", type="datetime", unique=true, nullable=false)
     */
    private $commitDate;

    /**
     * @var \Pfa\ProjectBundle\Entity\Projects
     *
     * @ORM\ManyToOne(targetEntity="Pfa\ProjectBundle\Entity\Projects")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="project_id",nullable=false)
     */
    private $project;

    /**
     * @var \Pfa\ProjectBundle\Entity\Employees
     *
     * @ORM\ManyToOne(targetEntity="Pfa\ProjectBundle\Entity\Employees")
     * @ORM\JoinColumn(name="employee_id", referencedColumnName="employee_id",nullable=false)
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
     * @return string
     */
    public function getCommitDate()
    {
        return $this->commitDate;
    }

    /**
     * @param string $commitDate
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

