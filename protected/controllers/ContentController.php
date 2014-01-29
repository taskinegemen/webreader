<?php

class ContentController extends Controller
{
	public function actionAddtolibrary()
	{
		$this->render('addtolibrary');
	}

	public function actionArchive()
	{
		$this->render('archive');
	}

	public function actionBuy()
	{
		$this->render('buy');
	}

	public function actionExport()
	{
		$this->render('export');
	}

	public function actionFavorites()
	{
		$this->render('favorites');
	}

	public function actionGetbookmeta($id)
	{
		$filename="contents/$id/package.opf";
		$xml=simplexml_load_file($filename);
		echo(json_encode($xml));
		//$this->render('getbookmeta');
	}

	public function actionGetcover()
	{
		$this->render('getcover');
	}

	public function actionGetpage()
	{
		$this->render('getpage');
	}

	public function actionGetpagecount()
	{
		$this->render('getpagecount');
	}

	public function actionGetpagemeta()
	{
		$this->render('getpagemeta');
	}

	public function actionGetpagepreview()
	{
		$this->render('getpagepreview');
	}

	public function actionGetthumbnail()
	{
		$this->render('getthumbnail');
	}

	public function actionImport($id=null)
	{
	
		if(!$id){
			$id='iufkT2XKp6RY376yWOCxTIW4SINH525YPtWhzxOqbuVv';
		}
		$dir="contents/$id";


		$hosts =array(
			(object) (array("host"=>'cloud.lindneo.com',"port"=>'2222')),
			//(object) (array("host"=>'lindneo2.com',"port"=>'22223'))
			);
		
		// if there is more than 1 then load balance according to time;
		if (count($hosts)>1){
			$selected_host = $hosts[(round(microtime(true) * 100)) % (count($hosts)) ];
		} else 
		// if there is only 1 then select the one;
		if (count($hosts)==1){
			$selected_host = current($hosts);
		} 
		// No host found;
		else {
			$selected_host = null;
		}
		

		print_r($selected_host);
		if (!$selected_host){
			echo "No";
			$error=__('Bu içerik için hiç bir yer sağlayıcı bulunamadı');
		}

		

		if (!file_exists($dir) and !is_dir($dir)) {
    		mkdir($dir);         
		}
		

		$this->redirect(array("content/read", 'id'=>$id)); 


		
	}


	public function actionFile($id,$filepath=null){
		$dir="contents/$id/$filepath";

		$filename="contents/$id/$filepath";

		$content_type=mime_content_type($filename);
		header("Content-type: $content_type");

		$txt = file_get_contents($filename);
		/*if ($txt){
			$domain = $this->createUrl("content/file",array("id"=>$id));
			$txt = preg_replace("/(href|src)\=\"([^(http)])(\/)?/", "$1=\"$domain$2", $txt);
		}*/
		echo $txt;
	}

	public function actionList()
	{
		$this->render('list');
	}

	public function actionRead($id=null)
	{
		$dir="contents/$id";

		if (!file_exists($dir) and !is_dir($dir)) {
    		$this->redirect(array("content/import", 'id'=>$id));
		} 

		$this->render('read',
			array(
				'id'=>$id
			)
		 );
	}

	public function actionRemove()
	{
		$this->render('remove');
	}

	public function actionRemovefromlibrary()
	{
		$this->render('removefromlibrary');
	}

	public function actionSearch()
	{
		$this->render('search');
	}

	public function actionShare()
	{
		$this->render('share');
	}

	public function actionSubscribe()
	{
		$this->render('subscribe');
	}

	public function actionTableofcontents()
	{
		$this->render('tableofcontents');
	}

	public function actionUpload()
	{
		$this->render('upload');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}