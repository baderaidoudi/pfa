<?php
/**
 * Created by PhpStorm.
 * User: baidoudi
 * Date: 1/11/21
 * Time: 9:17 PM
 */

namespace Pfa\ProjectBundle\Controller;


use Pfa\ProjectBundle\Entity\Departments;
use Pfa\ProjectBundle\Entity\Employees;
use Pfa\ProjectBundle\Entity\Locations;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class AdministrateurController extends Controller
{


    public function indexAction()
    {
        return $this->render('@PfaProject/admin/admin-index.html.twig');
    }

    public function infoAction()
    {
        return $this->render('@PfaProject/admin/admin-index.html.twig');
    }

    public function locaddAction()
    {
        return $this->render('@PfaProject/admin/location-add.html.twig');

    }

    public function locdeleteAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $Locations = $entityManager->getRepository(Locations::class)->find($id);
        $entityManager->remove($Locations);
        $entityManager->flush();
        return $this->redirectToRoute('locations-list');
    }

    public function loceditAction($id)
    {
        $repositoryteam = $this->getDoctrine()->getRepository(Locations::class);
        $location = $repositoryteam->findOneBy(["locationId"=> $id]);
        return $this->render('@PfaProject/admin/location-edit.html.twig', array('location'=>$location, 'id'=>$id));

    }

    public function adlogAction()
    {
        return $this->render('@PfaProject/Login/admin-login.html.twig');
    }

    public function deleteempAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $Employee = $entityManager->getRepository(Employees::class)->find($id);
        $entityManager->remove($Employee);
        $entityManager->flush();
        return $this->redirectToRoute('employees-list');
    }

    public function deptaddAction()
    {
        return $this->render('@PfaProject/admin/department-add.html.twig');
    }

    public function deptaddpersistAction(Request $request)
    {
        if ($request->getMethod("POST")) {

            $departmentName = $request->get("departmentName");
            $locationid = $request->get("locationid");

            $repository = $this->getDoctrine()->getRepository("PfaProjectBundle:Locations");
            $loc =       $repository->findOneBy(["locationId"=> $locationid ]);

            $Department = new Departments();
            $Department->setDepartmentName($departmentName);
            $Department->setLocation($loc);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($Department);
            $entityManager->flush();


            return $this->redirectToRoute('departments-list');

        }
    }

    public function deptdeleteAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $Department = $entityManager->getRepository(Departments::class)->find($id);
        $entityManager->remove($Department);
        $entityManager->flush();
        return $this->redirectToRoute('departments-list');
    }

    public function depteditAction($id)
    {
        $repositoryteam = $this->getDoctrine()->getRepository(Departments::class);
        $department = $repositoryteam->findOneBy(["departmentId"=> $id]);
        return $this->render('@PfaProject/admin/department-edit.html.twig', array('department'=>$department, 'id'=>$id));

    }

    public function depteditpersistAction(Request $request, $id)
    {

        if ($request->getMethod("POST")) {

            $departmentName = $request->get("departmentName");


            $entityManager = $this->getDoctrine()->getManager();
            $Department = $entityManager->getRepository(Departments::class)->find($id);
            $Department->setDepartmentName($departmentName);
            $entityManager->persist($Department);
            $entityManager->flush();


            return $this->redirectToRoute('departments-list');
        }




    }

    public function loclistAction()
    {
        $session = new Session();
        $empid =  $session->get('empid');
        $repositoryteam = $this->getDoctrine()->getRepository(Locations::class);
        $location = $repositoryteam->findAll();

        return $this->render('@PfaProject/admin/location-list.html.twig', array('location'=>$location));


    }

    public function swaggerAction()
    {
    }

    public function teamAction()
    {
    }


    public function emplistAction()
    {
        $repositoryteam = $this->getDoctrine()->getRepository(Employees::class);
        $employees = $repositoryteam->findAll();




        return $this->render('@PfaProject/admin/employees-list.html.twig', array('employees'=>$employees));



    }

    public function deptlistAction()
    {
        $repositoryteam = $this->getDoctrine()->getRepository(Departments::class);
        $department = $repositoryteam->findAll();

        return $this->render('@PfaProject/admin/department-list.html.twig', array('department'=>$department));

    }

    public function editemppersistAction(Request $request,$id)
    {

        if ($request->getMethod("POST")) {

            $firstname = $request->get("firstname");
            $lastname = $request->get("lastname");
            $job = $request->get("job");
            $managerid = $request->get("managerid");
            $hiredate = $request->get("Hiredate");
            $salary = $request->get("salary");
            $phone = $request->get("phone");
            $deptid = $request->get("deptid");


            $repositoryofmanager = $this->getDoctrine()->getRepository("PfaProjectBundle:Employees");
            $manager =  $repositoryofmanager->findOneBy(["employeeId"=> $managerid ]);

            $repositorofdeprtment = $this->getDoctrine()->getRepository("PfaProjectBundle:Departments");
            $department = $repositorofdeprtment->findOneBy(["departmentId"=> $deptid ]);
            $entityManager = $this->getDoctrine()->getManager();
            $employee = $entityManager->getRepository(Employees::class)->find($id);



$employee->setFirstName($firstname);
$employee->setLastName($lastname);
$employee->setJob($job);
$employee->setSalary($salary);
$employee->setPhone($phone);
$employee->setManager($manager);
$employee->setDepartment($department);
$employee->setHiredate(new \DateTime($hiredate));

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($employee);
            $entityManager->flush();


            return $this->redirectToRoute('employees-list');

        }






















    }

    public function persistlocationAction(Request $request,$id)
    {

        $repo = $this->getDoctrine()->getRepository(Locations::class);
        $locid = $repo->findOneBy(
            ['locationId' => 1]
        );
        if ($request->getMethod("POST")) {

            $adr = $request->get("adr");
            $postalCode = $request->get("postalCode");
            $city = $request->get("city");

            $entityManager = $this->getDoctrine()->getManager();
            $Locations = $entityManager->getRepository(Locations::class)->find($id);
            $Locations->setAdr($adr);
            $Locations->setCity($city);
            $Locations->setPostalCode($postalCode);
            $entityManager->flush();


            return $this->redirectToRoute('locations-list');

        }













    }


    public function addperlocationAction(Request $request)
    {



        if ($request->getMethod("POST")) {

            $adr = $request->get("adr");
            $postalCode = $request->get("postalCode");
            $city = $request->get("city");



            $Location = new Locations();
            $Location->setAdr($adr);
            $Location->setCity($city);
            $Location->setPostalCode($postalCode);


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($Location);
            $entityManager->flush();


            return $this->redirectToRoute('locations-list');

        }
    }

    public function aditempAction($id)
    {
        $repositoryteam = $this->getDoctrine()->getRepository(Employees::class);
        $Employee = $repositoryteam->findOneBy(["employeeId"=> $id]);
        return $this->render('@PfaProject/admin/employees-edit.html.twig', array('employee'=>$Employee, 'id'=>$id));

    }

    public function addempAction()
    {
    }

}