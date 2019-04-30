<?php

if(!function_exists('usernameUpper')){
    function usernameUpper(){
        return strtoupper(\Auth::user()->username);
    }
}
