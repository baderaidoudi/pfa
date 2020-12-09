<?php

namespace Pfa\ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Locations
 *
 * @ORM\Table(name="locations")
 * @ORM\Entity
 */
class Locations
{
    /**
     * @var string
     *
     * @ORM\Column(name="adr", type="string", length=255, nullable=true)
     */
    private $adr;

    /**
     * @var string
     *
     * @ORM\Column(name="postal_code", type="string", length=255, nullable=true)
     */
    private $postalCode;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @var integer
     *
     * @ORM\Column(name="location_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $locationId;

    /**
     * @return string
     */
    public function getAdr()
    {
        return $this->adr;
    }

    /**
     * @param string $adr
     */
    public function setAdr($adr)
    {
        $this->adr = $adr;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return int
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * @param int $locationId
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    }


}

