<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
//use App\Project;

use Illuminate\Http\Request;

class StaterkitController extends Controller
{
  // home
  public function home(){
    $breadcrumbs = [
        ['link'=>"home",'name'=>"Home"], ['name'=>"Index"]
    ];
   // return view('/content/home', ['breadcrumbs' => $breadcrumbs]);
  
   return view('/auth/login', ['breadcrumbs' => $breadcrumbs]);
  }

  // Layout collapsed menu
  public function collapsed_menu(){
    $pageConfigs = ['sidebarCollapsed' => true];
    $breadcrumbs = [
        ['link'=>"home",'name'=>"Home"],['link'=>"javascript:void(0)",'name'=>"Layouts"], ['name'=>"Collapsed menu"]
    ];
    return view('/content/layout-collapsed-menu', ['breadcrumbs' => $breadcrumbs, 'pageConfigs' => $pageConfigs]);
  }

  // layout boxed
  public function layout_boxed(){
    $pageConfigs = ['layoutWidth' => 'boxed'];

    $breadcrumbs = [
        ['link'=>"home",'name'=>"Home"],['name'=>"Layouts"], ['name'=>"Layout Boxed"]
    ];
    return view('/content/layout-boxed', [ 'pageConfigs' => $pageConfigs,'breadcrumbs' => $breadcrumbs]);
  }

  // without menu
  public function without_menu(){
    $pageConfigs = ['showMenu' => false];
    $breadcrumbs = [
        ['link'=>"home",'name'=>"Home"],['link'=>"javascript:void(0)",'name'=>"Layouts"], ['name'=>"Layout without menu"]
    ];
    return view('/content/layout-without-menu', [ 'breadcrumbs' => $breadcrumbs,'pageConfigs'=>$pageConfigs]);
  }

  // Empty Layout
  public function layout_empty()
  {
    $breadcrumbs = [['link' => "/dashboard/analytics", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Layouts"], ['name' => "Layout Empty"]];
    return view('/content/layout-empty', ['breadcrumbs' => $breadcrumbs]);
  }

  // capacitacion
  public function capacitacion(){
    /*
    $breadcrumbs = [
        ['link'=>"capacitacion",'name'=>"capacitacion"], ['name'=>"capacitacion"]
    ];
*/
   // $projects = Project::latest()->get();

     // $projects = Project::latest()->get();  Los ultimos
     $projects= DB::table('projects')
     ->select('projects.id AS project_id',
                 'projects.name AS project_name',
                 'projects.image AS project_image',
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
     ->where('circle_project.circle_id',3)
    ->get();
      //  $projects = DB::table('projects')->where('', 'John')->first();
    //return view('/content/capacitacion', ['breadcrumbs' => $breadcrumbs]);
  
    return view('content/capacitacion', compact('projects'));
  }

    // empresarial
    public function empresarial(){
      $projects= DB::table('projects')
      ->select('projects.id AS project_id',
                  'projects.name AS project_name',
                  'projects.image AS project_image',
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
      ->where('circle_project.circle_id',1)
     ->get();
 
   
     return view('content/empresarial', compact('projects'));
    }
  

        // empresarial
        public function productiva(){
          $projects= DB::table('projects')
          ->select('projects.id AS project_id',
                      'projects.name AS project_name',
                      'projects.image AS project_image',
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
          ->where('circle_project.circle_id',2)
         ->get();
 
       
         return view('content/productiva', compact('projects'));
        }
      
      // empresarial
      public function podcast(){
        $breadcrumbs = [
            ['link'=>"podcast",'name'=>"yowarmi"], ['name'=>"podcast"]
        ];
        return view('/content/podcast', ['breadcrumbs' => $breadcrumbs]);
      }

      public function detailspodcast(){
        $breadcrumbs = [
            ['link'=>"detailspodcast",'name'=>"detailspodcast"], ['name'=>"detailspodcast"]
        ];
        return view('/content/detailspodcast', ['breadcrumbs' => $breadcrumbs]);
      }


      public function yowarmi(){
        $breadcrumbs = [
            ['link'=>"yowarmi",'name'=>"yowarmi"], ['name'=>"yowarmi"]
        ];
        return view('/content/yowarmi', ['breadcrumbs' => $breadcrumbs]);
      }
    

  // Blank Layout
  public function layout_blank()
  {
    $pageConfigs = ['blankPage' => true];
    $breadcrumbs = [['link' => "/dashboard/analytics", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Layouts"], ['name' => "Layout Blank"]];
    return view('/content/layout-blank', ['pageConfigs' => $pageConfigs, 'breadcrumbs' => $breadcrumbs]);
  }
}
