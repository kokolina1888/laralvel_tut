<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//use Illuminate\Contracts\Queue\ShouldQueue;
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!1
use Illuminate\Contracts\Bus\SelfHandling;
use App\Post;
use App\Tag;
use Carbon\Carbon;

class PostFormFields 
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $id;

    protected $fieldList = [

    'title' => '',
    'subtitle' => '',
    'page_image' => '',
    'content' => '',
    'meta_description' => '',
    'is_draft' => 0,
    'publish_date' => '',
    'publish_time' => '',
    'layout' => 'blog.layouts.post',
    'tags' => [],
    ];



    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */

    public function handle()
    {

        $fields = $this->fieldList;


        if($this->id){
           $fields = $this->fieldsFromModel($this->id, $fields);

       } else {
        $when = Carbon::now()->addHour();
        $fields['publish_date'] = $when->format('M-j-Y');
        $fields['publish_time'] = $when->format('g:i A');

    }


    foreach($fields as $fieldName => $fieldValue) {
        $fields[$fieldName] = old($fieldName, $fieldValue);
    }
//dd(array_merge($fields, ['allTags' => Tag::pluck('tag')->all()]));
//dd(array_merge($fields, ['allTags' => Tag::pluck('tag')->all()]));
    
return    array_merge($fields, ['allTags' => Tag::pluck('tag', 'id')->all()]);

}



protected function fieldsFromModel($id, array $fields)
{
    $post = Post::findOrFail($id);

    $fieldNames = array_keys(array_except($fields, ['tags']));

    $fields = ['id' => $id];

    foreach($fieldNames as $field){
        $fields[$field] = $post->{$field};
    }

    $fields['tags'] = $post->tags()->pluck('tag')->all();
    


    return $fields;

}
}
