<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Http\Controllers\Controller;

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
        ->paginate(10);

        return view('app.supplier.list', ['suppliers' => $suppliers, 'request' => $request->all()]);
    }
    
    public function new(Request $request) {

        $msg = '';
        $style = '';
        //inclusão
        if(!empty($request->input('_token')) && empty($request->input('id'))) {
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
            $style = "style=color:green;";
            $msg = 'Cadastro realizado com sucesso';
        }

           //edição
           if(!empty($request->input('_token')) && !empty($request->input('id'))) {
            $supplier = Supplier::find($request->input('id'));
            $update = $supplier->update($request->all());

            if($update) {
                $style = "style=color:green;";
                $msg = 'Atualização realizado com sucesso';
            } else {
                $style = "style=color:red;";
                $msg = 'Erro ao tentar atualizar o registro';
            }
            return redirect()->route('app.suppliers.edit', ['id' => $request->input('id'), 'msg' => $msg, 'style' => $style]);
            
           }
   
        return view('app.supplier.new', ['msg' => $msg, 'style' => $style]);
    }

    public function edit($id, $msg = '', $style = '') {
        
        $supplier = Supplier::find($id);
        return view('app.supplier.new', ['supplier' => $supplier, 'msg' => $msg, 'style' => $style]);
    }

    public function destroy($id) {
        $msg = '';
        $res = Supplier::find($id)->delete();
        $style = "style=color:green;";
        $msg  = $res ? "Registro removido com sucesso!" : "";
        
        return redirect()->route('app.suppliers.list', ['msg' => $msg, 'style' => $style]);
    }
}
