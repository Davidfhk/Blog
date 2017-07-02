<?php

namespace David\Blog\Controller;
use David\Blog\View\View;
use David\Blog\Model\Post;

class PostController
{
	public function index(){
		$view = new View('app/templates/post');
		echo "Listado de posts";
		$post = Post::all();
		$view->render('index.php', ['posts' => $post]);
	}

	public function addPost(){
		if (isset($_POST)) {
			Post::addPost($_POST['title'],$_POST['comment']);
			header('Location:../');
		}

	}

	public function deletePost($id){
		Post::deletePost($id);
	}

}