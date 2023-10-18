{* plugins/generic/AbcdSearch/templates/index.tpl *}

 {include file="frontend/components/header.tpl" pageTitleTranslated=$title}
 

 {$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}<br>
 {$smarty.now|date_format:"%e %B. %Y"}<br>
 {$languageToggleLocales}

 <div class="page">
 <hr><h1>Abcd Search</h1>

{$meuTeste|escape}<br>
{$obterDados|escape}

 </div>
 <img src="https://www.abcd.usp.br/wp-content/uploads/2022/07/logo_abcd.png">
 {include file="frontend/components/footer.tpl"}
 