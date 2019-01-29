<?php

namespace AppBundle\Entity;

/**
 * Comments
 */
class Comments
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
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var string
     */
    private $ipAddress;

    /**
     * @var boolean
     */
    private $active = 1;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return Comments
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
     * @return Comments
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
     * Set url
     *
     * @param string $url
     *
     * @return Comments
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Comments
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set ipAddress
     *
     * @param string $ipAddress
     *
     * @return Comments
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     * Get ipAddress
     *
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Comments
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @var \AppBundle\Entity\Posts
     */
    private $post;


    /**
     * Set post
     *
     * @param \AppBundle\Entity\Posts $post
     *
     * @return Comments
     */
    public function setPost(\AppBundle\Entity\Posts $post = null)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post
     *
     * @return \AppBundle\Entity\Posts
     */
    public function getPost()
    {
        return $this->post;
    }
    /**
     * @var \DateTime
     */
    private $insertionDate = 'CURRENT_TIMESTAMP';


    /**
     * Set insertionDate
     *
     * @param \DateTime $insertionDate
     *
     * @return Comments
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
        return $this->insertionDate->format('d.m.Y H:i');
    }
}
