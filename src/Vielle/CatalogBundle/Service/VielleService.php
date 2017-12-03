<?php
	/**
	 * Created by PhpStorm.
	 * User: natacha
	 * Date: 25/11/2017
	 * Time: 09:17
	 */
	
	namespace Vielle\CatalogBundle\Service;
	
	use Doctrine\ORM\EntityManagerInterface;
	use Symfony\Component\HttpFoundation\Request;
	use Vielle\CatalogBundle\Entity\Product;
	use Vielle\CatalogBundle\Entity\Feature;
	use Vielle\CatalogBundle\Entity\Category;
	use Vielle\CatalogBundle\Entity\Subcategory;
	use Vielle\CatalogBundle\Form\ProductType;
	use Symfony\Component\Form\FormFactory;
	use Vielle\CatalogBundle\Service\Uploader;
	
	class VielleService
	{
		private $em;
		private $form;
		
		public function __construct(EntityManagerInterface $em, FormFactory $form)
		{
			dump('hello');exit();
			
			$this->em = $em;
			$this->form = $form;
		}
		
		/**
		 * @param Request $request
		 * @return \Symfony\Component\Form\FormInterface
		 */
		public function addVielle(Request $request)
		{
			$product = new Product();
			$form = $this->form->create(ProductType::class, $product);
			$form->handleRequest($request);
				
				if ($form->isSubmitted() && $form->isValid()) {
					$form->getData();
					$file = $form['photo']->getData()->getFile();
					$fileName = $this->container->get('uploader')->upload($file);
					$product->setPhoto($fileName);
					
					$this->em->persist($product);
					$this->em->flush();
				}
			
			return $form;
		}
		
		/**
		 * @param $id
		 * @return mixed
		 */
		public function showFeatures($id)
		{
			return $this->em->getRepository(Product::class)->findByFeature($id);
			
		}
		
		/**
		 * @param $id
		 * @return mixed
		 */
		public function showSubcategories($id)
		{
			return $this->em->getRepository(Product::class)->findBySubcategory($id);
		}
		
		/**
		 * Count how many products in each subcategory
		 * @return array
		 */
		public function counters()
		{
			$counter = array();
			$counter['1'] = $this->em->getRepository(Product::class)->countRondes();
			$counter['2'] = $this->em->getRepository(Product::class)->countPlates();
			$counter['3'] = $this->em->getRepository(Product::class)->countSpeciales();
			return $counter;
		}
		
		/**
		 * count how many products with the selected feature
		 * @return array
		 */
		public function counterFeatures()
		{
			$counterFeatures = array();
			$counterFeatures['1'] = $this->em->getRepository(Product::class)->count2chanterelles();
			$counterFeatures['2'] = $this->em->getRepository(Product::class)->count3chanterelles();
			$counterFeatures['3'] = $this->em->getRepository(Product::class)->count4chanterelles();
			return $counterFeatures;
		}
		
		/**
		 * find all variables in repositories and return an array for catalog views
		 * @return array
		 */
		public function recupReposVielles()
		{
			$repoVielles = array();
			$repoVielles['1'] = $this->em->getRepository(Category::class)->find("1");
			$repoVielles['2'] = $this->em->getRepository(Subcategory::class)->findByCategory('1');
			$repoVielles['3'] = $this->em->getRepository(Feature::class)->findAll();
			$repoVielles['4'] = $this->counters();
			$repoVielles['5'] = $this->counterFeatures();
			$repoVielles['6'] = $this->em->getRepository(Product::class)->findAllVielles();
			dump($repoVielles);exit();
			return $repoVielles;
		}
	}
