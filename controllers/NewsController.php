<?php

include_once ROOT.'/models/News.php';

class NewsController
{
    public function actionIndex()
    {
        $newsList = array();
        $newsList = News::getNewsList();


        require_once(ROOT.'/views/news/index.php');

        return true;
    }

    public function actionView($id)
    {
//        echo $category;
//        echo '<br>'.$id;

        $newsItem = array();
        $newsItem = News::getNewsItemById($id);

        require_once(ROOT.'/views/news/newsItem.php');


        return true;
    }

}