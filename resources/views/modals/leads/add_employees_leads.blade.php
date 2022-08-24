<div class="modal fade" id="add_employee">
			<div class="modal-dialog modal-dialog" role="document">
				<div class="modal-content modal-content-demo">
                <form  class="course_video_upload" id="uploadForm"  enctype="multipart/form-data">
			
					<div class="modal-header">
						<h6 class="modal-title">Add Employee / CLIENT-{{$lead_deatils->id}}</h6>
					</div>
					<div class="modal-body">
		
					<div class="container mt-5">
							@csrf
						<div class="form-group">
							<div class="form-group col-md-12">
                                <input type="hidden" name="emp_id" value="{{$lead_deatils->id}}">
                                <input type="hidden" name="form_id" value="{{$lead_deatils->formID}}">
                                <label for="" class="form-label" >Name</label>
                                <input type="text" class="form-control " name="name_emp"  value="" required>
							</div> 
                        </div>
                        <div class="form-group">
							<div class="form-group col-md-12">
                               
                                <label for="" class="form-label" >Phone Number</label>
                                <input type="text" class="form-control " name="phone_number_emp"  value="" required>
							</div> 
                        </div>
                        <div class="form-group">
							<div class="form-group col-md-12">
                               
                                <label for="" class="form-label" >Email</label>
                                <input type="email" class="form-control " name="email_emp"  value="" required>
							</div> 
                        </div>
							
							</div>
											

					</div>
					<div class="modal-footer">
					<input type="submit"  value="Submit" class="btn btn-primary" > <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
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
						url: "{{ route('employee_add_form.add')}}",
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