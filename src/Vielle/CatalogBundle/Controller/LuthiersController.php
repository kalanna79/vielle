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
	
	class LuthiersController extends Controller
	{
		public function luthiersAction()
		{
			$content = $this->get('templating')->render('VielleCatalogBundle:Default:luthiers.html.twig');
			return new Response($content);
		}
	}
