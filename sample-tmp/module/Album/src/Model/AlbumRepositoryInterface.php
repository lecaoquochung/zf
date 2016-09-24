<?php
namespace Album\Model;

interface AlbumRepositoryInterface
{
    /**
     * Return a set of all Albums that we can iterate over.
     *
     * Each entry should be a Album instance.
     *
     * @return Album[]
     */
    public function findAllAlbums();

    /**
     * Return a single album.
     *
     * @param  int $id Identifier of the album to return.
     * @return Album
     */
    public function findAlbum($id);
}