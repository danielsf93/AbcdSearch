<?php



import('classes.handler.Handler');


    
    class AbcdSearchPluginHandler extends Handler {
        public function index($args, $request) {
            $plugin = PluginRegistry::getPlugin('generic', 'abcdsearchplugin');
        $templateMgr = TemplateManager::getManager($request);
        return $templateMgr->display($plugin->getTemplateResource('example.tpl'));
      }
    }
    





