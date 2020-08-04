<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;
use DB;
use Datatables;
use App\Cliente;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application home.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $datausers = DB::SELECT("SELECT * FROM clientes WHERE id=".Auth::user()->clientes_id); 

        if (Auth::user()->hasRole('Admin')){

          return view('cobrofacil.tablaclientesindex');


        }elseif(Auth::user()->hasRole('Cliente')){ 

          return view('home')->with('datausers', $datausers);

        }
    }

    public function viewcliente()
    {
        
        $datausers = DB::SELECT("SELECT * FROM clientes WHERE id=".Auth::user()->clientes_id); 

        return view('cobrofacil.viewcliente')->with('datausers', $datausers);
    }

    // Método para enviar datos cliente

    public function enviardatos(Request $request)
    {

        $iban = $request->iban;
        $dni = $request->dni;
        $direccion = $request->direccion;

        Cliente::where('id',Auth::user()->clientes_id)->update([

              'iban' =>$iban,
              'dni' =>$dni,
              'direccion' =>$direccion

                ]);

        return redirect('viewcliente')->with('success','Los datos han sido actualizados con éxito!');
    } 

    // vista de la tabla clientes 

    public function tablaclientesindex()
    {
        return view('cobrofacil.tablaclientesindex');
    }

    // datos a datatable sobre la vista clientes

    public function tablaclientes()
    {

        //Query que muestra los clientes SIN perfil Administrador model_has_roles.role_id=2
        $tablaclientes = DB::select("SELECT clientes.id, clientes.apellidos, clientes.nombres, clientes.email, clientes.dni 
                                      FROM clientes INNER JOIN users ON clientes.id=users.clientes_id 
                                      INNER JOIN model_has_roles ON users.id=model_has_roles.model_id 
                                      WHERE model_has_roles.role_id=2
                                      GROUP BY clientes.id");
        
                     return Datatables::of($tablaclientes)
                     ->addColumn('action', function ($tablaclientes) {

                return '<a onclick="vclientes('."'".$tablaclientes->id."'".')" href="" class="show-vclientes-modal btn btn-xs btn-info" data-dni ="'.$tablaclientes->dni.'" data-apellidos="'.$tablaclientes->apellidos.'" data-nombres ="'.$tablaclientes->nombres.'"  data-email ="'.$tablaclientes->email.'"  data-telefono ="'.$tablaclientes->telefono.'"  data-iban ="'.$tablaclientes->iban.'" data-direccion ="'.$tablaclientes->direccion.'" data-toggle="modal" data-target="showvclientesModa">Facturación</a>&nbsp;';
            })->make(true);
    }

    // Ventana emergente clientes

    public function jsvclientes(){


        return view('cobrofacil.jsvclientes');


    }

}
