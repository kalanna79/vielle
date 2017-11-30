<?php

namespace Vielle\CatalogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subcategory
 *
 * @ORM\Table(name="subcategory")
 * @ORM\Entity(repositoryClass="Vielle\CatalogBundle\Repository\SubcategoryRepository")
 */
class Subcategory
{
	/**
	 * @ORM\ManyToOne(targetEntity="Vielle\CatalogBundle\Entity\Category")
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $category;
	
	
	
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
     * @ORM\Column(name="metatag", type="string", length=255)
     */
    private $metatag;


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
     * @return Subcategory
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
     * Set metatag
     *
     * @param string $metatag
     *
     * @return Subcategory
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
     * Set category
     *
     * @param \Vielle\CatalogBundle\Entity\Category $category
     *
     * @return Subcategory
     */
    public function setCategory(\Vielle\CatalogBundle\Entity\Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Vielle\CatalogBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }
}
