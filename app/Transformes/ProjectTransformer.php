<?php
namespace App\Transformes;
/**
 * Created by PhpStorm.
 * User: Nu1
 * Date: 3/27/2017
 * Time: 2:31 PM
 */
class ProjectTransformer extends Transformer
{
    public function transform($item)
    {
        // TODO: Implement transform() method.

        return ['name'=>$item['name'],
        'description'=>$item['description']
        ];
    }

}