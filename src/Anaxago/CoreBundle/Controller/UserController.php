<?php


namespace Anaxago\CoreBundle\Controller;


use Anaxago\CoreBundle\Entity\Interest;
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

        if ($this->getUser()) {
            $price = $request->request->get('value');

            if ($project->getTotalAmount() != null) {

                $project->setTotalAmount($project->getTotalAmount() + $price);
                $em = $this->get('doctrine.orm.entity_manager');
                $em->persist($this->getUser()->addInteressedProject($project, $price));
                $em->flush();
            }
            else {
                $project->setTotalAmount($price);
                $em = $this->get('doctrine.orm.entity_manager');
                $em->persist($this->getUser()->addInteressedProject($project, $price));
                $em->flush();

            }
        }
        else {
            throw $this->createNotFoundException('Connectez-vous ou inscrivez vous !');
        }
    }

    /**
     * @Get("/interestByUser")
     */
    public function getInterestByUserAction(Request $request)
    {
        $interests = $this->getDoctrine()->getRepository(Interest::class)
            ->findAll();

        $formatted = [];
        foreach ($interests as $interest) {
            if ($this->getUser() && ($interest->getInvestMoney() != null)) {
                $formatted[] = [
                    'user' => $this->getUser()->getFirstName(),
                    'id' => $interest->getId(),
                    'project' => $interest->getProject()->getTitle(),
                    'invest-money' => $interest->getInvestMoney()
                ];
            }
        }
        return new JsonResponse($formatted);
    }
}


