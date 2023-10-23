{* plugins/generic/AbcdSearch/templates/index.tpl *}

 {include file="frontend/components/header.tpl" pageTitleTranslated=$title}
 


 <div class="page">
 <h1>Livros por Unidade {translate key="plugins.generic.abcdsearch.displayName"}</h1>


 



{$obterDados|escape}

{foreach from=$obterDados item=valor}
    <a href="{url page="copyrightSearch" router=$smarty.const.ROUTE_PAGE}/?query={$valor}"target="_blank">{$valor}</a><br>

    
{/foreach}





 </div>

 {include file="frontend/components/footer.tpl"}
 