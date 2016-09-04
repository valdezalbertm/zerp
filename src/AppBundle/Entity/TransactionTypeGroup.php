<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TransactionTypeGroup
 *
 * @ORM\HasLifecycleCallbacks
 */
class TransactionTypeGroup
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $transactionTypes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->transactionTypes = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set name
     *
     * @param string $name
     * @return TransactionTypeGroup
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
     * Set description
     *
     * @param string $description
     * @return TransactionTypeGroup
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
     * Add transactionTypes
     *
     * @param \AppBundle\Entity\TransactionType $transactionTypes
     * @return TransactionTypeGroup
     */
    public function addTransactionType(\AppBundle\Entity\TransactionType $transactionTypes)
    {
        $this->transactionTypes[] = $transactionTypes;

        return $this;
    }

    /**
     * Remove transactionTypes
     *
     * @param \AppBundle\Entity\TransactionType $transactionTypes
     */
    public function removeTransactionType(\AppBundle\Entity\TransactionType $transactionTypes)
    {
        $this->transactionTypes->removeElement($transactionTypes);
    }

    /**
     * Get transactionTypes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTransactionTypes()
    {
        return $this->transactionTypes;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return TransactionTypeGroup
     * @ORM\PrePersist
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = new \DateTime();

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return TransactionTypeGroup
     * @ORM\PreUpdate
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = new \DateTime();

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
