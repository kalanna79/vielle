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
	use Vielle\CatalogBundle\Form\ProductType;
	use Symfony\Component\Form\FormFactory;
	
	class VielleService
	{
		private $em;
		private $form;
		private $uploader;
		
		public function __construct(EntityManagerInterface $em, Uploader $uploader, FormFactory $form)
		{
			$this->em = $em;
			$this->uploader = $uploader;
			$this->form = $form;
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
					$product->setPhoto($fileName);
					
					$this->em->persist($product);
					$this->em->flush();
				}
			
			return $form;
		}
	}
