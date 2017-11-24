<?php
	/**
	 * Created by PhpStorm.
	 * User: natacha
	 * Date: 23/11/2017
	 * Time: 11:53
	 */
	
	namespace Vielle\CatalogBundle\Controller;
	
	
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Request;
	use Vielle\CatalogBundle\Entity\Product;
	use Vielle\CatalogBundle\Form\ProductType;
	use Vielle\CatalogBundle\Services\Uploader;
	
	
	class AdminAddProductController extends Controller
	{
		public function addproductAction(Request $request)
		{
			$product = new Product();
			$uploader = new Uploader('assets/images/products');
			$form = $this->createForm(ProductType::class, $product);
			
			if ($request->isMethod('POST'))
			{
				$form->handleRequest($request);
				
				if ($form->isSubmitted() && $form->isValid())
				{
					$file = $form['photo']->getData();
					$fileName = $uploader->upload($file);
					$product->setPhoto($fileName);
					
					$em = $this->getDoctrine()->getManager();
					$em->persist($product);
					$em->flush();
					
					return $this->redirectToRoute('vielles');
				}
			}
			return $this->render('VielleCatalogBundle:Admin:add.html.twig', array(
				'form' => $form->createView()
			));
		}
	}
