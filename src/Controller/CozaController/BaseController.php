<?php

namespace App\Controller\CozaController;

use App\Repository\MenuEntityRepository;
use App\Repository\SystemEntityRepository;
use App\Repository\TaxonomyTypeEntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController
{
    private $systemEntity;

    private $mainMenuEntity;

    private $taxonomyTypeEntityRepo;

    public function __construct(SystemEntityRepository $systemEntityRepository,
                                TaxonomyTypeEntityRepository $taxonomyTypeEntityRepository,
                                MenuEntityRepository $menuEntityRepository)
    {
        $this->taxonomyTypeEntityRepo = $taxonomyTypeEntityRepository;

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

    /**
     * 查找某个分类标签下的所有分类词汇,先通过别名找到TaxonomyTypeEntity再获取所有的TaxonomyEntity;
     * 参数：
     * $taxonomyTypeAlias: TaxonomyTypeEntity 的别名
     */
    public function getTaxonomyEntities(string $taxonomyTypeAlias){
        $taxonomyTypeEntity = $this->taxonomyTypeEntityRepo->findOneBy(array("taxonomyAlias" => $taxonomyTypeAlias));

        /**@var TaxonomyEntity[] $taxonomyEntities**/
        $taxonomyEntities = $taxonomyTypeEntity->getTaxonomyEntitys();

        return $taxonomyEntities;
    }
}
