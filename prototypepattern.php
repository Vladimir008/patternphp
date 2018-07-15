<?php
    // Класс море
    class Sea{
        // закрытая переменная (проходимость)
        private $navigability=0;
        // конструктор
        function __construct($navigability=0)
        {
            $this->navigability=$navigability;
        }

    }
    // Клас Земленое Море от моря
    class EarhSea extends Sea{}
    // Класс МарсМоре от моря
    class MarsSea extends Sea{}

    // Класс земля
    class Plains {}
    // Земная земля от земля
    class EarhPlains extends Plains{}
    // Земля марса от земля
    class MarsPlains extends Plains{}

    // Лес
    class Forest {}
    // Земной лес от леса
    class EarhForest extends Forest{}
    // Лес на марсе от леса
    class MarsFIrest extends Forest{}


    // Фабрика создания локации
    class TerrainFactory{

        // Переменные где хронятся сылки на классы
        private $sea;
        private $forest;
        private $plains;

        // конструктор класса
        function __construct(Sea $sea,Plains $plains,Forest $forest){
            $this->sea=$sea;
            $this->plains=$plains;
            $this->forest=$forest;
        }
        // клонируем
        function getSea(){
            return clone $this->sea;
        }
        // клонируем
        function getPlains(){
            return clone $this->plains;
        }
        // клонируем
        function getForest(){
            return clone $this->forest;
        }
    }

    // Фабрика геолакации
    $factory=new TerrainFactory(new EarhSea(-9),new EarhPlains(),new EarhForest());
    // Выводим операцию клонирование
    print_r($factory->getSea());
    print_r($factory->getPlains());
    print_r($factory->getForest());