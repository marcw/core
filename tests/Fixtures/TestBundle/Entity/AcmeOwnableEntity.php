<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 29/06/2017
 * Time: 17:37
 */

namespace ApiPlatform\Core\Tests\Fixtures\TestBundle\Entity;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;

trait AcmeOwnableEntity
{
    /**
     * @var null|AcmePerson
     * @ORM\ManyToOne(targetEntity="AcmePerson")
     * @ORM\JoinColumn(name="owner_id", referencedColumnName="id", onDelete="SET NULL", nullable=true)
     * @MaxDepth(1)
     * @Groups({"get"})
     */
    protected $owner;

    public function setOwner(AcmePerson $owner): void
    {
        $this->owner = $owner;
    }

    public function getOwner(): ?AcmePerson
    {
        return $this->owner;
    }
}