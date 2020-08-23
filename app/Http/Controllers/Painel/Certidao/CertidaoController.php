<?php

namespace App\Http\Controllers\Painel\Certidao;

use App\Certidao;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CertidaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->hasFile('certidao')) {
            $certidao = $request->certidao;

            $validator = Validator::make($request->only('certidao'), [
                'certidao' => 'required|mimes:pdf|max:2048',
            ]);

            if ($validator->fails()) {

                return response()->json([
                    'status' => '403',
                    'message' => 'arquivo invalido',
                ]);

            } else { //aqui cria a certidao

                $cert = Certidao::where([
                    ['id_tipo', '=', $request->id_tipo],
                    ['id_fornecedor', '=', $request->id_fornecedor],
                ])->first();

                if ($cert) {
                    Storage::delete($cert->url);
                    $cert->delete();
                }
                $url = $certidao->store('certidoes');
                $request->request->add(['url' => $url]);
                $certidao = Certidao::create($request->all());

                return response()->json([
                    'status' => '200',
                    'certidao' => $certidao,
                    'forn' => $cert,

                ]);
            }

        } else {
            return response()->json([
                'status' => '403',
                'message' => 'arquivo nao existe',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
