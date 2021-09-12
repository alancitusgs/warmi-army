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

$request_projects = DB::select("SELECT pr.id AS request_id, 
pr.project_id as project_id, 
pr.user_id as user_id, 
p.name as project_name, 
p.image as project_image, 
p.shortName as project_shortName, 
u.name as user_name, 
u.lastName user_lastName, 
u.email AS user_email, 
u.career AS user_career, 
u.image AS user_image,
u.lookingFor as user_looking 
FROM project_requests pr INNER JOIN projects p ON p.id = pr.project_id INNER JOIN users u ON u.id = pr.user_id 
WHERE pr.project_id IN (SELECT project_id FROM project_user WHERE user_id = ".auth()->user()->id." GROUP BY project_id) AND pr.state = 0 
");
$numRequest = sizeof($request_projects);

//return view('projects/index')->with(compact('projects','usersProjects'));

return view('projects/index')->with(compact('projects','usersProjects','request_projects','numRequest'));

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


        $newProjectId =  DB::table('projects')->insertGetId([
             'name' => $data['name'],
             'description' => $data['description'],
             'goals' => $data['goals'],
             'image' => $data['image'],
             'image' => $ruta_imagen,
            'user_id' => Auth::user()->id
            //'user_id' => $data['user_id']
             
        ]);




    

                 // Insertando en tabla circle_project (para cuando un proyecto pertenezca a varios circulos)        
                 $newProjectInCircle = DB::table('circle_project')->insertGetId(
                  array('project_id' => $newProjectId, 
                          'circle_id' => $request->circle_id,
                          'created_at' => new \dateTime,
                         'updated_at' => new \dateTime )
                  );
  
              // Insertando en tabla project_user al creador (primer miembro)
              $id = DB::table('project_user')->insertGetId(
                      array('user_id' => Auth::user()->id, 
                              'project_id' => $newProjectId)
                  );
  
              //Se incrementa la cantidad de parcipantes
              DB::table('projects')
                      ->where('id', $newProjectId)
                      ->update(['participants' => 1]);

     //
 
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
