@extends('layouts.app')

@section('content')

<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0 text-primary"></h4>
    </div>
    <div class="page-rightheader">
    @can('user-add')
        <div class="btn-list">
            <a href="{{route('user.add')}}" class="btn btn-primary btn-pill" >
                <i class="fa fa-plus"></i> Add New</a>
        </div>
    @endcan
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-default-color">
                <div class="card-title">Users</div>


                
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                      
                        <div class="row">

                      <form >
                                @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                        @php
                                            Session::forget('success');
                                        @endphp
                                    </div>
                                    @endif
                                <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group mb-4">
                                         <input type="text" class="form-control input-text"  name="email" placeholder="Search Email...." aria-label="Recipient's username" aria-describedby="basic-addon2"  id="filter_email">
                                        
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="input-group mb-4"> <input type="text"   name="phone_number"  class="form-control input-text" id="filter_phone" placeholder="Search Phone...." aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="input-group mb-4"> 
                                        <select name="role" id="filter_designation" class="form-select" aria-label="Recipient's username" aria-describedby="basic-addon2">                                            
                                            <option value="">Designation</option>
                                            @foreach($designation as $key=>$value)
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                
                                </div>

                                <div class="col-md-4" id="myDIV" style="display :none">
                                    <div class="input-group mb-4"> 
                                        <select    name="status" id="filter_status" class="form-control input-text" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                            <option value="">Status</option>
                                            <option value="ACTIVE">Active</option>
                                            <option value="INACTIVE">Inactive</option>
                                        </select>
                                    </div>
                                
                                </div>
                                <div class="row">
                                    <div class="col-md-12 more_button">
                                        <div class="input-group mb-1"> 
                                            <button class="btn btn-outline-primary" onclick="myFunction()"  type="button" ><i class="fa fa-plus" id="fa_more_button" ></i> More </button> 
                                            <button class="btn btn-outline-primary" id="filter" type="button"><i class="fa fa-search"></i> Filter</button> 
                                            <button class="btn btn-outline-primary" id="reset" type="button"><i class="fa fa-undo"></i> Reset</button> 
                                        </div>
                                    </div>

                                   

                                </div>


                                

                            </div>

                            


                            </div>
                      </form>
                            <user-list-component></user-list-component>
                    </div>
                </div>
            </div>
        </div>
                                                   
    </div>
</div>


@endsection

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.js"></script>
@section('after_script')
<script type="text/javascript">


var filter_array = {};    

$(document).ready( function () {

    send_request = "{{url('admin/user')}}";

    user_datatable(send_request)

});

$(document).on('click','#filter',function(){

    var status = '';

    var phone = '';

    var email = '';

    var role = '';

    var send_request = "{{url('admin/user')}}";

    if($('#filter_status').val() !=""){
        
        status = $('#filter_status').val();

        filter_array.status = status;

    }else{

        filter_array.status = '';

    }

    if($('#filter_phone').val() !=""){
        
        phone = $('#filter_phone').val();

        filter_array.phone = phone;
    
    }else{
    
        filter_array.phone = '';

    }


    if($('#filter_email').val() !=""){
        
        email = $('#filter_email').val();

        filter_array.email = email;
    
    }else{
    
        filter_array.email = '';

    }

 if($('#filter_designation').val() !=""){
        
        role = $('#filter_designation').val();

        filter_array.role = role;
    
    }else{
    
        filter_array.role = '';

    }

    const u = new URLSearchParams(filter_array).toString();

    user_datatable(send_request+"?"+u);

})

// href='".route('user.delete',$row->id)."' 
// , 

//                   render: function ( data, type, row ) {
                      
//                     return clmn_visible == false ? data : "<i class='fa fa-eye' style='cursor:pointer' onClick='assigned_users_details("+row.id+")'></i>";
  
//                   }

function user_datatable(send_request){
        return  table = $('#users_data_table').DataTable({
            processing: true,
            serverSide: true,
            ajax:send_request,
            destroy : true,
            "order": [[ 0, "desc" ]], 
            columns: [
                
               
                {data: 'id',
       render: function (data, type, row, meta) {
            return meta.row + 1;
       }
    },
               // {data: 'id',       name: 'id'},
                {data: 'profile_image',  "sortable": false,   name: 'profile_image'},
                {data: 'name',   "sortable": false,         name: 'name'},
                {data: 'email',    "sortable": false,      name: "email"},
                {data: 'roles',    "sortable": false,      render:"[roles].name"},
                {data: 'phone_number',  "sortable": false,    name: "phone_number"},
                {data: 'status',     "sortable": false,      name: "status"},
                {data: 'assigned_name',   "sortable": false,        name: "assigned_name"},
                {data: 'action',   "sortable": false,     name: 'action', orderable: false, searchable: false},
            ],
            filter: false,
            sort: true
        });

}


$(document).on('click','.status_check_box',function(){
    var id   = $(this).closest('tr');
    var vale = id.find('.status_check_box').attr('data-set');
    $.ajax({
        url: "{{url('admin/user/status_update/')}}/"+vale,
        dataType:'json',
        success:function(response){
            $('#toast_title').html('User Status')
            $('#toast_txt').html('User Status Updated Successfully')
            
            $('#liveToast').toast('show').css('opacity','9');
         
        }   
      });

});

$(document).on('click','#reset',function(){
    $('#filter_phone').val("");
    $('#filter_email').val("");
    $("option:selected").prop("selected", false)
    var send_request = "{{url('admin/user')}}";
    user_datatable(send_request)
});


function myFunction() {
  var x = document.getElementById("myDIV");

 
  

  if (x.style.display === "none") {
    x.style.display = "block";
   // $('.more_button').find('i').removeClass('fa fa-plus').addClass('fa fa-minus');


   // $("#fa_more_button").switchClass("fa fa-plus", "fa fa-minus"); 
  } else {
    x.style.display = "none";
    
    $("#filter_status option:selected").prop("selected", false);
   // $("#fa_more_button").switchClass("fa fa-plus", "fa fa-plus"); 
   
  }
}

</script>

@endsection