<?php
 
namespace App\Http\Controllers\Api;
 
use App\Http\Controllers\Controller;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class CineController extends Controller
{
    public function index(){
        $Peliculas = Pelicula::all();
        return $Peliculas;
    }
    public function store(Request $request){
        Pelicula::create([
            "nombre"=>$request->nombre,
            "duracion"=>$request->duracion,
        ]);

        return "Pelicula creado";
    }
    public function update(Request $request){
        $id = $request->id;
        $nombre = $request->nombre;
        $duracion = $request->duracion;
        $producto = Pelicula::where('id_pelicula',$id)->first();
        if(!$producto){
            return 'No existe producto';
        }
       
        Pelicula::where('id_pelicula',$id)->update(['nombre' =>$nombre,'duracion'=>$duracion]);

        return "Pelicula modificada";
    }
    
    public function search(Request $request){
        $nombre= $request->nombre;
        // return ($nombre);
        $productos = Pelicula::where('nombre','LIKE','%'.$nombre.'%')->get();

        return $productos;
    }
}