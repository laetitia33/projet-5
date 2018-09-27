<?php

namespace Laetitia_Bernardi\projet5\Model;

require_once("models/Manager.php");
use \DateTime;
use \PDO;


class PostManager extends Manager
{

    private $_id, $_title,$_author,$c_ontent, $_date_creation;


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

   
    public function setAuthor($author)
    {
        if(is_string($author)) {
            $this->_author = $author;
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


//récupère le dernier article
    public function getLastPost()
    {
        $db = $this->dbConnect();

        $post = $db->query('SELECT id, title, content,author, DATE_FORMAT(date_creation, \'%d/%m/%Y à %H:%i:%s\') AS date_creation_fr FROM posts ORDER BY date_creation DESC LIMIT 0, 1');
        return $post;
    }




//récupère tous les articles
    public function getAllPosts()
    {
        $db = $this->dbConnect();

        $req = $db->query('SELECT b.id, b.title, b.content, b.author, DATE_FORMAT(b.date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr, (SELECT count(*) FROM comments c WHERE c.post_id = b.id) AS nbCommentaires FROM posts b ORDER BY date_creation DESC ');

        return $req;
    }


//nombre le nombre de chapitre
    public function countPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT COUNT(*) AS total_posts FROM posts');
        $req->execute();
        $postsTotal = $req->fetch();
        return $postsTotal;
    }

//recupere un chapitre
    public function getPost($post_id)
    {
        $this->setId($post_id);
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content,author, DATE_FORMAT(date_creation, \'%d/%m/%Y à %H:%i:%s\') AS date_creation_fr FROM posts WHERE id = ?');
        $req->execute(array($this->getId()));
        $post = $req->fetch();

        return $post;
    }

//creation d'un chapitre
    public function createPost($author, $title, $content)
    {
        $this->setAuthor($author);
        $this->setTitle($title);
        $this->setContent($content);

        $db = $this->dbConnect();
        $post = $db->prepare('INSERT INTO posts (author, title, content, date_creation) VALUES ( ?, ?, ?, NOW())');
        $createPost = $post->execute(array(
            $this->getAuthor(),
            $this->getTitle(),
            $this->getContent()
            ));

        return $createPost;
    }

//modification de l'article
  public function updatePost($post_id, $author, $title, $content)
    {
        $this->setId($post_id);
        $this->setAuthor($author);
        $this->setTitle($title);
        $this->setContent($content);
        $db = $this->dbConnect();
        $post = $db->prepare('UPDATE posts SET title= :title, author= :author, content= :content WHERE id= :post_id');
        $post->bindValue('title',$this->getTitle(), PDO::PARAM_STR);
        $post->bindValue('author', $this->getAuthor(), PDO::PARAM_STR);
        $post->bindValue('content',$this->getContent(), PDO::PARAM_STR);
        $post->bindValue('post_id', $this->getId(), PDO::PARAM_INT);
        $updatePost = $post->execute();

        return $updatePost;
    }


//suppression d'un article
    public function deletePost($post_id)
    {
        $this->setId($post_id);

        $db = $this->dbConnect();
        $post = $db->prepare('DELETE FROM posts WHERE id= ?');
        $deletePost = $post->execute(array($this->getId()));

        return $deletePost;
    }
}