<?php

namespace App\Http\Traits;

use App\Photoupload;

trait PhotouploadTrait
{
    public function uploadPhoto($request)
    {
        $directory = 'uploads';

        $data = new Photoupload();
        $data->ref_type = 1;
        $data->ref_id = 0;
        $data->folder_name = $directory;
        $data->file_name = str_replace(' ', '-', $request->getClientOriginalName());
        $data->alt_file = $request->getClientOriginalName();
        $data->ext_file = $request->getClientOriginalExtension();
        $data->size = $request->getSize();
        $data->width = 0;
        $data->height = 0;
        $data->save();

        $request->move($data->folder_name, $data->file_name);
        return $data->id;
    }
}
