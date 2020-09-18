<?php namespace Zakir\ImageCropper\Widgets;

use Backend\Classes\WidgetBase;
use Exception;
use Zakir\ImageCropper\Models\ImageCropper as ImageCropperModel;

class ImageCropper extends WidgetBase
{

    /**
     * @var string A unique alias to identify this widget.
     */
    protected $defaultAlias = 'ImageCropper';

    public function __construct($controller)
    {
        parent::__construct($controller, []);
        $this->checkPostback();
    }

    protected function checkPostback(){}

    public function prepareVars()
    {
        $model = $this->loadModel();

        $this->vars['src'] = $model->getSrc();
        $this->vars['path'] = $model->path;
        $this->vars['data'] = array_get($model->attributes, 'data', '');
        $this->vars['type'] = $model->type;
    }

    protected function loadAssets()
    {
        $this->addCss('/plugins/zakir/imagecropper/widgets/imagecropper/assets/css/imagecropper.css', 'Zakir.ImageCropper');
        $this->addCss('https://unpkg.com/cropperjs/dist/cropper.css', 'Zakir.ImageCropper');
        
        $this->addJs('https://unpkg.com/cropperjs/dist/cropper.js', 'Zakir.ImageCropper');
        $this->addJs('/plugins/zakir/imagecropper/widgets/imagecropper/assets/javascript/jquery-cropper.js', 'Zakir.ImageCropper');
        $this->addJs('/plugins/zakir/imagecropper/widgets/imagecropper/assets/javascript/imagecropper.js', 'Zakir.ImageCropper');
        
    }


    public function onLoadPopup()
    {
        if(post('error')){
            throw new \ApplicatioException('Please save object and try again');
        }
        $this->prepareVars();
        return $this->makePartial('popup');
    }

    public function onUpdate()
    {
        $data = post('data');
        $model = $this->loadModel();
        if($data){
            $model->data = $data;
            $model->save();
        }else{
            $model->delete();
        }
    }

    protected function loadModel()
    {
        $path = post('path');
        $type = post('type');
        $model = ImageCropperModel::whereType($type)->wherePath($path)->first();
        if(!$model){
            $model = new ImageCropperModel(['type' => $type, 'path' => $path]);
        }
        return $model;
    }

}