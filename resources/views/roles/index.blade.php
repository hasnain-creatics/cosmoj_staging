@extends('layouts.app')

@section('content')
<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0 text-primary"></h4>
    </div>
    <div class="page-rightheader">
    @can('role-add')
        <div class="btn-list">
                <a href="{{route('role.add')}}" class="btn btn-primary btn-pill" >
                    <i class="fa fa-plus"></i> Add New</a>
        </div>
    @endcan
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-default-color">
                <div class="card-title">Roles</div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="row">
                       
                        </div>
                        <div class="row">
                        <?php 
                            $edit_role = "hide-btn";
                            $permission = "hide-btn";
                        ?>    
                        @can('role-edit')

                                <?php 
                                            $edit_role  = "";
                                                                       
                                ?>

                        @endcan

                        
                        @can('permission')

                                <?php 
                                            $permission  = "";
                                                                       
                                ?>

                        @endcan
                            <roles-list-component edit_role="{{$edit_role}}"  permission="{{$permission}}"></roles-list-component>
                            
                        </div>
                  
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection



