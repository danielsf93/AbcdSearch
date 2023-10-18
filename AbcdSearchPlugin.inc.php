<?php
import('lib.pkp.classes.plugins.GenericPlugin');
import('lib.pkp.plugins.importexport.users.PKPUserImportExportPlugin');

class AbcdSearchPlugin extends GenericPlugin {
	
	public function register($category, $path, $mainContextId = null) {
		$success = parent::register($category, $path, $mainContextId);
		if ($success && $this->getEnabled()) {
			HookRegistry::register('LoadHandler', array($this, 'setPageHandler'));
		}
		return $success;
  }
  public function setPageHandler($hookName, $params) {
    $page = $params[0];
    if ($page === 'abcdsearch') {
        $this->import('AbcdSearchPluginHandler');
        define('HANDLER_CLASS', 'AbcdSearchPluginHandler');
        return true;

		
    }
    return false;
}

public $meuTeste = "olá pessoal auauau";

	
public function meuTeste2() {
	return "xablau dados";
	
}

    function getDisplayName() {
		return __('AbcdSearchPlugin');
	}

	/**
	 * @copydoc Plugin::getDescription()
	 */
	function getDescription() {
		
		return __('AbcdSearchPlugin');
	}






}
