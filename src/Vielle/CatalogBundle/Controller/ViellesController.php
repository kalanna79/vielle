<?php
	/**
	 * Created by PhpStorm.
	 * User: natacha
	 * Date: 06/10/2017
	 * Time: 09:17
	 */
	
	namespace Vielle\CatalogBundle\Controller;
	
	
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Request;
	use Vielle\CatalogBundle\Entity\Product;
	use Vielle\CatalogBundle\Entity\Subcategory;
	
	class ViellesController extends Controller
	{
		/**
		 * @param Request $request
		 * @param null    $id
		 * @return \Symfony\Component\HttpFoundation\Response
		 */
		public function catalogAction(Request $request, $id = null)
		{
			//affichage du catalogue
			$locale = $request->getLocale();
			
			$repoVielles = $this->get('vielle_catalog.vielleservice')->recupRepos();
			
			
			$url = $request->getUri();
			if (stristr($url, 'subcatvielles'))
			{
				$vielles = $this->get('vielle_catalog.vielleservice')->showSubCategories($id);
			}
			elseif (stristr($url, 'chant'))
			{
				$vielles = $this->get('vielle_catalog.vielleservice')->showFeatures($id);
				
			} else { $vielles = $repoVielles[8]; }
			
			$reponse = $this->render('VielleCatalogBundle:Vielles:catalog.html.twig', array(
				'categories' => $repoVielles[1],
				'subvielles' =>$repoVielles[2],
				'subdecors' =>$repoVielles[4],
				'features' => $repoVielles[5],
				'counters' => $repoVielles[6],
				'countFeature' => $repoVielles[7],
				'vielles' => $vielles,
				'decors' => $repoVielles[3]
			));
			
			return $reponse;
		}
		
		public function viewAction($id)
		{
			$em = $this->getDoctrine()->getManager();
			$vielle = $em->getRepository(Product::class)->find($id);
			
			return $this->render('VielleCatalogBundle:Vielles:single.html.twig', array(
				'vielle' => $vielle
			));
		}
	}

	
