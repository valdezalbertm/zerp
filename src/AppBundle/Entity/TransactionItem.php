<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TransactionItem
 */
class TransactionItem
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $lineNumber;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $amount;

    /**
     * @var \AppBundle\Entity\Transaction
     */
    private $transaction;

    /**
     * @var \AppBundle\Entity\Account
     */
    private $debit_account;

    /**
     * @var \AppBundle\Entity\Account
     */
    private $credit_account;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set lineNumber
     *
     * @param integer $lineNumber
     * @return TransactionItem
     */
    public function setLineNumber($lineNumber)
    {
        $this->lineNumber = $lineNumber;

        return $this;
    }

    /**
     * Get lineNumber
     *
     * @return integer
     */
    public function getLineNumber()
    {
        return $this->lineNumber;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return TransactionItem
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set amount
     *
     * @param string $amount
     * @return TransactionItem
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set transaction
     *
     * @param \AppBundle\Entity\Transaction $transaction
     * @return TransactionItem
     */
    public function setTransaction(\AppBundle\Entity\Transaction $transaction = null)
    {
        $this->transaction = $transaction;

        return $this;
    }

    /**
     * Get transaction
     *
     * @return \AppBundle\Entity\Transaction
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * Set debit_account
     *
     * @param \AppBundle\Entity\Account $debitAccount
     * @return TransactionItem
     */
    public function setDebitAccount(\AppBundle\Entity\Account $debitAccount = null)
    {
        $this->debit_account = $debitAccount;

        return $this;
    }

    /**
     * Get debit_account
     *
     * @return \AppBundle\Entity\Account
     */
    public function getDebitAccount()
    {
        return $this->debit_account;
    }

    /**
     * Set credit_account
     *
     * @param \AppBundle\Entity\Account $creditAccount
     * @return TransactionItem
     */
    public function setCreditAccount(\AppBundle\Entity\Account $creditAccount = null)
    {
        $this->credit_account = $creditAccount;

        return $this;
    }

    /**
     * Get credit_account
     *
     * @return \AppBundle\Entity\Account
     */
    public function getCreditAccount()
    {
        return $this->credit_account;
    }
}
