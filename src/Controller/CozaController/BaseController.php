<?php

namespace App\Controller\CozaController;

use App\Repository\MenuEntityRepository;
use App\Repository\SystemEntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController
{
    private $systemEntity;

    private $mainMenuEntity;


    public function __construct(SystemEntityRepository $systemEntityRepository, MenuEntityRepository $menuEntityRepository)
    {
        $this->systemEntity = $systemEntityRepository->find(1);

        $this->mainMenuEntity = $menuEntityRepository->findOneBy(array("menuAlias" => "main"));
    }

    /**
     * @return \App\Entity\SystemEntity|null
     */
    public function getSystemEntity(): ?\App\Entity\SystemEntity
    {
        return $this->systemEntity;
    }

    /**
     * @return \App\Entity\MenuEntity|null
     */
    public function getMainMenuEntity(): ?\App\Entity\MenuEntity
    {
        return $this->mainMenuEntity;
    }

}
