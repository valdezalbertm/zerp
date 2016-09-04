<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\Tag;

class TagData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /* Personal */
        $personal = new Tag();
        $personal->setName('Personal');
        $personal->setDescription("Personal spendings");
        $manager->persist($personal);

        /* Company */
        $company = new Tag();
        $company->setName('Company');
        $company->setDescription("Company spendings");
        $manager->persist($company);

        $manager->flush();

        $this->addReference('personal', $personal);
        $this->addReference('company', $company);
    }

    public function getOrder()
    {
        return 6;
    }
}
