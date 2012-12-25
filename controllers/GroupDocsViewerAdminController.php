<?php

class GroupDocsViewer_GroupDocsViewerAdminController extends Pimcore_Controller_Action_Admin {
	/**
	 * Return current values as json
	 */
	public function loaddataAction(){
		$this->_helper->viewRenderer->setNoRender();
		$conf = new GroupDocsViewer_GroupDocs();
		$this->_helper->json(array('configs' =>
				array(
						'id' => '1',
						'fileid' => $conf->getConfig('fileid'),
						'frameborder' => $conf->getConfig('frameborder'),
						'width' => $conf->getConfig('width'),
						'height' => $conf->getConfig('height')
				)
		));
	}

	/**
	 * Save new values
	 */
	public function savedataAction(){
		$conf = new GroupDocsViewer_GroupDocs();

		$fileid = $this->_getParam("fileid");
		$frameborder = $this->_getParam("frameborder");
		$width = $this->_getParam("width");
		$height = $this->_getParam("height");
		if ($fileid != '' && $frameborder != '' && $width != '' && $height != '') {
			$conf->setConfig(array( 'fileid' => $fileid, 'frameborder' => $frameborder, 'width' => $width, 'height' => $height ));
			$this->getResponse()->setHttpResponseCode(200);
		}
		else {
			$this->getResponse()->setHttpResponseCode(500);
			$this->view->message = 'Save error';
		}
		$this->_helper->viewRenderer->setNoRender();
	}
}