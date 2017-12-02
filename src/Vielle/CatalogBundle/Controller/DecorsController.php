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
		public function catalogAction(Request $request)
		{
			//affichage du catalogue
			$locale = $request->getLocale();
			
			if($request->isXmlHttpRequest())
			{
				$style = $request->get('subcategory');
				$connexion = $this->get('database_connection');
				$query = "select * from product where subcategory_id = ". $style;
				$rows = $connexion->fetchAll($query);
				return new JsonResponse(array('data' => json_encode($rows)));
			}
			
			$em = $this->getDoctrine()->getManager();
			
			$categories = $em->getRepository(Category::class)->find("2");
			if ($categories)
			{
				$subcategories = $em->getRepository(Subcategory::class)->findBy(array('category' => "2"));
			}
			$allvielles = $em->getRepository(Product::class)->findAllDecors();
			return $this->render('VielleCatalogBundle:Decors:catalog.html.twig', array('_locale'
																											 => $locale,
																											   'categories' => $categories,
																										   'subcategories' => $subcategories,
																											'vielles' => $allvielles));
			
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
