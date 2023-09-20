<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller {
    public function __construct() {
        $this->middleware( 'auth' );
        $this->middleware( 'admin' );
    }
    /**
    * Display a listing of the resource.
    */

    public function index() {
        $data = [
            'titulo' => 'Grupos',
            'subtitulo' => 'Gerenciando Grupos do Sistema',
        ];
        return view( 'grupos.index', $data );
    }

    public function recupera_grupos() {
        $atributos = [
            'id',
            'grupo',
            'created_at',
        ];
        $grupos = Grupo::select( $atributos )->get();

        $data = [];

        foreach ( $grupos as $grupo ) {
            $data[] = [
                'id' => $grupo->id,
                'grupo' => '<a href="' . route( 'grupos.show', $grupo->id ) . '">' . $grupo->grupo . '</a>',
                'created_at' => $grupo->created_at->format( 'd/m/Y - H:i' ),
            ];
        }

        $retorno = [
            'data' => $data,
        ];

        return response()->json( $retorno );
    }

    /**
    * Show the form for creating a new resource.
    */

    public function create() {
        //
    }

    /**
    * Store a newly created resource in storage.
    */

    public function store( Request $request ) {
        //
    }

    /**
    * Display the specified resource.
    */

    public function show( string $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    */

    public function edit( string $id ) {
        //
    }

    /**
    * Update the specified resource in storage.
    */

    public function update( Request $request, string $id ) {
        //
    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy( string $id ) {
        //
    }
}
