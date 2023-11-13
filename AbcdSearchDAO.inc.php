<?php
// plugins/generic/AbcdSearch/AbcdSearchDAO.inc.php

import('lib.pkp.classes.db.DAO');
import('lib.pkp.classes.db.DAORegistry');

class AbcdSearchDAO extends DAO {

    public function __construct() {
        parent::__construct();
    }

    public function obterDados() {
        $result = $this->retrieve(
            'SELECT DISTINCT setting_value FROM publication_settings WHERE setting_name = ?', 
            ['copyrightHolder']
        );

        $dados = array();

        foreach ($result as $row) {
            $settingValue = $row->setting_value; 
            // Remove "Universidade de São Paulo. " da string
            $settingValue = str_replace("Universidade de São Paulo. ", "", $settingValue);

            // Converta para UTF-8
            $settingValue = mb_convert_encoding($settingValue, 'UTF-8', 'auto');

            $dados[] = $settingValue;
        }

        // Ordenar os resultados em ordem alfabética
        sort($dados);

        return $dados;
    }
}
