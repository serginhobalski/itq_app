<?php

namespace App\Http\Controllers;

use App\Models\Mensagem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MensagemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuario = Auth::user();
        $usuario_id = Auth::id();
        $qtd_entrada = DB::table('mensagems')->where('destinatario_id', '=', $usuario_id)->count();
        $qtd_enviada = DB::table('mensagems')->where('remetente_id', '=', $usuario_id)->count();
        $attr = [
            'users.id as user_id',
            'users.name as user_name',
            'mensagems.id as principal_id',
            'mensagems.remetente_id as remetente_id',
            'mensagems.destinatario_id as destinatario_id',
            'mensagems.titulo as titulo',
            'mensagems.mensagem as mensagem',
            'mensagems.created_at as created_at',
        ];
        $msg_recebidas = DB::table('mensagems')->where('destinatario_id', '=', $usuario_id)
            ->select($attr)
            ->join('users', 'users.id', '=', 'mensagems.remetente_id')
            ->groupBy('users.id', 'users.name', 'mensagems.id', 'mensagems.remetente_id', 'mensagems.destinatario_id', 'mensagems.titulo', 'mensagems.mensagem', 'mensagems.created_at')
            ->get();
        $msg_enviadas = DB::table('mensagems')->where('remetente_id', '=', $usuario_id)
            ->select($attr)
            ->join('users', 'users.id', '=', 'mensagems.destinatario_id')
            ->groupBy('users.id', 'users.name', 'mensagems.id', 'mensagems.remetente_id', 'mensagems.destinatario_id', 'mensagems.titulo', 'mensagems.mensagem', 'mensagems.created_at')
            ->get();
        $data = [
            'titulo' => 'Mensagens',
            'subtitulo' => 'Caixa de Mensagens',
            'qtd_entrada' => $qtd_entrada,
            'qtd_enviada' => $qtd_enviada,
            'msg_recebidas' => $msg_recebidas,
            'msg_enviadas' => $msg_enviadas,
            'usuario' => $usuario,
        ];
        // dd($data);
        return view('mensagens.index', $data);
    }

    public function enviadas()
    {
        $usuario = Auth::user();
        $usuario_id = Auth::id();
        $qtd_entrada = DB::table('mensagems')->where('destinatario_id', '=', $usuario_id)->count();
        $qtd_enviada = DB::table('mensagems')->where('remetente_id', '=', $usuario_id)->count();
        $attr = [
            'users.id as user_id',
            'users.name as user_name',
            'mensagems.id as principal_id',
            'mensagems.remetente_id as remetente_id',
            'mensagems.destinatario_id as destinatario_id',
            'mensagems.titulo as titulo',
            'mensagems.mensagem as mensagem',
            'mensagems.created_at as created_at',
        ];
        $msg_recebidas = DB::table('mensagems')->where('destinatario_id', '=', $usuario_id)
            ->select($attr)
            ->join('users', 'users.id', '=', 'mensagems.remetente_id')
            ->groupBy('users.id', 'users.name', 'mensagems.id', 'mensagems.remetente_id', 'mensagems.destinatario_id', 'mensagems.titulo', 'mensagems.mensagem', 'mensagems.created_at')
            ->get();
        $msg_enviadas = DB::table('mensagems')->where('remetente_id', '=', $usuario_id)
            ->select($attr)
            ->join('users', 'users.id', '=', 'mensagems.destinatario_id')
            ->groupBy('users.id', 'users.name', 'mensagems.id', 'mensagems.remetente_id', 'mensagems.destinatario_id', 'mensagems.titulo', 'mensagems.mensagem', 'mensagems.created_at')
            ->get();
        $data = [
            'titulo' => 'Mensagens',
            'subtitulo' => 'Caixa de Mensagens',
            'qtd_entrada' => $qtd_entrada,
            'qtd_enviada' => $qtd_enviada,
            'msg_recebidas' => $msg_recebidas,
            'msg_enviadas' => $msg_enviadas,
            'usuario' => $usuario,
        ];
        // dd($data);
        return view('mensagens.enviadas', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuario = Auth::user();
        $usuario_id = $usuario->id;
        $destinatarios = User::all();
        $qtd_entrada = Mensagem::where('destinatario_id', $usuario_id)->count();
        $qtd_enviada = Mensagem::where('remetente_id', $usuario_id)->count();
        $data = [
            'titulo' => 'Enviar',
            'subtitulo' => 'Enviar mensagem',
            'qtd_entrada' => $qtd_entrada,
            'qtd_enviada' => $qtd_enviada,
            'usuario' => $usuario,
            'destinatarios' => $destinatarios,
        ];
        return view('mensagens.create', $data);
    }


    public function store(Request $request)
    {
        Mensagem::create([
            'remetente_id' => $request->input('remetente_id'),
            'destinatario_id' => $request->input('destinatario_id'),
            'titulo' => $request->input('titulo'),
            'mensagem' => $request->input('mensagem'),
        ]);

        return redirect()->route('mensagens.index')->with('success', 'Mensagem enviada!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mensagem = Mensagem::find($id);
        $remetente_id = $mensagem->remetente_id;
        $destinatario_id = $mensagem->destinatario_id;
        $remetente = User::where('id', $remetente_id)->first();
        $destinatario = User::where('id', $destinatario_id)->first();
        $usuario = Auth::user();
        $qtd_entrada = Mensagem::where('destinatario_id', $usuario->id)->count();
        $qtd_enviada = Mensagem::where('remetente_id', $usuario->id)->count();

        $data = [
            'titulo' => 'Mensagens',
            'subtitulo' => 'Mensagens',
            'qtd_entrada' => $qtd_entrada,
            'qtd_enviada' => $qtd_enviada,
            'usuario' => $usuario,
            'mensagem' => $mensagem,
            'remetente' => $remetente,
            'destinatario' => $destinatario,
        ];
        // dd($data);
        return view('mensagens.show', $data);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Mensagem::destroy($id);
        return redirect()->route('mensagens.index')->with('success', 'Mensagem deletada.');
    }
}
