<?php

namespace App\Http\Traits;

use App\Photoupload;

trait PhotouploadTrait
{
    public function uploadPhoto($request, $ref_id)
    {
        $directory = 'uploads';

        $data = new Photoupload();
        $data->ref_type = 1;
        $data->ref_id = $ref_id;
        $data->folder_name = $directory;
        $data->file_name = strtolower(str_replace(' ', '-', $request->getClientOriginalName()));
        $data->alt_file = $request->getClientOriginalName();
        $data->ext_file = $request->getClientOriginalExtension();
        $data->size = $request->getSize();
        $path = $request->move($data->folder_name, $data->file_name);
        $dataPath = getimagesize($path);
        $data->width = $dataPath[0];
        $data->height = $dataPath[1];

        $data->save();
        return $data->id;
    }


}
