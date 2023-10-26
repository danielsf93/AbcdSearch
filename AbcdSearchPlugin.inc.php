<?php
//plugins/generic/AbcdSearch/AbcdSearchPlugin.inc.php
import('lib.pkp.classes.plugins.GenericPlugin');
import('lib.pkp.plugins.importexport.users.PKPUserImportExportPlugin');

class AbcdSearchPlugin extends GenericPlugin {
    //variaveis do banco de dados
    private $databaseHost;
    private $databaseName;
    private $databaseUsername;
    private $databasePassword;

    public function register($category, $path, $mainContextId = null) {
        $success = parent::register($category, $path, $mainContextId);
        if ($success && $this->getEnabled()) {
            HookRegistry::register('LoadHandler', array($this, 'setPageHandler'));
        }

        // Carregar as configurações do banco de dados a partir do arquivo config.inc.php
        $configFile = 'config.inc.php';

        if (file_exists($configFile)) {
            $config = parse_ini_file($configFile, true);

            if (isset($config['database'])) {
                $this->databaseHost = $config['database']['host'];
                $this->databaseName = $config['database']['name'];
                $this->databaseUsername = $config['database']['username'];
                $this->databasePassword = $config['database']['password'];
            }
        }

        return $success;
    }

    //montando a página
    public function setPageHandler($hookName, $params) {
        $page = $params[0];
        if ($page === 'abcdsearch') {
            $this->import('AbcdSearchPluginHandler');
            define('HANDLER_CLASS', 'AbcdSearchPluginHandler');
            return true;
        }
        return false;
    }

    // Método para passar informações sem função
    //public $meuTeste = "Lista de copyrights do portal:";

    // Método com função, que deve ser resgatado e passado ao arquivo .tpl via handler.inc.php
    public function obterDados() {
        try {
            $pdo = new PDO("mysql:host={$this->databaseHost};dbname={$this->databaseName};charset=utf8", $this->databaseUsername, $this->databasePassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            // DISTINCT obtem a lista de copyrights evitando repetição
            $sql = "SELECT DISTINCT CONVERT(setting_value USING utf8) as utf8_value FROM publication_settings WHERE CONVERT(setting_name USING utf8) = 'copyrightHolder'";
            $stmt = $pdo->query($sql);
    
            // Inicializa um array para armazenar os resultados
            $dados = array();
    
            // Percorre os resultados
            foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
                $settingValue = $row['utf8_value'];
    
                // Remove "Universidade de São Paulo. " da string
                $settingValue = str_replace("Universidade de São Paulo. ", "", $settingValue);
    
                $dados[] = $settingValue;
            }
    
            // Ordenar os resultados em ordem alfabética
            sort($dados);
    
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
        return __('plugins.generic.abcdsearch.displayName');
    }

    function getDescription() {
        return __('plugins.generic.abcdsearch.description');
    }
}
