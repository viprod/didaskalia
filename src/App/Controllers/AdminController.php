<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 03/10/2015
 * Time: 21:18
 */

namespace App\Controllers;

use Symfony\Component\HttpFoundation\RedirectResponse,
    Symfony\Component\Routing\Generator\UrlGenerator,
    Symfony\Component\Security\Core\SecurityContext,
    Symfony\Component\HttpFoundation\Request,
    App\TestInjection\TestInterface,
    Twig_Environment;

class AdminController
{
    public function indexAction(Twig_Environment $twig){
        return $twig->render('admin/dashoard.html.twig', array());
    }
}