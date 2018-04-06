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
	use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
	
	
	class AdminAddProductController extends Controller
	{
		/**
		 * @Security("has_role('ROLE_ADMIN')")
		 */
		public function addvielleAction(Request $request)
		{
			$form = $this->get('vielle_catalog.vielleservice')->addVielle($request);
			
			if ($form->isSubmitted() && $form->isValid())
			{
				return $this->redirectToRoute('admin_index');
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
				return $this->redirectToRoute('admin_index');
			}
			return $this->render('VielleCatalogBundle:Admin:add.html.twig', array(
				'form' => $form->createView()
			));
		}
	}
