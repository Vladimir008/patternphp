<html>
    <head>

    </head>
    <body>
        <h1> Абстрактная фабрика</h1>
        <?php

            interface AbstractFactory{
                public function createProductA():AbstracrtProductA;
                public function createProductB():AbstracrtProductB;
            }

            class ConreteFactory1 implements AbstractFactory
            {
                public function createProductA():AbstracrtProductA{
                    return new ConcreteProductA1();
                }
                public function createProductB():AbstracrtProductB{
                    return new ConcreteProductB1();
                }
            }

            interface AbstracrtProductA
            {
                public function usefulFunctionA():string;
            }

            class AbstracrtProductA1 implements AbstracrtProductA{
                public function usefulFunctionA(): string
                {
                    return "The result of the product A1";
                }
            }

            interface AbstracrtProductB
            {
                public function usefulFunctionB:string;
            }

            class AbstractProductB1 implements AbstracrtProductB
            {
                public function usefulFunctionB():string
                {
                    return "The result of the product B1";
                }
            }

            $factory =new ConreteFactory1();
            $producta= $factory->createProductA();
            $productb= $factory->createProductB();

            print($producta->usefulFunctionA());
            print($productb->usefulFunctionB());

        ?>
    </body>
</html>