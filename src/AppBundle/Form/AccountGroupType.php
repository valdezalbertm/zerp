<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AccountGroupType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('type', 'choice', array(
                'choices' => array(
                    'A' => 'Asset',
                    'L' => 'Liabilities',
                    'O' => 'Owner\'s Equity',
                    'R' => 'Revenue',
                    'E' => 'Expense',
                )
            ))
            ->add('parent', 'entity', array(
                'class' => 'AppBundle:AccountGroup',
                'choice_label' => 'name',
            ))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\AccountGroup'
        ));
    }
}
