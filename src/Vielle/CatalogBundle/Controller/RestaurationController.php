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
	
	
	class RestaurationController extends Controller
	{
		public function restaurationAction(Request $request)
		{
			$locale = $request->getLocale();
			$seo = $this->container->get('vielle_catalog.seoservice')->restaurationSeo();
			
			
			$content = $this->get('templating')->render('VielleCatalogBundle:Default:restauration.html.twig', array('_locale'
																															=>$locale,
																													'seopage' => $seo));
			return new Response($content);
		}
	}
