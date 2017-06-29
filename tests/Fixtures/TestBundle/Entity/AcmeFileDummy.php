<?php
/**
 * Created by PhpStorm.
 * User: marc
 * Date: 29/06/2017
 * Time: 17:34
 */

namespace ApiPlatform\Core\Tests\Fixtures\TestBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table()
 * @ApiResource(
 *     attributes={
 *         "normalization_context"={"groups"={"get"}}
 *     },
 *     collectionOperations={
 *         "get"={"method"="GET"},
 *         "upload"={"route_name"="files_upload"}
 *     },
 *     itemOperations={
 *         "get"={"method"="GET"},
 *         "put"={"method"="PUT"},
 *     }
 * )
 */
class AcmeFileDummy implements AcmeOwnableInterface
{
    use AcmeOwnableEntity;

    /**
     * @var null|string
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"player"})
     */
    private $id;

    /**
     * @var null|string
     * @ORM\Column(type="string", length=128)
     * @Assert\Length(max=128)
     * @Groups({"get"})
     */
    private $name;

    /**
     * @return null|string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param null|string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return null|string
     */
    public function getId()
    {
        return $this->id;
    }
}

