@extends('layouts.app')

@section('content')

<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0 text-primary"></h4>
    </div>
    <div class="page-rightheader">
        <div class="btn-list">
            <a href="{{route('leads.home')}}" class="btn btn-primary btn-pill" >
                <i class="fa fa-arrow-left"></i> Back</a>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Add Lead</div>
            </div>
            <div class="card-body">
                            @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                        @endif

                        <?php 
                        $employer_form = "";
                        $individual_form  ="";
                        $CosmojPet  =""; 
                        $MedicalProvider  =""; 
                        $Medical_Expense_Form  =""; 

                        ?>    
                        @can('employerform-add')

                                <?php 
                                            $employer_form  = true;
                                                                       
                                ?>

                        @endcan

                         @can('individualform-add')

                                <?php 
                                            $individual_form  = true;
                                                                       
                                ?>

                        @endcan
                        @can('cosmojpet-add')

                        <?php 
                         $CosmojPet  = true;
                                                            
                        ?>

                        @endcan
                        @can('medicalprovider-add')

                        <?php 
                        $MedicalProvider  = true;
                                                            
                        ?>

                        @endcan 
                        @can('medicalexpenseform-add')

                        <?php 
                        $Medical_Expense_Form  = true;
                                                            
                        ?>

                        @endcan

                   


    
                        <leads-add-component employer_form="{{$employer_form}}" individual_form="{{$individual_form}}" cosmoj_petttt="{{$CosmojPet}}"  medical_providerr="{{$MedicalProvider}}" medical_expense_formm="{{$Medical_Expense_Form}}"> </leads-add-component>

                </div>
             </div>

    </div>
</div>
@endsection

@section('after_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
<script>
    

</script>
@endsection
