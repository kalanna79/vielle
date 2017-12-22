<?php
	/**
	 * Created by PhpStorm.
	 * User: natacha
	 * Date: 23/11/2017
	 * Time: 11:13
	 */
	
	namespace Vielle\CatalogBundle\Form\Type;
	
	
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolver;
	
	class EditProductType extends AbstractType
	{
		public function buildForm(FormBuilderInterface $builder, array $options)
		{
		}
		
		
		public function getParent()
		{
			return ProductType::class;
		}
		
		public function configureOptions(OptionsResolver $resolver)
		{
			$resolver->setDefaults(array(
									   'data_class' => 'Vielle\CatalogBundle\Entity\Product',
									   'cascade_validation' =>true
								   ));
		}
	}
