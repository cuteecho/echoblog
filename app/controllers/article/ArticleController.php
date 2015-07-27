<?php
class ArticleController extends  BaseController{

    public $_modelName='Article';

    public function index($userId){


        $articles=$this->_model->all();
        foreach($articles as &$article){
           $user= $this->_model->find($article->id)->User()->select('username')->first();
//            var_dump($user->username);exit;
            $article->username=$user->username;
        }
        $this->viewVars['articles']=$articles;
        $this->layout=View::make('article.index')->with($this->viewVars);

    }

}