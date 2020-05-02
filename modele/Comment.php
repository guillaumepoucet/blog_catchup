<?php 

require_once('BDDRequest.php');

class Comment extends BDDRequest {

    function getComments($post_id) {
   
        $sql = 'SELECT C.*, 
                U.user_lastname, 
                U.user_firstname,
                U.user_photo_url
                FROM t_comments C
                LEFT JOIN t_users U 
                    ON C.user_id = U.user_id
                WHERE post_id = ?
                ORDER BY C.comment_date DESC';
        $comments = $this->executeRequest($sql, array($post_id));
    
        return $comments->fetchAll();
    }

    public function deleteComment($comment_id) {

        $sql = 'DELETE FROM t_comments WHERE comment_id = ?';
        $comment = $this->executeRequest($sql, array($comment_id));

        return $comment;

    }

    public function addComment($post_id) {

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

}