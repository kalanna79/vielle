<?php
	/**
	 * Created by PhpStorm.
	 * User: natacha
	 * Date: 07/12/2017
	 * Time: 12:00
	 */
	
	namespace Vielle\CatalogBundle\Controller;
	
	
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Request;
	
	
	
	class MenuController extends Controller
	{
		public function menuAction(Request $request)
		{
			$locale = $request->getLocale();
			
			$submenu = $this->get('vielle_catalog.vielleservice')->showForSubMenu();
			$reponse = $this->render('menu2.html.twig', array(
				'locale' => $locale,
 				'subvielles' =>$submenu[1],
				'subdecors' =>$submenu[2],
			));
			return $reponse;
		}
	
	
	}
