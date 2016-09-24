<?php 
namespace Album\Model;

class Album
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $artist;

    /**
     * @var string
     */
    private $title;

    /**
     * @param string $title
     * @param string $artist
     * @param int|null $id
     */
    public function __construct($title, $artist, $id = null)
    {
        $this->title = $title;
        $this->artist = $artist;
        $this->id = $id;
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}

// <?php
// namespace Album\Model;

// class Album
// {
//     public $id;
//     public $artist;
//     public $title;

//     public function exchangeArray(array $data)
//     {
//         $this->id     = !empty($data['id']) ? $data['id'] : null;
//         $this->artist = !empty($data['artist']) ? $data['artist'] : null;
//         $this->title  = !empty($data['title']) ? $data['title'] : null;
//     }
// }
