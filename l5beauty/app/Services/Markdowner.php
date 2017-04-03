<?php 
namespace App\Services;

use Illuminate\Support\Facades\App;
use League\CommonMark\Converter;

/**
* 
*/
class Markdowner
{
	
	protected $converter;

    public function __construct(Converter $converter)
    {
        $this->converter = $converter;
    }

    public function toHTML($value)
    {
        return $this->converter->convertToHtml($value);
    }
}