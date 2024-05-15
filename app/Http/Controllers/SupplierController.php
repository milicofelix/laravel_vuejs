<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index() {
        // $suppliers = [
        //     0 => [
        //         'nome' => 'Fornecedor 1',
        //         'status' => 'N',
        //         'cnpj' => '0',
        //         'ddd' => '', //São Paulo (SP)
        //         'telefone' => '0000-0000'
        //     ],
        //     1 => [
        //         'nome' => 'Fornecedor 2',
        //         'status' => 'S',
        //         'cnpj' => null,
        //         'ddd' => '85', //Fortaleza (CE)
        //         'telefone' => '0000-0000'
        //     ],
        //     2 => [
        //         'nome' => 'Fornecedor 2',
        //         'status' => 'S',
        //         'cnpj' => null,
        //         'ddd' => '32', //Juiz de fora (MG)
        //         'telefone' => '0000-0000'
        //     ]
        // ];

        // return view('app.supplier.index', compact('suppliers'));
        return view('app.supplier.index');
    }

    public function list(Request $request) {
        
        $suppliers = Supplier::where('name', 'like', '%'.$request->input('name').'%')
        ->where('site', 'like', '%'.$request->input('site').'%')
        ->where('uf', 'like', '%'.$request->input('uf').'%')
        ->where('email', 'like', '%'.$request->input('email').'%')
        ->get();

        return view('app.supplier.list', ['suppliers' => $suppliers]);
    }
    
    public function new(Request $request) {

        $msg = '';

        //inclusão
        if($request->input('_token') != '' && $request->input('id') == '') {
            //validacao
            $rules = [
                'name' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchida',
                'name.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'name.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo uf deve ter no mínimo 2 caracteres',
                'uf.max' => 'O campo uf deve ter no máximo 2 caracteres',
                'email.email' => 'O campo e-mail não foi preenchido corretamente'
            ];

            $request->validate($rules, $feedback);

            $supplier = new Supplier();
            $supplier->create($request->all());

            //redirect

            //dados view
            $msg = 'Cadastro realizado com sucesso';
        }

           //edição
           if($request->input('_token') != '' && $request->input('id') != '') {

            $supplier = Supplier::find($request->input('id'));
            $update = $supplier->update($request->all());

            if($update) {
                $msg = 'Atualização realizado com sucesso';
            } else {
                $msg = 'Erro ao tentar atualizar o registro';
            }

            return redirect()->route('app.suppliers.edit', ['id' => $request->input('id'), 'msg' => $msg]);
            
           }
   
        return view('app.supplier.new', ['msg' => $msg]);
    }

    public function edit($id, $msg = '') {
        
        $supplier = Supplier::find($id);
        return view('app.supplier.new', ['supplier' => $supplier, 'msg' => $msg]);
    }
}
