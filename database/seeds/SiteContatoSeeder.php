<?php

use Illuminate\Database\Seeder;
use \App\SiteContato;
class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SiteContato::class,100 )->create();

        /* $site_contato = new SiteContato();
        $site_contato->nome = 'Carlos';
        $site_contato->telefone = '(92) 98465-8126';
        $site_contato->email = 'contato@carlos.com.br';
        $site_contato->motivo_contato = 2;
        $site_contato->mensagem = 'site muito bem feito!!';
        $site_contato->save();

        $site_contato = new SiteContato();
        $site_contato->nome = 'José';
        $site_contato->telefone = '(92) 98648-2569';
        $site_contato->email = 'contato@jose.com.br';
        $site_contato->motivo_contato = 2;
        $site_contato->mensagem = 'não consigo ler nada!!';
        $site_contato->save();

        $site_contato = new SiteContato();
        $site_contato->nome = 'Benedito';
        $site_contato->telefone = '(92) 98265-7412';
        $site_contato->email = 'contato@benedito.com.br';
        $site_contato->motivo_contato = 2;
        $site_contato->mensagem = 'consigo gerenciar de maneira muito intuitiva, parabéns!!';
        $site_contato->save(); */
    }
}
