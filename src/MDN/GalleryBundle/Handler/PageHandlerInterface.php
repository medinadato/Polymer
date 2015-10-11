<?php
namespace MDN\GalleryBundle\Handler;

use MDN\GalleryBundle\Model\PageInterface;

interface PageHandlerInterface
{
    /**
     * Get a Page given the identifier
     *
     * @api
     *
     * @param mixed $id
     *
     * @return PageInterface
     */
    public function get($id);

    /**
     * Get all pages
     *
     * @api
     *
     * @return PageInterface
     */
    public function getAll();
}