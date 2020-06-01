<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photoupload extends Model
{
    protected $table = 'photouploads';

    protected $fillable = [
        'ref_type',
        'ref_id',
        'folder_name',
        'file_name',
        'alt_file',
        'ext_file',
        'size',
        'width',
        'height',
    ];
}
