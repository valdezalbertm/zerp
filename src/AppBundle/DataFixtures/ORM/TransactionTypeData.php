<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\TransactionType;
use AppBundle\Entity\TransactionTypeAccount;

class TransactionTypeData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /* Transaction Type Group Reference */
        $cashInGroup  = $this->getReference('income-group');
        $cashOutGroup = $this->getReference('expense-group');
        $incomeGroup  = $this->getReference('cash-in-group');
        $expenseGroup = $this->getReference('cash-out-group');

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
        $taxLiabilities   = $this->getReference('tax-liabilities');
        $transportationExpense   = $this->getReference('transportation-expense');

        /* Salary Received */
        $salaryReceived = new TransactionType();
        $salaryReceived->setName('Full-time Salary Received');
        $salaryReceived->setDescription('Received salary from the company');
        $salaryReceived->setCode('salary-received');
        $salaryReceived->setGroup($incomeGroup);
        $manager->persist($salaryReceived);

        $salaryReceivedDebit = new TransactionTypeAccount();
        $salaryReceivedDebit->setTransactionType($salaryReceived);
        $salaryReceivedDebit->setAccount($mbt2);
        $salaryReceivedDebit->setDc('D');
        $manager->persist($salaryReceivedDebit);

        $salaryReceivedCredit = new TransactionTypeAccount();
        $salaryReceivedCredit->setTransactionType($salaryReceived);
        $salaryReceivedCredit->setAccount($fullTimeSalary);
        $salaryReceivedCredit->setDc('C');
        $manager->persist($salaryReceivedCredit);

        /* Withdraw from Metrobank */
        $mbtWithdraw = new TransactionType();
        $mbtWithdraw->setName('BPI Withdraw');
        $mbtWithdraw->setDescription('Withdraw cash from ATM/Payroll account');
        $mbtWithdraw->setGroup($cashInGroup);
        $mbtWithdraw->setCode('bpi-withdraw');
        $manager->persist($mbtWithdraw);

        $mbtWithdrawDebit = new TransactionTypeAccount();
        $mbtWithdrawDebit->setTransactionType($mbtWithdraw);
        $mbtWithdrawDebit->setAccount($mbt2);
        $mbtWithdrawDebit->setDc('D');
        $manager->persist($mbtWithdrawDebit);

        $mbtWithdrawCredit = new TransactionTypeAccount();
        $mbtWithdrawCredit->setTransactionType($mbtWithdraw);
        $mbtWithdrawCredit->setAccount($onHand);
        $mbtWithdrawCredit->setDc('C');
        $manager->persist($mbtWithdrawCredit);

        /* Purchase Inventory */
        $purchaseInventory = new TransactionType();
        $purchaseInventory->setName('Purchase Inventories');
        $purchaseInventory->setDescription('Inventory purchase or stocking raw materials to warehouse');
        $purchaseInventory->setGroup($expenseGroup);
        $purchaseInventory->setCode('purchase-inventory');
        $manager->persist($purchaseInventory);

        $purchaseInventoryDebit = new TransactionTypeAccount();
        $purchaseInventoryDebit->setTransactionType($purchaseInventory);
        $purchaseInventoryDebit->setAccount($productInventory);
        $purchaseInventoryDebit->setDc('D');
        $manager->persist($purchaseInventoryDebit);

        $purchaseInventoryCredit = new TransactionTypeAccount();
        $purchaseInventoryCredit->setTransactionType($purchaseInventory);
        $purchaseInventoryCredit->setAccount($onHand);
        $purchaseInventoryCredit->setDc('C');
        $manager->persist($purchaseInventoryCredit);

        /* Purchase Equipment */
        $purchaseEquipment = new TransactionType();
        $purchaseEquipment->setName('Purchase Fixed Asset');
        $purchaseEquipment->setDescription('Purchase of fixed asset that depreciates value');
        $purchaseEquipment->setGroup($expenseGroup);
        $purchaseEquipment->setCode('purchase-fixed-asset');
        $manager->persist($purchaseEquipment);

        $purchaseEquipmentDebit = new TransactionTypeAccount();
        $purchaseEquipmentDebit->setTransactionType($purchaseEquipment);
        $purchaseEquipmentDebit->setAccount($productionEquipment);
        $purchaseEquipmentDebit->setDc('D');
        $manager->persist($purchaseEquipmentDebit);

        $purchaseEquipmentCredit = new TransactionTypeAccount();
        $purchaseEquipmentCredit->setTransactionType($purchaseEquipment);
        $purchaseEquipmentCredit->setAccount($onHand);
        $purchaseEquipmentCredit->setDc('C');
        $manager->persist($purchaseEquipmentCredit);

        /* Food Expense */
        $boughtFood = new TransactionType();
        $boughtFood->setName('Food Expense');
        $boughtFood->setDescription('Food expense mirienda, lunch, dinner, and including beverage');
        $boughtFood->setGroup($expenseGroup);
        $boughtFood->setCode('food-expense');
        $manager->persist($boughtFood);

        $boughtFoodDebit = new TransactionTypeAccount();
        $boughtFoodDebit->setTransactionType($boughtFood);
        $boughtFoodDebit->setAccount($foodExpense);
        $boughtFoodDebit->setDc('D');
        $manager->persist($boughtFoodDebit);

        $boughtFoodCredit = new TransactionTypeAccount();
        $boughtFoodCredit->setTransactionType($boughtFood);
        $boughtFoodCredit->setAccount($onHand);
        $boughtFoodCredit->setDc('C');
        $manager->persist($boughtFoodCredit);

        /* Transportation Expense */
        $travel = new TransactionType();
        $travel->setName('Transportation Expense');
        $travel->setDescription('Travel back and forth to work and everywhere you want including outside tour LOL.');
        $travel->setGroup($expenseGroup);
        $travel->setCode('transportation-expense');
        $manager->persist($travel);

        $travelDebit = new TransactionTypeAccount();
        $travelDebit->setTransactionType($travel);
        $travelDebit->setAccount($transportationExpense);
        $travelDebit->setDc('D');
        $manager->persist($travelDebit);

        $travelCredit = new TransactionTypeAccount();
        $travelCredit->setTransactionType($travel);
        $travelCredit->setAccount($onHand);
        $travelCredit->setDc('C');
        $manager->persist($travelCredit);

        /* Invest in Stock Market */
        $investStocks = new TransactionType();
        $investStocks->setName('Stock Investment');
        $investStocks->setDescription('Add funds or start investment in stock market');
        $investStocks->setGroup($cashOutGroup);
        $investStocks->setCode('invest-stocks');
        $manager->persist($investStocks);

        $investStocksDebit = new TransactionTypeAccount();
        $investStocksDebit->setTransactionType($investStocks);
        $investStocksDebit->setAccount($stockInvestment);
        $investStocksDebit->setDc('D');
        $manager->persist($investStocksDebit);

        $investStocksCredit = new TransactionTypeAccount();
        $investStocksCredit->setTransactionType($investStocks);
        $investStocksCredit->setAccount($mbt2);
        $investStocksCredit->setDc('C');
        $manager->persist($investStocksCredit);

        /* Tax Payment */
        $taxPayment = new TransactionType();
        $taxPayment->setName('Tax Payment');
        $taxPayment->setDescription('Add funds or start investment in stock market');
        $taxPayment->setGroup($expenseGroup);
        $taxPayment->setCode('tax-payment');
        $manager->persist($taxPayment);

        $taxPaymentDebit = new TransactionTypeAccount();
        $taxPaymentDebit->setTransactionType($taxPayment);
        $taxPaymentDebit->setAccount($taxLiabilities);
        $taxPaymentDebit->setDc('D');
        $manager->persist($taxPaymentDebit);

        $taxPaymentCredit = new TransactionTypeAccount();
        $taxPaymentCredit->setTransactionType($taxPayment);
        $taxPaymentCredit->setAccount($onHand);
        $taxPaymentCredit->setDc('C');
        $manager->persist($taxPaymentCredit);

        $manager->flush();

        $this->addReference('salary-received-type', $salaryReceived);
        $this->addReference('invest-stocks-type', $investStocks);
    }

    public function getOrder()
    {
        return 5;
    }
}
