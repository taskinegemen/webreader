<?php

class Encryption
{
    const CYPHER = MCRYPT_RIJNDAEL_256;
    const MODE   = MCRYPT_MODE_CBC;
    const SALT    = 'myverylovelysalthere';

    public function encrypt($key,$plaintext)
    {
        $td = mcrypt_module_open(self::CYPHER, '', self::MODE, '');
        $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
        mcrypt_generic_init($td, $key, $iv);
        $crypttext = mcrypt_generic($td, $plaintext);
        mcrypt_generic_deinit($td);
        return base64_encode($iv.$crypttext);
    }

    public function decrypt($key,$crypttext)
    {
        $crypttext = base64_decode($crypttext);
        $plaintext = '';
        $td        = mcrypt_module_open(self::CYPHER, '', self::MODE, '');
        $ivsize    = mcrypt_enc_get_iv_size($td);
        $iv        = substr($crypttext, 0, $ivsize);
        $crypttext = substr($crypttext, $ivsize);
        if ($iv)
        {
            mcrypt_generic_init($td, $key, $iv);
            $plaintext = mdecrypt_generic($td, $crypttext);
        }
        return trim($plaintext);
    }

    public function salty($salt){
        return hash ("ripemd128" , md5($salt.self::SALT));
    }

    public function encryptFile($filepath,$saveas=null){
        
        $key = self::salty( basename($filepath) );
        if(!$saveas){
            $saveas=$filepath;
        }

        $openFile = base64_encode(file_get_contents($filepath)) ;
        if (!$openFile) return fasle;
        
        if ( file_put_contents( $saveas , self::encrypt($key, $openFile ) ) ){
            return true;
        } 
        return fasle;
    }

    public function encryptFolder($folder){
        $path = realpath($folder);

        $objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);
        foreach($objects as $name => $object){
            if (is_file($name)){
                self::encryptFile($name);
            }
        }
    }

    public function decryptFile($filepath){
        $key = self::salty( basename($filepath) );
        return base64_decode( self::decrypt($key, file_get_contents($filepath)));
    }
    



}

