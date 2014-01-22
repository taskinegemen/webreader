<?php

class BookController extends Controller
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

	public function actionGetbookmeta()
	{
		$this->render('getbookmeta');
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

	public function actionImport()
	{
		$this->render('import');
	}

	public function actionList()
	{
		$this->render('list');
	}

	public function actionRead()
	{
		$this->render('read');
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