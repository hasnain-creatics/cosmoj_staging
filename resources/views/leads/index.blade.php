@extends('layouts.app')

@section('content')
<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0 text-primary"></h4>
    </div>
    <div class="page-rightheader">
    @can('leads-add')
        <div class="btn-list">
            <a href="{{route('leads.add')}}" class="btn btn-primary btn-pill" >
                <i class="fa fa-plus"></i> Add New</a>
        </div>
    @endcan
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Clients</div>

                <?php 
                        $employer_form = "";
                        $individual_form  ="";
                        $CosmojPet  =""; 
                        $MedicalProvider  =""; 
                        $Medical_Expense_Form  =""; 

                        ?>    
                        @can('employerform-view')

                                <?php 
                                            $employer_form  = true;
                                                                       
                                ?>

                        @endcan

                         @can('individualform-view')

                                <?php 
                                            $individual_form  = true;
                                                                       
                                ?>

                        @endcan
                        @can('cosmojpet-view')

                        <?php 
                         $CosmojPet  = true;
                                                            
                        ?>

                        @endcan
                        @can('medicalprovider-view')

                        <?php 
                        $MedicalProvider  = true;
                                                            
                        ?>

                        @endcan 
                        @can('medicalexpenseform-view')

                        <?php 
                        $Medical_Expense_Form  = true;
                                                            
                        ?>

                        @endcan

                   


            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <leads-list-component employer_form="{{$employer_form}}" individual_form="{{$individual_form}}" cosmoj_petttt="{{$CosmojPet}}"  medical_providerr="{{$MedicalProvider}}" medical_expense_formm="{{$Medical_Expense_Form}}"> </leads-list-component>
                    </div>
                </div>
            </div>
        </div>
                                                   
    </div>
</div>
@endsection
@section('after_script')

@endsection