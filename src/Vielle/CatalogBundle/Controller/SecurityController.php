<?php
	/**
	 * Created by PhpStorm.
	 * User: natacha
	 * Date: 03/04/2018
	 * Time: 17:18
	 */
	
	namespace Vielle\CatalogBundle\Controller;
	
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Vielle\CatalogBundle\Form\Type\LoginFormType;
	use Symfony\Component\HttpFoundation\Request;
	
	class SecurityController extends Controller
	{
		public function loginAction(Request $request)
		{
			if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
				return $this->redirectToRoute('admin_index');
			}
			
			
			$authenticationUtils = $this->get('security.authentication_utils');
			// get the login error if there is one
			$error = $authenticationUtils->getLastAuthenticationError();
			// last username entered by the user
			$lastUsername = $authenticationUtils->getLastUsername();
			$form = $this->createForm(LoginFormType::class, [
				'_username' => $lastUsername,
			]);
			
				
				return $this->render(
					'VielleCatalogBundle:Security:login.html.twig',
					array(
						'form' => $form->createView(),
						'error' => $error,
					)
				);}
		}
