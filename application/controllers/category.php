<?php


namespace application\Controllers;

use application\model\Article;
use application\model\Category as categoryModel;


class Category extends Controller{

    public function index(){
        $categories = new categoryModel();
        $categories = $categories->all();
        return $this->view('panel.category.index', compact('categories')); 
    }

    public function create(){
        return $this->view('panel.category.create');
    }

    public function store(){
        $category = new categoryModel;
        $category->insert($_POST);
        return $this->redirect('category');
    }

    public function edit($id){
        $category = new categoryModel;
        $category = $category->find($id);
        return $this->view('panel.category.edit', compact('category'));
    }


    public function update($id){
        $category = new categoryModel;
        $category->update($id, $_POST);
        return $this->redirect('category');
    }

    public function delete($id){
        $category = new categoryModel;
        $category->delete($id);
        $this->back();
    }

}