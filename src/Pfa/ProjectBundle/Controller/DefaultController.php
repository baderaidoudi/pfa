<?php

namespace Pfa\ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PfaProjectBundle:Default:index.html.twig');
    }
}
