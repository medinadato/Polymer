<?php

namespace MDN\GalleryBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\Controller\Annotations;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;

use MDN\GalleryBundle\Exception\InvalidFormException;
use MDN\GalleryBundle\Form\PageType;
use MDN\GalleryBundle\Model\PageInterface;


class PageController extends FOSRestController
{

    /**
     * Get single Page,
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Gets a Page for a given id",
     *   output = "MDN\GalleryBundle\Entity\Page",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the page is not found"
     *   }
     * )
     *
     * @Annotations\View(templateVar="page")
     *
     * @param int     $id      the page id
     *
     * @return array
     *
     * @throws NotFoundHttpException when page not exist
     */
    public function getPageAction($id)
    {
        $page = $this->getOr404($id);

        return $page;
    }

    /**
     * Presents the form to use to create a new page.
     *
     * @ApiDoc(
     *   resource = true,
     *   statusCodes = {
     *     200 = "Returned when successful"
     *   }
     * )
     *
     * @Annotations\View()
     *
     * @return FormTypeInterface
     */
    public function newPageAction()
    {
        return $this->createForm(new PageType());
    }

    /**
     * Fetch a Page or throw an 404 Exception.
     *
     * @param mixed $id
     *
     * @return PageInterface
     *
     * @throws NotFoundHttpException
     */
    protected function getOr404($id)
    {
        if (!($page = $this->container->get('mdn_gallery.page.handler')->get($id))) {
            throw new NotFoundHttpException(sprintf('The resource \'%s\' was not found.',$id));
        }

        return $page;
    }

    /**
     * Get All Pages,
     *
     * @ApiDoc(
     *   resource = true,
     *   description = "Gets all Pages",
     *   output = "MDN\GalleryBundle\Entity\Page",
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the page is not found"
     *   }
     * )
     *
     * @Annotations\View(templateVar="pages")
     *
     *
     * @return array
     *
     * @throws NotFoundHttpException when page not exist
     */
    public function pagesAction()
    {
        $pages = $this->getAll();

        return $pages;
    }

    /**
     * Fetch all pages or throw an 404 Exception.
     *
     * @return PageInterface
     *
     * @throws NotFoundHttpException
     */
    protected function getAll()
    {
        if (!($pages = $this->container->get('mdn_gallery.page.handler')->getAll())) {
            throw new NotFoundHttpException(sprintf('No resources found.'));
        }

$callback = $this->getRequest()->get('callback'); // Check to see if callback parameter is in URL
$response = new JsonResponse(); // Construct a new JSON response
if (isset($callback))
  $response->setCallback($callback);  // Set callback function to variable passed in callback
$response->setData($pages);

return $response;

        return $pages;
    }    
}