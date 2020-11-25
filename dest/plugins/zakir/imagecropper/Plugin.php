<?php namespace Zakir\ImageCropper;

use Event;
use Backend;
use System\Classes\PluginBase;
use Zakir\ImageCropper\Widgets\ImageCropper as ImageCropperManager;
use Zakir\ImageCropper\Models\Settings as Settings;
use Zakir\ImageCropper\Models\ImageCropper as ImageCropperModel;
/**
 * ImageCropper Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Image Cropper',
            'description' => 'Image Cropper Plugin for Normal/Gallery image(s) (attachOne/attachMany)',
            'author'      => 'Zakir',
            'icon'        => 'icon-crop'
        ];
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot(){
        if(Settings::get('is_enable')){
            $this->imageCropper();
        }
    }

    public function imageCropper()
    {
        Event::listen('backend.page.beforeDisplay', function($controller, $action, $params){
            $manager = new ImageCropperManager($controller);
            $manager->bindToController();
        });
    }

    public function registerMarkupTags()
    {
        return [
            'filters' => [
                'crop_image' => [$this, 'crop_image'],
                // 'crop_media' => [$this, 'crop_media'],
            ],
        ];
    }

    public function crop_image($data){
        $source_file = $data->getLocalPath();
        $dest_file = 'storage/app/'.dirname($data->getDiskPath()).'/cropped_'.basename($source_file);
        $cropper_model = ImageCropperModel::wherePath($data->id)->first();
        if(!$cropper_model){
            return $data->getPath();
        }
        $co_ordinates = $cropper_model->data;
        $x = $co_ordinates['x'];
        $y = $co_ordinates['y'];
        $width = $co_ordinates['width'];
        $height = $co_ordinates['height'];
        \October\Rain\Database\Attach\Resizer::open($source_file)
            ->crop($x,$y,$width,$height)
            ->save($dest_file);
        return url($dest_file);
    }

    // public function crop_media($data,$model=""){
    //     $source_file = 'storage/app/media/'.$data;
    //     if(isset($model->id)){
    //         $dest_file = 'storage/app/media/'.$model->id.'_cropped_'.basename($data);
    //     }else{
    //         $dest_file = 'storage/app/media/cropped_'.basename($data);
    //     }
    //     $cropper_model = ImageCropperModel::wherePath($data)->first();
    //     if(!$cropper_model){
    //         return $source_file;
    //     }
    //     $co_ordinates = $cropper_model->data;
    //     $x = $co_ordinates['x'];
    //     $y = $co_ordinates['y'];
    //     $width = $co_ordinates['width'];
    //     $height = $co_ordinates['height'];
    //     \October\Rain\Database\Attach\Resizer::open($source_file)
    //         ->crop($x,$y,$width,$height)
    //         ->save($dest_file);
    //     return url($dest_file);
    // }


    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'zakir.imagecropper.imagecropper' => [
                'tab' => 'ImageCropper',
                'label' => 'Permission For Image Cropping',
            ],
        ];
    }

    public function registerSettings()
    {
        return [
            'image_cropper' => [
                'label'       => 'Image Cropper',
                'description' => 'Image Cropper Tool Configuration',
                'category'    => 'Image Cropper',
                'icon'        => 'icon-crop',
                'class'       => 'Zakir\ImageCropper\Models\Settings',
                'order'       => 500,
                'keywords'    => 'Image Crop',
                'permissions' => ['zakir.imagecropper.imagecropper']
            ]
        ];
    }

}
