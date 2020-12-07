<?php
/**
 * Created by PhpStorm.
 * User: baidoudi
 * Date: 12/3/20
 * Time: 9:04 PM
 */

namespace Pfa\ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 *@ORM\Table(name="locations")
 */
class Location
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private $locationId;
    /**
     * @ORM\Column(type="string")
     */
    private $adr;

    /**
     * @ORM\Column(type="string")
     */
    private $postalCode;

    /**
     * @ORM\Column(type="string")
     */
    private $city;


    /**
     * @ORM\OneToMany(targetEntity=Department::class,mappedBy="location")
     */
    private $departments;

    /**
     * @return mixed
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * @param mixed $locationId
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * @return mixed
     */
    public function getAdr()
    {
        return $this->adr;
    }

    /**
     * @param mixed $adr
     */
    public function setAdr($adr)
    {
        $this->adr = $adr;
    }

    /**
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param mixed $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getDepartments()
    {
        return $this->departments;
    }

    /**
     * @param mixed $departments
     */
    public function setDepartments($departments)
    {
        $this->departments = $departments;
    }



}