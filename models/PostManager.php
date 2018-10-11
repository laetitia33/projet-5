<?php

namespace Laetitia_Bernardi\projet5\Model;

require_once("models/Manager.php");
use \DateTime;
use \PDO;


class PostManager extends Manager
{

    private $_id, $_title, $_author, $_content, $_date_creation, $_image, $_video, $_horaires, $_duree;


    public function __construct()
    {
        $this->_date_creation = new \DateTime('now');
    }


    public function getId()
    {
        return $this->_post_id;
    }

    public function getTitle()
    {
        return $this->_title;
    }

    public function getHoraires()
    {
        return $this->_horaires;
    }
 
    public function getDuree()
    {
        return $this->_duree;
    }

     public function getImage()
    {
        return $this->_image;
    }

    public function getVideo()
    {
        return $this->_video;
    }

    public function getAuthor()
    {
        return $this->_author;
    }

    public function getContent()
    {
        return $this->_content;
    }

    public function getDateCreation()
    {
        return $this->_date_creation;
    }

    public function setId($post_id)
    {
        $post_id = (int) $post_id;
        if($post_id > 0){
            $this->_post_id = $post_id;
        }
    }

    public function setTitle($title)
    {
        if(is_string($title)) {
            $this->_title = $title;
        }
    }

    public function setImage($image)
    {
        if(is_string($image)) {
            $this->_image = $image;
        }
    }

    public function setVideo($video)
    {
        if(is_string($video)) {
            $this->_video = $video;
        }
    }

    public function setAuthor($author)
    {
        if(is_string($author)) {
            $this->_author = $author;
        }
    }

    public function setHoraires($horaires)
    {
        if(is_string($horaires)) {
            $this->_horaires = $horaires;
        }
    }

    public function setDuree($duree)
    {
        if(is_string($duree)) {
            $this->_duree = $duree;
        }
    }
    public function setContent($content)
    {
        if(is_string($content)) {
            $this->_content = $content;
        }
    }

    public function setCreationDate(DateTime $date_creation)
    {
        $this->_date_creation= $date_creation;
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//fin getters et setters


//récupère le dernier film
    public function getLastPost()
    {
        $db = $this->dbConnect();

        $post = $db->query('SELECT id, title, image,TIME_FORMAT (duree,\'%H:%i\')AS duree, TIME_FORMAT (horaires,\'%H:%i\')AS horaires ,video,content,author, DATE_FORMAT(date_creation, \'%d/%m/%Y à %H:%i\') AS date_creation_fr FROM posts ORDER BY date_creation DESC LIMIT 0, 1');
        return $post;
    }




//récupère tous les films
    public function getAllPosts()
    {
        $db = $this->dbConnect();

        $req = $db->query('SELECT  TIME_FORMAT (b.horaires,\'%H:%i\')AS horaires ,TIME_FORMAT (b.duree,\'%H:%i\')AS duree,b.id, b.title, b.content, b.author,b.video, b.image, DATE_FORMAT(b.date_creation, \'%d/%m/%Y à %Hh%imin\') AS date_creation_fr, (SELECT count(*) FROM comments c WHERE c.post_id = b.id) AS nbCommentaires FROM posts b ORDER BY date_creation DESC ');

        return $req;
    }


//nombre le nombre de films
    public function countPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT COUNT(*) AS total_posts FROM posts');
        $req->execute();
        $postsTotal = $req->fetch();
        return $postsTotal;
    }

//recupere un film
    public function getPost($post_id)
    {
        $this->setId($post_id);
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title,TIME_FORMAT (horaires,\'%H:%i\')AS horaires, image,video, TIME_FORMAT (duree,\'%H:%i\')AS duree,content,author, DATE_FORMAT(date_creation, \'%d/%m/%Y à %H:%i\') AS date_creation_fr FROM posts WHERE id = ?');
        $req->execute(array($this->getId()));
        $post = $req->fetch();

        return $post;
    }

//creation d'un film
    public function createPost($author, $title,$horaires,$duree, $image,$video, $content)
    {
        $this->setAuthor($author);
        $this->setTitle($title);
        $this->setHoraires($horaires);
        $this->setDuree($duree);
        $this->setImage($image);
        $this->setVideo($video);
        $this->setContent($content);

        $db = $this->dbConnect();
        $post = $db->prepare('INSERT INTO posts (author, title,horaires,duree,image,video, content, date_creation) VALUES ( ?,?,?,?,?, ?, ?, NOW())');
        $createPost = $post->execute(array(
            $this->getAuthor(),
            $this->getTitle(),
            $this->getHoraires(),
            $this->getDuree(),
            $this->getImage(),
            $this->getVideo(),
            $this->getContent()
            ));

        return $createPost;
    }

//modification du film
  public function updatePost($post_id, $author, $title,$horaires,$duree, $image,$video, $content )
    {
        $this->setId($post_id);
        $this->setAuthor($author);
        $this->setTitle($title);
        $this->setHoraires($horaires);
        $this->setDuree($duree);
        $this->setImage($image);
        $this->setVideo($video);
        $this->setContent($content);
            
        $db = $this->dbConnect();
        $post = $db->prepare('UPDATE posts SET  title= :title, author= :author, video= :video, horaires= :horaires,duree= :duree,image= :image,content= :content WHERE id= :post_id');
        $post->bindValue('author', $this->getAuthor(), PDO::PARAM_STR);
        $post->bindValue('title',$this->getTitle(), PDO::PARAM_STR);
        $post->bindValue('horaires', $this->getHoraires(), PDO::PARAM_INT);
        $post->bindValue('duree', $this->getDuree(), PDO::PARAM_INT);
        $post->bindValue('image', $this->getImage(), PDO::PARAM_INT);
        $post->bindValue('video', $this->getVideo(), PDO::PARAM_INT);
        $post->bindValue('content',$this->getContent(), PDO::PARAM_STR);
        $post->bindValue('post_id', $this->getId(), PDO::PARAM_INT);
      
        $updatePost = $post->execute();

        return $updatePost;
    }


//suppression d'un film
    public function deletePost($post_id)
    {
        $this->setId($post_id);

        $db = $this->dbConnect();
        $post = $db->prepare('DELETE FROM posts WHERE id= ?');
        $deletePost = $post->execute(array($this->getId()));

        return $deletePost;
    }
}