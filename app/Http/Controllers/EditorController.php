<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use App\Models\Idioms;
use App\Models\Knowledges;
use App\Models\Laboral_Experience;
use App\Models\Reference;
use App\Models\Soft_Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class EditorController extends Controller
{
    public function getInfo(){
        $id=Auth::user()->id;
        $id_info=User::select('id_information')->where('id',$id)->get();
        $idiomas=Idioms::where('id_information',$id_info)->get();
        $conocimiento=Knowledges::where('id_information',$id_info)->get();
        $experiencia=Laboral_Experience::where('id_information',$id_info)->get();
        $skills=Soft_Skill::where('id_information',$id_info)->get();
        $referencias=Reference::where('id_information',$id_info)->get();
        $formacion=Formation::where('id_information',$id_info)->get();
        $usuario=User::select('users.name','users.email','personal_information.birthday','personal_information.nationality','personal_information.phone_contact','personal_information.about_me','genders.gender')
        ->join('personal_information','personal_information.id','=','users.id_information')
        ->join('genders','genders.id','=','personal_information.genders_id')
        ->where('users.id',$id)
        ->get();

        $info = new stdClass();
        $info->user=$usuario[0];
        $info->idioms=$idiomas;
        $info->knowlegde=$conocimiento;
        $info->experience=$experiencia;
        $info->skills=$skills;
        $info->references=$referencias;
        $info->formations=$formacion;
        
        return json_encode($info);
    }
}
