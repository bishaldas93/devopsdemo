<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Data;

class DataController extends Controller
{
    public function devops()
    {
        return view('pages.devops');
    }

    public function readData()
    {
        $data = Data::all(); 
        $query = Data::where('status', 1)->get();
        return response($query);
    }

    public function insert(Request $request)
    {
       $this->validate($request,['domain_name'=>'required','domain_type'=>'required','header_image'=>'image|nullable|max:1999','footer_image'=>'image|nullable|max:1999']);
       
       //Handle Header File Upload
       if($request->hasFile('header_image')){
        //Get filename with extension
        $filenameWithExt = $request->file('header_image')->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
        //Get just et
        $extention = $request->file('header_image')->getClientOriginalExtension();
        //Filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extention;
        //Upload Image
        $path = $request->file('header_image')->storeAs('public/header_images',$fileNameToStore);
    } else {
        $fileNameToStore='noimage.jfif';
    }

    //Handle Footer File Upload
    if($request->hasFile('footer_image')){
        //Get filename with extension
        $filenameWithExt = $request->file('footer_image')->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
        //Get just et
        $extention = $request->file('footer_image')->getClientOriginalExtension();
        //Filename to store
        $fileNameToStore2 = $filename.'_'.time().'.'.$extention;
        //Upload Image
        $path = $request->file('footer_image')->storeAs('public/footer_images',$fileNameToStore2);
    } else {
        $fileNameToStore2='noimage.jfif';
    }


    $pathJson = array('header_logo' => $fileNameToStore, 'footer_logo' => $fileNameToStore2);

    //array_push($pathJson, $fileNameToStore);
    //array_push($pathJson, $fileNameToStore2);




    $allParam = json_encode($pathJson);

       $data = new Data;
       $data->domain_name = $request->input('domain_name');
       $data->domain_type = $request->input('domain_type');
       $data->data_json =   $allParam;
       //$data->data_json = 'jsondefault';
       $data->save();
       return redirect('/devops')->with('info','Record Added Successfully!');


    }
    public function update($id){
        $data= data::find($id);
        return view('pages.update',['data'=>$data]);
    }

    public function edit(Request $request, $id){
        $this->validate($request,['domain_name'=>'required','domain_type'=>'required']);
       
       //Handle Header File Upload
       if($request->hasFile('header_image')){
        //Get filename with extension
        $filenameWithExt = $request->file('header_image')->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
        //Get just et
        $extention = $request->file('header_image')->getClientOriginalExtension();
        //Filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extention;
        //Upload Image
        $path = $request->file('header_image')->storeAs('public/header_images',$fileNameToStore);
    }
    
    //Handle Footer File Upload
    if($request->hasFile('footer_image')){
        //Get filename with extension
        $filenameWithExt = $request->file('footer_image')->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
        //Get just et
        $extention = $request->file('footer_image')->getClientOriginalExtension();
        //Filename to store
        $fileNameToStore2 = $filename.'_'.time().'.'.$extention;
        //Upload Image
        $path = $request->file('footer_image')->storeAs('public/footer_images',$fileNameToStore2);
    } 
    
       
   
        //Update Post
        $data = data::find($id);
        $data->domain_name = $request->input('domain_name');
        $data->domain_type = $request->input('domain_type');
        if($request->hasFile('header_image','footer_image' )){
            $pathJson = array();
            array_push($pathJson, $fileNameToStore);
            array_push($pathJson, $fileNameToStore2);
            $allParam = json_encode($pathJson);
            $data->data_json = $allParam;
        }
        $data->save();

       return redirect('/devops')->with('info','Record Updated Successfully!');
    }

    public function delete($id){

        $data = data::find($id);
      
        $data->delete();
        if($data->header_image != 'noimage.jfif' || $data->footer_image != 'noimage.jfif')
        {
            $image_data=$data->data_json;
            $json_decode=json_decode($image_data, true);

                //Delete Image
            if($data->header_image != 'noimage.jfif')
                {
                    Storage::delete('public/header_images/'.$json_decode[0]);
                }
            if($data->footer_image != 'noimage.jfif')
                {
                    Storage::delete('public/footer_images/'.$json_decode[1]);
                }
        }
       return redirect('/devops')->with('info','Record Deleted Successfully!');
    }
}
