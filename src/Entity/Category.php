<?php

namespace App\Entity;

use App\Repository\CategoryRepository;

use Doctrine\ORM\Mapping as ORM;
use InvalidArgumentException;
use PascalDeVink\ShortUuid\ShortUuid;
use Ramsey\Uuid\Uuid;


/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $uuid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;


    private function __construct()
    {
        $this->setUuid((new ShortUuid())->encode(Uuid::uuid1()));
    }

    public static function create($name, $description)
    {
        $category = new Category();
        $category->setName($name);
        $category->setDescription($description);

        return $category;
    }

    public function update($name, $description)
    {
        $this->setName($name);
        $this->setDescription($description);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        if (!$name) {
            throw new InvalidArgumentException('name is null');
        }
        $this->name = $name;

        return $this;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        if (!$description) {
            throw new InvalidArgumentException('description is null');
        }
        $this->description = $description;

        return $this;
    }


}
