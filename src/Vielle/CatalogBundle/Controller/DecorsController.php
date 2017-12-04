<?php
	/**
	 * Created by PhpStorm.
	 * User: natacha
	 * Date: 06/10/2017
	 * Time: 09:17
	 */
	
	namespace Vielle\CatalogBundle\Controller;
	
	
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\JsonResponse;
	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Component\HttpFoundation\Response;
	use Vielle\CatalogBundle\Entity\Category;
	use Vielle\CatalogBundle\Entity\Product;
	use Vielle\CatalogBundle\Entity\Subcategory;
	use Vielle\CatalogBundle\VielleCatalogBundle;
	
	class DecorsController extends Controller
	{
		public function catalogAction(Request $request, $id = null)
		{
			//affichage du catalogue
			
			$locale = $request->getLocale();
			
			$repoDecors = $this->get('vielle_catalog.vielleservice')->recupRepos();
			
			
			$url = $request->getUri();
			if (stristr($url, 'subcatdecor'))
			{
				$decors = $this->get('vielle_catalog.vielleservice')->showSubCategories($id);
			}
			else { $decors = $repoDecors[10]; }
			
			$reponse = $this->render('VielleCatalogBundle:Decors:catalog.html.twig', array(
				'categories' => $repoDecors[3],
				'subvielles' =>$repoDecors[2],
				'subdecors' =>$repoDecors[4],
				'features' => $repoDecors[5],
				'counters' => $repoDecors[9],
				'decors' => $decors,
				'vielles' =>$repoDecors[2]
			));
			return $reponse;
		}
		
		
		
		public function viewAction($id)
		{
			dump($id);
			$em = $this->getDoctrine()->getManager();
			$repository = $em->getRepository(Product::class);
			$vielle = $repository->find($id);
			
			return $this->render('VielleCatalogBundle:Decors:single.html.twig', array(
				'vielle' => $vielle
			));
		}
	}
	/*$repoVielles['1'] = $this->em->getRepository(Category::class)->find("1");
		$repoVielles['2'] = $this->em->getRepository(Subcategory::class)->findByCategory('1');
		$repoVielles['3'] = $this->em->getRepository(Category::class)->find("2");
		$repoVielles['4'] = $this->em->getRepository(Subcategory::class)->findByCategory('2');
		$repoVielles['5'] = $this->em->getRepository(Feature::class)->findAll();
		$repoVielles['6'] = $this->counters();
		$repoVielles['7'] = $this->counterFeatures();
		$repoVielles['8'] = $this->em->getRepository(Product::class)->findAllVielles();
		$repoVielles['9'] = $this->countDecors();
		$repoVielles['10'] = $this->em->getRepository(Product::class)->findAllDecors();*/
