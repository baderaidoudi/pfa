<?php

namespace Pfa\ProjectBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Pfa\ProjectBundle\Entity\Employees;
use Pfa\ProjectBundle\Entity\Projects;
use Pfa\ProjectBundle\PfaProjectBundle;
use Pfa\ProjectBundle\Repository\EmployeeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Pfa\ProjectBundle\Entity\UserCredentials;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/*
$session = new Session();
$session->start();
*/

class DefaultController extends Controller
{




    public function loginAction(Request $request)
    {/*
        $employeeProjectData = $this->getDoctrine()
            ->getRepository(Projects::class)
            ->find("1");

        if (!$employeeProjectData) {
            throw $this->createNotFoundException(
                'No product found for id '.strval($employeeProjectData->getTitle())
            );
        }
/*
        $em =$this->container->get('doctrine')->getEntityManager();
        $UserCredentials = $em->getRepository('PfaProjectBundle:UserCredentials')->findAll();

*/


        if($request->getMethod("POST")){
            $username=$request->get("username");
            $password=$request->get("password");
            $repository = $this->getDoctrine()->getRepository(UserCredentials::class);

            $users = $repository->findOneBy([
                'username' => $username,
                'password' => $password
            ]);

                $session = new Session();

                if($users){
                    $session->set('userid', $users->getUserId());
                    $session->set('empid', $users->getEmployee()->getEmployeeId());
                    $session->set('username', $users->getUsername());
                if($users->getRole() === 'ROLE_EMP'){
                    $session->set('acctype', 'EMPLOYEE');

                    return $this->redirectToRoute(
                        'employee-index',
                        ['id'=> $users->getEmployee()->getEmployeeId() ]
                    );

                }
                if ($users->getRole()=== 'ROLE_MGR'){
                    $session->set('acctype', 'MANAGER');
                }
                if ($users->getRole()=== 'ROLE_ADMIN'){
                    $session->set('acctype', 'ADMIN');

/*
                    return $this->render('@PfaProject/admin/admin-index.html.twig');
                    */
                    return $this->redirectToRoute(
                        'admin-index',
                        ['id'=> $users->getEmployee()->getEmployeeId() ]
                    );

                }

            }
            else{
                return $this->redirectToRoute('loginindex');
            }
        }

    }

    public function indexAction()
    {
        return $this->render('@PfaProject/Login/login.html.twig');
    }


    public function homepageAction()
    {
        return $this->render('@PfaProject/home/home.html.twig');
    }


}
