<?php
 // In module/Blog/src/Model/ZendDbSqlRepository.php:
namespace Album\Model;

use InvalidArgumentException;
use RuntimeException;
// Replace the import of the Reflection hydrator with this:
use Zend\Hydrator\HydratorInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Sql;

class ZendDbSqlRepository implements AlbumnRepositoryInterface
{
    /**
     * @var AdapterInterface
     */
    private $db;

    /**
     * @var HydratorInterface
     */
    private $hydrator;

    /**
     * @var Post
     */
    private $albumPrototype;

    public function __construct(
        AdapterInterface $db,
        HydratorInterface $hydrator,
        Album $albumnPrototype
    ) {
        $this->db            = $db;
        $this->hydrator      = $hydrator;
        $this->postPrototype = $albumPrototype;
    }

    /**
     * Return a set of all blog posts that we can iterate over.
     *
     * Each entry should be a Post instance.
     *
     * @return Post[]
     */
    public function findAllAlbums()
    {
        $sql       = new Sql($this->db);
        $select    = $sql->select('albums');
        $statement = $sql->prepareStatementForSqlObject($select);
        $result    = $statement->execute();

        if (! $result instanceof ResultInterface || ! $result->isQueryResult()) {
            return [];
        }

        $resultSet = new HydratingResultSet($this->hydrator, $this->albumPrototype);
        $resultSet->initialize($result);
        return $resultSet;
    }

    /**
     * Return a single blog post.
     *
     * @param  int $id Identifier of the post to return.
     * @return Post
     */
     public function findAlbum($id)
     {
         $sql       = new Sql($this->db);
         $select    = $sql->select('albums');
         $select->where(['id = ?' => $id]);

         $statement = $sql->prepareStatementForSqlObject($select);
         $result    = $statement->execute();

         if (! $result instanceof ResultInterface || ! $result->isQueryResult()) {
             throw new RuntimeException(sprintf(
                 'Failed retrieving blog post with identifier "%s"; unknown database error.',
                 $id
             ));
         }

         $resultSet = new HydratingResultSet($this->hydrator, $this->albumPrototype);
         $resultSet->initialize($result);
         $post = $resultSet->current();

         if (! $post) {
             throw new InvalidArgumentException(sprintf(
                 'Album with identifier "%s" not found.',
                 $id
             ));
         }

         return $post;
     }
}