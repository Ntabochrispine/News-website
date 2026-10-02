<?php
class post{
    public function get_post(){
        $db = new database();
        $sql = "select * from `news` ORDER BY date DESC";
        $results = $db->read($sql);
        if($results){
            return $results;
        }
            return false;
    }

    //get post by an id
    public function get_post_id($id){
     
     $db = new database();
     $key = array_keys($id);
     $arr_key = $key[0];
     $value = $id[$arr_key];
     $sql = "select * from `news`  WHERE `$arr_key` = '$value' ORDER BY date DESC";
     $results = $db->read($sql);
     if($results){
        return $results;
    }
        return false;
    }
}


?>