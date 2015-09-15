<?php

namespace Victoire\Bundle\BusinessPageBundle\Manager;

use Doctrine\ORM\EntityManager;
use Victoire\Bundle\BlogBundle\Entity\Article;
use Victoire\Bundle\BusinessPageBundle\Entity\BusinessPage;
use Victoire\Bundle\BusinessPageBundle\Entity\VirtualBusinessPage;
use Victoire\Bundle\BusinessPageBundle\Manager\Interfaces\VirtualBusinessPageReferenceBuilderInterface;
use Victoire\Bundle\CoreBundle\Entity\View;
use Victoire\Bundle\CoreBundle\Manager\BaseReferenceBuilder;
use Victoire\Bundle\CoreBundle\Manager\Interfaces\ReferenceBuilderInterface;

/**
* VirtualBusinessPageReferenceBuilder
*/
class VirtualBusinessPageReferenceBuilder extends BaseReferenceBuilder
{
    public function buildReference(View $view, EntityManager $em)
    {

        $referenceId = $this->viewReferenceHelper->getViewReferenceId($view);
        $viewsReference[] = array(
            'id'              => $referenceId,
            'locale'          => $view->getLocale(),
            'patternId'       => $view->getTemplate()->getId(),
            'url'             => $view->getUrl(),
            'name'            => $view->getName(),
            'entityId'        => $view->getBusinessEntity()->getId(),
            'entityNamespace' => get_class($view->getBusinessEntity()),
            'viewNamespace'   => get_class($view),
            'type'            => $view::TYPE,
            'view'            => $view,
        );

        return $viewsReference;
    }
}
