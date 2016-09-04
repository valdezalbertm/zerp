<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\JournalEntryType;

class JournalEntryTypeData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /* Manual Journal */
        $manualJournal = new JournalEntryType();
        $manualJournal->setName('Manual Journal');
        $manualJournal->setDescription("Journal that is inserted manually and not mapped in the transaction table");
        $manualJournal->setCode('manual-jounal');
        $manager->persist($manualJournal);

        /* General */
        $generalJournal = new JournalEntryType();
        $generalJournal->setName('General Journal');
        $generalJournal->setDescription("General Journal that is inserted in the journal entry.");
        $generalJournal->setCode('general-jounal');
        $manager->persist($generalJournal);

        /* Sales Journal */
        $salesJournal = new JournalEntryType();
        $salesJournal->setName('Sales Journal');
        $salesJournal->setDescription("Sales Transaction journal");
        $salesJournal->setCode('sales-jounal');
        $manager->persist($salesJournal);

        /* Purchase Journal */
        $purchaseJournal = new JournalEntryType();
        $purchaseJournal->setName('Purchase Journal');
        $purchaseJournal->setDescription("Purchase Transaction journal");
        $purchaseJournal->setCode('purchase-jounal');
        $manager->persist($purchaseJournal);

        $manager->flush();

        $this->addReference('manual-jounal', $manualJournal);
        $this->addReference('general-jounal', $generalJournal);
        $this->addReference('sales-jounal', $salesJournal);
        $this->addReference('purchase-jounal', $purchaseJournal);
    }

    public function getOrder()
    {
        return 1;
    }
}
