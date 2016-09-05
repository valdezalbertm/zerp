<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JournalEntryItem
 */
class JournalEntryItem
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
    private $description;

    /**
     * @var string
     */
    private $dc;

    /**
     * @var \AppBundle\Entity\JournalEntry
     */
    private $journalEntry;

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
     * Set lineNumber
     *
     * @param integer $lineNumber
     * @return JournalEntryItem
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
     * Set description
     *
     * @param string $description
     * @return JournalEntryItem
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set dc
     *
     * @param string $dc
     * @return JournalEntryItem
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
     * Set journalEntry
     *
     * @param \AppBundle\Entity\JournalEntry $journalEntry
     * @return JournalEntryItem
     */
    public function setJournalEntry(\AppBundle\Entity\JournalEntry $journalEntry)
    {
        $this->journalEntry = $journalEntry;

        return $this;
    }

    /**
     * Get journalEntry
     *
     * @return \AppBundle\Entity\JournalEntry
     */
    public function getJournalEntry()
    {
        return $this->journalEntry;
    }

    /**
     * Set account
     *
     * @param \AppBundle\Entity\Account $account
     * @return JournalEntryItem
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
    /**
     * @var string
     */
    private $amount;


    /**
     * Set amount
     *
     * @param string $amount
     * @return JournalEntryItem
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
}
