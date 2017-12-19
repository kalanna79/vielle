<?php
	/**
	 * Created by PhpStorm.
	 * User: natacha
	 * Date: 14/12/2017
	 * Time: 12:36
	 */
	
	namespace Vielle\CatalogBundle\Controller;
	
	
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
	
	
	
	class AdminIndexController extends Controller
	{
		/**
		 * @Security("has_role('ROLE_ADMIN')")
		 */
		public function indexAction()
		{
			$repoVielles = $this->get('vielle_catalog.vielleservice')->recupRepos();
			$seo = $this->container->get('vielle_catalog.seoservice');
			
			$reponse = $this->render('VielleCatalogBundle:Admin:index.html.twig', array(
				'categories' => $repoVielles[1],
				'subvielles' =>$repoVielles[2],
				'subdecors' =>$repoVielles[4],
				'features' => $repoVielles[5],
				'counters' => $repoVielles[6],
				'countFeature' => $repoVielles[7],
				'vielles' => $repoVielles[8],
				'decors' => $repoVielles[3],
				'seopage' =>$seo,
			));
			
			return $reponse;
		}
	}
