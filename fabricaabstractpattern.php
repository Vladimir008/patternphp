<html>
    <head>

    </head>
    <body>
        <h1> Абстрактная фабрика</h1>
        <?php
            // Интерфейс Абстрактной фабрики
            interface AbstractFactory{
                // Процедура для класса AbstracrtProductA
                public function createProductA():AbstracrtProductA;
                // Процедура для класса AbstracrtProductB
                public function createProductB():AbstracrtProductB;
            }

            // Класс Абстрактной фабрики
            class ConreteFactory1 implements AbstractFactory
            {
                // Создаем класс ConcreteProductA1 который основывается на AbstracrtProductA
                public function createProductA():AbstracrtProductA{
                    return new ConcreteProductA1();
                }
                // Создаем класс ConcreteProductB1 который основывается на AbstracrtProductB
                public function createProductB():AbstracrtProductB{
                    return new ConcreteProductB1();
                }
            }

            // Интерфейс
            interface AbstracrtProductA
            {
                // Объявляем функцию
                public function usefulFunctionA():string;
            }

            // Класс AbstracrtProductA1
            class AbstracrtProductA1 implements AbstracrtProductA{
                // Возрощаем значение
                public function usefulFunctionA(): string
                {
                    return "The result of the product A1";
                }
            }

            // Интерфейс
            interface AbstracrtProductB
            {
                // Объявляем функцию
                public function usefulFunctionB:string;
            }
            // Класс
            class AbstractProductB1 implements AbstracrtProductB
            {
                // Возрощаем значение
                public function usefulFunctionB():string
                {
                    return "The result of the product B1";
                }
            }

            // Экземпляр класса абстактной фабрики
            $factory =new ConreteFactory1();
            //$producta класса AbstracrtProductA1
            $producta= $factory->createProductA();
            //$producta класса AbstractProductB1
            $productb= $factory->createProductB();

            // выводим сообшение
            print($producta->usefulFunctionA());
            print($productb->usefulFunctionB());

        ?>
    </body>
</html>