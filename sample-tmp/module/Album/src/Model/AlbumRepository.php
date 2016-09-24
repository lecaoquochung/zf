<?php
namespace Album\Model;

class AlbumRepository implements AlbumRepositoryInterface
{
    private $data = [
        1 => [
            'id'    => 1,
            'artist' => 'Adele',
            'title'  => 'Hello',
        ],
        2 => [
            'id'    => 2,
            'artist' => 'Lionel Richie',
            'title'  => 'Hello',
        ],
    ];

    /**
    * {@inheritDoc}
    */
   public function findAllAlbums()
   {
       return array_map(function ($album) {
           return new Album(
               $album['title'],
               $album['artist'],
               $album['id']
           );
       }, $this->data);
   }

   /**
    * {@inheritDoc}
    */
   public function findAlbum($id)
   {
       if (! isset($this->data[$id])) {
           throw new DomainException(sprintf('Album by id "%s" not found', $id));
       }

       return new Album(
           $this->data[$id]['title'],
           $this->data[$id]['artist'],
           $this->data[$id]['id']
       );
   }
}