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
	
	class MentionsController extends Controller
	{
		public function mentionsAction()
		{
			
			$locale = $request->getLocale();
			
			
			$content = $this->get('templating')->render('VielleCatalogBundle:Default:mentions.html.twig', array('_locale'
																																   =>$locale));
			return new Response($content);
		}
	}
