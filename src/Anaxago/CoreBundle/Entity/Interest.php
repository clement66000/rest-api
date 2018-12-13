<?php

namespace Anaxago\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table(name="interest")
 * @ORM\Entity(repositoryClass="Anaxago\CoreBundle\Repository\InterestRepository")
 */
class Interest
{
    /**
     * @ORM\ManyToOne(targetEntity="Anaxago\CoreBundle\Entity\User")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Anaxago\CoreBundle\Entity\Project")
     */
    private $project;


}

