<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function saveImage()
    {
        $image = request()->file('image');
        $name = uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $name);

        return '/images/'.$name;
    }

    public function upd(Model $model)
    {
        $data = request()->all();

        if (isset($data['image'])) {
            $data['image'] = $this->saveImage();
        }

        return $model->update(collect($data)->filter()->toArray());
    }
}
