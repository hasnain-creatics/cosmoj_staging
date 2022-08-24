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
                <div class="card-title">Medical Provider Details

            </div>

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

                        <div class="row">
                        <div class="col-6">

                        </div>
                        <div class="col-6">
                        <div class="card">
									<div class="card-body">
										<ul class="list-group m-2">
											<li class="list-group-item"><strong><h3>Client’s Full Name</h3></strong></li>
											<li class="list-group-item">DR.{{$result->medicalfacilitys}}</li>
											
											<li class="list-group-item">Medical Practice Phone Number</li>
                                            <li class="list-group-item">{{$medicalfacilitys36[0]}}</li>
                                            <li class="list-group-item">Medical Practice’s Email</li>
                                            <li class="list-group-item">{{$result->medicalfacilitys31}}</li>
                                            <li class="list-group-item">Medical Practice’s NPI</li>
                                            <li class="list-group-item">{{$result->providersnpi}}</li>
										</ul>
									</div>
						        </div>
                        </div>
					    </div>
                        <div class="col-md-12 col-lg-12">
								<div class="card overflow-hidden">
									<div class="card-header bg-primary ">
										<h3 class="card-title text-white">Client List</h3>
										<div class="card-options ">
                                        <button class="btn btn-success  "  onClick="add_emp_modal_method('{{$result->id}}')">
						<i class="fa fa-plus "></i> Add Emp</button>
											<a href="javascript:void(0);" class="card-options-collapse me-2" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up text-white"></i></a>

										</div>
									</div>
									<div class="card-body">
                                    <table class="table" >
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $c = 1;
                                        $d=1;
                                    ?>
                                    @foreach($lead_employee_list as $value_employee_list)

                                    <tr>
                                        <th scope="row">{{$c++}}</th>
                                        <td>{{$value_employee_list->name}}</td>
                                        <td>{{$value_employee_list->phone_number}}</td>
                                        <td>{{$value_employee_list->email}}</td>
                                        <td><i class="fa fa-edit" onClick="edit_emp_modal_method('{{$value_employee_list->id}}')" aria-hidden="true" title="Edit"></i>&nbsp;</td>

                                        </tr>

                                 @endforeach
                                    </tbody>
                                    </table>
									</div>

								</div>
							</div>

                        <div class="col-md-12 col-lg-12">
								<div class="card overflow-hidden">
									<div class="card-header bg-primary ">
										<h3 class="card-title text-white">Uploaded Supporting Documents Provided by Clients</h3>
										<div class="card-options ">
                                        <button class="btn btn-success  "  onClick="add_doc_modal_method('{{$result->id}}')">
						        <i class="fa fa-plus "></i> Add Doc</button>
											<a href="javascript:void(0);" class="card-options-collapse me-2" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up text-white"></i></a>

										</div>
									</div>
									<div class="card-body">
                                    <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Doc Name</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Download Link</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($lead_doc_list as $value_doc_list)

                                    <tr class="lead_tr_{{$value_doc_list->id}}">
                                                                    <td>{{$d++}}</td>
                                                                    <td>{{$value_doc_list->title}}</td>
                                                                    <td>{{$value_doc_list->original_name}}</td>
                                                                    <td>{{$value_doc_list->type}}</td>
                                                                    <td>
                                                                        <i  onclick="deleteDocs({{$value_doc_list->id}})" style="cursor:pointer" class="fa fa-trash"></i>&nbsp;
                                                                        <a href="{{$value_doc_list->directory}}/{{$value_doc_list->name}}" download target="_blank" ><i class="fa fa-download"></i></a>
                                                                    </td>
                                                                    
                                                                </tr>

                                          @endforeach
                                    </tbody>
                                    </table>
									</div>

								</div>
							</div>

                            <div class="col-md-12 col-lg-12">
								<div class="card overflow-hidden">
									<div class="card-header bg-primary ">
										<h3 class="card-title text-white">Transaction </h3>
										<div class="card-options ">
											<a href="javascript:void(0);" class="card-options-collapse me-2" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up text-white"></i></a>

										</div>
									</div>
									<div class="card-body">
                                    <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                     <th colspan="2" scope="col">Client’s Accrued Savings</th>
                                     <th colspan="3" scope="col">$1000.00</th>
                                    </tr>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Transaction Type</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  <?php $i = 1;?>
                                    @foreach($lead_transaction as $value)

                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->transaction_type}}</td>
                                        <td>{{$value->date}}</td>
                                        <td>${{$value->amount}}</td>
                                        </tr>

                                 @endforeach



                                    </tbody>
                                    </table>
									</div>

								</div>
							</div>


                </div>
             </div>

    </div>
</div>
@endsection

@section('after_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
<script>

    $(document).ready( function () {






});
</script>
@endsection
