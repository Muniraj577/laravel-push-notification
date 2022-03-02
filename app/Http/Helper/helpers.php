<?php
if (!function_exists('getTableName')) {
    function getTableName($model)
    {
        return $model->getTable();
    }
}

if (!function_exists('userLoggedIn')) {
    function userLoggedIn()
    {
        $loggedIn = false;
        if (\Illuminate\Support\Facades\Auth::check()) {
            $loggedIn = true;
        }
        return $loggedIn;
    }
}

if (!function_exists('getslug')) {
    function getslug($name)
    {
        $slug = \Illuminate\Support\Str::slug($name);
        return $slug;
    }
}

if (!function_exists('getMapLocation')) {
    function getMapLocation($name = '', $address = '')
    {
        $address = $name . ', ' . $address;
        $address = str_replace(' ', '%20', $address);
        return $address;
    }
}


if (!function_exists('getModels')) {
    function getModels($path)
    {
        $out = [];
        $results = scandir($path);
        foreach ($results as $result) {
            if ($result === '.' or $result === '..') continue;
//            $filename = $path . '/' . $result;
            $filename = "\App\Models" . "\\" . $result;
            if (is_dir($filename)) {
                $out = array_merge($out, getModels($filename));
            } else {
                $out[] = substr($filename, 0, -4);
            }
        }
        return $out;
    }
}
if (!function_exists('get_country_by_ip')) {
    function get_country_by_ip()
    {
        $c_ip = null;
        $r_ip = null;
        $xf_ip = null;
        $f_ip = null;
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $c_ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        if (isset($_SERVER['REMOTE_ADDR'])) {
            $r_ip = $_SERVER['REMOTE_ADDR'];
        }
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $xf_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
            $f_ip = $_SERVER['HTTP_FORWARDED_FOR'];
        }
        if ($c_ip != null) {
            $ipaddress = $c_ip;
        } elseif ($xf_ip != null) {
            $ipaddress = $xf_ip;
        } elseif ($f_ip != null) {
            $ipaddress = $f_ip;
        } elseif ($r_ip != null) {
            $ipaddress = $r_ip;
        }
        $data = file_get_contents('https://www.iplocate.io/api/lookup/' . $ipaddress);
        $data = json_decode($data);
        $country = $data->country;
        return response(['country' => $country, 'c_ip' => $c_ip, 'f_ip' => $f_ip, 'xf_ip' => $xf_ip, 'r_ip' => $r_ip]);
    }
}
if (!function_exists('get_client_ip')) {
    function get_client_ip()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}

if (!function_exists('getIp')) {
    function getIp()
    {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return server ip when no client ip found
    }
}
