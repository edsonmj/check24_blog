<?php

namespace AppBundle\Entity;

/**
 * Roles
 */
class Roles
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var boolean
     */
    private $active = '1';

    /**
     * @var integer
     */
    private $createdUserId;

    /**
     * @var \DateTime
     */
    private $insertionDate = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     */
    private $updatedUserId;

    /**
     * @var \DateTime
     */
    private $updateDate;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return Roles
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
     * Set active
     *
     * @param boolean $active
     *
     * @return Roles
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set createdUserId
     *
     * @param integer $createdUserId
     *
     * @return Roles
     */
    public function setCreatedUserId($createdUserId)
    {
        $this->createdUserId = $createdUserId;

        return $this;
    }

    /**
     * Get createdUserId
     *
     * @return integer
     */
    public function getCreatedUserId()
    {
        return $this->createdUserId;
    }

    /**
     * Set insertionDate
     *
     * @param \DateTime $insertionDate
     *
     * @return Roles
     */
    public function setInsertionDate($insertionDate)
    {
        $this->insertionDate = $insertionDate;

        return $this;
    }

    /**
     * Get insertionDate
     *
     * @return \DateTime
     */
    public function getInsertionDate()
    {
        return $this->insertionDate;
    }

    /**
     * Set updatedUserId
     *
     * @param integer $updatedUserId
     *
     * @return Roles
     */
    public function setUpdatedUserId($updatedUserId)
    {
        $this->updatedUserId = $updatedUserId;

        return $this;
    }

    /**
     * Get updatedUserId
     *
     * @return integer
     */
    public function getUpdatedUserId()
    {
        return $this->updatedUserId;
    }

    /**
     * Set updateDate
     *
     * @param \DateTime $updateDate
     *
     * @return Roles
     */
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;

        return $this;
    }

    /**
     * Get updateDate
     *
     * @return \DateTime
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
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
     * @var \AppBundle\Entity\Users
     */
    private $createdUser;

    /**
     * @var \AppBundle\Entity\Users
     */
    private $updatedUser;


    /**
     * Set createdUser
     *
     * @param \AppBundle\Entity\Users $createdUser
     *
     * @return Roles
     */
    public function setCreatedUser(\AppBundle\Entity\Users $createdUser = null)
    {
        $this->createdUser = $createdUser;

        return $this;
    }

    /**
     * Get createdUser
     *
     * @return \AppBundle\Entity\Users
     */
    public function getCreatedUser()
    {
        return $this->createdUser;
    }

    /**
     * Set updatedUser
     *
     * @param \AppBundle\Entity\Users $updatedUser
     *
     * @return Roles
     */
    public function setUpdatedUser(\AppBundle\Entity\Users $updatedUser = null)
    {
        $this->updatedUser = $updatedUser;

        return $this;
    }

    /**
     * Get updatedUser
     *
     * @return \AppBundle\Entity\Users
     */
    public function getUpdatedUser()
    {
        return $this->updatedUser;
    }
}
