<?php

namespace David\Blog\Controller;

class PageController
{
	public function index(){
		echo "<a href='post'>Click aqui, para acceder a los post</a>";
	}

	public function about($id){
		echo "Web desarrollada por... David";
	}
}