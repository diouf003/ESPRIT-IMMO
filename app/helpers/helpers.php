<?php

// Définir les Constances pour les PAGES

define("PAGELISTE", "liste");
define("PAGECREATEFORM", "create");
define("PAGEEDITFORM", "edite");
define("DEFAULTPASSWORD", "password");

use Illuminate\Support\Str;

function userFullName()
{
    return auth()->user()->prenom . " " . auth()->user()->name;
}

//fonction pour les menu setMenuOpen
function setMenuClass($route, $class)
{
    $routeActuel = request()->route()->getName();
    if (contains($routeActuel, $route)) {
        return $class;
    }
    return "";
}

//Menu fonction utilisateurs
function setMenuActive($route)
{
    $routeActuel = request()->route()->getName();
    if (contains($routeActuel, $route)) {
        return "active";
    }
    return "";
}
//function Contains

function contains($contains, $contenu)
{
    return str::contains($contains, $contenu);
}
function getRolesName()
{
    $rolesName = "";
    $i = 0;
    foreach (auth()->user()->roles as $role) {
        $rolesName  .= $role->nom;

        if ($i < sizeof(auth()->user()->roles) - 1) {
            $rolesName .= ",";
        }
        $i++;
    }

    return $rolesName;
}