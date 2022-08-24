
<div class="modal fade" id="edit_employee">
			<div class="modal-dialog modal-dialog" role="document">
				<div class="modal-content modal-content-demo">
                <form  class="course_video_upload" id="uploadForm"  enctype="multipart/form-data">
			
					<div class="modal-header">
						<h6 class="modal-title">Update Employee / {{$lead_employee_data[0]->id}}</h6>
					</div>
					<div class="modal-body">
		
					<div class="container mt-5">
							@csrf
						<div class="form-group">
							<div class="form-group col-md-12">
							<input type="hidden" name="tbl_id" value="{{$lead_employee_data[0]->id}}">
                                <input type="hidden" name="emp_id" value="{{$lead_employee_data[0]->client_id}}">
                                <input type="hidden" name="form_id" value="{{$lead_employee_data[0]->form_id}}">
                                <label for="" class="form-label" >Name</label>
                                <input type="text" class="form-control " name="name_emp"  value="{{$lead_employee_data[0]->name}}" required>
							</div> 
                        </div>
                        <div class="form-group">
							<div class="form-group col-md-12">
                               
                                <label for="" class="form-label" >Phone Number</label>
                                <input type="text" class="form-control " name="phone_number_emp"  value="{{$lead_employee_data[0]->phone_number}}" required>
							</div> 
                        </div>
                        <div class="form-group">
							<div class="form-group col-md-12">
                               
                                <label for="" class="form-label" >Email</label>
                                <input type="email" class="form-control " name="email_emp"  value="{{$lead_employee_data[0]->email}}" required>
							</div> 
                        </div>
							
							</div>
											

					</div>
					<div class="modal-footer">
					<input type="submit"  value="Update" class="btn btn-primary" > 
					</div>
					</form>
				</div>
			</div>
		</div>
	
		
		<script type="text/javascript">
		$(document).ready(function (e) {
			$("#uploadForm").on('submit', function(e){
				e.preventDefault();
			
		
		
						$.ajax({
						type: 'POST',
						url: "{{ route('employee_edit_form.edit')}}",
						data:new FormData(this),
						cache:false,
						contentType: false,
						processData: false,
						success: function(data) {
						  
							location.reload();
							
						},
						error: function(data) {
						   alert("not Save!");
						}
						});
			
			});
			
		});
		</script>