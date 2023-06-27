<?php



import('classes.handler.Handler');
import('lib.pkp.pages.index.PKPIndexHandler');


    
class AbcdSearchPluginHandler extends Handler {


  public function index($args, $request) {
    $plugin = PluginRegistry::getPlugin('generic', 'abcdsearchplugin');
    $templateMgr = TemplateManager::getManager($request);
    
    $route = $request->getRequestedPage();

    if ($route === 'abcdsearch') {
        return $templateMgr->display($plugin->getTemplateResource('index.tpl'));
    } elseif ($route === 'abcdsearch-dois') {
        return $templateMgr->display($plugin->getTemplateResource('indexdois.tpl'));
    }


    $router = $request->getRouter();
    $router->handle404();

    return false;
}

  
}










