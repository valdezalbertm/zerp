<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\Transaction;
use AppBundle\Entity\TransactionItem;

class TransactionData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /* User Reference */
        $user = $this->getReference('user');

        /* Transaction Type Reference */
        $salaryReceivedType = $this->getReference('salary-received-type');
        $investStocksType   = $this->getReference('invest-stocks-type');

        /* Tag Reference */
        $personal = $this->getReference('personal');
        $company  = $this->getReference('company');

        /* Account Reference */
        $badDebt                 = $this->getReference('bad-debt');
        $bdo1                    = $this->getReference('bdo1');
        $bdo2                    = $this->getReference('bdo2');
        $bpi1                    = $this->getReference('bpi1');
        $depreciation            = $this->getReference('depreciation');
        $foodExpense             = $this->getReference('food-expense');
        $fullTimeSalary          = $this->getReference('full-time-salary');
        $gadget                  = $this->getReference('gadget');
        $homeBills               = $this->getReference('home-bills');
        $homeEquipmentPurchase   = $this->getReference('home-equipment-purchase');
        $investmentLoss          = $this->getReference('investment-loss');
        $mbt1                    = $this->getReference('mbt1');
        $mbt2                    = $this->getReference('mbt2');
        $occation                = $this->getReference('occation');
        $officeEquipmentPurchase = $this->getReference('office-equipment-purchase');
        $onHand                  = $this->getReference('on-hand');
        $partTimeSalary          = $this->getReference('part-time-salary');
        $personalRetainedEarning = $this->getReference('personal-retained-earning');
        $personalCare            = $this->getReference('personal-care');
        $productInventory        = $this->getReference('product-inventory');
        $productionEquipment     = $this->getReference('production-equipment');
        $rewards                 = $this->getReference('rewards');
        $stockInvestment         = $this->getReference('stock-investment');
        $taxLiabilities          = $this->getReference('tax-liabilities');
        $transportationExpense   = $this->getReference('transportation-expense');

        /* Received a salary from full time */
        $receivedFullTimeSalary = new Transaction();
        $receivedFullTimeSalary->setUser($user);
        $receivedFullTimeSalary->setName('Full-time Salary');
        $receivedFullTimeSalary->setDescription('This is full-time salary received from the full-time job!');
        $receivedFullTimeSalary->setDate(new \DateTime());
        $receivedFullTimeSalary->setType($salaryReceivedType);
        $receivedFullTimeSalary->addTag($personal);
        $receivedFullTimeSalary->addTag($company);
        $manager->persist($receivedFullTimeSalary);

        $receivedFullTimeSalary1 = new TransactionItem();
        $receivedFullTimeSalary1->setLineNumber(1);
        $receivedFullTimeSalary1->setName('Full-time Salary');
        $receivedFullTimeSalary1->setTransaction($receivedFullTimeSalary);
        $receivedFullTimeSalary1->setAmount(20000);
        $receivedFullTimeSalary1->setDebitAccount($fullTimeSalary);
        $manager->persist($receivedFullTimeSalary1);

        $receivedFullTimeSalary2 = new TransactionItem();
        $receivedFullTimeSalary2->setLineNumber(2);
        $receivedFullTimeSalary2->setName('Allowance');
        $receivedFullTimeSalary2->setTransaction($receivedFullTimeSalary);
        $receivedFullTimeSalary2->setAmount(1500);
        $receivedFullTimeSalary2->setDebitAccount($fullTimeSalary);
        $manager->persist($receivedFullTimeSalary2);

        /* Received a salary from part time */
        $receivedPartTimeSalary = new Transaction();
        $receivedPartTimeSalary->setUser($user);
        $receivedPartTimeSalary->setName('Part-time Salary');
        $receivedPartTimeSalary->setDescription('This is part-time salary received from the part-time job!');
        $receivedPartTimeSalary->setDate(new \DateTime());
        $receivedPartTimeSalary->setType($salaryReceivedType);
        $receivedPartTimeSalary->addTag($personal);
        $receivedPartTimeSalary->addTag($company);
        $manager->persist($receivedPartTimeSalary);

        $receivedPartTimeSalary1 = new TransactionItem();
        $receivedPartTimeSalary1->setLineNumber(1);
        $receivedPartTimeSalary1->setName('Part-time Salary');
        $receivedPartTimeSalary1->setTransaction($receivedPartTimeSalary);
        $receivedPartTimeSalary1->setAmount(20000);
        $receivedPartTimeSalary1->setDebitAccount($partTimeSalary);
        $manager->persist($receivedPartTimeSalary1);

        $receivedPartTimeSalary2 = new TransactionItem();
        $receivedPartTimeSalary2->setLineNumber(2);
        $receivedPartTimeSalary2->setName('Allowance');
        $receivedPartTimeSalary2->setTransaction($receivedPartTimeSalary);
        $receivedPartTimeSalary2->setAmount(1500);
        $receivedPartTimeSalary2->setDebitAccount($partTimeSalary);
        $manager->persist($receivedPartTimeSalary2);

        /* Received a salary from part time */
        $receivedPartTimeSalary = new Transaction();
        $receivedPartTimeSalary->setUser($user);
        $receivedPartTimeSalary->setName('Part-time Salary');
        $receivedPartTimeSalary->setDescription('This is part-time salary received from the part-time job!');
        $receivedPartTimeSalary->setDate(new \DateTime());
        $receivedPartTimeSalary->setType($salaryReceivedType);
        $receivedPartTimeSalary->addTag($personal);
        $receivedPartTimeSalary->addTag($company);
        $manager->persist($receivedPartTimeSalary);

        $receivedPartTimeSalary1 = new TransactionItem();
        $receivedPartTimeSalary1->setLineNumber(1);
        $receivedPartTimeSalary1->setName('Part-time Salary');
        $receivedPartTimeSalary1->setTransaction($receivedPartTimeSalary);
        $receivedPartTimeSalary1->setAmount(20000);
        $receivedPartTimeSalary1->setDebitAccount($partTimeSalary);
        $manager->persist($receivedPartTimeSalary1);

        $receivedPartTimeSalary2 = new TransactionItem();
        $receivedPartTimeSalary2->setLineNumber(2);
        $receivedPartTimeSalary2->setName('Allowance');
        $receivedPartTimeSalary2->setTransaction($receivedPartTimeSalary);
        $receivedPartTimeSalary2->setAmount(1500);
        $receivedPartTimeSalary2->setDebitAccount($partTimeSalary);
        $manager->persist($receivedPartTimeSalary2);

        $manager->flush();

        $this->addReference('received-full-time-salary', $receivedFullTimeSalary);
        $this->addReference('received-part-time-salary', $receivedPartTimeSalary);
    }

    public function getOrder()
    {
        return 7;
    }
}
