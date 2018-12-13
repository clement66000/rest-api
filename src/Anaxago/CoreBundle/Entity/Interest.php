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
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Anaxago\CoreBundle\Entity\User", inversedBy="interest")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Anaxago\CoreBundle\Entity\Project")
     */
    private $project;

    /**
     * @var float
     * @ORM\Column(type="float")
     */
    private $InvestMoney;

    public function __construct($user, $project, $InvestMoney)
    {
        $this->setUser($user);
        $this->setProject($project);
//        dump($InvestMoney);
//        die;
        $this->setInvestMoney($InvestMoney);
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return $this
     */
    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param mixed $project
     */
    public function setProject(Project $project): void
    {
        $this->project = $project;
    }

    /**
     * @return float
     */
    public function getInvestMoney(): float
    {
        return $this->InvestMoney;
    }

    /**
     * @param float $InvestMoney
     */
    public function setInvestMoney(float $InvestMoney): void
    {
        $this->InvestMoney = $InvestMoney;
    }
}

