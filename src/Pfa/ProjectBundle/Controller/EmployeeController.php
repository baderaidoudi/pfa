<?php

namespace Pfa\ProjectBundle\Controller;

use Pfa\ProjectBundle\Entity\Assignments;
use Pfa\ProjectBundle\Entity\Employees;
use Pfa\ProjectBundle\Entity\Locations;
use Pfa\ProjectBundle\Entity\Projects;
use Pfa\ProjectBundle\Repository\EmployeeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Psr\Log\LoggerInterface;

class EmployeeController extends Controller
{
    public function infoAction()
    {
        return $this->render('@PfaProject/employees/employee-index.html.twig');
    }

    public function indexAction($id)
    {
        $repositoryemp = $this->getDoctrine()->getRepository(Employees::class);
        $employeeuc = $repositoryemp->findOneBy(
            ['employeeId' => $id ]
        );
        $manid= $employeeuc->getManager()->getEmployeeId();
        $names = $employeeuc->getFirstName()." ".$employeeuc->getLastName();
        $repository = $this->getDoctrine()->getRepository(Projects::class);
        $employeeProjectData = $repository->findBy(
            ['projectId' => '1']
        );
        return $this->render('@PfaProject/employees/employee-index.html.twig', ['names' => $names , 'employeeProjectData' => $employeeProjectData, 'manid'=>$manid]);
    }

    public function teamAction($manid)
    {
        $repositoryteam = $this->getDoctrine()->getRepository(Employees::class);
        $team = $repositoryteam->findBy(
            ['manager' => $manid ]
        );
        return $this->render('@PfaProject/employees/employee-team.html.twig',array('team' => $team));
    }

    public function logoutAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    public function indexedAction()
    {
        return $this->render('@PfaProject/employees/employee-index.html.twig');
    }





}
