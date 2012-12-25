<?php

class GroupDocsViewer_AdminController extends Pimcore_Controller_Action_Admin {
	/**
	 * Return current values as json
	 */
	public function loaddataAction(){
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
		if (!empty($fileid) && !empty($frameborder) && !empty($width) && !empty($height)) {
			$conf->setConfig(array( 'fileid' => $fileid, 'frameborder' => $frameborder, 'width' => $width, 'height' => $height ));
			$this->_helper->json(array('success' => 'true'));
			return;
		}
	}
}