<?php
	namespace porcelanosa\yii2siteoptions\components\helpers;

	use yii\db\ActiveRecord;
	use yii\helpers\ArrayHelper;
	use yii\helpers\FileHelper;
	use yii\helpers\Html;
	use Yii;

	class MyHelper {

		public static function post($name) {
			return Yii::$app->request->post($name = NULL);
		}

		/**
		 * This is the shortcut to DOCUMENT ROOT
		 * If the parameter is given, it will be returned and prefixed with the $_SERVER['DOCUMENT_ROOT']
		 */
		public static function dc( $url = '' ) {
			static $dc;
			if ( $dc === null ) {
				$dc = $_SERVER['DOCUMENT_ROOT'];
			}
			return $dc . '/' . ltrim( $url, '/' );
		}
		
		public static function IFF($url) {
			if($url != '' AND file_exists(self::dc($url)) AND is_file(self::dc($url))){
				return true;
			}
			else {
				return false;
			}
		}
	}