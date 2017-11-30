<?php

namespace Vielle\CatalogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Feature
 *
 * @ORM\Table(name="feature")
 * @ORM\Entity(repositoryClass="Vielle\CatalogBundle\Repository\FeatureRepository")
 */
class Feature
{
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
	 * @ORM\ManyToMany(targetEntity="Vielle\CatalogBundle\Entity\Subcategory")
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $subcategory;


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
     * @return Feature
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
     * Set subcategory
     *
     * @param \Vielle\CatalogBundle\Entity\Subcategory $subcategory
     *
     * @return Feature
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
}
