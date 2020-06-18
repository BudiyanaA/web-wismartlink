<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Decrypt data from a CryptoJS json encoding string
 *
 * @param mixed $passphrase
 * @param mixed $jsonString
 * @return mixed
 * $encrypted = cryptoJsAesEncrypt("my passphrase", "value to encrypt");
 * $decrypted = cryptoJsAesDecrypt("my passphrase", $encrypted);
 */
 if (!function_exists('encrypt')) {
    
        function encrypt($sData, $sKey) {
            $sResult = '';
            for ($i = 0; $i < strlen($sData); $i++) {
                $sChar = substr($sData, $i, 1);
                $sKeyChar = substr($sKey, ($i % strlen($sKey)) - 1, 1);
                $sChar = chr(ord($sChar) + ord($sKeyChar));
                $sResult .= $sChar;
            }
            return encode_base64($sResult);
        }
    
    }
    

if (!function_exists('encryptFH')) {
    function encryptFH($str) {
        $res = encrypt($str, 'InsyaAllahAman');
        $res1 = str_replace('=', 'wrkdw', $res);
        $res2 = str_replace('/', '4cM1N', $res1);
        $res3 = str_replace('+', 'IB99', $res2);
        return $res3;
    }
}

if (!function_exists('decrypt')) {
    
        function decrypt($sData, $sKey) {
            $sResult = '';
            $sData = decode_base64($sData);
            for ($i = 0; $i < strlen($sData); $i++) {
                $sChar = substr($sData, $i, 1);
                $sKeyChar = substr($sKey, ($i % strlen($sKey)) - 1, 1);
                $sChar = chr(ord($sChar) - ord($sKeyChar));
                $sResult .= $sChar;
            }
            return $sResult;
        }
    
    }
    
if (!function_exists('decryptFH')) {

    function decryptFH($str) {
        $res = str_replace('IB99', '+', $str);
        $res1 = str_replace('4cM1N', '/', $res);
        $res2 = str_replace('wrkdw', '=', $res1);
        $ret = decrypt($res2, 'InsyaAllahAman');
        return $ret;
    }

}

if (!function_exists('encode_base64')) {

    function encode_base64($sData) {
        $sBase64 = base64_encode($sData);
        return strtr($sBase64, '+/', '-_');
    }

}

if (!function_exists('decode_base64')) {

    function decode_base64($sData) {
        $sBase64 = strtr($sData, '-_', '+/');
        return base64_decode($sBase64);
    }

}

