<?php
class GroupDocsViewer_GroupDocs {
	/**
	 * Table object
	 */
	protected $_config = null;

	/**
	 * GroupDocs file ID
	 */
	protected $_fileid = 0;

	/**
	 * Html frame border
	 */
	protected $_frameborder = 0;

	/**
	 * Html frame width
	 */
	protected $_width = 0;

	/**
	 * Html frame height
	 */
	protected $_height = 0;

	/**
	 * Class constructor
	 * @param Array $config
	 */
	public function __construct($config = array()) {
		$this->_config = new GroupDocsViewer_Config();
		// Set file ID
		$this->_fileid = (empty($config['fileid'])) ? $this->getConfig('fileid') : $config['fileid'];
		// Set frameborder
		$this->_frameborder = (empty($config['frameborder'])) ? $this->getConfig('frameborder') : $config['frameborder'];
		// Set width
		$this->_width = (empty($config['width'])) ? $this->getConfig('width') : $config['width'];
		// Set height
		$this->_height = (empty($config['height'])) ? $this->getConfig('height') : $config['height'];
	}

	public function getConfig($key = null) {
		try {
			$rows = $this->_config->fetchAll();
		} catch (Zend_Db_Exception $e) {
			Logger::error("Failed to get configuration; ".$e->getMessage());
			return null;
		}

		return $rows[0][$key];
	}

	public function setConfig($values = array()) {
		$this->_config->update($values, 'id = 1');
	}

	/**
	 * Render html frame
	 */
	public function renderFrame() {
		return '<iframe src="https://apps.groupdocs.com/document-viewer/Embed/'
				. $this->_fileid
				. '?quality=50&use_pdf=False&download=False" frameborder="'
				. $this->_frameborder
				. '" width="'
				. $this->_width
				. '" height="'
				. $this->_height
				. '"></iframe>';
	}
}