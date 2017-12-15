<?php
	/**
	 * Created by PhpStorm.
	 * User: natacha
	 * Date: 14/12/2017
	 * Time: 12:35
	 */
	
	namespace Vielle\CatalogBundle\Controller;
	
	
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Request;
	use Vielle\CatalogBundle\Entity\Product;
	
	
	class AdminEditProductController extends Controller
	{
		public function editVielleAction(Request $request, $id)
		{
			
			$form = $this->get('vielle_catalog.vielleservice')->editVielle($request, $id);
			
			if ($form->isSubmitted() && $form->isValid())
			{
				return $this->redirectToRoute('vielles');
			}
			return $this->render('VielleCatalogBundle:Admin:edit.html.twig', array(
				'form' => $form->createView()
			));
		}
	}
