<?php

namespace AB\databaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class CartType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('objectName')
            ->add('objectQuantity')
            ->add('customer', 'entity', array(
            		'class' => 'AB\databaseBundle\Entity\Customer',
            		'query_builder' => function(EntityRepository $er) {
				        return $er->createQueryBuilder('c')
				        			->select('c');}
				        			,))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AB\databaseBundle\Entity\Cart'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ab_databasebundle_cart';
    }
}
