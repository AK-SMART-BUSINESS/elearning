<?php

namespace Core\Libs\C;


class Formateur
{
    private $idFormateur;
    private $nomForm;
    private $prenomsForm;
    private $passForm;
    private $emailForm;
    private $contactForm;
    private $pays;
    private $specialite;
    private $ville;
    private $dateAjoutForm;
    private $statusForm;

    public function __construct($nom, $prenom, $passe, $email, $contact, $pays, $specialite, $ville)
    {
        $this->nomForm = $nom;
        $this->prenomsForm = $prenom;
        $this->passForm = $passe;
        $this->emailForm = $email;
        $this->contactForm = $contact;
        $this->pays = $pays;
        $this->specialite = $specialite;
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getIdFormateur()
    {
        return $this->idFormateur;
    }

    /**
     * @param mixed $idFormateur
     */
    public function setIdFormateur($idFormateur)
    {
        $this->idFormateur = $idFormateur;
    }

    /**
     * @return mixed
     */
    public function getNomForm()
    {
        return $this->nomForm;
    }

    /**
     * @param mixed $nomForm
     */
    public function setNomForm($nomForm)
    {
        $this->nomForm = $nomForm;
    }

    /**
     * @return mixed
     */
    public function getPrenomsForm()
    {
        return $this->prenomsForm;
    }

    /**
     * @param mixed $prenomsForm
     */
    public function setPrenomsForm($prenomsForm)
    {
        $this->prenomsForm = $prenomsForm;
    }

    /**
     * @return mixed
     */
    public function getPassForm()
    {
        return $this->passForm;
    }

    /**
     * @param mixed $passForm
     */
    public function setPassForm($passForm)
    {
        $this->passForm = $passForm;
    }

    /**
     * @return mixed
     */
    public function getEmailForm()
    {
        return $this->emailForm;
    }

    /**
     * @param mixed $emailForm
     */
    public function setEmailForm($emailForm)
    {
        $this->emailForm = $emailForm;
    }

    /**
     * @return mixed
     */
    public function getContactForm()
    {
        return $this->contactForm;
    }

    /**
     * @param mixed $contactForm
     */
    public function setContactForm($contactForm)
    {
        $this->contactForm = $contactForm;
    }

    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param mixed $paysForm
     */
    public function setPays($paysForm)
    {
        $this->pays = $paysForm;
    }

    /**
     * @return mixed
     */
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * @param mixed $specialite
     */
    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $villeForm
     */
    public function setVille($villeForm)
    {
        $this->ville = $villeForm;
    }

    /**
     * @return mixed
     */
    public function getDateAjoutForm()
    {
        return $this->dateAjoutForm;
    }

    /**
     * @param mixed $dateAjoutForm
     */
    public function setDateAjoutForm($dateAjoutForm)
    {
        $this->dateAjoutForm = $dateAjoutForm;
    }

    /**
     * @return mixed
     */
    public function getStatusForm()
    {
        return $this->statusForm;
    }

    /**
     * @param mixed $statusForm
     */
    public function setStatusForm($statusForm)
    {
        $this->statusForm = $statusForm;
    }

}