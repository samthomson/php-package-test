<?php

#namespace FlotCMS;

#require __DIR__.'/bootstrap/autoload.php';


require __DIR__.'../vendor/autoload.php';

$ffmpeg = FFMpeg\FFMpeg::create(array(
    'ffmpeg.binaries'  => 'C:/ffmpeg/bin/ffmpeg.exe',
    'ffprobe.binaries' => 'C:/ffmpeg/bin/ffprobe.exe',
    'timeout' => 0
    )
);
$video = $ffmpeg->open('test-files/DSCN0003.AVI');

$video->filters()->rotate(FFMpeg\Filters\Video\RotateFilter::ROTATE_270);


$format = new FFMpeg\Format\Video\X264();

$format
    /*->setKiloBitrate(1000)
    ->setAudioChannels(2)
    ->setAudioKiloBitrate(256);*/
    ->setAudioCodec("aac");

    $video->save($format, 'test-files/video.avi');
