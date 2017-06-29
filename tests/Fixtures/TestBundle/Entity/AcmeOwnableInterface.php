<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 29/06/2017
 * Time: 17:40
 */

namespace ApiPlatform\Core\Tests\Fixtures\TestBundle\Entity;


interface AcmeOwnableInterface
{
    public function setOwner(AcmePerson $person);
    public function getOwner();
}