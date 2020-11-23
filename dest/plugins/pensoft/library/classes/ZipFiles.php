<?php 

namespace Pensoft\Library\Classes;

use Illuminate\Support\Facades\Storage;
use Rych\ByteSize\ByteSize;
use Pensoft\Library\Models\Library;
use October\Rain\Filesystem\Zip;

class ZipFiles
{
    public $model;

    public function __construct(Library $model)
    {
        $this->model = $model;
    }

    public function downloadFiles($filename = null){
        if(is_null($filename)){
            $filename = 'file';
        }
        $model = $this->model;
        $records = $model->isVisible()->get()->filter(function($item){
            return isset($item->file);
        });

        $zip_file = tempnam(sys_get_temp_dir(), "publications");
        $zip = new \ZipArchive();
        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        
        foreach ($records as $item) {
            $file = $item->file->getLocalPath();
            $newFilename = 'publications/'.substr($file, strrpos($file, '/') + 1);
            $zip->addFile(
                $file,
                $newFilename
            );
        }
        

        $zip->close();
        return $zip_file;
        
    }
}

// new ZipFiles(Library $model)->downloadFiles()