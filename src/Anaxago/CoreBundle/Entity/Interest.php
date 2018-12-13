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

    /**
     * @var float
     */
    private $InvestMoney;

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param mixed $project
     */
    public function setProject($project): void
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

