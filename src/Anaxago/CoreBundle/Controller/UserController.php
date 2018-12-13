<?php
/**
 * Created by PhpStorm.
 * User: clem
 * Date: 11/12/18
 * Time: 18:45
 */

namespace Anaxago\CoreBundle\Controller;


use Anaxago\CoreBundle\Entity\Project;
use Anaxago\CoreBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use FOS\RestBundle\Controller\Annotations\Get;
use Symfony\Component\HttpFoundation\Response;




class UserController extends Controller
{
    /**
     * @return User
     */
    public function getUser()
    {
        return parent::getUser();
    }

    /**
     * @Rest\Post("/interest/{project}")
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     */
    public function setInterestForProjectAction(Request $request, Project $project)
    {

        $price = $request->request->get('value');

        $em = $this->get('doctrine.orm.entity_manager');
        $em->persist($this->getUser()->addInteressedProject($project, $price));
        $em->flush();
    }

    /**
     * @Get("/interestByUser")
     */
    public function getInterestByUserAction(Request $request)
    {

    }
}


