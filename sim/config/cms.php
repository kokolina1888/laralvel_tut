<?php 

return  [

'theme'=> [
	'folder' => 'themes',
	'active' => 'default'
	],
'templates'	=> [
'home' => Sim\Templates\HomeTemplate::class,
'blog' => Sim\Templates\BlogTemplate::class,
'blog.post' => Sim\Templates\BlogPostTemplate::class
]
]; 