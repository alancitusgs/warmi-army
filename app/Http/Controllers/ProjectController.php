<?php

namespace App\Http\Controllers;

use App\Models\Project;

//use App\CategoriaReceta;
use Illuminate\Support\Str;
use Illuminate\Http\Request;



use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;





class ProjectController extends Controller
{
    //
    public function index()
    {
        
        $projects = Project::latest()->get();

        /*
        // Mostrar las recetas por cantidad de votos
        // $votadas = Receta::has('likes', '>', 0)->get();
        $votadas = Receta::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();

        // Obtener las recetas mas nuevas
        $nuevas = Receta::latest()->take(6)->get();

        // obtener todas las categorias
        $categorias = CategoriaReceta::all();
        // return $categorias;

        // Agrupar las recetas por categoria
        $recetas = [];

        foreach($categorias as $categoria) {
            $recetas[ Str::slug( $categoria->nombre ) ][] = Receta::where('categoria_id', $categoria->id )->take(3)->get();
      
      
      */
      
       // }

        // return $recetas;


        //return view('content.capacitacion', compact('projects'));
    }


    public function create()
    {
        // DB::table('categoria_receta')->get()->pluck('nombre', 'id')->dd();

        // Obtener las categorias (sin modelo)
        // $categorias =  DB::table('categoria_recetas')->get()->pluck('nombre', 'id');

        // Con modelo
     //   $categorias = CategoriaReceta::all(['id', 'nombre']);

        return view('projects.create');
       // dd('123');
        
    }

    
    public function store(Request $request)
    {

        // dd(  $request['imagen']->store('upload-recetas', 'public') );


        // validación
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'goals' => 'required',
         'image' => 'required|image',
          'user_id' => 'required'



        ]);

        // obtener la ruta de la imagen
       $ruta_imagen = $request['image']->store('upload-project', 'public');

        // Resize de la imagen
      $img = Image::make( public_path("storage/{$ruta_imagen}"))->fit(1000, 550);
        $img->save();

        // almacenar en la bd (sin modelo)
        // DB::table('recetas')->insert([
        //     'titulo' => $data['titulo'],
        //     'preparacion' => $data['preparacion'],
        //     'ingredientes' => $data['ingredientes'],
        //     'imagen' => $ruta_imagen,
        //     'user_id' => Auth::user()->id,
        //     'categoria_id' => $data['categoria']
        // ]);

               DB::table('projects')->insert([
             'name' => $data['name'],
             'description' => $data['description'],
             'goals' => $data['goals'],
             'image' => $data['image'],
           'image' => $ruta_imagen,
           // 'user_id' => Auth::user()->id
            //'user_id' => $data['user_id']
             
        ]);

        // almacenar en la BD (con modelo)

        /*
        auth()->user()->project()->create([
             'name' => $data['name'],
             'description' => $data['description'],
             'goals' => $data['goals'],
             'image' => $ruta_imagen,
             'user_id' => $data['user_id']
        ]);
*/


        // Redireccionar
      //  return redirect()->action('RecetaController@index');
      return view('content/home');

    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        // Obtener si el usuario actual le gusta la receta y esta autenticado
        $like = ( auth()->user() ) ?  auth()->user()->meGusta->contains($receta->id) : false; 

        // Pasa la cantidad de likes a la vista
        $likes = $receta->likes->count();

        return view('recetas.show', compact('receta', 'like', 'likes'));
    }


















}
