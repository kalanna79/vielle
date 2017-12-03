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
	use Vielle\CatalogBundle\Service\VielleService;
	
	class ViellesController extends Controller
	{
		/**
		 * @param Request       $request
		 * @param VielleService $vielleService
		 * @param null          $id
		 * @return \Symfony\Component\HttpFoundation\Response
		 */
		public function catalogAction(Request $request, VielleService $vielleService, $id = null)
		{
			//affichage du catalogue
			$locale = $request->getLocale();
			
			//$service = $this->get('vielle_catalog.vielleservice');
			$repoVielles = $vielleService->recupReposVielles();
			
			$url = $request->getUri();
			if (stristr($url, 'subcat'))
			{
				$vielles = $vielleService->showSubCategories($id);
			}
			elseif (stristr($url, 'chant'))
			{
				$vielles = $vielleService->showFeatures($id);
				
			} else { $vielles = $repoVielles[6]; }
			
			$reponse = $this->render('VielleCatalogBundle:Vielles:catalog.html.twig', array(
				'categories' => $repoVielles[1],
				'subcategories' =>$repoVielles[2],
				'features' => $repoVielles[3],
				'counters' => $repoVielles[4],
				'countFeature' => $repoVielles[5],
				'vielles' => $vielles
			));
			
			return $reponse;
		}
		
		/**
		 * @param $id
		 * @return \Symfony\Component\HttpFoundation\Response
		 */
		public function viewAction($id)
		{
			$em = $this->getDoctrine()->getManager();
			$vielle = $em->getRepository(Product::class)->find($id);
			
			return $this->render('VielleCatalogBundle:Vielles:single.html.twig', array(
				'vielle' => $vielle
			));
		}
	}
