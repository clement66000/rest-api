<?php
/**
 * Created by PhpStorm.
 * User: clem
 * Date: 11/12/18
 * Time: 18:45
 */

namespace Anaxago\CoreBundle\Controller;


use Anaxago\CoreBundle\Repository\ProjectRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Anaxago\CoreBundle\Entity\Project;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;


class ProjectController extends Controller
{
    /**
     * @Get("/projects")
     */
    public function getProjectListAction(Request $request)
    {
        $projects = $this->get('doctrine.orm.entity_manager')
            ->getRepository(Project::class)
            ->findAll();
        /* @var $project Project[] */

        $formatted = [];
        foreach ($projects as $project) {
            $formatted[] = [
                'id' => $project->getId(),
                'title' => $project->getTitle(),
                'slug' => $project->getSlug(),
                'description' => $project->getDescription(),
                'status' => $project->getStatus()
            ];
        }

        return new JsonResponse($formatted);
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/projects")
     */
    public function postProjectAction(Request $request)
    {
        $project = new Project();

        $project->setTitle($request->get('title'))
            ->setSlug($request->get('slug'))
            ->setDescription($request->get('description'));

        $em = $this->get('doctrine.orm.entity_manager');
        $em->persist($project);
        $em->flush();

        return $project;
    }
}


