<?php
namespace Core\Libs\I;


use Core\Libs\C\Themes;

interface ThemeInt
{
    public function addTheme(Themes $themes);

    public function updateTheme(Themes $themes);

    public function removeTheme($id_theme);

    public function getThemes();

    public function getTheme($id_theme);
}