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


class UserController extends Controller
{
  public function getProjectByUser()
  {

  }
}


