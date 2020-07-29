<?php


class News
{
    /**
     * Returns single news item with specified id
     * @param integer $id
     */
    public static function getNewsItemById($id)
    {
        //        Запрос к БД

        $id = intval($id);

        if ($id) {
//            $host = 'localhost';
//            $dbname = 'mvc_site';
//            $user = 'root';
//            $password = 'root';
//            $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

            $db = Db::getConnection();

            $result = $db->query('SELECT * from news WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $newsItem = $result->fetch();

            return $newsItem;
        }
    }

    /**
     * Returns an array of news items
     */
    public static function getNewsList()
    {
        //        Запрос к БД
        $db = Db::getConnection();

        $newList = array();

        $result = $db->query('SELECT id, title, date, author, preview, short_content '
            . 'FROM news '
            . 'ORDER BY date DESC '
            . 'LIMIT 10');

        $i = 0;

        while ($row = $result->fetch()) {
            $newList[$i]['id'] = $row['id'];
            $newList[$i]['title'] = $row['title'];
            $newList[$i]['date'] = $row['date'];
            $newList[$i]['author'] = $row['author'];
            $newList[$i]['preview'] = $row['preview'];
            $newList[$i]['short_content'] = $row['short_content'];
            $i++;

        }
        return $newList;
    }

}