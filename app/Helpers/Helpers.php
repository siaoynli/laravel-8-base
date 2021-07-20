<?php
if (!function_exists("version")) {

    function version(): string
    {
        return app()->version();
    }


}