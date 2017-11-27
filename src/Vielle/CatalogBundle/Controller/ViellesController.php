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
	use Symfony\Component\HttpFoundation\Response;
	use Vielle\CatalogBundle\Entity\Category;
	use Vielle\CatalogBundle\Entity\Product;
	use Vielle\CatalogBundle\Entity\Subcategory;
	use Vielle\CatalogBundle\VielleCatalogBundle;
	
	class ViellesController extends Controller
	{
		public function catalogAction(Request $request)
		{
			//affichage du catalogue
			$locale = $request->getLocale();
			$em = $this->getDoctrine()->getManager();
			
			$categories = $em->getRepository(Category::class)->find("1");
			if ($categories)
			{
				$subcategories = $em->getRepository(Subcategory::class)->findBy(array('category' => "1"));
			}
			$vielles = $em->getRepository(Product::class)->findVielles();
			return $this->render('VielleCatalogBundle:Vielles:catalog.html.twig', array('_locale'
																											 => $locale,
																											   'categories' => $categories,
																										   'subcategories' => $subcategories,
																											'vielles' => $vielles));
			
		}
		
		public function viewAction(Request $request, $id)
		{
			$locale = $request->getLocale();
			$vielle = $request->query->getParameterAttributes('id');
			$repository = $this->getDoctrine()->getManager()->getRepository('VielleCatalogBundle:Product');
			dump($vielle);exit();
			
			$vielle = $repository->findOneBy($id);
			return $this->render('VielleCatalogBundle:Vielles:single.html.twig', array(
				'_locale' => $locale,
				'vielle' => $vielle
			));
		}
	}
