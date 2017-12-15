<?php
	/**
	 * Created by PhpStorm.
	 * User: natacha
	 * Date: 23/11/2017
	 * Time: 11:13
	 */
	
	namespace Vielle\CatalogBundle\Form;
	
	
	use Symfony\Bridge\Doctrine\Form\Type\EntityType;
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\Extension\Core\Type\FileType;
	use Symfony\Component\Form\Extension\Core\Type\SubmitType;
	use Symfony\Component\Form\Extension\Core\Type\TextType;
	use Symfony\Component\Form\Extension\Core\Type\TextareaType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolver;

	use Symfony\Component\Validator\Constraints\NotBlank;
	use Symfony\Component\Validator\Constraints\NotNull;
	use Vielle\CatalogBundle\Repository\FeatureRepository;
	
	class EditProductType extends AbstractType
	{
		
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
