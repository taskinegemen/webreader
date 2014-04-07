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
		$id=Yii::app()->request->getQuery('id',0);
		$this->render('details',array('id'=>$id));
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
		$xml->metadatadc->identifier= $xml->metadata->children('dc',true)->identifier;
		$xml->metadatadc->title= $xml->metadata->children('dc',true)->title;
		$xml->metadatadc->creator= $xml->metadata->children('dc',true)->creator;
		$xml->metadatadc->contributor= $xml->metadata->children('dc',true)->contributor;
		$xml->metadatadc->date= $xml->metadata->children('dc',true)->date;
		$xml->metadatadc->description= $xml->metadata->children('dc',true)->description;
		$xml->metadatadc->publisher= $xml->metadata->children('dc',true)->publisher;
		$xml->metadatadc->language= $xml->metadata->children('dc',true)->language;
		$xml->metadatadc->subject= $xml->metadata->children('dc',true)->subject;
	
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

	public function actionGetContent($id,$force=false,$host="cloud.lindneo.com",$port=2222){
		$ch = curl_init(Yii::app()->params['catalog_host'].'/api/getHosts/'.$id );
		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt( $ch, CURLOPT_HEADER, 0);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec( $ch );
		$hostsOb=json_decode($response,true);
		$hosts=$hostsOb['result'];
		shuffle($hosts);
		$host=$hosts[0]['address'];
		$port=$hosts[0]['port'];

		$getfile = "./tmp/$id";
		$command =  "python bin/client_tls.py '{\"host\":\"$host\",\"port\":$port}' GetFileChuncked $id $getfile";
		$outpufolder="contents/".basename($id);
		$METAFOLDER= $outpufolder."/META-INF";

		if(!$force)
			if (file_exists($METAFOLDER) and is_dir($METAFOLDER) ) {
				$this->redirect(array("content/read", 'id'=>$id)); 
				die;
			}
		
		exec($command,$output);

		


		if (!file_exists($getfile)) {
			header( "refresh:5;url=".Yii::app()->request->requestUri ); 
			echo "Dosya Protokolu Hatali 5sn Sonra otomatik olarak tekrar deneyeceksiniz!";
			die;
		}

		$this->decryptFileAndExtractToFolder($getfile,$outpufolder);
		

		if (!file_exists($METAFOLDER) and !is_dir($METAFOLDER)) {
    		header( "refresh:5;url=".Yii::app()->request->requestUri ); 
			echo "Dosya Protokolu Hatali 5sn Sonra otomatik olarak tekrar deneyeceksiniz!";
			functions::delTree($outpufolder);

			die;
		}

		$this->redirect(array("content/read", 'id'=>$id)); 

	}

    public function decryptFileAndExtractToFolder($filename,$outpufolder=null){		
    	
    	if (!$outpufolder){
			$outpufolder="contents/".basename($filename);
    	}
		functions::delTree($outpufolder);

		$epub = new ZipArchive;
		if ($epub->open($filename) === TRUE) {
		    $epub->extractTo($outpufolder);
		    $epub->close();
		    
		} else {
			
		}
		if (file_exists($filename)) {
			unlink($filename);
		}
	}

	public function actionFile($id,$filepath=null){


		for ($k=1; $k<=5; $k++){
			if(${"filepath".$k} != null) 
				$filepath .= "/".${"filepath".$k};
			else
				break;
		}

		$expires = 60*60*24*14;
		
		$dir="contents/$id/$filepath";

		$filename="contents/$id/$filepath";

		$content_type=functions::returnMIMEType($filename);
		

		$txt = Encryption::decryptFile($filename);

		
		if(isset($_SERVER['HTTP_RANGE'])) {
			$file = tempnam("/tmp", "download");


	    	$fp = @fopen($file, 'wrb');
	    
	    	fwrite($fp, $txt);
	    	fclose($fp);

	    	//echo $file;die;

	    	Yii::app()->request->xSendFile($file,array('terminate'=>false,'mimeType'=>$content_type));
			
			return;
		}

		
		header('HTTP/1.0 200 OK');

		header("Content-type: $content_type");

		

		
		header("Pragma: public");
		header("Cache-Control: maxage=".$expires);
		header('Expires: ' . gmdate('D, d M Y H:i:s', time()+$expires) . ' GMT');
		header('Connection: close');

		echo $txt;
	}

	public function actionList()
	{
		$this->render('list');
	}

	public function actionRead($id=null)
	{




		$dir="contents/$id";
		$METAFOLDER= $dir."/META-INF";
		if (!file_exists($METAFOLDER) and !is_dir($METAFOLDER)) {
    		$this->redirect(array("content/getcontent", 'id'=>$id));
		} 

		functions::event('header',  NULL, function($header) {
		 ?>

		 <!-- bxSlider -->
			<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/bxSlider/jquery.bxslider.css" type="text/css" />
			<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/jquery-ui-1.10.4.custom.min.js"></script>
			<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/dragiframe.js"></script>
			<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/jquery.fitvids.js"></script>
			<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/libs/bxSlider/jquery.bxslider.js"></script>
			<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/app/functions.js"></script>
			<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/app/slider_control.js"></script>
			<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/app/reader_app.js"></script>
		
		<!-- bxSlider -->
		<?php

		});


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
