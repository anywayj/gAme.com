<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model {

	public $avatarimage;

	public function rules()
	{
		return [
			[['avatarimage'],'required'],
			[['avatarimage'],'file', 'extensions' => 'jpg, png'],
		];
	}

	public function uploadFile(UploadedFile $file) 
	{

		$this->avatarimage = $file;
		$file->saveAs(Yii::getAlias('@web') . 'uploads/' . $file->name);

		return $file->name;
	} 
}