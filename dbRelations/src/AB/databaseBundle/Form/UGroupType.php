<?php

namespace AB\databaseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class UGroupType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('groupName')
            ->add('users', 'entity', array(
            		'class' => 'AB\databaseBundle\Entity\User',
            		'multiple' => true,
            		'query_builder' => function(EntityRepository $er) {
				        return $er->createQueryBuilder('a')
				        			->select('a');},
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AB\databaseBundle\Entity\UGroup'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ab_databasebundle_ugroup';
    }
}
