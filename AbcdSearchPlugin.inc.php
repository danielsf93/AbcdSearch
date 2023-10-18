<?php
///plugins/generic/AbcdSearch/AbcdSearchPlugin.inc.php
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

	
public function obterDados() {
    $palavra01 = "bom";
    $palavra02 = "dia";
    $hora = date('H:i:s'); // Obtém a hora em PHP

    $dados = $palavra01 . ' ' . $palavra02 . ' - ' . $hora;

    return $dados;
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