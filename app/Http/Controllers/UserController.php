<?php

namespace App\Http\Controllers;

use App\DataTables\FaqDataTable;
use App\Models\Faq;
use App\Models\faq_type;
use App\Models\Faq_Types;
use Hamcrest\Description;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function Faq_for_user(Request $request)
    {
        if($request->status=='all_faq')
        {
            return view('All_Faqs');
        }
         elseif($request->status=='admin_faq')
         {
            return view('Admin_index');
         }
    }

    public function DataTable_Faq(FaqDataTable $dataTable){

        if(request()->ajax()){

            $data = DB::table('faqs')
            ->select(
                    
                'faqs.id as id',
                
                'faqs.display_name as display_name',
                'faqs.description as description',
                'faq_types.type as type'
                )
                ->join('faq_types','faqs.faq_type_id','=','faq_types.id')
                ->get();
           
            return DataTables::of($data)
            
                
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.url('add_edit_faqs/'.'edit'.'/'.$row->id).'" class="edit btn btn-success btn-sm">Edit</a> ';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->tojson();
        }
    
        return $dataTable->render('dashboard');
    }

    public function Add_Edit_FaqView(Request $request)
    {
        
        // dd($request->unique);

        $data['type']=$request->type;
        $data['Faq_types']=faq_type::all();
        if($request->type=='add'){

            

            // dd($data);

                  return view('Add_Edit_FaqView',$data);
                
        }else if($request->type=='edit')
               {
                // dd($request->id);
                $values= DB::table('faqs')->select(
                    
                    'faqs.id as id',
                    
                    'faqs.display_name as display_name',
                    'faqs.description as description',
                    'faq_types.type as type',
                    
                    )
                ->join('faq_types','faqs.faq_type_id','=','faq_types.id')
                ->where('faqs.id',$request->id)->get();

                foreach($values as $single)
                {
                    $data['edit_data']=$single;
                    // $data['edit_data']=$single->description;
                    // $data['edit_data']=$single->type;

                }

                
                 
                 return view('Add_Edit_FaqView',$data);
                        

               }
               
    }

    public function Add_Faq(Request $request)
    {

        $value=$request->except('_token');
        // dd($request->status=='add');
        $request->validate([
            'display_name'=>'required',
            'description'=>'required',
            'type'=>'required',
            
            
        ]);
        $Faq_obj=new Faq();
    // dd($request->status=='add');
        if($request->status=='add')
        {

     
            // $data['id']=faq_type::select('id')->where('type',$request->type)->get();

            // foreach($data as $id)
            // {
            //   $id=$id->id;
            // }

            $get_id=faq_type::select('id')->where('type',$request->type)->get();
       foreach($get_id as $id)
       {
         $id=$id->id;
       }

        //    $id= $data['id'];
     
            $Faq_obj->faq_type_id=$id;
            $Faq_obj->display_name=$request->display_name;
            $Faq_obj->description=$request->description;
            $Faq_obj->save();
            return redirect()->route('dashboard')->withMessage(' add  sucessfully');;


           
        }
        else if($request->status=='edit')
        {
            // dd($request);
            
            // $Faq_obj->type=$request->type;
            // $Faq_obj->display_name=$request->display_name;
            // $Faq_obj->description=$request->description;

            
            $data = DB::table('faq_types')
                ->select('id')->where('type',$request->type)
                ->get();

                foreach($data as $id)
                {
                  $id=$id->id;
                }

                DB::table('faqs')
                ->where('id', $request->id)  
                ->limit(1)  // optional - to ensure only one record is updated.
                ->update(array('display_name' => $request->display_name, 'description'=> $request->description,'faq_type_id'=>$id)); 
            // $update_datas=$request->all();
            // $existing_data=Faq::find($request->id);
            // $existing_data->update($update_datas);
            return redirect()->route('dashboard')->withMessage('update sucessfully.....');


        }
        else  {
            return back()->withMessage('somethid went wrong /.....');
        }

    }
}
