<?php

namespace AB\databaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class ProductType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('price')
            ->add('description')
            /* ->add('features', 'entity', array(
            		'class' => 'AB\databaseBundle\Entity\Feature',
            		'property' => 'featureName',
            		'multiple' => true,)) */
            ->add('shipping', 'entity', array(
            		'class' => 'AB\databaseBundle\Entity\Shipping',
            		'property' => 'toName',))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AB\databaseBundle\Entity\Product'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ab_databasebundle_product';
    }
}
