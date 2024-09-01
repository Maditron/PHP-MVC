<?php


namespace application\Controllers;

use application\model\Article as articleModel;
use application\model\Category;


class Article extends Controller
{

    public function index()
    {
        $article = new articleModel();
        $articles = $article->all();
        return $this->view('panel.article.index', compact('articles')); 
    }

    public function create()
    {
        $categories = new Category;
        $categories = $categories->all();
        return $this->view('panel.article.create', compact('categories')); 
    }

    public function store()
    {
        $blog = new articleModel;
        $blog->insert($_POST);
        return $this->redirect('article');
    }

    public function edit($id)
    {
        $blog = new articleModel;
        $blog = $blog->find($id);
        $categories = new Category;
        $categories = $categories->all();
        return $this->view('panel.article.edit', compact('blog', 'categories'));
    }


    public function update($id)
    {
        $blog = new articleModel;
        $blog->update($id, $_POST);
        return $this->redirect('article');
    }

    public function delete($id)
    {
        $blog = new articleModel;
        $blog->delete($id);
        $this->back();
    }

}