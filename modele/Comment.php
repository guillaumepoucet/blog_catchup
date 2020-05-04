<?php

require_once('BDDRequest.php');

class Comment extends BDDRequest
{

    function getComments($post_id)
    {

        $sql = 'SELECT C.*, 
                U.user_lastname, 
                U.user_firstname,
                U.user_photo_url
                FROM t_comments C
                LEFT JOIN t_users U 
                    ON C.user_id = U.user_id
                WHERE post_id = ?
                AND C.comment_activated = 1
                ORDER BY C.comment_date DESC';
        $comments = $this->executeRequest($sql, array($post_id));

        return $comments->fetchAll();
    }

    public function getComment($comment_id)
    {
        $sql = 'SELECT * FROM t_comments WHERE comment_id = ?';
        $comment = $this->executeRequest($sql, array($comment_id));

        return $comment;
    }

    public function getArchiveComments()
    {
        $sql = 'SELECT  C.*,
                        A.*,
                        U.user_lastname, U.user_firstname 
                FROM t_comment_archives A
                LEFT JOIN t_comments C
                    ON C.comment_id = A.comment_id
                LEFT JOIN t_users U
                    ON U.user_id = A.user_id';
        $comments = $this->executeRequest($sql);

        return $comments->fetchAll();
    }

    public function deleteComment($comment_id)
    {

        $sql = 'DELETE FROM t_comments WHERE comment_id = ?';
        $comment = $this->executeRequest($sql, array($comment_id));

        return $comment;
    }

    public function archiveComment($comment_id)
    {
        $sql = 'UPDATE t_comments SET comment_activated = 0 WHERE comment_id = ?';
        $act = $this->executeRequest($sql, array($comment_id));
        if ($act) {
            $comment = $this->getComment($comment_id);
            $date = date('Y-m-d H:i:s');
            $sql = 'INSERT INTO t_comment_archives (comment_archive_date, user_id, comment_id)
                    VALUES (:comment_archive_date, :user_id, :comment_id)';
            $setArchive = $this->executeRequest($sql, array(
                'comment_archive_date' => $date,
                'user_id' => $_SESSION['user_id'],
                'comment_id' => $comment_id
            ));
            return $setArchive;
        } else {
            throw new Exception("Le commentaire n'a pu être archivé.");
        }
    }

    public function addComment($post_id)
    {

        $comment_content = !empty($_POST['comment']) ? $_POST['comment'] : NULL;
        $user_id = $_SESSION['user_id'];
        $comment_date = date('Y-m-d H:i:s');

        $sql = 'INSERT INTO t_comments (comment_content, comment_date, post_id, user_id)
                VALUES (:comment_content, :comment_date, :post_id, :user_id)';

        $comment = $this->executeRequest($sql, array(
            'comment_content' => $comment_content,
            'comment_date' => $comment_date,
            'post_id' => $post_id,
            'user_id' => $user_id
        ));

        return $comment;
    }

    public function deleteArchiveComment($comment_id)
    {
        $sql = 'DELETE FROM t_comment_archives WHERE comment_id = ?';
        $delete = $this->executeRequest($sql, array($comment_id));
        
        if($delete) {
            $sql = 'DELETE FROM t_comments WHERE comment_id = ?';
            $deleteComment = $this->executeRequest($sql, array($comment_id));
            return $deleteComment;
        } else {
            throw new Exception("Le commentaire n'a pu être supprimé.");
        } 
    }
}
