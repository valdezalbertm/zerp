<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\Account;

class AccountData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $currentAsset       = $this->getReference('current-asset');
        $bankAccount        = $this->getReference('bank-account');
        $inventory          = $this->getReference('inventory');
        $investment         = $this->getReference('investment');
        $currentLiabilities = $this->getReference('current-liabilities');
        $equity             = $this->getReference('equity');
        $capitalAccount     = $this->getReference('capital-account');
        $retainedEarning    = $this->getReference('retained-earning');
        $directRevenue      = $this->getReference('direct-revenue');
        $indirectRevenue    = $this->getReference('indirect-revenue');
        $directExpense      = $this->getReference('direct-expense');
        $indirectExpense    = $this->getReference('indirect-expense');
        $purchase           = $this->getReference('purchase');
        $happeningsExpense  = $this->getReference('happenings-expense');

        /* Current Assets */
        $bdo1 = new Account();
        $bdo1->setGroup($bankAccount);
        $bdo1->setName('BDO Personal Account');
        $bdo1->setDescription("Personal BDO Savings Account");
        $bdo1->setCode('001');
        $bdo1->setDc('D');
        $bdo1->setType('A');
        $bdo1->setCash(1);
        $manager->persist($bdo1);

        $bdo2 = new Account();
        $bdo2->setGroup($bankAccount);
        $bdo2->setName('BDO Payroll Account');
        $bdo2->setDescription("This BDO account is a payroll account from Compare Global Group.");
        $bdo2->setCode('002');
        $bdo2->setDc('D');
        $bdo2->setType('A');
        $bdo2->setCash(1);
        $manager->persist($bdo2);

        $mbt1 = new Account();
        $mbt1->setGroup($bankAccount);
        $mbt1->setName('Metrobank Personal Account');
        $mbt1->setDescription("This is my personal account in Metrobank, the former payroll account at Fasttrack Inc.");
        $mbt1->setCode('003');
        $mbt1->setDc('D');
        $mbt1->setType('A');
        $mbt1->setCash(1);
        $manager->persist($mbt1);

        $mbt2 = new Account();
        $mbt2->setGroup($bankAccount);
        $mbt2->setName('Metrobank Payroll Account');
        $mbt2->setDescription("This is my payroll account in Metrobank cared of by ARB Call Facilities, Inc.");
        $mbt2->setCode('004');
        $mbt2->setDc('D');
        $mbt2->setType('A');
        $mbt2->setCash(1);
        $manager->persist($mbt2);

        $bpi1 = new Account();
        $bpi1->setGroup($bankAccount);
        $bpi1->setName('BPI Personal Account');
        $bpi1->setDescription("This is my personal account in BPI.");
        $bpi1->setCode('005');
        $bpi1->setDc('D');
        $bpi1->setType('A');
        $bpi1->setCash(1);
        $manager->persist($bpi1);

        $onHand = new Account();
        $onHand->setGroup($currentAsset);
        $onHand->setName('Cash On-Hand');
        $onHand->setDescription("This is cash on-hand");
        $onHand->setCode('006');
        $onHand->setDc('D');
        $onHand->setType('A');
        $onHand->setCash(1);
        $manager->persist($onHand);

        /* Fixed Asset */
        $productionEquipment = new Account();
        $productionEquipment->setGroup($purchase);
        $productionEquipment->setName('Production Equipment');
        $productionEquipment->setDescription("Machine or any equipment that can be used in the production area");
        $productionEquipment->setCode('001');
        $productionEquipment->setDc('D');
        $productionEquipment->setType('A');
        $manager->persist($productionEquipment);

        /* Investments */
        $stockInvestment = new Account();
        $stockInvestment->setGroup($investment);
        $stockInvestment->setName('Stock Investment');
        $stockInvestment->setDescription("Investment in stock market");
        $stockInvestment->setCode('001');
        $stockInvestment->setDc('D');
        $stockInvestment->setType('A');
        $manager->persist($stockInvestment);

        /* Inventory */
        $productInventory = new Account();
        $productInventory->setGroup($inventory);
        $productInventory->setName('Product Inventory');
        $productInventory->setDescription("The current inventory of products to sell");
        $productInventory->setCode('001');
        $productInventory->setDc('D');
        $productInventory->setType('A');
        $manager->persist($productInventory);

        /* Current Liabilities */
        $taxLiabilities = new Account();
        $taxLiabilities->setGroup($currentLiabilities);
        $taxLiabilities->setName('Tax Liabilities');
        $taxLiabilities->setDescription("Account for tax liabilities because tax is a company's liability. You owe it to government.");
        $taxLiabilities->setCode('001');
        $taxLiabilities->setDc('C');
        $taxLiabilities->setType('A');
        $manager->persist($taxLiabilities);

        /* Owner's Equity */
        $personalCapital = new Account();
        $personalCapital->setGroup($equity);
        $personalCapital->setName('Personal Capital');
        $personalCapital->setDescription("This is my initial money when I started the business or started using the system.");
        $personalCapital->setCode('001');
        $personalCapital->setDc('C');
        $personalCapital->setType('O');
        $manager->persist($personalCapital);

        $personalRetainedEarning = new Account();
        $personalRetainedEarning->setGroup($retainedEarning);
        $personalRetainedEarning->setName('Personal Retained Earnings');
        $personalRetainedEarning->setDescription("Retained earnings after the company closed the book");
        $personalRetainedEarning->setCode('001');
        $personalRetainedEarning->setDc('C');
        $personalRetainedEarning->setType('O');
        $manager->persist($personalRetainedEarning);

        /* Direct Revenue */
        $fullTimeSalary = new Account();
        $fullTimeSalary->setGroup($directRevenue);
        $fullTimeSalary->setName('Full-time Salary');
        $fullTimeSalary->setDescription("Salary earned from full-time work");
        $fullTimeSalary->setCode('001');
        $fullTimeSalary->setDc('C');
        $fullTimeSalary->setType('R');
        $manager->persist($fullTimeSalary);

        $partTimeSalary = new Account();
        $partTimeSalary->setGroup($directRevenue);
        $partTimeSalary->setName('Part-time Salary');
        $partTimeSalary->setDescription("Salary earned from part-time work");
        $partTimeSalary->setCode('002');
        $partTimeSalary->setDc('C');
        $partTimeSalary->setType('R');
        $manager->persist($partTimeSalary);

        $rewards = new Account();
        $rewards->setGroup($indirectRevenue);
        $rewards->setName('Reward');
        $rewards->setDescription("Money reward from work, good deed, promo, programs or anything kind of rewarding stuffs");
        $rewards->setCode('001');
        $rewards->setDc('C');
        $rewards->setType('R');
        $manager->persist($rewards);

        /* Direct Expense */
        $foodExpense = new Account();
        $foodExpense->setGroup($directExpense);
        $foodExpense->setName('Foods');
        $foodExpense->setDescription("Foods and beverage as long as part of the business.");
        $foodExpense->setCode('001');
        $foodExpense->setDc('D');
        $foodExpense->setType('E');
        $manager->persist($foodExpense);

        $transportationExpense = new Account();
        $transportationExpense->setGroup($directExpense);
        $transportationExpense->setName('Transportation');
        $transportationExpense->setDescription("Expense in transportation such as vehicular fares and gas");
        $transportationExpense->setCode('002');
        $transportationExpense->setDc('D');
        $transportationExpense->setType('E');
        $manager->persist($transportationExpense);

        $personalCare = new Account();
        $personalCare->setGroup($directExpense);
        $personalCare->setName('Personal Case');
        $personalCare->setDescription("Shampoo, conditioner, face mask, facial wash, shaver, comb and etc.");
        $personalCare->setCode('003');
        $personalCare->setDc('D');
        $personalCare->setType('E');
        $manager->persist($personalCare);

        /* Indirect Expense */
        $homeBills = new Account();
        $homeBills->setGroup($indirectExpense);
        $homeBills->setName('Home Bills');
        $homeBills->setDescription("House monthly bills such as electricity, water, internet, cable, monthly rent and etc.");
        $homeBills->setCode('001');
        $homeBills->setDc('D');
        $homeBills->setType('E');
        $manager->persist($homeBills);

        $investmentLoss = new Account();
        $investmentLoss->setGroup($indirectExpense);
        $investmentLoss->setName('Investment Loss');
        $investmentLoss->setDescription("This is the declared loss from the investment's due to bad decision or failed strategy.");
        $investmentLoss->setCode('002');
        $investmentLoss->setDc('D');
        $investmentLoss->setType('E');
        $manager->persist($investmentLoss);

        $depreciation = new Account();
        $depreciation->setGroup($indirectExpense);
        $depreciation->setName('Depreciation');
        $depreciation->setDescription("This account is dedicated for depreciating purchases or machines");
        $depreciation->setCode('003');
        $depreciation->setDc('D');
        $depreciation->setType('E');
        $manager->persist($depreciation);

        $badDebt = new Account();
        $badDebt->setGroup($indirectExpense);
        $badDebt->setName('Bad Debt');
        $badDebt->setDescription("These are the should be AR/Revenue that is not paid by the client/customer");
        $badDebt->setCode('004');
        $badDebt->setDc('D');
        $badDebt->setType('E');
        $manager->persist($badDebt);

        /* Purchases */
        $officeEquipmentPurchase = new Account();
        $officeEquipmentPurchase->setGroup($purchase);
        $officeEquipmentPurchase->setName('Office Equipment Purchase');
        $officeEquipmentPurchase->setDescription("This is account is for buying office equipment like computer memory, mouse, heaset, keyboard, AVR, and anything that will ease the life of people.");
        $officeEquipmentPurchase->setCode('001');
        $officeEquipmentPurchase->setDc('D');
        $officeEquipmentPurchase->setType('E');
        $manager->persist($officeEquipmentPurchase);

        $homeEquipmentPurchase = new Account();
        $homeEquipmentPurchase->setGroup($purchase);
        $homeEquipmentPurchase->setName('Home Equipment Purchase');
        $homeEquipmentPurchase->setDescription("This is account is for buying office equipment for our home like sala set, appliances, kitchen utensils, new table, and many others that can be used on our home.");
        $homeEquipmentPurchase->setCode('002');
        $homeEquipmentPurchase->setDc('D');
        $homeEquipmentPurchase->setType('E');
        $manager->persist($homeEquipmentPurchase);

        $gadget = new Account();
        $gadget->setGroup($purchase);
        $gadget->setName('Gadget');
        $gadget->setDescription("This is the purchase of the gadgets like laptop, cellphone, tablet, CCTV, and etc.");
        $gadget->setCode('003');
        $gadget->setDc('D');
        $gadget->setType('E');
        $manager->persist($gadget);

        /* Happenings Expense */
        $occation = new Account();
        $occation->setGroup($happeningsExpense);
        $occation->setName('Occation');
        $occation->setDescription("This is the expense for occation like company aniversary, marriage anniversaries, birthdays, baptizing, fiesta and etc.");
        $occation->setCode('001');
        $occation->setDc('D');
        $occation->setType('E');
        $manager->persist($occation);

        $travel = new Account();
        $travel->setGroup($happeningsExpense);
        $travel->setName('Travel');
        $travel->setDescription("This is the expense in travelling to abroad, tour in islands, in cities, company outing, company celebration of sales, and etc.");
        $travel->setCode('002');
        $travel->setDc('D');
        $travel->setType('E');
        $manager->persist($travel);

        $manager->flush();

        /* Leave Reference */
        $this->addReference('bad-debt', $badDebt);
        $this->addReference('bdo1', $bdo1);
        $this->addReference('bdo2', $bdo2);
        $this->addReference('bpi1', $bpi1);
        $this->addReference('depreciation', $depreciation);
        $this->addReference('food-expense', $foodExpense);
        $this->addReference('full-time-salary', $fullTimeSalary);
        $this->addReference('gadget', $gadget);
        $this->addReference('home-bills', $homeBills);
        $this->addReference('home-equipment-purchase', $homeEquipmentPurchase);
        $this->addReference('investment-loss', $investmentLoss);
        $this->addReference('mbt1', $mbt1);
        $this->addReference('mbt2', $mbt2);
        $this->addReference('occation', $occation);
        $this->addReference('on-hand', $onHand);
        $this->addReference('office-equipment-purchase', $officeEquipmentPurchase);
        $this->addReference('part-time-salary', $partTimeSalary);
        $this->addReference('personal-care', $personalCare);
        $this->addReference('personal-retained-earning', $personalRetainedEarning);
        $this->addReference('product-inventory', $productInventory);
        $this->addReference('production-equipment', $productionEquipment);
        $this->addReference('rewards', $rewards);
        $this->addReference('stock-investment', $stockInvestment);
        $this->addReference('tax-liabilities', $taxLiabilities);
        $this->addReference('transportation-expense', $transportationExpense);
        $this->addReference('travel', $travel);
    }

    public function getOrder()
    {
        return 3;
    }
}
