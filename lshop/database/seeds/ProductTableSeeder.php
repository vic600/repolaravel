<?php

use Illuminate\Database\Seeder;
use App\products;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product=new products([
'imagepath'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTO0RzSzyQ36QCH376rdzZLds38cydPEsTUuv8Nedl9xG8Cw8cO',
'title'=>'grips',
'price'=>'20',
'description'=>'leather made universal '
        ]);
        $product->save();
        $product=new products([
            'imagepath'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTEruNVMO8MkkL9Lp5g6GsWz4yYRAHuIB7O8qVnQTyPDEobHdhn',
            'title'=>'solo seat',
            'price'=>'40',
            'description'=>'leather made universal '
                    ]);
                    $product->save();
                    $product=new products([
                        'imagepath'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRyatR6ih-7RzWm-SRoxTndW1WhW-UL6uqWGByaekc60F75F7kK',
                        'title'=>'exhaust',
                        'price'=>'100',
                        'description'=>'steel made universal '
                                ]);
                                $product->save();
                                $product=new products([
                                    'imagepath'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSEMQa40IDr3AYWF8RyeDG1ag8UNg2N2T-4-g4osZaVDYpaNbyP',
                                    'title'=>'dragbar',
                                    'price'=>'20',
                                    'description'=>'steel made bar '
                                            ]);
                                            $product->save();
                                            $product=new products([
                                                'imagepath'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6UDhiihuyGiT99hIE7Mlvd478yydD6Qc10TFJ7qBZ8X90qb6aIw',
                                                'title'=>'paint can',
                                                'price'=>'10',
                                                'description'=>'tan with primer'
                                                        ]);
                                                        $product->save();
                                                        $product=new products([
                                                            'imagepath'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQbSYOAvtdtD4bWnNfC8WPiTsWILB6BiVfnsUvDXdRzWGNBqCfr',
                                                            'title'=>'rear fender',
                                                            'price'=>'25',
                                                            'description'=>'universal for yamaha dragstar'
                                                                    ]);
                                                                    $product->save();
                                                                    $product=new products([
                                                                        'imagepath'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRO6CbCOvkBS4B7JAgIXFnnzK47CY4otRyDGNFEgnGzhVlLtk6c_A',
                                                                        'title'=>'custom tank',
                                                                        'price'=>'150',
                                                                        'description'=>'steel made universal '
                                                                                ]);
                                                                                $product->save();
                                                                                $product=new products([
                                                                                    'imagepath'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTHE1RNzLIZr885yHgl0rM2xtbj6G-Wls9U5d1X1cLxnZG0XZJW',
                                                                                    'title'=>'indicators',
                                                                                    'price'=>'50',
                                                                                    'description'=>'front and rear set universal '
                                                                                            ]);
                                                                                            $product->save();
                                                                                            $product=new products([
                                                                                                'imagepath'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2tE7K2bWuKaDjHKgb4LRoFXEArVmQrsWgK6ySM1EdP4fd-lkt',
                                                                                                'title'=>'rear mounts',
                                                                                                'price'=>'40',
                                                                                                'description'=>'steel made universal '
                                                                                                        ]);
                                                                                                        $product->save();
    }
}
