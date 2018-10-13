<?php
namespace Laetitia_Bernardi\projet5\Model;

use \DateTime;
use \PDO;

class CommentManager extends Manager
{


private $_id, $_post_id, $_author, $_comment, $_comment_date, $_reporting;


   public function __construct()
    {
        $this->_comment_date = new DateTime('now');
        
    }

    public function getIdComment()
    {
        return $this->_id_comment;
    }

 
    public function getIdPost()
    {
        return $this->_post_id;
    }


    public function getAuthor()
    {
        return $this->_author;
    }

 
    public function getComment()
    {
        return $this->_comment;
    }

   
    public function getCommentDate()
    {
        return $this->_comment_date;
    }

   
    public function getReporting()
    {
        return $this->_reporting;
    }


    public function setIdComment($id_comment)
    {
        $id_comment = (int) $id_comment;

        if ($id_comment > 0) {
            $this->_id_comment = $id_comment;
        }
    }
 
    public function setIdPost($post_id)
    {
        $post_id = (int) $post_id;

        if ($post_id > 0) {
            $this->_post_id = $post_id;
        }
    }
 
    public function setAuthor($author)
    {
        if(is_string($author)) {
            $this->_author = $author;
        }
    }
   
    public function setComment($comment)
    {
        if(is_string($comment)) {
            $this->_comment = $comment;
        }
    }
  
    public function setCommentDate(DateTime $comment_date)
    {
        $this->_comment_date = $comment_date;
    }
  
    public function setReporting($reporting)
    {
        $this->_reporting = $reporting;
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//fin de getters et setters

// dernier commentaire
    public function getLastComment()
    {
        $db = $this->dbConnect();
        $comment = $db->query('SELECT author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %H:%i\') AS comment_date_fr FROM comments ORDER BY comment_date DESC LIMIT 0, 1');
        return $comment;
    }

//tous les commentaires
    public function getAllComments()
    {
        $db = $this->dbConnect();
        $comments = $db->query('SELECT id, post_id, author, comment, reporting, DATE_FORMAT(comment_date, \'%d/%m/%Y à %H:%i\') AS comment_date_fr FROM comments ORDER BY comment_date DESC LIMIT 0,10');
        return $comments;
    }


//nombre de commentaires
    public function countComments()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT COUNT(*) AS total_comments FROM comments');
        $req->execute();
        $commentsTotal = $req->fetch();
        return $commentsTotal;
    }


//commentaires signalés par date
    public function getReportComments()
    {
        $db = $this->dbConnect();

        $reportComments = $db->query('SELECT id, post_id, author, comment, reporting, DATE_FORMAT(comment_date, \'%d/%m/%Y à %H:%i\') AS comment_date_fr FROM comments WHERE reporting= 1 ORDER BY comment_date DESC LIMIT 0,10');
        return $reportComments;
    }

//nombre de commentaires signalés   
    public function countCommentsReport()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT COUNT(*) AS total_comments_report FROM comments WHERE reporting = 1');
        $req->execute();
        $commentsReportTotal = $req->fetch();
        return $commentsReportTotal;
    }

//signaler commentaire
    public function reportComment($id_comment)
    {
        $this->setIdComment($id_comment);

        $db = $this->dbConnect();

        $comments = $db->prepare('UPDATE comments SET reporting= :reporting WHERE id= :id_comment');
        $comments->bindValue(':reporting', 1, \PDO::PARAM_INT);
        $comments->bindValue(':id_comment', $this->getIdComment(), \PDO::PARAM_INT);
        $report = $comments->execute();
        
        return $report;
    }
     
//valider tous les commentaires en retirant leur signalement

    public function approvedComments()
    {
       
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET reporting= :reporting ');
        $comments->bindValue(':reporting', 0, \PDO::PARAM_INT);
   
        $report = $comments->execute();
    
        return $report;
    }

//Valider un commentaire en retirant son signalement
    public function approvedComment($id_comment)
    {
        $this->setIdComment($id_comment);

        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET reporting= :reporting WHERE id= :id_comment');
        $comments->bindValue(':reporting', 0, \PDO::PARAM_INT);
        $comments->bindValue(':id_comment', $this->getIdComment(), \PDO::PARAM_INT);
        $report = $comments->execute();
    
        return $report;
    }

 

//recupere les commentaires d'un chapitre 
    public function getComments($post_id)
    {
        $this->setIdPost($post_id);

        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, reporting, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC LIMIT 0,6');
        $comments->execute(array($this->getIdPost()));

        return $comments;
    }


//envoi d'un commentaire
    public function createComment($post_id, $author, $comment)
    {
        $this->setIdPost($post_id);
        $this->setAuthor($author);
        $this->setComment($comment);

        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments (post_id, author, comment, comment_date) VALUES( ?, ?, ?, NOW())');
        $createComment = $comments->execute(array(
            $this->getIdPost(),
            $this->getAuthor(),
            $this->getComment()
        ));
        return $createComment;
    }

//suppression commentaire
    public function deleteComment($id_comment)
    {
        $this->setIdComment($id_comment);

        $db = $this->dbConnect();
        $comment = $db->prepare('DELETE FROM comments WHERE id= ?');
        $deleteComment = $comment->execute(array($this->getIdComment()));

        return $deleteComment;
    }

//suppression tous les commentaires signalés
    public function deleteCommentsReport()
    {
     

        $db = $this->dbConnect();
        $comments = $db->prepare('DELETE  FROM comments WHERE reporting = 1');
        $deleteAllCommentReport = $comments->execute();

        return $deleteAllCommentReport;
    }

//suppression de tous les commentaires
    public function deleteAllComments()
    {
        
        $db = $this->dbConnect();
        $comments = $db->prepare('DELETE FROM comments ');
        $deleteComments = $comments->execute();

        return $deleteComments;
    }


    
}
