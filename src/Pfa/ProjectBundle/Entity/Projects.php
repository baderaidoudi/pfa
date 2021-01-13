<?php

namespace Pfa\ProjectBundle\Entity;
/**
 * Created by PhpStorm.
 * User: baidoudi
 * Date: 1/11/21
 * Time: 9:17 PM
 */



use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * Projects
 *
 * @ORM\Table(name="projects")
 * @ORM\Entity
 */
class Projects
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="date", nullable=true)
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="date", nullable=true)
     */
    private $endDate;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="project_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $projectId;





    /**
     * One product has many features. This is the inverse side.
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @OneToMany(targetEntity="Pfa\ProjectBundle\Entity\Assignments", mappedBy="project")
     */
    private $assignments;

    /**
     * @return ArrayCollection
     */
    public function getAssignments()
    {
        return $this->assignments;
    }

    /**
     * @param ArrayCollection $assignments
     */
    public function setAssignments($assignments)
    {
        $this->assignments = $assignments;
    }



    public function __construct() {
        $this->assignments = new ArrayCollection();
    }




    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param \DateTime $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param \DateTime $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param int $projectId
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
    }


}

