<?php namespace ProgrammerLab\Nportal\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class ImageGalleries extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController'];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'gallery_manage' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('ProgrammerLab.Nportal', 'main-menu-im-gallery');
    }
}