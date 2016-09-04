<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Account
 *
 * @ORM\HasLifecycleCallbacks
 */
class Account
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
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $dc;

    /**
     * @var string
     */
    private $initialBalance = 0;

    /**
     * @var boolean
     */
    private $isCash = 0;

    /**
     * @var string
     */
    private $type;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \AppBundle\Entity\AccountGroup
     */
    private $group;


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
     * @return Account
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
     * @return Account
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
     * Set code
     *
     * @param string $code
     * @return Account
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set dc
     *
     * @param string $dc
     * @return Account
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
     * Set initialBalance
     *
     * @param string $initialBalance
     * @return Account
     */
    public function setInitialBalance($initialBalance)
    {
        $this->initialBalance = $initialBalance;

        return $this;
    }

    /**
     * Get initialBalance
     *
     * @return string
     */
    public function getInitialBalance()
    {
        return $this->initialBalance;
    }

    /**
     * Set isCash
     *
     * @param boolean $isCash
     * @return Account
     */
    public function setCash($isCash)
    {
        $this->isCash = $isCash;

        return $this;
    }

    /**
     * Get isCash
     *
     * @return boolean
     */
    public function isCash()
    {
        return $this->isCash;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Account
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set group
     *
     * @param \AppBundle\Entity\AccountGroup $group
     * @return Account
     */
    public function setGroup(\AppBundle\Entity\AccountGroup $group = null)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return \AppBundle\Entity\AccountGroup
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Account
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
     * @return Account
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
