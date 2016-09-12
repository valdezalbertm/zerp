<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Form\DataTransformer\NormalBalanceTransformer;
use AppBundle\Form\DataTransformer\AccountTypeTransformer;
use Doctrine\Common\Persistence\ObjectManager;

class AccountType extends AbstractType
{
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('code')
            ->add('type', 'choice', array(
                'choices' => array(
                    'A' => 'Asset',
                    'L' => 'Liabilities',
                    'O' => 'Owner\'s Equity',
                    'R' => 'Revenue',
                    'E' => 'Expense',
                )
            ))
            ->add('dc', 'choice', array(
                'label' => 'Normal Balance',
                'expanded' => true,
                'choices' => array(
                    'Debit'  => 'Debit',
                    'Credit' => 'Credit',
                ),
                'choice_attr' => function($val, $key, $index) {
                    return array(
                        'class' => 'flat-red',
                        'style' => 'padding-left:10px'
                    );
                },
                'choices_as_values' => true,
                'choice_label' => function ($value, $key, $index) {
                    return $value . "  ";
                },
            ))
            ->add('initialBalance')
            ->add('isCash')
            ->add('group', 'entity', array(
                'class' => 'AppBundle:AccountGroup',
                'choice_label' => 'name',
                'group_by' => function($val, $key, $index) {
                    switch ($val->getType()) {
                        case 'A':
                            return 'Asset'; break;
                        case 'L':
                            return 'Liabilities'; break;
                        case 'O':
                            return 'Owner\' Equity'; break;
                        case 'R':
                            return 'Revenue'; break;
                        case 'E':
                            return 'Expense'; break;
                    }
                }
            ))
        ;

        $builder->get('dc')
            ->addModelTransformer(new NormalBalanceTransformer($this->manager));
        $builder->get('type')
            ->addModelTransformer(new AccountTypeTransformer($this->manager));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Account'
        ));
    }
}
