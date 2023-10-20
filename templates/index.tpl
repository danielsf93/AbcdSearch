{* plugins/generic/AbcdSearch/templates/index.tpl *}

 {include file="frontend/components/header.tpl" pageTitleTranslated=$title}
 


 <div class="page">
 <h1>{$meuTeste|escape}</h1>






{$obterDados|escape}

{foreach from=$obterDados item=valor}
    <a href="{url page="copyrightSearch" router=$smarty.const.ROUTE_PAGE}/?query={$valor}">{$valor}</a><br>

    
{/foreach}


<hr>


 </div>

 {include file="frontend/components/footer.tpl"}
 