<?php

namespace ApiPlatform\Core\Tests\Fixtures\TestBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity()
 * @ApiResource(
 *     attributes={
 *         "normalization_context"={"groups"={"get"}}
 *     },
 *     collectionOperations={
 *         "get"={"method"="GET"},
 *     },
 *     itemOperations={
 *         "get"={"method"="GET"},
 *         "put"={"method"="PUT"},
 *     }
 * )
 */
class AcmeUser extends AcmePerson
{
    /**
     * @var null|string
     *
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"get"})
     */
    protected $id;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @Groups({"user"})
     */
    protected $username;

    /**
     * @Groups({"user"})
     */
    protected $email;

    /**
     * @Groups({"user-write"})
     */
    protected $plainPassword;

    public function setEmail($email)
    {
        parent::setEmail($email);

        return $this;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}