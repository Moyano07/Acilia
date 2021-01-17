<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use InvalidArgumentException;
use PascalDeVink\ShortUuid\ShortUuid;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{

    const CURRENCY_TYPES = ['USD', 'EUR'];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $uuid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="products")
     */
    private $category;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $currency;

    /**
     * @ORM\Column(type="boolean")
     */
    private $featured;

    private function __construct()
    {
        $this->setUuid((new ShortUuid())->encode(Uuid::uuid1()));
    }

    public static function create($name, Category $category = null, $price, $currency, $featured)
    {
        $product = new Product();
        $product->setName($name);
        $product->setCategory($category);
        $product->setPrice($price);
        $product->setCurrency($currency);
        $product->setFeatured($featured);

        return $product;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {

        $this->category = $category;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        if (!$price) {
            throw new InvalidArgumentException('price is null');
        }
        $this->price = $price;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): self
    {
        if (!$currency) {
            throw new InvalidArgumentException('currency is null');
        }
        if (!in_array($currency, self::CURRENCY_TYPES)) {
            throw new InvalidArgumentException('the type of currency is not valid');
        }
        $this->currency = $currency;

        return $this;
    }

    public function getFeatured(): ?bool
    {
        return $this->featured;
    }

    public function setFeatured(bool $featured): self
    {

        if (!is_bool($featured)) {
            throw new InvalidArgumentException('featured is required type bool');
        }

        $this->featured = $featured;

        return $this;
    }
}
