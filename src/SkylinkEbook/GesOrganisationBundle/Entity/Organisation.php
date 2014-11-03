<?php

namespace SkylinkEbook\GesOrganisationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

// N'oubliez pas de rajouter ce « use », il définit le namespace pour les annotations de validation
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Organisation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SkylinkEbook\GesOrganisationBundle\Entity\OrganisationRepository")
 */
class Organisation
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=50)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * 
     * @Assert\Length(min=2)
     * @Assert\NotBlank()
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     * @Assert\Length(min=2)
     * @Assert\NotBlank()
     */
    private $nom;

    
    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=2)
     * 
     * @Assert\Length(min=1)
     */
    private $type;
    
    //déclaration des constantes définissant les 3 types d'organisation
    
    const TYPE_UNIVERSITE = 'U';
    const TYPE_DEPARTEMENT = 'D';
    const TYPE_PROMOTION = 'P';

    /**
     * Set id
     *
     * @param string $id
     * @return Organisation
     */
    public function setId($id) {
        $this->id = strtoupper($id);
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
     * Set nom
     *
     * @param string $nom
     * @return Organisation
     */
    public function setNom($nom)
    {
        $this->nom = ucwords($nom);

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Organisation
     */
    public function setType($type)
    {
        $this->type = strtoupper($type);

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
}
