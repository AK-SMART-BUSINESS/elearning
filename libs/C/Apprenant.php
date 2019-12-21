<?php

namespace Core\Libs\C;


class Apprenant
{
    private $idApprenant;
    private $nomApp;
    private $prenomsApp;
    private $contactApp;
    private $emailApp;
    private $passApp;
    private $pseudoApp;

    /**
     * Apprenant constructor.
     * @param $nomApp
     * @param $prenomsApp
     * @param $contactApp
     * @param $emailApp
     * @param $passApp
     * @param $pseudoApp
     */
    public function __construct($nomApp, $prenomsApp, $contactApp, $emailApp, $passApp, $pseudoApp)
    {
        $this->nomApp = $nomApp;
        $this->prenomsApp = $prenomsApp;
        $this->contactApp = $contactApp;
        $this->emailApp = $emailApp;
        $this->passApp = $passApp;
        $this->pseudoApp = $pseudoApp;
    }

    /**
     * @return mixed
     */
    public function getIdApprenant()
    {
        return $this->idApprenant;
    }

    /**
     * @param mixed $idApprenant
     */
    public function setIdApprenant($idApprenant)
    {
        $this->idApprenant = $idApprenant;
    }

    /**
     * @return mixed
     */
    public function getNomApp()
    {
        return $this->nomApp;
    }

    /**
     * @param mixed $nomApp
     */
    public function setNomApp($nomApp)
    {
        $this->nomApp = $nomApp;
    }

    /**
     * @return mixed
     */
    public function getPrenomsApp()
    {
        return $this->prenomsApp;
    }

    /**
     * @param mixed $prenomsApp
     */
    public function setPrenomsApp($prenomsApp)
    {
        $this->prenomsApp = $prenomsApp;
    }

    /**
     * @return mixed
     */
    public function getContactApp()
    {
        return $this->contactApp;
    }

    /**
     * @param mixed $contactApp
     */
    public function setContactApp($contactApp)
    {
        $this->contactApp = $contactApp;
    }

    /**
     * @return mixed
     */
    public function getEmailApp()
    {
        return $this->emailApp;
    }

    /**
     * @param mixed $emailApp
     */
    public function setEmailApp($emailApp)
    {
        $this->emailApp = $emailApp;
    }

    /**
     * @return mixed
     */
    public function getPassApp()
    {
        return $this->passApp;
    }

    /**
     * @param mixed $passApp
     */
    public function setPassApp($passApp)
    {
        $this->passApp = $passApp;
    }

    /**
     * @return mixed
     */
    public function getPseudoApp()
    {
        return $this->pseudoApp;
    }

    /**
     * @param mixed $pseudoApp
     */
    public function setPseudoApp($pseudoApp)
    {
        $this->pseudoApp = $pseudoApp;
    }


}