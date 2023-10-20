# AbcdSearch

omp-3.3.0-8/plugins/generic/AbcdSearch/<br>
Página estática para open monograph press onde faz-se a lista de copyrights registrados na editora.<br>
A Lista é feita através de consulta SQL no banco de dados da editora, utilizando as informações do arquivo /config.inc.php do diretorio base do OMP.<br><br>
Talvez esse método de obtenção de dados sql seja a chave para a produção de novos plugins OMP e OJS de forma simples, sem necessitar de arquivosDAO.inc.php.<br><br>

Após Instalado, acesse a página do plugina via "http://base/index.php/editora/abcdsearch", no meu caso local "http://0.0.0.0:8888/index.php/portaldelivrosUSP/abcdsearch".<br><br>

A Fazer:<br>
-Exportar modelo consulta sql para outros plugins.<br>
-Verificar se a consulta é segura, se não emplica em brechas de segurança.<br><br>

Print:<br>
![image](https://github.com/danielsf93/AbcdSearch/assets/114300053/c597ffa0-fc72-4150-a0b6-a1761e420a7f)



