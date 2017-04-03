<?php 

return [
'name'=>'L5 Beauty',
'title' => 'Laravel 5.3 Beauty',
'subtitle' => 'A Clean Blog Written in Laravel 5.3',
'description' => 'This is my meta description',
'author' => 'The author',
'page_image'=> 'home-bg.jpg',
'post_per_page' => 10,
'uploads' => [
'storage' =>'local',
'webpath' => '/uploads'
],
'contact_email'=>env('MAIL_FROM'),
'rss_size'=>25,


];