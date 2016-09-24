<?php
namespace Album\Model;

interface AlbumRepositoryInterface
{
    /**
     * Return a set of all blog posts that we can iterate over.
     *
     * Each entry should be a Post instance.
     *
     * @return Post[]
     */
    public function findAllAlbums();

    /**
     * Return a single blog post.
     *
     * @param  int $id Identifier of the post to return.
     * @return Post
     */
    public function findAlbum($id);
}
