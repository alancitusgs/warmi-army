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
    
      /*
        $articles = Project::get()
                    -> where(auth()->user(),id);



        return view('projects/index', [
            'articles' => $articles
        ]);
        */

        $projects= DB::table('projects')
        ->select('projects.id AS project_id',
                    'projects.name AS project_name',
                    'projects.shortName AS project_shortName',
                    'projects.description AS project_description',
                    'projects.goals AS project_goals',
                    'projects.participants AS project_participants',
                'circles.name AS circle_name',
                'users.name AS author_name',
                'users.lastName AS author_lastName')
        ->join('project_user', 'project_user.project_id', '=', 'projects.id')
       ->leftJoin('users', 'users.id', '=', 'projects.user_id')
        ->leftJoin('circle_project','circle_project.project_id','=','projects.id')
        ->leftJoin('circles','circles.id','=','circle_project.circle_id')
        ->where('project_user.user_id',auth()->user()->id)
       ->get();

         
       $usersProjects = DB::select('select pp.project_id,u.id,u.name,u.lastName,u.image from 
       (select pu.project_id 
       from project_user pu
       where pu.user_id = '.auth()->user()->id.'
       group by pu.project_id) pp
       left join project_user pu2 on pu2.project_id = pp.project_id
       left join users u on u.id = pu2.user_id');

      /* return view('projects/index', [
        'articles' => $articles
    ]);
*/


return view('projects/index')->with(compact('projects','usersProjects'));
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

     return redirect()->action([ProjectController::class, 'index']);

    
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
