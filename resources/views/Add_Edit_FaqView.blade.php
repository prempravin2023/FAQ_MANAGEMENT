<x-app-layout>


<div style="" >
       
     
       <div class="container d-flex justify-content-center mt-5 "  style=" font-family:sans-serif;">

   

        {{--signup content--}}
        <div class="text-center d-flex justify-content-center flex-column bg-primary text-white" style="width:400px;height:;">
                 @if(session('message'))
                <span class="alert text-center ">{{session('message')}}</span>
                @endsession
             <h3 class="text-center mb-4">Faqs!</h3>
              <p class="align-self-center mb-4 fs-6 text-justify " style="width: 330px;"> “It’s better to know some of the questions than all of the answers.” 
              </p>
             <button class="btn align-self-center  text-white mb-4 p-2" style="width:260px;background-color:#2666E4;border-radius:30px;">Author <a href="#" class="text-white text-decoration-none">– James Thurber</a></button>
            
        </div>

        {{--signup form--}}
        <div class="d-flex  justify-content-center  bg-light pt-4 px-4" style="width:400px;height:;">
        <table class="table table-borderless form-group">
          <form action="{{ $type=='add' ? route('Faq','add') : url('Faq/edit/'.$edit_data->id)}}" method="post" class="">
                
                @csrf
           
                <tr><th><h2 class="text-center fw-bold">Add your faq</h2></th></tr>
                
                <tr>
                        <td class="p-4">
                        <input type="text" class="form-control p-3 border-0" name="display_name" placeholder="What how why....?" value="{{ $type=='add' ? ($errors->has('display_name') ? old('display_name') :'' ) : $edit_data->display_name}}" style="background-color:#f4f3f3;">
                        @if($errors->has('display_name'))
                        <span class="alert text-danger text-center">{{$errors->first('display_name')}}</span>
                        @endif
                        </td>
                       
                </tr>

                <tr>
                        <td class="p-4">
                        <input type="text" class="form-control p-3 border-0" name="description" placeholder="Description....." value="{{ $type=='add' ? ($errors->has('description') ? old('description') : '') : $edit_data->description}}" style="background-color:#f4f3f3;">
                        @if($errors->has('description'))
                        <span class="alert text-danger text-center">{{$errors->first('description')}}</span>
                        @endif
                        </td>
                       
                </tr>
 
                <tr>

                        <td class="p-4">
                
      
                            <select id="" class="form-control" name="type" >
                                <option    name="type"  >{{$type=='add' ? ($errors->has('type') ? old('type') : 'choose type....') : $edit_data->type}}</option>
                                @foreach($Faq_types as $Faq_type)
                            <option >{{$Faq_type->type}}</option>
                        @endforeach

                            </select>
    
                            @if($errors->has('type'))
                        <span class="alert text-danger text-center">{{$errors->first('type')}}</span>
                        @endif
                        </td>
                       
                </tr>


            
                <tr>
                        <td class="">
                        <input type="submit" class="btn btn-primary  p-2 w-100 border-0" value="{{$type=='add' ? 'ADD' : 'UPDATE' }}">
                        </td>
                </tr>    
             

        </form>
        </table>  
        </div>
        
        </div>
       






    
</div>
</x-app-layout>