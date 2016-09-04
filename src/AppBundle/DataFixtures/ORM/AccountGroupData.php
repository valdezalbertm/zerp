<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\AccountGroup;

class AccountGroupData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /* Level 1 Accounts */
        $asset = new AccountGroup();
        $asset->setParent(null);
        $asset->setName('Asset');
        $asset->setDescription('Asset accounts');
        $asset->setCode('1');
        $asset->setLevel(1);
        $asset->setType('A');
        $manager->persist($asset);

        $liabilities = new AccountGroup();
        $liabilities->setParent(null);
        $liabilities->setName('Liabilities');
        $liabilities->setDescription('Liabilities accounts');
        $liabilities->setCode('2');
        $liabilities->setLevel(1);
        $liabilities->setType('L');
        $manager->persist($liabilities);

        $equity = new AccountGroup();
        $equity->setParent(null);
        $equity->setName("Owner's Equity");
        $equity->setDescription("Owner's Equity accounts");
        $equity->setCode('3');
        $equity->setLevel(1);
        $equity->setType('O');
        $manager->persist($equity);

        $revenue = new AccountGroup();
        $revenue->setParent(null);
        $revenue->setName('Revenue');
        $revenue->setDescription('Revenue accounts');
        $revenue->setCode('4');
        $revenue->setLevel(1);
        $revenue->setType('R');
        $manager->persist($revenue);

        $expense = new AccountGroup();
        $expense->setParent(null);
        $expense->setName('Expense');
        $expense->setDescription('Expense accounts');
        $expense->setCode('5');
        $expense->setLevel(1);
        $expense->setType('E');
        $manager->persist($expense);

        /* Level 2 Accounts */
        $currentAsset = new AccountGroup();
        $currentAsset->setParent($asset);
        $currentAsset->setName('Current Asset');
        $currentAsset->setDescription('All assets that is easy accessible from the company such as bank account, and cash-on-hand.');
        $currentAsset->setCode('001');
        $currentAsset->setLevel(2);
        $currentAsset->setType('A');
        $manager->persist($currentAsset);

        $fixedAsset = new AccountGroup();
        $fixedAsset->setParent($asset);
        $fixedAsset->setName('Fixed Asset');
        $fixedAsset->setDescription('Assets such as machines and anything that depreciates');
        $fixedAsset->setCode('002');
        $fixedAsset->setLevel(2);
        $fixedAsset->setType('A');
        $manager->persist($fixedAsset);

        $inventory = new AccountGroup();
        $inventory->setParent($asset);
        $inventory->setName('Inventories');
        $inventory->setDescription('Inventory items that is used in productions');
        $inventory->setCode('003');
        $inventory->setLevel(2);
        $inventory->setType('A');
        $manager->persist($inventory);

        $investment = new AccountGroup();
        $investment->setParent($asset);
        $investment->setName('Investment');
        $investment->setDescription('Investment such as stocks, bonds, mutual funds and etc.');
        $investment->setCode('004');
        $investment->setLevel(2);
        $investment->setType('A');
        $manager->persist($investment);

        /* Liabilities */
        $currentLiabilities = new AccountGroup();
        $currentLiabilities->setParent($liabilities);
        $currentLiabilities->setName('Current Liabilities');
        $currentLiabilities->setDescription("Most trade liabilities and tax liabilities are current (i.e., they will need to be paid within the current period—most often within a year). Current assets generally need to be sufficient to pay off the current liabilities, otherwise potential cash flow issues can arise. The taxing agencies generally fine companies heavily if they are late with their tax payments. Vendors will sometimes accept late payments but doing so runs the risk of that vendor (who supplies the business with what it needs) no longer extending credit to the business.");
        $currentLiabilities->setCode('001');
        $currentLiabilities->setLevel(2);
        $currentLiabilities->setType('L');
        $manager->persist($currentLiabilities);

        $longTermLiabilities = new AccountGroup();
        $longTermLiabilities->setParent($liabilities);
        $longTermLiabilities->setName('Long-Term Liabilities');
        $longTermLiabilities->setDescription("Long-term debts are liabilities that need to be paid but not fully so within the current period. For example, if you buy a fixed asset via a loan, typically the loan repayment term is over multiple years. So the loan itself will be classified as a long-term liability.");
        $longTermLiabilities->setCode('002');
        $longTermLiabilities->setLevel(2);
        $longTermLiabilities->setType('L');
        $manager->persist($longTermLiabilities);

        /* Owner's Equity */
        $capitalAccount = new AccountGroup();
        $capitalAccount->setParent($equity);
        $capitalAccount->setName('Capital Account');
        $capitalAccount->setDescription("Capital of the company");
        $capitalAccount->setCode('001');
        $capitalAccount->setLevel(2);
        $capitalAccount->setType('O');
        $manager->persist($capitalAccount);

        $retainedEarning = new AccountGroup();
        $retainedEarning->setParent($equity);
        $retainedEarning->setName('Retained Earnings');
        $retainedEarning->setDescription("Retained earnings after the company closed the book");
        $retainedEarning->setCode('002');
        $retainedEarning->setLevel(2);
        $retainedEarning->setType('O');
        $manager->persist($retainedEarning);

        /* Revenue */
        $directRevenue = new AccountGroup();
        $directRevenue->setParent($revenue);
        $directRevenue->setName('Direct Revenue');
        $directRevenue->setDescription("Direct selling of goods and services. Active income.");
        $directRevenue->setCode('001');
        $directRevenue->setLevel(2);
        $directRevenue->setType('R');
        $manager->persist($directRevenue);

        $indirectRevenue = new AccountGroup();
        $indirectRevenue->setParent($revenue);
        $indirectRevenue->setName('Indirect Revenue');
        $indirectRevenue->setDescription("Revenue earned from the investments, money lendings. Commonly called passive income.");
        $indirectRevenue->setCode('002');
        $indirectRevenue->setLevel(2);
        $indirectRevenue->setType('R');
        $manager->persist($indirectRevenue);

        $sales = new AccountGroup();
        $sales->setParent($revenue);
        $sales->setName('Sales');
        $sales->setDescription("Revenue earned directly from sales");
        $sales->setCode('003');
        $sales->setLevel(2);
        $sales->setType('R');
        $manager->persist($sales);

        /* Expense */
        $directExpense = new AccountGroup();
        $directExpense->setParent($expense);
        $directExpense->setName('Direct Expense');
        $directExpense->setDescription("Direct expense is an expense incurred that varies directly with changes in the volume of a cost object. A cost object is any item for which you are measuring expenses, such as products, product lines, services, sales regions, employees, and customers. Examples: the materials used to construct a product for sale; the cost of the freight needed to transport goods to and from a manufacturing facility; the labor incurred to produce hours billable to a client; labor and payroll taxes paid based on the number of units produced; production materials consumed during the manufacture of goods; the commission and payroll taxes related to the sale of goods or services");
        $directExpense->setCode('001');
        $directExpense->setLevel(2);
        $directExpense->setType('E');
        $manager->persist($directExpense);

        $indirectExpense = new AccountGroup();
        $indirectExpense->setParent($expense);
        $indirectExpense->setName('Indirect Expense');
        $indirectExpense->setDescription("Indirect expenses are those expenses that are incurred to operate a business as a whole or a segment of a business, and so cannot be directly associated with a cost object, such as a product, service, or customer. A cost object is any item for which you are separately measuring costs. Example accounting audit, and legal fees, business permits, office expenses, rent, supervisor salaries, telephone expense, utilities");
        $indirectExpense->setCode('002');
        $indirectExpense->setLevel(2);
        $indirectExpense->setType('E');
        $manager->persist($indirectExpense);

        $purchase = new AccountGroup();
        $purchase->setParent($expense);
        $purchase->setName('Purchases');
        $purchase->setDescription("Purchase of equipments, and machines used to operate a business. Big prices.");
        $purchase->setCode('003');
        $purchase->setLevel(2);
        $purchase->setType('E');
        $manager->persist($purchase);

        $happeningsExpense = new AccountGroup();
        $happeningsExpense->setParent($expense);
        $happeningsExpense->setName('Happenings');
        $happeningsExpense->setDescription("This expense is the purchases when there's someone birthday, christmas celebration, fiesta, occation, events, tour and everything not related to business and other purchases.");
        $happeningsExpense->setCode('004');
        $happeningsExpense->setLevel(2);
        $happeningsExpense->setType('E');
        $manager->persist($happeningsExpense);

        /* Third Level Current Asset */
        $bankAccount = new AccountGroup();
        $bankAccount->setParent($currentAsset);
        $bankAccount->setName('Bank Account');
        $bankAccount->setDescription("List of bank accounts.");
        $bankAccount->setCode('001');
        $bankAccount->setLevel(3);
        $bankAccount->setType('A');
        $manager->persist($bankAccount);

        $manager->flush();

        /* Leave Reference */
        $this->addReference('current-asset', $currentAsset);
        $this->addReference('fixed-asset', $fixedAsset);
        $this->addReference('bank-account', $bankAccount);
        $this->addReference('investment', $investment);
        $this->addReference('inventory', $inventory);
        $this->addReference('current-liabilities', $currentLiabilities);
        $this->addReference('equity', $equity);
        $this->addReference('capital-account', $capitalAccount);
        $this->addReference('retained-earning', $retainedEarning);
        $this->addReference('direct-revenue', $directRevenue);
        $this->addReference('indirect-revenue', $indirectRevenue);
        $this->addReference('direct-expense', $directExpense);
        $this->addReference('indirect-expense', $indirectExpense);
        $this->addReference('purchase', $purchase);
        $this->addReference('happenings-expense', $happeningsExpense);
    }

    public function getOrder()
    {
        return 2;
    }
}
