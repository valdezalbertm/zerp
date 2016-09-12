<?php

namespace AppBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Doctrine\Common\Persistence\ObjectManager;

class AccountTypeTransformer implements DataTransformerInterface
{
    private $manager;

    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }

    public function transform($letter)
    {
        switch ($letter) {
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
            default:
                throw new TransformationFailedException(sprintf(
                    'An account type "%s" does not exist!',
                    $letter
                ));
                break;
        }
    }

    public function reverseTransform($word)
    {
        switch ($word) {
            case 'Asset':
                return 'A'; break;
            case 'Liabilities':
                return 'L'; break;
            case 'Owner\' Equity':
                return 'O'; break;
            case 'Revenue':
                return 'R'; break;
            case 'Expense':
                return 'E'; break;
            default:
                throw new TransformationFailedException(sprintf(
                    'An account type "%s" does not exist!',
                    $word
                ));
                break;
        }
    }
}
