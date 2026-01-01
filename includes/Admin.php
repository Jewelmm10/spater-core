<?php

namespace SpaterCore;

class Admin {
    function __construct() {
        new Admin\Menu();
        new Theme\HeaderFooterCPT();
        new Admin\HeaderFooterMeta();
        new Theme\HeaderFooterRender();

    }

}