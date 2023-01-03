<?php

namespace App\Service;

class YoutubeThumbnail 
{
    public static function getThumbnail(string|null $link)
    {
        $video_id = explode("?v=", $link);
        $video_id = $video_id[1];
        $thumbnail="https://img.youtube.com/vi/".$video_id."/sddefault.jpg";

        return $thumbnail;
    }
}