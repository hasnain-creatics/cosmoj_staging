
<div class="modal fade" id="add_email">
			<div class="modal-dialog modal-dialog" role="document">
				<div class="modal-content modal-content-demo">
                <form  class="course_video_upload" id="uploadForm"  enctype="multipart/form-data">
					<div class="modal-header">
						<h6 class="modal-title"> Email / CLIENT-{{$lead_deatils->id}}</h6>
					</div>
					<div class="modal-body">
		
					<div class="container mt-5">
							@csrf
						<div class="form-group">
							<div class="form-group col-md-12">
                                <input type="hidden" name="emp_id" value="{{$lead_deatils->id}}">
                                <input type="hidden" name="form_id" value="{{$lead_deatils->formID}}">
                                <label for="" class="form-label" >Title</label>
                                <input type="text" class="form-control " name="title"  value="" required>
							</div> 
                        </div>
                     
                        <div class="form-group">
							<div class="form-group col-md-12">
                               
                                <label for="" class="form-label" >Document</label>
                                <input type="file" class="form-control " name="files[]"  value="" required multiple>
							</div> 
                        </div>
							
							</div>
											

					</div>
					<div class="modal-footer">
					<input type="submit"  value="Submit" class="btn btn-primary save-data" > <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
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
                url: "{{ route('document_add_form.add')}}",
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