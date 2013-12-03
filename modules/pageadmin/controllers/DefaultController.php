<?php

class DefaultController extends AdminBlogController
{
	public function actionIndex()
	{
		$this->render('index');
	}
}