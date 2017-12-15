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
			$seo = $this->container->get('vielle_catalog.seoservice');
			
			
			$url = $request->getUri();
			if (stristr($url, 'subcatdecor')) {
				$decors = $this->get('vielle_catalog.vielleservice')->showSubCategories($id);
				$seopage = $seo->subcatdecorSeo($id);
			} else {
				$decors = $repoDecors[10];
				$seopage = $seo->decorsSeo();
			}
			
			$reponse = $this->render('VielleCatalogBundle:Decors:catalog.html.twig', array(
				'categories' => $repoDecors[3],
				'subvielles' => $repoDecors[2],
				'subdecors'  => $repoDecors[4],
				'features'   => $repoDecors[5],
				'counters'   => $repoDecors[9],
				'decors'     => $decors,
				'vielles'    => $repoDecors[2],
				'seopage'	 => $seopage
			));
			
			return $reponse;
		}
	}
