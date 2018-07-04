<htm>
    <head>
        <title>
            Фабричный метод (Порождающий паттерн)
        </title>
    </head>
    <body>
        <?php
            echo "Фабричный метод (Порождающий паттерн)";


            //
            abstract class Product{}
            //
            class ProductA extends Product{}
            //
            class ProductB extends Product{}
            // абстрактный класс фабрики
            abstract class FactoryAbstract{
                public function create($type){
                    switch($type){
                        case 'A':return new ProductA();
                        case 'B':
                        default:
                            return new ProductB();
                    }
                }
            }
            //
            class Factory


        ?>

    </body>

</htm>
