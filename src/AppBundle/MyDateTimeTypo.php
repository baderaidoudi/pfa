<?php
/**
 * Created by PhpStorm.
 * User: baidoudi
 * Date: 1/10/21
 * Time: 10:13 PM
 */

namespace AppBundle;

use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Pfa\ProjectBundle\Entity\MyDateTime;

class MyDateTimeTypo extends DateTimeType
{



    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $dateTime = parent::convertToPHPValue($value, $platform);

        if ( ! $dateTime) {
            return $dateTime;
        }

        return new MyDateTime('@' . $dateTime->format('U'));
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform)
    {
        return true;
    }

    public function getName()
    {
        return 'mydatetime';
    }





}