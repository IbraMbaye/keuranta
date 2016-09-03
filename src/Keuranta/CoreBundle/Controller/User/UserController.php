<?php

namespace Keuranta\CoreBundle\Controller\User;

use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\View\View as FOSRestView;
use FOS\UserBundle\Model\GroupInterface;
use JMS\Serializer\SerializationContext;
use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\RestBundle\View\ViewHandlerInterface;

class UserController extends FOSRestController
{
    /**
     * Returns a paginated list of users.
     *
     * @ApiDoc(
     *  resource=true,
     *  output={"class"="Keuranta\CoreBundle\Entity\User\User", "groups"="sonata_api_read"}
     * )
     *
     * @QueryParam(name="page", requirements="\d+", default="1", description="Page for users list pagination (1-indexed)")
     * @QueryParam(name="count", requirements="\d+", default="10", description="Number of users by page")
     * @QueryParam(name="orderBy", requirements="ASC|DESC", nullable=true, strict=true, description="Query users order by clause (key is field, value is direction")
     * @QueryParam(name="enabled", requirements="0|1", nullable=true, strict=true, description="Enabled/disabled users only?")
     * @QueryParam(name="locked", requirements="0|1", nullable=true, strict=true, description="Locked/Non-locked users only?")
     *
     * @View(serializerGroups="sonata_api_read", serializerEnableMaxDepthChecks=true)
     *
     * @param ParamFetcherInterface $paramFetcher
     *
     * @return PagerInterface
     */
    public function getUsersAction()
    {
        
        $view = $this->view($data, 200)
        ;

        return $this->handleView($view);
    }
}