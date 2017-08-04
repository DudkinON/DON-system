<?php

    class News
    {
        public static function getNewsItemById($id){
            //query to db
            $id = intval($id);
            if ($id){

                $db = Db::getConnection();

                $result = $db->query('SELECT *'.'FROM news WHERE id ='.$id);
                $result->setFetchMode(PDO::FETCH_ASSOC);
                $newsItem = $result->fetch();

                return $newsItem;
            } else {
               return null;
            }

        }

        /**
         * @return array
         */
        public static function getNewsList(){
            //query to db
                $db = Db::getConnection();


                $newsList = array();
                
                $result = $db->query('SELECT *'.'FROM news');

                $i = 0;
                while($row = $result->fetch()){
                    $newsList[$i]['id'] = $row['id'];
                    $newsList[$i]['title'] = $row['title'];
                    $newsList[$i]['date'] = $row['date'];
                    $newsList[$i]['short_content'] = $row['short_content'];
                    $newsList[$i]['author_name'] = $row['author_name'];
                    $newsList[$i]['preview'] = $row['preview'];
                    $i++;
                }

            return $newsList;
        }
    }