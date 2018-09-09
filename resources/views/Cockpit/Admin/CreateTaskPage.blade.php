@extends('Cockpit.Layout.MainLayout')

@section('content')

<div class="main-panel"> 
    <div class="content-wrapper">
        <div class="row">
        <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Create User</h4>
                  <p class="card-description">
                        @if(session('success')) 
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                        @endif  
                  </p>
                    {!! Form::open( ['action' => 'AdminController@CreateTask', 'method' => 'POST','enctype' => 'multipart/form-data','id' => 'myForm'] ) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Name of the task')!!}
                            {!! Form::text('name',' ', ['class' => 'form-control input-rounded', 'placeholder'=>'Enter the name', 'id'=>"head" ,'name'=>"head", 'required'] )!!}
                            @if(($errors)->has('name'))  <p>{{$errors->first('name')}}</p> @endif
                         </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description of task')!!}
                            {!! Form::textarea('description',' ', ['class' => 'form-control input-rounded', 'placeholder'=>'Enter the email'] )!!}
                            @if(($errors)->has('description'))  <p>{{$errors->first('description')}}</p> @endif
                         </div>
                        <div class="form-group">
                            {!! Form::label('date', 'Deadline')!!}
                            {!! Form::date('date', ' ',['class' => 'form-control input-rounded','id' =>"date",'name' =>"date"] )!!}
                            @if(($errors)->has('date'))  <p>{{$errors->first('date')}}</p> @endif
                        </div> 
                        <div class="form-group">
                            {!! Form::label('department', 'Select Department')!!}
                            {!! Form::select('department',[' '=>'Chosse Option'] + $departments ,null,['class' => 'form-control dynamic', 'data-dependent'=>"departments"] )!!}
                            @if(($errors)->has('department'))  <p>{{$errors->first('department')}}</p> @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('select_mem', 'Select Member')!!}
                            {!! Form::text('select_mem',' all', ['class' => 'form-control input-rounded', 'id'=>"mem_name" ,'name'=>"name" ,'value'=>'All',] )!!}
                            @if(($errors)->has('cpassword'))  <p>{{$errors->first('password')}}</p> @endif
                            <div id="name">
                            <ul style="list-style-type: none;">
                            </ul>
                        </div>
                        </div>     
                        {!! Form::hidden('_method','POST') !!}
                        <div class="form-group">
                  <button class="btn btn-primary" type="submit" id="send">Send</button>
                 </div>
                    {!! Form::close() !!}
                </div>
              </div>
            </div> 
            </div>  
        </div>
     </div>

@section('script')
   
<script>
 $(document).ready(function(){
 $('.dynamic').change(function(){  
  if($(this).val() != '')
  {
    
        var value = $(this).val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
        url:"{{ route('AdminController.fetch') }}",
        method:"POST",
        data:{value:value,_token:_token},
        success:function(output)
        {
            $("#name").html(output);
            console.log(output);
        },
          error: (error) => {
                     console.log(JSON.stringify(error));
   }
   })
  }
 });
});
</script>

<script type="text/javascript">
	 $('#myForm').submit(function(e){
 //e.preventDefault();
 $('#send').html("Sending....");
// $.ajax({
//             type:'POST',
//             url: $(this).attr('action'),
//             data:new FormData(this),
//             cache:false,
//             contentType: false,
//             processData: false,
//             success:function(data){
//              //   $('#successpost').html(data);
//                swal("Success!", "Posted successfully" , "success");
//                 $('#myForm')[0].reset();
//  $('#send').html("Send");

  
//             },
//             error: function(data){
//                  swal("Error!", "Failed to post" , "error");

//                $('#send').html("Send");
 
//             }
//         });
   });





$('#mem_name').click(function(){
  $('#name').slideDown();
})


</script>



@endsection 

   
@endsection