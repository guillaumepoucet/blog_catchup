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

    public function archiveComment($comment_id, $post_id)
    {
        $archive = $this->comment->archiveComment($comment_id);
        if ($archive) {
            $_SESSION['comment'] = 'archiveOk';
            header('location:index.php?action=post&id=' . $post_id);
        }
    }

    public function deleteArchiveComment($comment_id)
    {
        $delete = $this->comment->deleteArchiveComment($comment_id);
        if ($delete) {
            $_SESSION['comment'] = 'deleteOk';
            header('location:index.php?action=admin&id=comments');
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
        $deleteComments = $this->comment->deleteAllComments($post_id);
        if($deleteComments)
        {
            $deletePost = $this->post->deletePost($post_id);
            if ($deletePost) {
                $_SESSION['delete'] = 'Ok';
                header('location:index.php?action=admin&id=postlist');
            } else
            {
                throw new Exception("L'article n'a pu être supprimé.");
            }
        } else 
        {
            throw new Exception("Les commentaires attachés à l'article n'ont pu être supprimés.");
        }
    }

    public function archivePost($post_id)
    {
        $archive = $this->post->archivePost($post_id);
        if ($archive) {
            $_SESSION['archive'] = 'Ok';
            header('location:index.php?action=admin&id=postlist');
        }
    }

    public function reactivePost($post_id)
    {
        $reactivation = $this->post->reactivePost($post_id);
        if ($reactivation) {
            $_SESSION['archive'] = 'Ok';
            header('location:index.php?action=admin&id=archives');
        }
    }

    public function editCategory($post_id, $category_id) {
        $edition = $this->post->setCategory($post_id, $category_id);
        if ($edition) {
        $this->getPosts();}
    }

    public function getArchivePosts() {
        $archives = $this->post->getArchivePosts();
        $vue = new Vue("ArchiveList");
        $vue->genererAdmin(array('archives' => $archives));
    }

    public function newPost() {
        $vue = new Vue("NewPost");
        $vue->genererAdmin(array());
    }

    public function editPost($post_id) {
        $post = $this->post->getPost($post_id);
        $vue = new Vue("EditPost");
        $vue->genererAdmin(array('post' => $post));
    }

    public function getArchiveComments() {
        $archives = $this->comment->getArchiveComments();
        $vue = new Vue("ArchiveComment");
        $vue->genererAdmin(array('archives' => $archives));
    }

}
