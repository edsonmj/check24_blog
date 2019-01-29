<?php

namespace AppBundle\Entity;

/**
 * Users
 */
class Users
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $email;

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
     * @return Users
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
     * Set email
     *
     * @param string $email
     *
     * @return Users
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Users
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
     * @return Users
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
     * @return Users
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
     * @return Users
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
     * @return Users
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
     * @var string
     */
    private $password;


    /**
     * Set password
     *
     * @param string $password
     *
     * @return Users
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
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
     * @return Users
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
     * @return Users
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
