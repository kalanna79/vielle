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
	use Symfony\Component\Form\Extension\Core\Type\SubmitType;
	use Symfony\Component\Form\Extension\Core\Type\TextType;
	use Symfony\Component\Form\Extension\Core\Type\TextareaType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolver;

	use Symfony\Component\Validator\Constraints\NotBlank;
	use Symfony\Component\Validator\Constraints\NotNull;
	
	class ProductType extends AbstractType
	{
		public function buildForm(FormBuilderInterface $builder, array $options)
		{
			$builder
				->add('subcategory', EntityType::class , array(
					'class' => 'VielleCatalogBundle:Subcategory',
					'choice_label' => 'name',
					'multiple' => false,
					'expanded' => false,
					'constraints' => [
						new NotNull([
										'message' => 'Choisissez une sous-catégorie'
									])
					],
					'required' => true,
				))
				-> add('feature', EntityType::class, array(
					'class' => 'VielleCatalogBundle:Feature',
					'choice_label' => 'name',
					'multiple' => false,
					'expanded' => false,
					'constraints' => [
						new NotNull([
							'message' => 'Choisissez le nombre de chanterelles'
									])
					],
					'required' => true,
				))
				->add('name', TextType::class, array(
					'label' => 'Titre',
					'constraints' => [
						new NotNull([
							'message' => 'Entrez un titre',
									]),
						new NotBlank([
							'message' => 'Merci de rentrer un titre',
									 ]),
					],
					'required' =>true,
				))
				->add('description', TextareaType::class, array(
					'label' => 'Description',
					'required' => false,
					'attr' => array(
						'rows' => 10,
						'placeholder' => "Merci d'entrer la description de la vielle"
					)
				))
				->add('photo', PhotoType::class)
				->add('metatag', TextType::class, array(
					'label' => 'Metatag',
					'required' => false,
				))
			->add('ajouter', SubmitType::class);
		}
		
		public function configureOptions(OptionsResolver $resolver)
		{
			$resolver->setDefaults(array(
				'data_class' => 'Vielle\CatalogBundle\Entity\Product',
				'cascade_validation' =>true
								   ));
		}
		
		public function getBlockPrefix()
		{
			return 'vielle_catalogbundle_product';
		}
	}
