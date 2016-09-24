<?php
namespace Album\Controller;

use Album\Model\AlbumRepositoryInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AlbumController extends AbstractActionController
{
    private $albumRepository;

    public function __construct(AlbumRepositoryInterface $albumRepository)
    {
        $this->albumRepository = $albumRepository;
    }

    public function indexAction()
    {
        return new ViewModel([
           'albums' => $this->albumRepository->findAllAlbums(),
       ]);
    }

    public function addAction()
    {
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
}
