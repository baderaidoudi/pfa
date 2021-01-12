<?php
/**
 * Created by PhpStorm.
 * User: baidoudi
 * Date: 1/10/21
 * Time: 9:16 PM
 */

namespace Pfa\ProjectBundle\Entity;


class MyDateTime extends \DateTime
{
    public function __toString()
    {
        return $this->format('U');
    }
}