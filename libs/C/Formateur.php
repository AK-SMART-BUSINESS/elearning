<?php

namespace Core\Libs\C;


class Formateur
{
    private $id_form;
    private $nom_form;
    private $prenom_form;
    private $pseudo_form;
    private $mdp_form;
    private $dat_nais_form;
    private $email_form;
    private $contact_form;
    private $pays_form;
    private $specialite_form;
    private $ville_form;
    private $date_inscrip_form;
    private $status_form;
    private $adresse_form;

    /**
     * Formateur constructor.
     * @param $nom_form
     * @param $prenom_form
     * @param $pseudo_form
     * @param $mdp_form
     * @param $dat_nais_form
     * @param $email_form
     * @param $contact_form
     * @param $pays_form
     * @param $specialite_form
     * @param $ville_form
     * @param $date_inscrip_form
     * @param $adresse_form
     */
    public function __construct($nom_form, $prenom_form, $pseudo_form, $mdp_form, $dat_nais_form, $email_form, $contact_form, $pays_form, $specialite_form, $ville_form, $date_inscrip_form, $adresse_form)
    {
        $this->nom_form = $nom_form;
        $this->prenom_form = $prenom_form;
        $this->pseudo_form = $pseudo_form;
        $this->mdp_form = $mdp_form;
        $this->dat_nais_form = $dat_nais_form;
        $this->email_form = $email_form;
        $this->contact_form = $contact_form;
        $this->pays_form = $pays_form;
        $this->specialite_form = $specialite_form;
        $this->ville_form = $ville_form;
        $this->date_inscrip_form = $date_inscrip_form;
        $this->adresse_form = $adresse_form;
    }


    /**
     * @return mixed
     */
    public function getIdForm()
    {
        return $this->id_form;
    }

    /**
     * @param mixed $id_form
     */
    public function setIdForm($id_form)
    {
        $this->id_form = $id_form;
    }

    /**
     * @return mixed
     */
    public function getNomForm()
    {
        return $this->nom_form;
    }

    /**
     * @param mixed $nom_form
     */
    public function setNomForm($nom_form)
    {
        $this->nom_form = $nom_form;
    }

    /**
     * @return mixed
     */
    public function getPrenomForm()
    {
        return $this->prenom_form;
    }

    /**
     * @param mixed $prenom_form
     */
    public function setPrenomForm($prenom_form)
    {
        $this->prenom_form = $prenom_form;
    }

    /**
     * @return mixed
     */
    public function getPseudoForm()
    {
        return $this->pseudo_form;
    }

    /**
     * @param mixed $pseudo_form
     */
    public function setPseudoForm($pseudo_form)
    {
        $this->pseudo_form = $pseudo_form;
    }

    /**
     * @return mixed
     */
    public function getMdpForm()
    {
        return $this->mdp_form;
    }

    /**
     * @param mixed $mdp_form
     */
    public function setMdpForm($mdp_form)
    {
        $this->mdp_form = $mdp_form;
    }

    /**
     * @return mixed
     */
    public function getDatNaisForm()
    {
        return $this->dat_nais_form;
    }

    /**
     * @param mixed $dat_nais_form
     */
    public function setDatNaisForm($dat_nais_form)
    {
        $this->dat_nais_form = $dat_nais_form;
    }

    /**
     * @return mixed
     */
    public function getEmailForm()
    {
        return $this->email_form;
    }

    /**
     * @param mixed $email_form
     */
    public function setEmailForm($email_form)
    {
        $this->email_form = $email_form;
    }

    /**
     * @return mixed
     */
    public function getContactForm()
    {
        return $this->contact_form;
    }

    /**
     * @param mixed $contact_form
     */
    public function setContactForm($contact_form)
    {
        $this->contact_form = $contact_form;
    }

    /**
     * @return mixed
     */
    public function getPaysForm()
    {
        return $this->pays_form;
    }

    /**
     * @param mixed $pays_form
     */
    public function setPaysForm($pays_form)
    {
        $this->pays_form = $pays_form;
    }

    /**
     * @return mixed
     */
    public function getSpecialiteForm()
    {
        return $this->specialite_form;
    }

    /**
     * @param mixed $specialite_form
     */
    public function setSpecialiteForm($specialite_form)
    {
        $this->specialite_form = $specialite_form;
    }

    /**
     * @return mixed
     */
    public function getVilleForm()
    {
        return $this->ville_form;
    }

    /**
     * @param mixed $ville_form
     */
    public function setVilleForm($ville_form)
    {
        $this->ville_form = $ville_form;
    }

    /**
     * @return mixed
     */
    public function getDateInscripForm()
    {
        return $this->date_inscrip_form;
    }

    /**
     * @param mixed $date_inscrip_form
     */
    public function setDateInscripForm($date_inscrip_form)
    {
        $this->date_inscrip_form = $date_inscrip_form;
    }

    /**
     * @return mixed
     */
    public function getStatusForm()
    {
        return $this->status_form;
    }

    /**
     * @param mixed $status_form
     */
    public function setStatusForm($status_form)
    {
        $this->status_form = $status_form;
    }

    /**
     * @return mixed
     */
    public function getAdresseForm()
    {
        return $this->adresse_form;
    }

    /**
     * @param mixed $adresse_form
     */
    public function setAdresseForm($adresse_form)
    {
        $this->adresse_form = $adresse_form;
    }


}