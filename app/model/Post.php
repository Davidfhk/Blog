<?php

namespace David\Blog\Model;

use \PDO;
use David\Bootstrap\Database as Db;

class Post
{
	private $id;
	private $title;
	private $comment;
	private $date_post;
	private $image;

	public function __construct($id = null, 
								$title = '', 
								$comment = '', 
								$date_post = '', 
								$image = '' ){
		$this->id = $id;
		$this->title = $title;
		$this->comment = $comment;
		$this->date_post = $date_post;
		$this->image = $image;

	}

	public function getId(){
		return $this->id;
	}

	public function getTitle(){
		return $this->title;
	}

	public function setTitle($title){
		$this->title = $title;
	}

	public function getComment(){
		return $this->comment;
	}

	public function setComment($comment){
		$this->comment = $comment;
	}

	public function getDatePost(){
		return $this->date_post;
	}

	public function setDatePost($date_post){
		$this->date_post = $date_post;
	}

	public function getImage(){
		return $this->image;
	}

	public function setImage($image){
		$this->image = $image;
	}

		public static function all(){
		$posts = [];
		$db = Db::getInstance();
		$req = $db->query('SELECT * FROM content ORDER BY date_post DESC' );

		foreach ($req->fetchAll() as $post) {
			$posts[] = new Post($post['id'],$post['title'],$post['comment'],$post['date_post'],$post['image']);
		}
		return $posts;
	}

	public static function addPost($title,$comment,$date = '',$image = ''){
		$date = date("y-m-d h:i:s");
		$db = Db::getInstance();
		$req = $db->prepare('INSERT INTO content(title,date_post,comment,image)
					VALUES (:title,:date_post,:comment,:image)');

		$req->execute(array('title' => $title,'date_post' => $date, 'comment' => $comment, 'image' => $image));
	}

	public static function deletePost($id){
		$db = Db::getInstance();
		$id = intval($id);
		$req = $db->prepare('DELETE FROM content WHERE id = :id');

		$req->execute(array('id' => $id));
	}
}