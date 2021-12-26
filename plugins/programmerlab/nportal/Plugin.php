<?php namespace ProgrammerLab\Nportal;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
      return [
          'settings' => [
              'label'       => 'Gulfbangla',
              'description' => 'Manage gulfbangla settings.',
              'category'    => 'Users',
              'icon'        => 'icon-cog',
              'class'       => 'ProgrammerLab\Nportal\Models\Settings',
              'order'       => 500,
              'keywords'    => 'security location',
              'permissions' => ['programmerLab.nportal.access_settings']
          ]
      ];
    }
}
