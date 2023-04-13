<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ApiConfig extends Model
{
    use HasFactory;
    protected $fillable = [
        'api_url',
        'params',
    ];
    public static function setUrl($data)
    {
        $api = self::latest();
        $url = $api->api_url;
        // data is an array
        $params = $api->params;
        $params['data'] = $data;
        $params = json_decode($params);
        foreach ($params as  $key => $value) {
            if (is_array($value))
                $url .= '&' . $key . '=' . json_encode($value);
            else
                $url .= '&' . $key . '=' . $value;
        }
        return $url;
    }
}
