<?php
	/**
	 * Created by PhpStorm.
	 * User: natacha
	 * Date: 14/12/2017
	 * Time: 12:36
	 */
	
	namespace Vielle\CatalogBundle\Controller;
	
	
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Session\Session;
	
	class AdminDeleteProductController extends Controller
	{
		public function deleteItemAction($id)
		{
			$session = new Session();
			$this->get('vielle_catalog.vielleservice')->deleteVielle($id);
			$session->getFlashBag()->add('notice', 'Elément supprimé avec succès');
			foreach ($session->getFlashBag()->all() as $type => $messages) {
				foreach ($messages as $message) {
					echo '<div class="flash-'.$type.'">'.$message.'</div>';
				}
			}
			
			return $this->redirectToRoute('admin_index');
		}
	}
