<?php

namespace MDN\GalleryBundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;
use MDN\GalleryBundle\Model\PageInterface;

class PageHandler implements PageHandlerInterface
{
    private $om;
    private $entityClass;
    private $repository;

    public function __construct(ObjectManager $om, $entityClass)
    {
        $this->om = $om;
        $this->entityClass = $entityClass;
        $this->repository = $this->om->getRepository($this->entityClass);
    }

    /**
     * Get a Page.
     *
     * @param mixed $id
     *
     * @return PageInterface
     */
    public function get($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Get pages
     *
     * @return PageInterface
     */
    public function getAll()
    {
        return $this->repository->findAll();
    }

    private function createPage()
    {
         return new $this->entityClass();
    }

}