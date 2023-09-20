<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Evento;

class FullCalendarController extends Controller {

    public function __construct() {
        $this->middleware( 'auth' );
        $this->middleware( 'admin' );
    }

    public function getEvent() {
        $data = [
            'titulo' => 'Eventos',
            'subtitulo' => 'Listando Eventos',
        ];
        if ( request()->ajax() ) {
            $start = ( !empty( $_GET[ 'start' ] ) ) ? ( $_GET[ 'start' ] ) : ( '' );
            $end = ( !empty( $_GET[ 'end' ] ) ) ? ( $_GET[ 'end' ] ) : ( '' );
            $events = Evento::whereDate( 'start', '>=', $start )->whereDate( 'end',   '<=', $end )
            ->get( [ 'id', 'title', 'start', 'end' ] );
            return response()->json( $events );
        }
        return view( 'fullcalendar', $data );
    }

    public function createEvent( Request $request ) {
        $data = $request->except( '_token' );
        $events = Evento::insert( $data );
        return response()->json( $events );
    }

    public function deleteEvent( Request $request ) {
        $this->middleware( 'auth' );
        $this->middleware( 'admin' );
        $event = Evento::find( $request->id );
        return $event->delete();
    }
}
