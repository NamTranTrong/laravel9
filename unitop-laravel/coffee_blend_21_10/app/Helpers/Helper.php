<?php
use App\Models\Setting;
use Illuminate\Support\Facades\Session;


function getConfigValueSetting($configKey){
        $setting = Setting::where('config_key',$configKey)->first();
        if(!empty($setting)){
            return $setting->config_value;
        }
        else{
            return null;
        }
}
