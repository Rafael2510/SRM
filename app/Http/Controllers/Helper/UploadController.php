<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UploadController extends Controller
{
    public function upload($file, $dirName)
    {
        $todayDate = date('Y/m');
        $dirDate = list($year, $month) = explode('/', $todayDate);
        $dirDate = implode('/', $dirDate);

        if ($file->isValid() || is_file($file)) {
            $file_name = uniqid(date('HisYmd'));
            $file_extension = $file->getClientOriginalExtension();
            $file_filename = $file_name . '.' . $file_extension;
            $file_upload = $file->storeAs($dirName.'/'.$dirDate, $file_filename, 'uploads');

            return !$file_upload ? false : $file_upload;
        } else {
            return false;
        }
    }
}
