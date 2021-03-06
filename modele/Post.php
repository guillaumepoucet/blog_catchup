<?php

require_once('BDDRequest.php');

class Post extends BDDRequest
{

    //récupére tous les articles
    public function getPosts()
    {

        $sql = 'SELECT  P.*,
                        C.*,
                        U.user_id, U.user_firstname, U.user_lastname
                FROM t_posts P
                LEFT JOIN t_categories C 
                    ON C.category_id = P.category_id_fk
                LEFT JOIN t_users U
                    ON P.user_id = U.user_id
                WHERE post_activated = 1';
        $posts = $this->executeRequest($sql);
        return $posts->fetchAll();
    }

    // renvoie les informations d'un billet par son id   
    public function getPost($post_id)
    {

        $sql = 'SELECT 
                P.*,
                I.post_img_url,
                U.user_lastname,
                U.user_firstname,
                U.user_description,
                U.user_photo_url
                FROM t_posts P
                LEFT JOIN t_post_img I
                    ON I.post_id = P.post_id
                LEFT JOIN t_users U
                    ON U.user_id = P.user_id
                WHERE P.post_id = ?';
        $post = $this->executeRequest($sql, array($post_id));

        if ($post->rowCount() == 1) {
            return $post->fetch();
        } else {
            throw new Exception("Aucun article ne correspond à l'identifiant '$post_id'");
        }
    }

    public function getCategories()
    {
        $sql = 'SELECT * FROM t_categories';
        $categories = $this->executeRequest($sql);
        return $categories->fetchAll();
    }

    public function deletePost($post_id)
    {
        $sql = 'DELETE FROM t_posts WHERE post_id = ?';
        $deletePost = $this->executeRequest($sql, array($post_id));
        return $deletePost;
    }

    public function archivePost($post_id)
    {
        $sql = 'UPDATE t_posts SET post_activated = ? WHERE post_id = ?';
        $act = $this->executeRequest($sql, array('0', $post_id));

        $archive = $this->getPost(($post_id));
        $date = date('Y-m-d H:i:s');
        $sql = 'INSERT INTO t_post_archives (post_archive_date, user_id, post_id)
                VALUES (:post_archive_date, :user_id, :post_id)';
        $act = $this->executeRequest($sql, array(
            'post_archive_date' => $date,
            'user_id' => $_SESSION['user_id'],
            'post_id' => $post_id
        ));
        return $act;
    }

    public function reactivePost($post_id) {
        $sql = 'DELETE FROM t_post_archives WHERE post_id = ?';
        $delete = $this->executeRequest($sql, array($post_id));
        if ($delete) {
            $sql = 'UPDATE t_posts SET post_activated = 1 WHERE post_id = ?';
            $reactivation = $this->executeRequest($sql, array($post_id));
            return $reactivation;
        } else {
            throw new exception ("L'article n'a pu être réactivé.");
        }
    }

    public function setCategory($post_id, $category_id)
    {
        $sql = 'UPDATE t_posts
                SET category_id_fk = ?
                WHERE post_id = ?';
        $edit = $this->executeRequest($sql, array($category_id, $post_id));
        return $edit;
    }

    public function getArchivePosts()
    {
        $sql = 'SELECT  A.*,
                        P.*,
                        U.user_lastname, U.user_firstname
                FROM t_post_archives A
                LEFT JOIN t_posts P 
                    ON P.post_id = A.post_id
                LEFT JOIN t_users U 
                    ON A.user_id = U.user_id';
        $archives = $this->executeRequest($sql);
        return $archives->fetchAll();
    }

    public function getPostId()
    {
    }
}
