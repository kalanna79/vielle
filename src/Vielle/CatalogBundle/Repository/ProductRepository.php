<?php

namespace Vielle\CatalogBundle\Repository;

/**
 * ProductRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductRepository extends \Doctrine\ORM\EntityRepository
{
	/**
	 * @return array
	 */
	public function findVielles()
	{
		return $this
			->createQueryBuilder('v')
			->where('v.subcategory IN (:subcategory)')
			->setParameter('subcategory', array(3,4))
			->getQuery()
			->getResult()
			;
	}
}
