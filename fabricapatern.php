<htm>
    <head>
        <title>
            Фабричный метод (Порождающий паттерн)
        </title>
    </head>
    <body>
        <?php
            echo "Фабричный метод (Порождающий паттерн)";
            // Абстрактный класс для класса ProductA и ProductB
            abstract class Product{}
            //класс ProductA
            class ProductA extends Product{
                //Выводим сообщение
                public function show(){
                    echo 'A';
                }
            }
            //класс ProductA
            class ProductB extends Product{
                // Выводим сообщение
                public function show(){
                    echo 'B';
                }
            }
            // абстрактный класс фабрики, для создания под классов
            abstract class FactoryAbstract{
                // метод создания
                public function create($type){
                    switch($type){
                        //создаем на класс ProductA
                        case 'A':return new ProductA();
                        //создаем на класс м
                        case 'B':
                        default:
                            return new ProductB();
                    }
                }
            }
            //Класс фабрика
            class Factory extends FactoryAbstract{}

            // Экземпляр класс Фабрика
            $MyClassFactory=new Factory();
            //Создаем класс ProductA
            $productA=$MyClassFactory->create('A');
            //Выводим сообшение
            $productA->show();
            //Создаем класс ProductB
            $productB=$MyClassFactory->create('B');
            //Выводим сообшение
            $productB->show();

        ?>

    </body>

</htm>
