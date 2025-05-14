<?php

namespace App\Http\Controllers;

use App\Exports\ClientesExport;
use App\Models\Cliente;
use App\Models\Departamento;
use App\Models\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ClienteController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::orderBy('dep_nombre')->get();
        return view('index', compact('departamentos'));
    }

    public function crear(Request $request)
    {
        $validate = $this::validar($request);

        // check validation
        if ($validate->fails()) {
            $response = [
                'success' => false,
                'errors' => $validate->messages()
            ];
            return response()->json($response, 422);
        }

        // try to store the book
        try {
            $status = 201;
            $success = true;
            $message = "Cliente creado correctamente";

            Cliente::create([
                'cli_nombre' => $request->nombre,
                'cli_apellido' => $request->apellido,
                'cli_cedula' => $request->cedula,
                'departamento_id' => $request->departamento_id,
                'municipio_id' => $request->municipio_id,
                'cli_celular' => $request->celular,
                'cli_email' => $request->email,
                'cli_terminos_condiciones' => $request->terminos_condiciones ? true : false
            ]);
        } catch (\Illuminate\Database\QueryException $ex) {
            $status = 400;
            $success = false;
            $message = $ex->getMessage();
        }

        // make response
        $response = [
            'success' => $success,
            'message' => $message
        ];

        // return response
        return response()->json($response, $status);
    }

    public function ganador()
    {

        $totalClientes = Cliente::count();

        if ($totalClientes < 5) {
            return view('ganador')->with([
                'ganador' => null,
                'mensaje' => 'Debe haber al menos 5 clientes registrados para mostrar un ganador.'
            ]);
        }

        $ganador = Cliente::with(['departamento', 'municipio'])->inRandomOrder()->first();

        return view('ganador')->with([
            'ganador' => $ganador,
            'mensaje' => null
        ]);
    }

    public function exportar()
    {
        return Excel::download(new ClientesExport, 'clientes.xlsx');
    }

    public function municipios($departamento_id)
    {
        $municipios = Municipio::where('departamento_id', $departamento_id)->orderBy('mun_nombre')->get();
        return response()->json($municipios);
    }

    public function departamentos()
    {
        $departamentos = Departamento::orderBy('dep_nombre')->get();
        return response()->json($departamentos);
    }

    static function validar(Request $request)
    {
        return  Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'cedula' => 'required|integer|unique:clientes,cli_cedula',
            'departamento_id' => 'required|exists:departamentos,dep_id',
            'municipio_id' => 'required|exists:municipios,mun_id',
            'celular' => 'required|digits_between:7,15',
            'email' => 'required|email|unique:clientes,cli_email',
            // 'cli_terminos_condiciones' => 'accepted'
        ]);
    }
}
