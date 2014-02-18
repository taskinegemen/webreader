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

	public function actionDetails()
	{
		$this->render('details');
	}

	public function actionNobook()
	{
		$this->render('nobook');
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
		$xml=simplexml_load_string(Encryption::decryptFile($filename));
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


	public function actionGetContent($id,$host="cloud.lindneo.com",$port=2222){
		
		$getfile = "./tmp/$id";
		$command =  "python bin/client_tls.py '{\"host\":\"$host\",\"port\":$port}' GetFile $id $getfile";
		//echo $command;die;
		exec($command,$output);
		print_r($output);
		 
		$this->decryptFileAndExtractToFolder($getfile);
		unlink($getfile);
		$this->redirect(array("content/read", 'id'=>$id)); 


	}

    public function decryptFileAndExtractToFolder($filename,$outpufolder=null){		
    	if (!$outpufolder){
			$outpufolder="contents/".basename($filename);
    	}
		functions::delTree($outpufolder);
		$file = file_get_contents($filename);
		$base=hash ( "sha256" , basename($filename) . "somemoresaltingherewouldbebetterthanthatoneiguess" ,true );
		$key=substr($base,0,32);
		$iv=substr($base,0,16);
		$res=base64_decode(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $file, MCRYPT_MODE_CFB, $iv));
		

		$temp = tempnam(sys_get_temp_dir(), "");

		$handle = fopen($temp, "w");
		fwrite($handle, $res);
		fclose($handle);

		$epub = new ZipArchive;
		if ($epub->open($temp) === TRUE) {
		    $epub->extractTo($outpufolder);
		    $epub->close();
		    
		} else {
			
		}

		unlink($temp);

		Encryption::encryptFolder($outpufolder);

	}

	public function actionFile($id,$filepath=null){


		$expires = 60*60*24*14;
		header("Pragma: public");
		header("Cache-Control: maxage=".$expires);
		header('Expires: ' . gmdate('D, d M Y H:i:s', time()+$expires) . ' GMT');
		$dir="contents/$id/$filepath";

		$filename="contents/$id/$filepath";

		$content_type=functions::returnMIMEType($filename);
		header("Content-type: $content_type");

		$txt = Encryption::decryptFile($filename);
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
