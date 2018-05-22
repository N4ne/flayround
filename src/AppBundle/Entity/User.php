<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=32)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=32)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="phoneNumber", type="string", length=32)
     */
    private $phoneNumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthDate", type="datetime")
     */
    private $birthDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime")
     */
    private $creationDate;

    /**
     * @var int
     *
     * @ORM\Column(name="note", type="smallint")
     */
    private $note;

    /**
     * @var bool
     *
     * @ORM\Column(name="isACertifiedPilot", type="boolean")
     */
    private $isACertifiedPilot;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Review", mappedBy="reviewAuthor")
     */
    private $reviewAuthor;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Flight", mappedBy="pilot")
     */
    private $pilot;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Reservation", mappedBy="passenger")
     */
    private $passenger;

    /**
     * @return string
     */

    public function __toString()
    {
        $name = $this->firstName . " " . $this->lastName;
        return $name;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return User
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     *
     * @return User
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return User
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set note
     *
     * @param integer $note
     *
     * @return User
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return int
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set isACertifiedPilot
     *
     * @param boolean $isACertifiedPilot
     *
     * @return User
     */
    public function setIsACertifiedPilot($isACertifiedPilot)
    {
        $this->isACertifiedPilot = $isACertifiedPilot;

        return $this;
    }

    /**
     * Get isACertifiedPilot
     *
     * @return bool
     */
    public function getIsACertifiedPilot()
    {
        return $this->isACertifiedPilot;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reviewAuthor = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add reviewAuthor
     *
     * @param \AppBundle\Entity\Review $reviewAuthor
     *
     * @return User
     */
    public function addReviewAuthor(\AppBundle\Entity\Review $reviewAuthor)
    {
        $this->reviewAuthor[] = $reviewAuthor;

        return $this;
    }

    /**
     * Remove reviewAuthor
     *
     * @param \AppBundle\Entity\Review $reviewAuthor
     */
    public function removeReviewAuthor(\AppBundle\Entity\Review $reviewAuthor)
    {
        $this->reviewAuthor->removeElement($reviewAuthor);
    }

    /**
     * Get reviewAuthor
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReviewAuthor()
    {
        return $this->reviewAuthor;
    }

    /**
     * Add pilot
     *
     * @param \AppBundle\Entity\Flight $pilot
     *
     * @return User
     */
    public function addPilot(\AppBundle\Entity\Flight $pilot)
    {
        $this->pilot[] = $pilot;

        return $this;
    }

    /**
     * Remove pilot
     *
     * @param \AppBundle\Entity\Flight $pilot
     */
    public function removePilot(\AppBundle\Entity\Flight $pilot)
    {
        $this->pilot->removeElement($pilot);
    }

    /**
     * Get pilot
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPilot()
    {
        return $this->pilot;
    }

    /**
     * Add passenger
     *
     * @param \AppBundle\Entity\User $passenger
     *
     * @return User
     */
    public function addPassenger(\AppBundle\Entity\User $passenger)
    {
        $this->passenger[] = $passenger;

        return $this;
    }

    /**
     * Remove passenger
     *
     * @param \AppBundle\Entity\User $passenger
     */
    public function removePassenger(\AppBundle\Entity\User $passenger)
    {
        $this->passenger->removeElement($passenger);
    }

    /**
     * Get passenger
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPassenger()
    {
        return $this->passenger;
    }
}
