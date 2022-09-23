<?php

if (!function_exists('public_url')) {
    function public_url($url)
    {
        if (strpos($url, 'http') !== false) {
            return $url;
        }

        $appURL = config('app.url');
        $str = substr($appURL, strlen($appURL) - 1, 1);
        if ($str != '/') {
            $appURL .= '/';
        }
        if (\Illuminate\Support\Facades\Request::secure()) {
            $appURL = str_replace('http://', 'https://', $appURL);
        }
        if (!empty($_SERVER['DOCUMENT_ROOT']) && 'public' == pathinfo($_SERVER['DOCUMENT_ROOT'], PATHINFO_BASENAME)) {
            return $appURL . $url;
        }
        return $appURL . 'public/' . $url;
    }
}
