<?php

class FAQPage {

    public function open($webDriver, $url){
        $webDriver->get($url);
    }

    public function affirmContainsElements($webDriver){
        ##todo verify that the proper courses exists + whatever else might be in the tab
    }

}