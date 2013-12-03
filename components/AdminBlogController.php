<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminController
 * tes
 * @author fendi
 */
class AdminBlogController extends BackendController{
    function getModuleUrl(){
        return $this->module->getParentModule()->getId().'/'.$this->getModule()->getName();
    }
}

?>
