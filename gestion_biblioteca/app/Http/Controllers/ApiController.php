<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Books;
// ORM de larabel Eloquent

class ApiController extends Controller
{
  // Devuelve todos los libros, en formato JSON
    public function index(){
      $libros = Books::with('author')->get();
      return response()->json($libros);
    }


    // Funcion para crear libros
    public function store(Request $request){
      
      try{

        $request -> validate([
          'title' => 'required|string',
          'author_id' => 'required|integer',
          'published_year' => 'required|integer',
        ]);


        $book = new Books();
        $book -> title = $request -> input('title');
        $book -> author_id = $request -> input('author_id');
        $book -> published_year = $request -> input('published_year');
        $book -> save(); // Guardo en bd
        return response()->json($book); // Devuelvo lo creado en formato Json


      }catch(\Exception $e){  
        return response()->json(['error' => 'Error al crear el libro'.$e->getMessage()],500);
      }
    }


        // Eliminar libros
    public function destroy($id){

      try{

        $book = Books::find($id);

        // Caso: Libnro no encontrado
        if(!$book){
          return
         response() ->json(['libro no encontrado'],404);
        }else{
          $book -> delete();
        }
   
   
        $book -> delete();
        return response() ->json(['libro eliminado'],200);
        

      }catch(\Exception $e){

      };
    }

}
