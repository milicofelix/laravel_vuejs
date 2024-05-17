<?php

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //instanciando o objeto
        /*  $supplier = new supplier();
         $supplier->name = 'supplier 100';
         $supplier->site = 'supplier100.com.br';
         $supplier->uf = 'CE';
         $supplier->email = 'contato@supplier100.com.br';
         $supplier->save(); */
 
         //o método create (atenção para o atributo fillable da classe)
        /*  supplier::create([
             'name' => 'supplier 200',
             'site' => 'supplier200.com.br',
             'uf' => 'RS',
             'email' => 'contato@supplier200.com.br'
         ]); */
 
         //insert
        /*  DB::table('suppliers')->insert([
             'name' => 'supplier 300',
             'site' => 'supplier300.com.br',
             'uf' => 'SP',
             'email' => 'contato@supplier300.com.br'
         ]); */

         factory(Supplier::class, 100)->create();
    }
}
