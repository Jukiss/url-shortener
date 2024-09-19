<?php
require 'vendor/autoload.php';
use Predis\Client;

class UrlShortener {
    private $redis;
    
   
    public function __construct() {
        $this->redis = new Client();
    }

    public function isUnique($id) {
        if($this->getUrl($id)!=0);
        return true;
    }
    public function generateUniqueId($length = 7) {//функция генерации id по заданному алффавиту
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $uniqueId = '';
        for ($i = 0; $i < $length; $i++) {
            $uniqueId .= $characters[rand(0, $charactersLength - 1)];
        }
        if ( $this->isUnique($uniqueId) ){//проверка на уникальность
            return $uniqueId;}
            else{ generateUniqueId();
        
            }
       
    }
    public function shorten($url) {
        $id = $this->generateUniqueId();
        $this->redis->set($id, $url); // запись URL в Redis
        return $id;
    }

    public function getUrl($id) {
        return $this->redis->get($id); // получение URL
    }
}
