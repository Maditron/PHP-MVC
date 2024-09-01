<?php

namespace Application\Controllers;

use application\model\Category;
use application\model\Article;

class Home extends Controller{


    public function index(){
        $articles = new Article;
        $articles = $articles->all();
        $categories = new Category;
        $categories = $categories->all();
        return $this->view('app.index', compact('articles', 'categories'));
    }

    public function category($id){
        $category = new Category;
        $articles = $category->articles($id);
        $categories = $category->all();
        $category = $category->find($id);
        return $this->view('app.category', compact('articles', 'categories', 'category'));
    }

    public function show($id){
        $category = new Category;
        $categories = $category->all();
        $article = new Article;
        $article = $article->find($id);
        return $this->view('app.detail', compact('categories', 'article'));
    }


}