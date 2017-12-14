<?php
	/**
	 * Created by PhpStorm.
	 * User: natacha
	 * Date: 14/12/2017
	 * Time: 10:52
	 */
	
	namespace Vielle\CatalogBundle\Service;
	
	
	use Doctrine\ORM\EntityManager;
	use Sonata\SeoBundle\Seo\SeoPage;
	use Vielle\CatalogBundle\Entity\Feature;
	use Vielle\CatalogBundle\Entity\Subcategory;
	use Symfony\Component\Routing\Router;
	
	
	class SeoService
	{
		private $seo;
		private $em;
		private $router;
		
		public function __construct(SeoPage $seo, EntityManager $em,Router $router)
		{
			$this->seo = $seo;
			$this->em = $em;
			$this->router = $router;

		}
		
		
		public function contactSeo()
		{
			$seoPage = $this->seo;
			$seoPage
				->setTitle("Contactez les luthiers Boudet")
				->addMeta('name', 'description', "Toutes les coordonnées des facteurs de vielles à roue Boudet")
				->addMeta('property', 'og:title', "Contactez les luthiers Boudet")
				->addMeta('property', 'og:type', 'website')
				->addMeta('property', 'og:url',  $this->router->generate('contact',array(),true))
				->addMeta('property', 'og:description', "Toutes les coordonnées des facteurs de vielles à roue Boudet")
			;
			
			return $seoPage;
			
		}
		
		public function restaurationSeo()
		{
			$seoPage = $this->seo;
			$seoPage
				->setTitle("Confiez la restauration de votre vielle à roue à un luthier Boudet")
				->addMeta('name', 'description', "Les luthiers Boudet restaurent votre vielle à roue selon les traditions")
				->addMeta('property', 'og:title', "Restauration de vielles à roue")
				->addMeta('property', 'og:type', 'website')
				->addMeta('property', 'og:url',  $this->router->generate('restauration',array(),true))
				->addMeta('property', 'og:description', "Les luthiers Boudet restaurent votre vielle à roue selon les traditions")
			;
			
			return $seoPage;
		}
		
		public function luthierSeo()
		{
			$seoPage = $this->seo;
			$seoPage
				->setTitle("Découvrez les facteurs de vielles Boudet Père et Fils")
				->addMeta('name', 'description', "L'atelier de lutherie Boudet est installé au coeur de Jenzat, découvrez qui sont Jean-Claude et Claude-Emmanuel Boudet")
				->addMeta('property', 'og:title', "Les facteurs de vielles Boudet Père et Fils")
				->addMeta('property', 'og:type', 'website')
				->addMeta('property', 'og:url',  $this->router->generate('luthiers',array(),true))
				->addMeta('property', 'og:description', "L'atelier de lutherie Boudet est installé au coeur de Jenzat, découvrez qui sont Jean-Claude et Claude-Emmanuel Boudet")
			;
			
			return $seoPage;
		}
		
		public function mentionsSeo()
		{
			$seoPage = $this->seo;
			$seoPage
				->setTitle("Boudet Père et Fils - Mentions légales")
				->addMeta('name', 'description', "Site réalisé pour l'atelier de lutherie Boudet par Natacha Noel")
				->addMeta('property', 'og:title', "Boudet Père et Fils - Mentions légales")
				->addMeta('property', 'og:type', 'website')
				->addMeta('property', 'og:url',  $this->router->generate('mentions',array(),true))
				->addMeta('property', 'og:description', "Site réalisé pour l'atelier de lutherie Boudet par Natacha Noel")
			;
			
			return $seoPage;
		}
		
		public function decorsSeo()
		{
			$seoPage = $this->seo;
			$seoPage
				->setTitle("Décors personnalisés pour vielle à roue")
				->addMeta('name', 'description', "Choisissez votre décor de vielle à roue parmi ceux proposés, ou demandez une création originale  ")
				->addMeta('property', 'og:title', "Décors personnalisés pour vielle à roue")
				->addMeta('property', 'og:type', 'website')
				->addMeta('property', 'og:url',  $this->router->generate('decors',array(),true))
				->addMeta('property', 'og:description', "Choisissez votre décor de vielle à roue parmi ceux proposés, ou demandez une création originale")
			;
			
			return $seoPage;
		}
		
		public function viellesSeo()
		{
			$seoPage = $this->seo;
			$seoPage
				->setTitle("Vielles à roue rondes, plates à 2, 3 ou 4 chanterelles réalisées par l'atelier Boudet")
				->addMeta('name', 'description', "Découvrez quelques-unes des vielles à roue rondes, plates, à 2 chanterelles, 3 chanterelles ou 4 chanterelles réalisées par l'atelier Boudet. Les luthiers Boudet créent votre vielle selon vos désirs et exigences")
				->addMeta('property', 'og:title', "Vielles à roue rondes, plates à 2, 3 ou 4 chanterelles réalisées par l'atelier Boudet")
				->addMeta('property', 'og:type', 'website')
				->addMeta('property', 'og:url',  $this->router->generate('vielles',array(),true))
				->addMeta('property', 'og:description', "Choisissez votre décor de vielle à roue parmi ceux proposés, ou demandez une création originale")
			;
			
			return $seoPage;
		}
		
		public function subcatviellesSeo($id)
		{
			$subcat = $this->em->getRepository(Subcategory::class)->find($id);
			
			$seoPage = $this->seo;
			
			$seoPage
				->setTitle(" ". $subcat->getName() ." réalisées par l'atelier Boudet")
				->addMeta('name', 'description', "Découvrez quelques-unes des " . $subcat->getName() . "
				 réalisées par l'atelier Boudet. Les luthiers Boudet créent votre vielle selon vos désirs et exigences")
				->addMeta('name', 'keywords', $subcat->getMetatag())
				->addMeta('property', 'og:title', " ". $subcat->getName() ." réalisées par l'atelier Boudet")
				->addMeta('property', 'og:type', 'website')
				->addMeta('property', 'og:url',  $this->router->generate('vielles',array(),true))
				->addMeta('property', 'og:description', "Choisissez votre décor de vielle à roue parmi ceux proposés, ou demandez une création originale")
			;
			
			return $seoPage;
		}
		
		public function subcatchantSeo($id)
		{
			$subcat = $this->em->getRepository(Feature::class)->find($id);
			
			$seoPage = $this->seo;
			
			$seoPage
				->setTitle("Vielles ". $subcat->getName() ." réalisées par l'atelier Boudet")
				->addMeta('name', 'description', "Découvrez quelques-unes des vielles " . $subcat->getName() . "
				 réalisées par l'atelier Boudet. Les luthiers Boudet créent votre vielle selon vos désirs et exigences")
				->addMeta('name', 'keywords', $subcat->getTag())
				->addMeta('property', 'og:title', "Vielles ". $subcat->getName() ." réalisées par l'atelier Boudet")
				->addMeta('property', 'og:type', 'website')
				->addMeta('property', 'og:url',  $this->router->generate('vielles',array(),true))
				->addMeta('property', 'og:description', "Choisissez le nombre de chanterelles de votre vielle selon votre niveau et vos envies")
			;
			
			return $seoPage;
		}
		
		public function subcatdecorSeo($id)
		{
			$subcat = $this->em->getRepository(Feature::class)->find($id);
			
			$seoPage = $this->seo;
			
			$seoPage
				->setTitle($subcat->getName() . " de vielles réalisées par l'atelier Boudet")
				->addMeta('name', 'description', "Découvrez quelques-unes des " . $subcat->getName() . " de vielles à roue
				 réalisées par l'atelier Boudet. Les luthiers Boudet créent votre vielle selon vos désirs et exigences")
				->addMeta('name', 'keywords', $subcat->getMetatag())
				->addMeta('property', 'og:title', $subcat->getName() . " de vielles réalisées par l'atelier Boudet")
				->addMeta('property', 'og:type', 'website')
				->addMeta('property', 'og:url',  $this->router->generate('vielles',array(),true))
				->addMeta('property', 'og:description', "Découvrez quelques-unes des " . $subcat->getName() . "de vielles à roue réalisées par l'atelier Boudet")
			;
			
			return $seoPage;
		}
		
	}
