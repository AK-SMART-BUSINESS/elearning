<?php

namespace Core\Libs\C;

/**
 * Définition d'une formation
 * Class Formation
 * @package Core\Libs\C
 */
class Formation
{
    private $idModuleForm;
    private $intituleForm;
    private $descriptionForm;
    private $prerequis;
    private $prix;
    private $image;
    private $dateAjoutForm;
    private $statusForm;
    private $themes_idTheme;

    /**
     * Formation constructor.
     * @param $intituleForm
     * @param $descriptionForm
     * @param $prerequis
     * @param $prix
     * @param $image
     * @param $themes_idTheme
     */
    public function __construct($intituleForm, $descriptionForm, $prerequis, $prix, $image, $themes_idTheme)
    {
        $this->intituleForm = $intituleForm;
        $this->descriptionForm = $descriptionForm;
        $this->prerequis = $prerequis;
        $this->prix = $prix;
        $this->image = $image;
        $this->themes_idTheme = $themes_idTheme;
    }

    /**
     * @return mixed
     */
    public function getIdModuleForm()
    {
        return $this->idModuleForm;
    }

    /**
     * @param mixed $idModuleForm
     */
    public function setIdModuleForm($idModuleForm)
    {
        $this->idModuleForm = $idModuleForm;
    }

    /**
     * @return mixed
     */
    public function getIntituleForm()
    {
        return $this->intituleForm;
    }

    /**
     * @param mixed $intituleForm
     */
    public function setIntituleForm($intituleForm)
    {
        $this->intituleForm = $intituleForm;
    }

    /**
     * @return mixed
     */
    public function getDescriptionForm()
    {
        return $this->descriptionForm;
    }

    /**
     * @param mixed $descriptionForm
     */
    public function setDescriptionForm($descriptionForm)
    {
        $this->descriptionForm = $descriptionForm;
    }

    /**
     * @return mixed
     */
    public function getPrerequis()
    {
        return $this->prerequis;
    }

    /**
     * @param mixed $prerequis
     */
    public function setPrerequis($prerequis)
    {
        $this->prerequis = $prerequis;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
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

    /**
     * @return mixed
     */
    public function getThemesIdTheme()
    {
        return $this->themes_idTheme;
    }

    /**
     * @param mixed $themes_idTheme
     */
    public function setThemesIdTheme($themes_idTheme)
    {
        $this->themes_idTheme = $themes_idTheme;
    }


}