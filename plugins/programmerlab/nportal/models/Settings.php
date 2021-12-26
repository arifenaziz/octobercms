<?php namespace ProgrammerLab\Nportal\Models;

use Model;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'programmerLab_nportal_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';
}
