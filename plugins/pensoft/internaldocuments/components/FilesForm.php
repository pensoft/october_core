<?php

namespace Pensoft\Internaldocuments\Components;

use \Cms\Classes\ComponentBase;
use October\Rain\Support\Facades\Flash;
use Pensoft\Internaldocuments\Models\Subfolders as SubfoldersModel;
use Input;
use Pensoft\InternalDocuments\Models\Subfolders;
use Validator;
use Redirect;
use ValidationException;
use System\Models\File;
use System\Classes\MediaLibrary;

class FilesForm extends ComponentBase
{

	public function componentDetails()
	{
		return [
			'name' => 'Files Form',
			'description' => 'Simple files and folders form.'
		];
	}

	public function onSubmit(){
		$validator = Validator::make(
			[
				'name' => Input::get('name'),
				'files' => Input::file('files'),
				'images' => Input::file('images'),
			],
			[
				'name' => 'required_without_all:files,images',
				'files' => 'required_without_all:images,name',
				'images' => 'required_without_all:name,files',
			]
		);

//		if($validator->fails()){
//			throw new ValidationException($validator);
//		}

		if($validator->fails()){
			return Redirect::back()->withErrors($validator);
		}


		if(Input::get('name')){
			$subfolder = new Subfolders();
			$subfolder->name = Input::get('name');
			$subfolder->parent_id = Input::get('parent');
			$subfolder->images = Input::file('images');
			$subfolder->files = Input::file('files');
			$subfolder->save();
		}else{
			$subfolder = Subfolders::find(Input::get('parent'));
			$subfolder->images = Input::file('images');
			$subfolder->files = Input::file('files');
			$subfolder->save();
		}
		Flash::success('Added');
//		return [
//			'#partialInternalDocuments' => $this->renderPartial('components/internal_documents')
//		];
		return Redirect::back();

	}

	public function onImageUpload(){
		return '123';
		$image = Input::all();
		$images = $image['images'];

		$output = '';
		foreach ($images as $photo) {
			$file = (new File())->fromPost($photo);
			$output .= '<img src="' . $file->getThumb(170, 120, ['mode' => 'crop']) . '"> ';
		}

		return  [
			'#image_result' => $output
		];
	}

	public function onFileUpload(){
		$image = Input::all();
		$images = $image['files'];

		$output = '';
		foreach ($images as $photo) {
			$file = (new File())->fromPost($photo);
			if($file->getExtension() == 'docx' || $file->getExtension() == 'doc'){
				$mediaFileName = 'files_doc.svg';
			}else if($file->getExtension() == 'pdf'){
				$mediaFileName = 'files_pdf.svg';
			}else{
				$mediaFileName = 'files_file.svg';
			}
			$output .= '<img src="' . MediaLibrary::url($mediaFileName) . '" style="width: 30px; float: left; margin-right: 8px;"> '. $file->getFilename().' <br>';
		}

		return  [
			'#file_result' => $output
		];
	}
}
