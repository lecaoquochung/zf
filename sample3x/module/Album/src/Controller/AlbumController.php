<?php
namespace Album\Controller;

use Album\Model\Album;
use Album\Model\AlbumTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\ServiceManager\ServiceManager;

// $albumTable = new TableGateway('album', $adapter);
// $table = new AlbumTableGateway();


class AlbumController extends AbstractActionController
{
    private $table;

    // public function __construct(AlbumTable $table)
    // {
    //     $this->table = $table;
    // }

    public function indexAction()
    {
        // return new ViewModel([
        //     'albums' => $this->table->fetchAll(),
        // ]);
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
