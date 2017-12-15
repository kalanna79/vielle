<?php
	/**
	 * Created by PhpStorm.
	 * User: natacha
	 * Date: 25/11/2017
	 * Time: 09:17
	 */
	
	namespace Vielle\CatalogBundle\Service;
	
	use Doctrine\ORM\EntityManagerInterface;
	use Symfony\Component\DependencyInjection\Container;
	use Symfony\Component\HttpFoundation\Request;
	use Vielle\CatalogBundle\Entity\Photo;
	use Vielle\CatalogBundle\Entity\Product;
	use Vielle\CatalogBundle\Entity\Feature;
	use Vielle\CatalogBundle\Entity\Category;
	use Vielle\CatalogBundle\Entity\Subcategory;
	use Vielle\CatalogBundle\Form\ProductType;
	use Vielle\CatalogBundle\Form\EditProductType;
	use Symfony\Component\Form\FormFactory;
	use Symfony\Component\HttpFoundation\File\File;
	
	class VielleService
	{
		private $em;
		private $form;
		private $uploader;
		private $container;
		
		public function __construct(EntityManagerInterface $em, Uploader $uploader, FormFactory $form, Container
		$container)
		{
			$this->em = $em;
			$this->uploader = $uploader;
			$this->form = $form;
			$this->container = $container;
		}
		
		public function addVielle(Request $request)
		{
			$product = new Product();
			$form = $this->form->create(ProductType::class, $product);
			$form->handleRequest($request);
				
				if ($form->isSubmitted() && $form->isValid()) {
					$form->getData();
					$file = $form['photo']->getData()->getFile();
					$fileName = $this->uploader->upload($file);
					$product->getPhoto()->setFile($fileName);
					
					$this->em->persist($product);
					$this->em->flush();
				}
			
			return $form;
		}
		
		public function editVielle(Request $request, $id)
		{
			$product = $this->em->getRepository(Product::class)->find($id);
			
			$form = $this->form->create(EditProductType::class, $product);
			$form->handleRequest($request);
			
			if ($form->isSubmitted() && $form->isValid()) {
				$form->getData();
				if($form['photo']->getData() != null){
					$file = $form['photo']->getData()->getFile();
					$fileName = $this->fileuploader->upload($file);
					$product->getImage()->setAlt($fileName);
				}
				
				
				$this->em->persist($product);
				$this->em->flush();
			}
			
			return $form;
		}
		
		public function showFeatures($id)
		{
			return $this->em->getRepository(Product::class)->findByFeature($id);
			
		}
		
		public function showSubcategories($id)
		{
			return $this->em->getRepository(Product::class)->findBySubcategory($id);
		}
		
		public function counters()
		{
			$counter = array();
			$counter['1'] = $this->em->getRepository(Product::class)->countRondes();
			$counter['2'] = $this->em->getRepository(Product::class)->countPlates();
			$counter['3'] = $this->em->getRepository(Product::class)->countSpeciales();
			return $counter;
		}
		
		public function countDecors()
		{
			$counter = array();
			$counter['1'] = $this->em->getRepository(Product::class)->countTetes();
			$counter['2'] = $this->em->getRepository(Product::class)->countTables();
			$counter['3'] = $this->em->getRepository(Product::class)->countCaisses();
			return $counter;
		}
		
		public function counterFeatures()
		{
			$counterFeatures = array();
			$counterFeatures['1'] = $this->em->getRepository(Product::class)->count2chanterelles();
			$counterFeatures['2'] = $this->em->getRepository(Product::class)->count3chanterelles();
			$counterFeatures['3'] = $this->em->getRepository(Product::class)->count4chanterelles();
			return $counterFeatures;
		}
		
		public function recupRepos()
		{
			$repoVielles = array();
			$repoVielles['1'] = $this->em->getRepository(Category::class)->find("1");
			$repoVielles['2'] = $this->em->getRepository(Subcategory::class)->findByCategory('1');
			$repoVielles['3'] = $this->em->getRepository(Category::class)->find("2");
			$repoVielles['4'] = $this->em->getRepository(Subcategory::class)->findByCategory('2');
			$repoVielles['5'] = $this->em->getRepository(Feature::class)->findAll();
			$repoVielles['6'] = $this->counters();
			$repoVielles['7'] = $this->counterFeatures();
			$repoVielles['8'] = $this->em->getRepository(Product::class)->findAllVielles();
			$repoVielles['9'] = $this->countDecors();
			$repoVielles['10'] = $this->em->getRepository(Product::class)->findAllDecors();
			return $repoVielles;
		}
		
		public function showForSubMenu()
		{
			$submenu = array();
			$submenu['1'] = $this->em->getRepository(Subcategory::class)->findByCategory('1');
			$submenu['2'] = $this->em->getRepository(Subcategory::class)->findByCategory('2');
			return $submenu;
			
			
		}
	}
