<?php

namespace Vielle\CatalogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="Vielle\CatalogBundle\Repository\ProductRepository")
 */
class Product
{
	/**
	 * @ORM\ManyToOne(targetEntity="Vielle\CatalogBundle\Entity\Subcategory")
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $subcategory;
	
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="metatag", type="string", length=255)
     */
    private $metatag;

    /**
     *
     * @ORM\Column(name="photo")
	 * @ORM\OneToOne(targetEntity="AppBundle\Entity\Image", cascade={"persist", "remove"})
     */
    private $photo;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Vielle\CatalogBundle\Entity\Feature")
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $feature;
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set metatag
     *
     * @param string $metatag
     *
     * @return Product
     */
    public function setMetatag($metatag)
    {
        $this->metatag = $metatag;

        return $this;
    }

    /**
     * Get metatag
     *
     * @return string
     */
    public function getMetatag()
    {
        return $this->metatag;
    }

    /**
     * Set photo
     *
     * @param mixed $photo
     *
     * @return Product
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set subcategory
     *
     * @param \Vielle\CatalogBundle\Entity\Subcategory $subcategory
     *
     * @return Product
     */
    public function setSubcategory(\Vielle\CatalogBundle\Entity\Subcategory $subcategory)
    {
        $this->subcategory = $subcategory;

        return $this;
    }

    /**
     * Get subcategory
     *
     * @return \Vielle\CatalogBundle\Entity\Subcategory
     */
    public function getSubcategory()
    {
        return $this->subcategory;
    }

    /**
     * Set feature
     *
     * @param \Vielle\CatalogBundle\Entity\Feature $feature
     *
     * @return Product
     */
    public function setFeature(\Vielle\CatalogBundle\Entity\Feature $feature)
    {
        $this->feature = $feature;

        return $this;
    }

    /**
     * Get feature
     *
     * @return \Vielle\CatalogBundle\Entity\Feature
     */
    public function getFeature()
    {
        return $this->feature;
    }
}
