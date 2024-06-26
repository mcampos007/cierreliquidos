<?php

namespace App\Http\Controllers\Admin;

use App\Turno;
use App\Surtidor;
use App\TurnoDetail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TurnoController extends Controller {

    public function index() {
        //
    }

    public function create() {
        //
    }

    public function store( Request $request ) {
        //
    }

    public function editarturno( $id ) {
        //

        $turno = Turno::where( 'id', $id )->first();

        return view( 'admin.turnos.edit', compact( 'turno' ) );

    }

    public function edit( $id ) {
        //
    }

    public function update( Request $request, $id ) {
        //
        // Validar los datos del formulario
        $validatedData = $request->validate( [
            'turno' => 'required|string|max:15',
            'fecha' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'efectivo' => 'nullable|numeric',
            'ctacte' => 'nullable|numeric',
            'visa' => 'nullable|numeric',
            'electron' => 'nullable|numeric',
            'maestro' => 'nullable|numeric',
            'mastercard' => 'nullable|numeric',
            'american' => 'nullable|numeric',
            'cheques' => 'nullable|numeric',
            'otros' => 'nullable|numeric',
        ] );
        try {
            // Buscar el turno o lanzar una excepción si no se encuentra
            $turno = Turno::findOrFail( $id );
            // Actualizar el turno con los datos validados
            $turno->update( $validatedData );

            // Redirigir con un mensaje de éxito
            return redirect()->route( 'home' )->with( 'success', 'Turno actualizado correctamente.' );

        } catch ( \Exception $e ) {
            // Manejar errores y redirigir con un mensaje de error
            return redirect()->back()->with( 'error', 'Ocurrió un error al actualizar el turno: ' . $e->getMessage() );

        }

    }

    public function destroy( $id ) {
        //
    }
}
