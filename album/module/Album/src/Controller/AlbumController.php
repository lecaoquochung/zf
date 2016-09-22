<?php
namespace Album\Controller;

// use Zend\Db\Adapter\AdapterInterface;
use Album\Model\AlbumRepositoryInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AlbumController extends AbstractActionController
{
    /**
     * @var AlbumRepositoryInterface
     */
    private $albumRepository;

    public function __construct(AlbumRepositoryInterface $albumRepository)
    {
        $this->albumRepository = $albumRepository;
    }

    // index
    public function indexAction()
    {
        return new ViewModel(array(
             'albums' => $this->table->fetchAll(),
         ));
    }

    // add
    public function addAction()
    {
    }

    // edit
    public function editAction()
    {
    }

    // delete
    public function deleteAction()
    {
    }
}
