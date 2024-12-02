<?php

use App\Models\User;

if(!function_exists(function: 'flashMessage')){
    function flashMessage($message, $type= 'success'): void {
        session()->flash('message', $message);
        session()->flash('type', $type);
    }
}

if(!function_exists(function: 'usernameGenerator')){
    function usernameGenerator(string $name): string {
        $username = strtolower(string: preg_replace(pattern: '/\s+/', replacement: '_', subject: trim(string: $name)));
        $original_username = $username;
        $count = 1;

        while(User::where('username', $username)->exist()){
            $username = $original_username . $count;
            $count++;
        }
        return $username;
    }
}

if(!function_exists(function: 'sinatureMidtrans')){
    function signatureMidtrans($order_id, $status_code, $gross_amount, $server_key){
        return hash(algo: 'sha512', data: $order_id.$status_code.$gross_amount.$server_key);
    }
}
