<?php
/**
 * Created by PhpStorm.
 * User: baidoudi
 * Date: 12/3/20
 * Time: 9:04 PM
 */

use Doctrine\ORM\Mapping as ORM;
/**
* @ORM\Entity
 * @ORM\Table(name="assignments")
*/
namespace Pfa\ProjectBundle\Entity;


class Assignment
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $employee_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $project_id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $commitDate;

    /**
     * @ORM\Column(type="string")
     */
    private $commitEmpDesc;

    /**
     * @ORM\Column(type="string")
     */
    private $commitMgrDesc;



    /**
     * @ORM\ManyToOne(targetEntity=Employee::class,inversedBy="departments")
     *@JoinColumn(name="employee_id")
     */
    private $employee;

    /**
     * @ORM\ManyToOne(targetEntity=Project::class,inversedBy="departments")
     *@JoinColumn(name="project_id")
     */
    private $project;

    /**
     * @return mixed
     */
    public function getEmployeeId()
    {
        return $this->employee_id;
    }

    /**
     * @param mixed $employee_id
     */
    public function setEmployeeId($employee_id)
    {
        $this->employee_id = $employee_id;
    }

    /**
     * @return mixed
     */
    public function getProjectId()
    {
        return $this->project_id;
    }

    /**
     * @param mixed $project_id
     */
    public function setProjectId($project_id)
    {
        $this->project_id = $project_id;
    }

    /**
     * @return mixed
     */
    public function getCommitDate()
    {
        return $this->commitDate;
    }

    /**
     * @param mixed $commitDate
     */
    public function setCommitDate($commitDate)
    {
        $this->commitDate = $commitDate;
    }

    /**
     * @return mixed
     */
    public function getCommitEmpDesc()
    {
        return $this->commitEmpDesc;
    }

    /**
     * @param mixed $commitEmpDesc
     */
    public function setCommitEmpDesc($commitEmpDesc)
    {
        $this->commitEmpDesc = $commitEmpDesc;
    }

    /**
     * @return mixed
     */
    public function getCommitMgrDesc()
    {
        return $this->commitMgrDesc;
    }

    /**
     * @param mixed $commitMgrDesc
     */
    public function setCommitMgrDesc($commitMgrDesc)
    {
        $this->commitMgrDesc = $commitMgrDesc;
    }

    /**
     * @return mixed
     */
    public function getEmployee()
    {
        return $this->employee;
    }

    /**
     * @param mixed $employee
     */
    public function setEmployee($employee)
    {
        $this->employee = $employee;
    }

    /**
     * @return mixed
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param mixed $project
     */
    public function setProject($project)
    {
        $this->project = $project;
    }


}