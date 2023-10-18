{* plugins/generic/AbcdSearch/templates/index.tpl *}

 {include file="frontend/components/header.tpl" pageTitleTranslated=$title}
 


 <div class="page">
 <h1>Abcd Search</h1>

{$meuTeste|escape}<br>



<hr>
{$obterDados|escape}

{foreach from=$obterDados item=valor}
    {$valor|escape}<br>
{/foreach}


<hr>


 </div>

 {include file="frontend/components/footer.tpl"}
 