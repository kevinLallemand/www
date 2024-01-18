<?php

namespace App;

class Autoloader
{
    /**
     * Charge automatiquement les classes requises
     */
    static function register()
    {
        spl_autoload_register(function ($className) {
// Transforme le séparateur d'espace de noms en séparateur de répertoire
            
$className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
var_dump(lcfirst($className));
        include 'model/' .lcfirst($className). '.php';
        });
    }

    /**
     * Charge les classes pour les contrôleurs en mode lecture seule
     */
    static function autoload($className)
    {
        // Transforme le séparateur d'espace de noms en séparateur de répertoire
        $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
        require_once "../model/" . $className . ".php";
    }

    /**
     * Charge n'importe quel fichier
     */
    static function loadFile($filePath)
    {
     
        require $filePath;
    }
}