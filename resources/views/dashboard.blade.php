<x-app-layout>
    
@if(session('message'))
               <div class="d-flex justify-content-center" style="position: absolute;left:500px;top:0px">
                <div class="toast" data-autohide="true" >
                        <div class="toast-header">
                        <strong class="mr-auto text-primary">Success</strong>
                        <small class="text-muted"></small>
                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
                        </div>
                        <div class="toast-body">
                            {{session('message')}}
                            {{session_unset()}}
                        </div>
                </div>   
                </div>
        @endif
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Type</th>
                <th>Display_name</th>
                <th>Description</th>
               
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

   
    <script type="text/javascript">
      
      $(function () {
  var table = $('.data-table').DataTable({
      processing: true,
      serverSide: true,
      
      ajax: "{{ route('dashboard') }}",
      columns: [
          {data: 'id', name: 'id'},
          {data: 'type', name: 'type'},
          {data: 'display_name', name: 'display_name'},
          {data: 'description',name: 'description'}, 
          
          {data: 'action'},
      ]

    
  });
}); 
    </script>
            <script>
$(document).ready(function(){
  
    $('.toast').toast('show');
  
});
</script>
</x-app-layout>
