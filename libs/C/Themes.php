<?php

namespace Core\Libs\C;


class Themes
{
    private $idTheme;
    private $intituleTh;
    private $statusTh;

    /**
     * Themes constructor.
     * @param $intituleTh
     * @param $statusTh
     */
    public function __construct($intituleTh, $statusTh)
    {
        $this->intituleTh = $intituleTh;
        $this->statusTh = $statusTh;
    }


    /**
     * @return mixed
     */
    public function getIdTheme()
    {
        return $this->idTheme;
    }

    /**
     * @param $idTheme
     * @throws \Exception
     */
    public function setIdTheme($idTheme)
    {
        $id_theme = intval($idTheme);
        if ($id_theme > 0)
            $this->idTheme = $id_theme;
        else
            throw new \Exception('Erreur: argument invalide');

    }

    /**
     * @return mixed
     */
    public function getIntituleTh()
    {
        return $this->intituleTh;
    }

    /**
     * @param mixed $intituleTh
     */
    public function setIntituleTh($intituleTh)
    {
        $this->intituleTh = $intituleTh;
    }

    /**
     * @return mixed
     */
    public function getStatusTh()
    {
        return $this->statusTh;
    }

    /**
     * @param mixed $statusTh
     */
    public function setStatusTh($statusTh)
    {
        $this->statusTh = $statusTh;
    }


}