<?php

namespace Techlink\Blog\Traits;

use Illuminate\Support\Facades\Storage;

trait ImageTrait
{
    public static function bootImageTrait()
    {
        static::deleted(function($model) {
            if($model->images) {
                $model->images()->delete();
                Storage::delete($model->images->url);
            }
        });

        static::updated(function($model) {
            //deleting existing image
            if($model->images) {
                Storage::delete($model->image->url);
            }
        });
    }
}