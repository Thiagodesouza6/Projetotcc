<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      /*DB::insert('insert into contatos (telefone, email, linkwpp, linkfacebook, linkinstagram) values (?,?,?,?,?)', 
        array('55169933255','gutoferrera@123456', '', '', ''));
        
        DB::insert('insert into banners (banner1, banner2, banner3) values (?,?,?)', 
        array('banner.jpg','tupperwarecustombanner.jpg', 'banner.jpg'));
        DB::insert('insert into produtos (nome, descricao, quantidade, valor, image, categoria, tag, peso, largura, comprimento, altura, capacidade, cor) 
        values (?,?,?,?,?,?,?,?,?,?,?,?,?)', 
        array('TUPPERWARE MODULAR QUADRADO PLUS 4 LITROS ROSA','O Modular Quadrado Tupperware é uma peça versátil que pode ser utilizada tanto para armazenamento de alimentos como para guardar objetos.',
         '2', '149', 'b24ecda61c.jpg', 'Armazenar', 'Novidade', '0.2','10', '16', '2', '4 Litros', 'Branco'));
         DB::insert('insert into produtos (nome, descricao, quantidade, valor, image, categoria, tag, peso, largura, comprimento, altura, capacidade, cor) 
         values (?,?,?,?,?,?,?,?,?,?,?,?,?)', 
         array('TUPPERWARE JEITOSINHO LILÁS 400ML','As diversas cores dos Jeitosinhos ajudam você a congelar diversos tipos de alimento ocultando possíveis manchas!',
          '2', '149', 'ab6ff41a88.jpg', 'Freezer', 'Promoção', '0.2', '10', '16', '2', '400ml', 'Roxo'));
          DB::insert('insert into produtos (nome, descricao, quantidade, valor, image, categoria, tag, peso, largura, comprimento, altura, capacidade, cor) 
          values (?,?,?,?,?,?,?,?,?,?,?,?,?)', 
          array('TUPPERWARE CAIXA ARROZ BISTRÔ 5KG PLUS','Nova Tupper Caixa Arroz 5 Plus! Agora mais espaçosa para todos os tipos de arroz!',
           '2', '114', '55182e910a.jpg', 'Armazenar', 'Mais Vendidos', '0.2', '10', '16', '2', '5kg', 'Branco'));
           DB::insert('insert into produtos (nome, descricao, quantidade, valor, image, categoria, tag, peso, largura, comprimento, altura, capacidade, cor) 
           values (?,?,?,?,?,?,?,?,?,?,?,?,?)', 
           array('TUPPERWARE MODULAR REDONDO DISPENSER 440ML ROSA','O Conjunto Tupperware de Modulares e atendem às necessidades de armazenagem e organização de armários e despensas, graças a sua diversidade de formatos e tamanhos. As tampas do produto evitam quaisquer vazamentos e protegem da umidade e das impurezas do ar.',
            '3', '35', 'a411669087.jpg', 'Armazenar', 'Promoção', '0.2', '10', '16', '2', '440ml', 'Branco'));
            DB::insert('insert into produtos (nome, descricao, quantidade, valor, image, categoria, tag, peso, largura, comprimento, altura, capacidade, cor) 
            values (?,?,?,?,?,?,?,?,?,?,?,?,?)', 
            array('TUPPERWARE BASIC LINE 500ML ROSA','O Conjunto Tupperware de Modulares e atendem às necessidades de armazenagem e organização de armários e despensas, graças a sua diversidade de formatos e tamanhos. As tampas do produto evitam quaisquer vazamentos e protegem da umidade e das impurezas do ar.',
             '2', '35', 'd2013f1c3f.jpg', 'Freezer', 'Promoção', '0.2', '10', '16', '2', '500ml', 'Rosa'));
             DB::insert('insert into produtos (nome, descricao, quantidade, valor, image, categoria, tag, peso, largura, comprimento, altura, capacidade, cor) 
             values (?,?,?,?,?,?,?,?,?,?,?,?,?)', 
             array('TUPPERWARE JEITOSINHO MARACUJÁ 400ML','A Tupperware Jeitosinho Maracujá (Amarelo) de 500 ml é confeccionada e perfeita para guardar os alimentos de cor amarelado. Tem o fechamento exclusivo Tupperware com vedação perfeita para não ter contato com o ar, mantendo a conservação e gosto dos alimentos. ',
              '2', '27', '8022a98aba.jpg', 'Freezer', 'Mais Vendidos', '0.2', '10', '16', '2', '500ml', 'Amarelo'));
              DB::insert('insert into produtos (nome, descricao, quantidade, valor, image, categoria, tag, peso, largura, comprimento, altura, capacidade, cor) 
              values (?,?,?,?,?,?,?,?,?,?,?,?,?)', 
              array('TUPPERWARE JARRA PREMIER 2 LITROS POLICARBONATO PÚRPURA','A Tupperware Jeitosinho Maracujá (Amarelo) de 500 ml é confeccionada e perfeita para guardar os alimentos de cor amarelado. Tem o fechamento exclusivo Tupperware com vedação perfeita para não ter contato com o ar, mantendo a conservação e gosto dos alimentos. ',
               '2', '27', '7e092ae9d9.jpg', 'Freezer', 'Mais Vendidos', '0.2', '10', '16', '2', '500ml', 'Roxo'));
               DB::insert('insert into produtos (nome, descricao, quantidade, valor, image, categoria, tag, peso, largura, comprimento, altura, capacidade, cor) 
              values (?,?,?,?,?,?,?,?,?,?,?,?,?)', 
              array('GARRAFA TUPPERWARE ECO TUPPER PLUS 500ML LAGOA','A Garrafa Eco Tupper Plus 500ml o produto e Perfeito para você armazenar seus líquidos de maneira eficiente. Cabe perfeitamente na porta da geladeira ou pode ser guardada deitada e não vaza. Com um design moderno e diferenciado na cor lagoa verde ela apresenta uma tampa flip-top que facilita na hora de abrir e fechar. ',
               '2', '49', 'fbb7237626.jpg', 'Garrafa', 'Novidade', '0.2', '10', '16', '2', '500ml', 'Verde'));
               DB::insert('insert into produtos (nome, descricao, quantidade, valor, image, categoria, tag, peso, largura, comprimento, altura, capacidade, cor) 
               values (?,?,?,?,?,?,?,?,?,?,?,?,?)', 
               array('GARRAFA TUPPERWARE ECO TUPPER PLUS 500ML AZUL ÍRIS','A Garrafa Eco Tupper Plus 500ml o produto e Perfeito para você armazenar seus líquidos de maneira eficiente. Cabe perfeitamente na porta da geladeira ou pode ser guardada deitada e não vaza. Com um design moderno e diferenciado na cor Azul íris ela apresenta uma tampa flip-top que facilita na hora de abrir e fechar e possui alça para auxiliar no transporte e na hora de servir.',
                '2', '32', 'a0fe1e7a8e.jpg', 'Garrafa', 'Novidade', '0.2', '10', '16', '2', '500ml', 'Azul'));*/
    }
}
