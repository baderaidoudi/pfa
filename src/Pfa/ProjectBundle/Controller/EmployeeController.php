<?php

namespace Pfa\ProjectBundle\Controller;

use DateTime;
use Pfa\ProjectBundle\Entity\Assignments;
use Pfa\ProjectBundle\Entity\DateTimeNow;
use Pfa\ProjectBundle\Entity\Employees;
use Pfa\ProjectBundle\Entity\Locations;
use Pfa\ProjectBundle\Entity\Projects;
use Pfa\ProjectBundle\Entity\UserCredentials;
use Pfa\ProjectBundle\Repository\UserCredentialsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;





class EmployeeController extends Controller
{



    /***
     * @return Response
     * show user information
     */
    public function infoAction()
    {
        $session = new Session();
        $empid =  $session->get('empid');
        $repositoryteam = $this->getDoctrine()->getRepository(Employees::class);
        $employeeInfo= $repositoryteam->findBy(
            ['employeeId' => $empid ]
        );



        $repositoryuc = $this->getDoctrine()->getRepository(UserCredentials::class);
        $ucInfo= $repositoryuc->findBy(
            ['employee' => $empid ]
        );

        return $this->render('@PfaProject/employees/employee-info.html.twig', ['employeeInfo' => $employeeInfo , 'ucInfo' => $ucInfo ]);
    }

    /***
     * @return Response
     * main page of employee
     */
    public function indexAction()
    {
        $session = new Session();
        $id=  $session->get('empid');
        $repositoryemp = $this->getDoctrine()->getRepository(Employees::class);
        $employeeuc = $repositoryemp->findOneBy(
            ['employeeId' => $id ]
        );


/*

        $xml="";
        foreach($employeeuc->getEmployees() as $post) {
            $xml .= $post->getFirstName();

        }

        throw $this->createNotFoundException(
            'No product found for id '.$employeeuc->getUserCredential()->getUsername()
        );
*/


        $manid= $employeeuc->getManager()->getEmployeeId();
        $session->set('manid',$employeeuc->getManager()->getEmployeeId());
        $names = $employeeuc->getFirstName()." ".$employeeuc->getLastName();
        $em =$this->container->get('doctrine')->getEntityManager();
        $query=$em->createQuery("SELECT DISTINCT p.projectId , p.startDate , p.endDate , p.title as title, p.status as status FROM PfaProjectBundle:Employees e INNER JOIN PfaProjectBundle:Assignments a WITH e.employeeId = a.employee  JOIN PfaProjectBundle:Projects p WITH a.project = p.projectId WHERE a.employee = :id")
        ->setParameter('id', $id);
        $UserCredentials=$query->getResult();

        return $this->render('@PfaProject/employees/employee-index.html.twig', ['names' => $names , 'employeeProjectData' => $UserCredentials, 'manid'=>$manid]);
    }

    /***
     * @return Response
     * show team members
     */
    public function teamAction()
    {
        $session = new Session();
        $managerid =  $session->get('manid');
        $repositoryteam = $this->getDoctrine()->getRepository(Employees::class);
        $team = $repositoryteam->findBy(
            ['manager' => $managerid ]
        );
        return $this->render('@PfaProject/employees/employee-team.html.twig',array('team' => $team));
    }

    /***
     * @return Response
     * delete session and log out
     */
    public function logoutAction()
    {
        $session = new Session();
        $session->clear();
        return $this->render('@PfaProject/home/home.html.twig');
    }

    public function empinfoAction()
    {
        $session = new Session();
        $empid =  $session->get('empid');
        $repositoryteam = $this->getDoctrine()->getRepository(Employees::class);
        $employee = $repositoryteam->findBy(
            ['employeeId' => $empid ]
        );
        return $this->render('@PfaProject/employees/employee-info.html.twig', array('employee'=>$employee));
    }


public function empshowcommitAction($projectId){
    $session = new Session();
    $empid =  $session->get('empid');
    $repositorya = $this->getDoctrine()->getRepository(Assignments::class);
    $commit = $repositorya->findBy(
          [ 'project' => $projectId,
            'employee'=> $empid],
          [ 'commitDate' => 'DESC']

    );

    return $this->render('@PfaProject/employees/employee-show-commits.html.twig', ['commit' => $commit , "project"=> $projectId]);

}
    public function empshowallcommitAction($projectId){

        $repositorya = $this->getDoctrine()->getRepository(Assignments::class);
        $commit = $repositorya->findBy(
            ['project' => $projectId ],
            ['commitDate' => 'DESC']
        );

        return $this->render('@PfaProject/employees/employee-show-commits.html.twig', ['commit' => $commit, "project"=> $projectId ]);
    }
    public function empaddcommitAction($projectId){

        $session = new Session();
        $username= $session->get('username');
        $repositorya = $this->getDoctrine()->getRepository(Assignments::class);
        $assignments = $repositorya->findOneBy(
            ['project' => $projectId ]
        );
        return $this->render('@PfaProject/employees/employee-add-commit.html.twig', array('username'=>$username , 'a'=>$assignments));

    }
    public function empaddnewcommitAction(Request $request)
    {
        $session = new Session();
        $empid =  $session->get('empid');
        $repo = $this->getDoctrine()->getRepository(Assignments::class);
        $c = $repo->findOneBy(
            ['employee' => $empid]
        );

        if ($request->getMethod("POST")) {

            $commitEmpDesc = $request->get("commitEmpDesc");
            $entityManager = $this->getDoctrine()->getManager();
            $Assignments = new Assignments();
            $Assignments->setEmployee($c->getEmployee());
            $Assignments->setCommitEmpDesc($commitEmpDesc);
            $Assignments->setProject($c->getProject());
            $entityManager->persist($Assignments);
            $entityManager->flush();
            return $this->redirectToRoute('employee-index'); // cast $entity to string

        }
    }
    public function crendentialeditAction(Request $request){
        $session = new Session();
        $account =  $session->get('acctype');
        $username =  $session->get('username');
        return $this->render('@PfaProject/employees/credential-edit.html.twig',array('account'=> $account,'username'=>$username   )) ;
    }


    public function crendentialeditsetAction(Request $request){

        $session = new Session();
        $userId=  $session->get('userid');
        if ($request->getMethod("POST")) {
                $password = $request->get("password");
                $entityManager = $this->getDoctrine()->getManager();
                $UserCredentials = $entityManager->getRepository(UserCredentials::class)->find($userId);
                $UserCredentials->setPassword($password);
                $entityManager->flush();
               return $this->redirectToRoute('employee-index');
        }

    }
}
