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
	
	
	class AdminAddProductController extends Controller
	{
		public function addvielleAction(Request $request)
		{
			$form = $this->get('vielle_catalog.vielleservice')->addVielle($request);
			
			if ($form->isSubmitted() && $form->isValid())
			{
				return $this->redirectToRoute('vielles');
			}
			return $this->render('VielleCatalogBundle:Admin:add.html.twig', array(
				'form' => $form->createView()
			));
		}
		
		public function adddecorAction(Request $request)
		{
			$form = $this->get('vielle_catalog.vielleservice')->addVielle($request);
			
			if ($form->isSubmitted() && $form->isValid())
			{
				return $this->redirectToRoute('decors');
			}
			return $this->render('VielleCatalogBundle:Admin:add.html.twig', array(
				'form' => $form->createView()
			));
		}
	}
