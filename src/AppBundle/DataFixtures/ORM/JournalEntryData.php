<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\JournalEntry;
use AppBundle\Entity\JournalEntryItem;

class JournalEntryData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /* User Reference */
        $user = $this->getReference('user');

        /* Transaction Reference */
        $receivedFullTimeSalary = $this->getReference('received-full-time-salary');
        $receivedPartTimeSalary = $this->getReference('received-part-time-salary');

        /* Journal Entry Type Reference */
        $manualJournal  = $this->getReference('manual-jounal');
        $generalJournal = $this->getReference('general-jounal');

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

        /* Full-time Salary Journal Entry */
        $fullTimeSalaryJE = new JournalEntry();
        $fullTimeSalaryJE->setUser($user);
        $fullTimeSalaryJE->setTransaction($receivedFullTimeSalary);
        $fullTimeSalaryJE->setType($generalJournal);
        $fullTimeSalaryJE->setName('Full-time Salary');
        $fullTimeSalaryJE->setDescription("Journal Entry for the received full time salary.");
        $fullTimeSalaryJE->setDate(new \DateTime());
        $fullTimeSalaryJE->setStatus('pending');
        $manager->persist($fullTimeSalaryJE);

        $fullTimeSalaryJEDebit = new JournalEntryItem();
        $fullTimeSalaryJEDebit->setJournalentry($fullTimeSalaryJE);
        $fullTimeSalaryJEDebit->setLineNumber(1);
        $fullTimeSalaryJEDebit->setAccount($mbt1);
        $fullTimeSalaryJEDebit->setDc('D');
        $fullTimeSalaryJEDebit->setDescription('JE#1 line#1');
        $fullTimeSalaryJEDebit->setAmount(21500);
        $manager->persist($fullTimeSalaryJEDebit);

        $fullTimeSalaryJECredit = new JournalEntryItem();
        $fullTimeSalaryJECredit->setJournalentry($fullTimeSalaryJE);
        $fullTimeSalaryJECredit->setLineNumber(2);
        $fullTimeSalaryJECredit->setAccount($fullTimeSalary);
        $fullTimeSalaryJECredit->setDescription('JE#1 line#2');
        $fullTimeSalaryJECredit->setDc('C');
        $fullTimeSalaryJECredit->setAmount(21500);
        $manager->persist($fullTimeSalaryJECredit);

        $manager->flush();
    }

    public function getOrder()
    {
        return 8;
    }
}
