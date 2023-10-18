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
//metodo para passar info sem funcao
public $meuTeste = "Lista de copyrights do portal:";


//metodo com funcao, que deve ser resgatado e passado ao arquivo .tpl via handler.inc.php
public function obterDados() {
    $host = 'localhost';
    $db = 'ompbb';
    $usuario = 'admin';
    $senha = 'admin';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db", $usuario, $senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT DISTINCT setting_value FROM publication_settings WHERE setting_name = 'copyrightHolder'";
        $stmt = $pdo->query($sql);

        // Inicializa um array para armazenar os resultados
        $dados = array();

        // Percorre os resultados
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $dados[] = $row['setting_value'];
        }

        // Verifica se há resultados
        if (count($dados) > 0) {
            return $dados;
        } else {
            return "Nenhum resultado encontrado";
        }
    } catch (PDOException $e) {
        return "Erro: " . $e->getMessage();
    }
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