<?php
	
	namespace porcelanosa\yii2siteoptions\assets;
	
	use Yii;
	use yii\web\AssetBundle;
	
	class SiteOptionsAsset extends AssetBundle {
		public $sourcePath = '@vendor/porcelanosa/yii2-site-options/assets';
		public $js = [
			'js/site-options.js',
		];
		public $css = [
			'css/site-options.css'
		];
		public $depends = [
			'yii\web\JqueryAsset',
			'yii\jui\JuiAsset'
		];
		
	}
