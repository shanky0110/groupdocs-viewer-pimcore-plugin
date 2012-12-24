<?php

class GroupDocsViewer_AdminController extends Pimcore_Controller_Action_Admin {
	public function configdataAction(){
		$this->_helper->json(array('configs' => array( 'id' => '1', 'fileid' => '123', 'frameborder' => '1', 'width' => '250', 'height' => '380' )));
	}
}