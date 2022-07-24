<?php

namespace App\Traits;

use App\Models\Config;

trait HasConfig
{
    //Model must have "modelName"
    private function getRow($key)
    {
        return Config::where('key', $key)->where('model_type', $this->modelName)->where('model_id', $this->id)->first();
    }

    public function getConfig($key, $default = null)
    {
        $data = $this->getRow($key);
        return $data ? $data->value : $default;
    }

    public function getAllConfigs()
    {
        return Config::where('model_type', $this->modelName)
                ->where('model_id', $this->id)
                ->get()
                ->pluck('value', 'key')
                ->toArray();
    }

    public function setConfig($key, $value)
    {
        $data = [];
        $data[$key] = $value;
        return $this->setMultipleConfigs($data);
    }

    public function setMultipleConfigs($configs)
    {
        if ($configs) {
            foreach ($configs as $key => $value) {
                $data = $this->getRow($key);
                if ($data) {
                    //Update
                    $data->value = $value;
                    $data->update();
                } else {
                    //Insert
                    Config::create([
                        'key' => $key,
                        'value' => $value,
                        'model_type' => $this->modelName,
                        'model_id' => $this->id
                    ]);
                }
            }
        }

        return true;
    }
}
