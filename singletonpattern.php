<?php
    class Preferences{
        // массив данных
        private $props = array();
        //
        private static $instance;

        // Конструктор (закрытый)
        private function  __construct()
        {
        }

        // Создаем экземпляр и сохроняем ИЛИ возрошаем уже созданный ранее
        public static function getInstance(){
            if (empty(self::$instance)){
                self::$instance=new Preferences();
            }
            return self::$instance;
        }

        // Запоминаем значение в массив
        public function setProperty($key,$val){
            $this->props[$key]=$val;
        }

        // Выводи значение по номеру из массива
        public function getProperty($key){
            return $this->props[$key];
        }

    }

    // Создаем или получаем ранее класс
    $pref=Preferences::getInstance();
    // Задаем значение в массив
    $pref->setProperty("name","Ivan");
    // Удаляем ссылку
    unset ($pref);
    // Создаем или получаем ранее класс
    $pref2=Preferences::getInstance();
    // Выводим сообщение
    print $pref2->getProperty("name");