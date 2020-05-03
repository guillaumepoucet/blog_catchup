<?php

require_once('modele/Post.php');
require_once('modele/Comment.php');
require_once('vue/Vue.php');

class ControleurPost
{

    private $_post;
    private $_comment;

    public function __construct()
    {
        $this->post = new Post;
        $this->comment = new Comment;
    }

    // Affiche les détails sur un post
    public function post($post_id)
    {
        $post = $this->post->getPost($post_id);
        $comments = $this->comment->getComments($post_id);
        $totalcomments = count($comments);
        $vue = new Vue("Post");
        $vue->generer(array('post' => $post, 'comments' => $comments, 'totalcomments' => $totalcomments));
    }

    public function addComment($post_id)
    {
        $newComment = $this->comment->addComment($post_id);
        if ($newComment) {
            header('location:index.php?action=post&id=' . $post_id);
        } else {
            throw new Exception("L'ajout de votre commentaire a échoué");
        }
    }

    public function deleteComment($comment_id, $post_id)
    {
        $delete = $this->comment->deleteComment($comment_id);
        if ($delete) {
            $_SESSION['comment'] = 'deleteOk';
            header('location:index.php?action=post&id=' . $post_id);
        }
    }

    public function getPosts()
    {
        $posts = $this->post->getPosts();
        $categories = $this->post->getCategories();
        $vue = new Vue('PostList');
        $vue->genererAdmin(array('posts' => $posts, 'categories' => $categories));
    }

    public function deletePost($post_id)
    {
        $delete = $this->post->deletePost($post_id);
        if ($delete) {
            $_SESSION['delete'] = 'Ok';
            header('location:index.php?action=admin&id=postlist');
        }
    }
}
