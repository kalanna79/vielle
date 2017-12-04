<?php
	/**
	 * Created by PhpStorm.
	 * User: natacha
	 * Date: 13/10/2017
	 * Time: 15:53
	 */
	
	namespace Vielle\CatalogBundle\Controller;
	
	
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Component\HttpFoundation\Response;
	use Vielle\CatalogBundle\Entity\Subcategory;
	
	class LuthiersController extends Controller
	{
		public function luthiersAction(Request $request)
		{
			$locale = $request->getLocale();
			$vielles = $this->getDoctrine()->getManager()->getRepository(Subcategory::class)->findBy(array('category' => "1"));
			$decors = $this->getDoctrine()->getManager()->getRepository(Subcategory::class)->findBy(array('category' => "2"));
			
			$content = $this->get('templating')->render('VielleCatalogBundle:Default:luthiers.html.twig', array('_locale'
																															=>$locale,
																											 'subcategories'=>$vielles,
																											 'decors'=>$decors));
			return new Response($content);
			
		}
	}
