<?php

namespace SkylinkEbook\GesUserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SkylinkEbook\GesUserBundle\Entity\UserRepository")
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username_email", type="string", length=100)
     */
    private $usernameEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=100)
     */
    private $password;

    /**
     * @var integer
     *
     * @ORM\Column(name="typeCompte", type="smallint")
     */
    private $typeCompte;


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
     * Set usernameEmail
     *
     * @param string $usernameEmail
     * @return User
     */
    public function setUsernameEmail($usernameEmail)
    {
        $this->usernameEmail = $usernameEmail;

        return $this;
    }

    /**
     * Get usernameEmail
     *
     * @return string 
     */
    public function getUsernameEmail()
    {
        return $this->usernameEmail;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
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
     * Set typeCompte
     *
     * @param integer $typeCompte
     * @return User
     */
    public function setTypeCompte($typeCompte)
    {
        $this->typeCompte = $typeCompte;

        return $this;
    }

    /**
     * Get typeCompte
     *
     * @return integer 
     */
    public function getTypeCompte()
    {
        return $this->typeCompte;
    }
}
