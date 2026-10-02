<?php
class User
{
    public function create_id()
    {
        $length = rand(4, 19);
        $number = "";
        for ($i = 0; $i < $length; $i++) {
            $new_rand = rand(0, 9);
            $number = $number . $new_rand;
        }
        return $number;
    }
    public function hash_text($text)
    {
        $text = hash('sha256', $text);
        return $text;
    }
}
