<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\Period;

class PeriodData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /* Period 1 */
        $thisPeriod = new Period();
        $thisPeriod->setName('Year 2016');
        $thisPeriod->setDescription("Year 2016");
        $thisPeriod->setStartDate(new \DateTime('2016-01-01'));
        $thisPeriod->setEndDate(new \DateTime('2016-12-31'));
        $manager->persist($thisPeriod);

        $manager->flush();

        $this->addReference('period', $thisPeriod);
    }

    public function getOrder()
    {
        return 1;
    }
}
