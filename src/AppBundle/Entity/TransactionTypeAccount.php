<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TransactionTypeAccount
 */
class TransactionTypeAccount
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $dc;

    /**
     * @var \AppBundle\Entity\TransactionType
     */
    private $transactionType;

    /**
     * @var \AppBundle\Entity\Account
     */
    private $account;

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
     * Set dc
     *
     * @param string $dc
     * @return TransactionTypeAccount
     */
    public function setDc($dc)
    {
        $this->dc = $dc;

        return $this;
    }

    /**
     * Get dc
     *
     * @return string
     */
    public function getDc()
    {
        return $this->dc;
    }

    /**
     * Set transactionType
     *
     * @param \AppBundle\Entity\TransactionType $transactionType
     * @return TransactionTypeAccount
     */
    public function setTransactionType(\AppBundle\Entity\TransactionType $transactionType = null)
    {
        $this->transactionType = $transactionType;

        return $this;
    }

    /**
     * Get transactionType
     *
     * @return \AppBundle\Entity\TransactionType
     */
    public function getTransactionType()
    {
        return $this->transactionType;
    }

    /**
     * Set account
     *
     * @param \AppBundle\Entity\Account $account
     * @return TransactionTypeAccount
     */
    public function setAccount(\AppBundle\Entity\Account $account = null)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Get account
     *
     * @return \AppBundle\Entity\Account
     */
    public function getAccount()
    {
        return $this->account;
    }
}
