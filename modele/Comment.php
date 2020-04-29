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
                WHERE post_id = ?';
        $comments = $this->executeRequest($sql, array($post_id));
    
        return $comments->fetchAll();
    }

}