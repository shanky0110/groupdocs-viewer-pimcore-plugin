<?php
class GroupDocsViewer_Plugin extends Pimcore_API_Plugin_Abstract implements Pimcore_API_Plugin_Interface {

	public static function needsReloadAfterInstall() {
		return true;
	}

	public static function install() {
		$path = self::getInstallPath();

		if(!is_dir($path)) {
			mkdir($path);
		}

		if (self::isInstalled()) {
			return "GroupDocs Viewer Plugin successfully installed.";
		} else {
			return "GroupDocs Viewer Plugin could not be installed.";
		}
	}

	public static function uninstall() {
		rmdir(self::getInstallPath());

		if (!self::isInstalled()) {
			return "GroupDocs Viewer Plugin successfully uninstalled.";
		} else {
			return "GroupDocs Viewer Plugin could not be uninstalled.";
		}
	}

	public static function isInstalled() {
		return is_dir(self::getInstallPath());
	}

	public static function getTranslationFile($language) {

	}

	public static function getInstallPath() {
		return PIMCORE_PLUGINS_PATH . "/GroupDocsViewer/install";
	}
}