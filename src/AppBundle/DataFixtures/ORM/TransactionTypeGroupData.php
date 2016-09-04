<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\TransactionTypeGroup;

class TransactionTypeGroupData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $income = new TransactionTypeGroup();
        $income->setName('Revenue');
        $income->setDescription('All transaction that will increase the income of the company');
        $manager->persist($income);

        $expense = new TransactionTypeGroup();
        $expense->setName('Expense');
        $expense->setDescription('All expenditures of the company.');
        $manager->persist($expense);

        $cashIn = new TransactionTypeGroup();
        $cashIn->setName('Cash In');
        $cashIn->setDescription('All transaction that will increase the cash assets');
        $manager->persist($cashIn);

        $cashOut = new TransactionTypeGroup();
        $cashOut->setName('Cash Out');
        $cashOut->setDescription('All transaction that will take the cash out of the company but not expense.');
        $manager->persist($cashOut);

        $manager->flush();

        $this->addReference('income-group', $income);
        $this->addReference('expense-group', $expense);
        $this->addReference('cash-in-group', $cashIn);
        $this->addReference('cash-out-group', $cashOut);
    }

    public function getOrder()
    {
        return 4;
    }
}
