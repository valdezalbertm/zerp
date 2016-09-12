<?php

namespace AppBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Doctrine\Common\Persistence\ObjectManager;

class NormalBalanceTransformer implements DataTransformerInterface
{
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    public function transform($letter)
    {
        switch ($letter) {
            case 'D':
                return 'Debit'; break;
            case 'C':
                return 'Credit'; break;
            default:
                throw new TransformationFailedException(sprintf(
                    'A normal balance "%s" does not exist!',
                    $letter
                ));
                break;
        }
    }

    public function reverseTransform($word)
    {
        switch ($word) {
            case 'Debit':
                return 'D'; break;
            case 'Credit':
                return 'C'; break;
            default:
                throw new TransformationFailedException(sprintf(
                    'A normal balance "%s" does not exist!',
                    $word
                ));
                break;
        }
    }
}
