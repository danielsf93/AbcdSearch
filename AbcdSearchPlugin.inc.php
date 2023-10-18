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
public $meuTeste = "olá pessoal auauau";


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

        // Recupera os resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Verifica se há resultados
        if (count($resultados) > 0) {
            // Suponha que a coluna setting_value é uma string
            $dados = $resultados[0]['setting_value'];
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