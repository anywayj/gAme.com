<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model {

	public $icon;

	public function rules()
	{
		return [
			[['icon'],'required'],
			[['icon'],'file', 'extensions' => 'jpg, png'],
		];
	}

	public function uploadFile(UploadedFile $file) 
	{

		$this->icon = $file;
		$file->saveAs(Yii::getAlias('@web') . 'uploads/' . $file->name);

		return $file->name;
	} 
}