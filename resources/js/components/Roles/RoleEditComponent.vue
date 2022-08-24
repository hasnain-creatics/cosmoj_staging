<template>
          
  <div class="col-12">
		<div v-if="alerts" class="alert alert-success" role="alert">{{message}}	</div>
		                            <div class="card">		
										
							
									<div class="card-header card-header-default-color">
										<h3 class="card-title">Edit Role</h3>
									</div>
									<div class="card-body">   
										
										<form class="row g-3 needs-validation" action="#">
											<div class="col-md-4">
											  <label for="validationCustom01" class="form-label">Name</label>
											  <input type="text" class="form-control" id="validationCustom01" :value="result.name" @blur="onChangeName" autofocus >
										     <span :class="'error'">{{name}}</span>
											 
											</div>
													<div class="col-md-4">
														<label for="validationCustom01" class="form-label">Type</label>
													
														<select name="type" id="role_type" class="form-select" :value="result.type" @blur="onChangeType" >
														<option value="manager">Manager</option>
														<option value="agent">Agent</option>
														<option value="other">Other</option>
														</select>
														<span class="validate"  :class="'error'">{{type}}</span>
																			
																			</div>
											<div class="col-12">
											  <button class="btn btn-primary" type="button" v-on:click="updateContact()"> Submit form</button>
											</div>
										  </form>
									</div>
								</div>
								</div>
</template>
<script>

import axios from 'axios';

export default {

 props:['role_id'],

 data(){

	 return {

		result:{},
		form: {
                 name: '',
				 type:'',
                 message: '',
				 role_id: this.role_id,
            },
        name: '',
        type: '',
        message: '',
        success: '',
		alerts: false,
	 }
	 
 },

 methods:{
	 
		getRoles(){
			
			axios.get(this.$hostname+'roles/get_single_role/'+this.role_id).then((response)=>{

				this.result = response.data.roles;
		
				this.onChangeName(this.result.name);
				this.onChangeType(this.result.type);
			});

		},
		 onChangeName (e) {
			 if(e.target){
					this.form.name = e.target.value
			 }else{
				 this.form.type = e;
			 }
            

         },
		 
		 
		 onChangeType (e) {

			 if(e.target){
				this.form.type = e.target.value
			 }else{
				 this.form.type = e;
			 }
            
			
         },
		 
		
	    responseMethods(response){

				  if(response.data.success==0){
				
                  	this.name = response.data.message  
                  
				  }else{

					  this.message = response.data.message

					  this.alerts = true;

					  window.location.reload();
	
				  }

                  if(response.data.message.name){
        
					this.name = response.data.message.name[0];
				  
                  }else{
					
                    this.form.name = this.name;
 					
                  }
        },
        updateContact(){
		
               axios.post(this.$hostname+'roles/update', this.form)
                  .then( 
                  function( response ){
                    this.responseMethods( response );
                }.bind(this)
                );
        }
 },
 mounted(){
	 this.getRoles();
 }
}
</script>

<style>

</style>