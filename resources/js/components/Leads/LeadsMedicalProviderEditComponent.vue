<template>
	<div>

		<div class="alert alert-success" v-if="success">{{ success_msg }}</div>

		<form class="row g-3 form newtopic" @submit.prevent="register" enctype="multipart/form-data">



			<div class="col-md-4">


				<label for="validationCustom01" class="form-label">Medical Facility's Name</label>
				<input type="text" class="form-control" placeholder="Enter Medical Facility's Name"
					:value="form.medicalfacilitys" id="medicalfacilitys" name="medicalfacilitys"
					@change="onChangMadicalFacilityName">
				<span class="error" v-if="errorss.medicalfacilitys">{{ errorss.medicalfacilitys[0] }}</span>
			</div>


			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Medical Facility's Corporate
					Email</label>
				<input type="text" class="form-control" placeholder="Enter Medical Facility's Corporate Email"
					:value="form.medicalfacilitys31" id="medicalfacilitys31" name="medicalfacilitys31"
					@change="onChangmedicalfacilitys31">
				<span class="error" v-if="errorss.medicalfacilitys31">{{ errorss.medicalfacilitys31[0] }}</span>
			</div>

			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Medical Facility's Corporate
					Number</label>
					
				<input type="text" class="form-control" :value="form.medicalfacilitys36"
					placeholder="Enter Your Phone Number" id="medicalfacilitys36" name="medicalfacilitys36"
					@change="onChangMedicalfacilitys36">
				<span class="error" v-if="errorss.medicalfacilitys36">{{ errorss.medicalfacilitys36[0] }}</span>
			</div>

			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Medical Facility's Corporate
					Address</label>
				<input type="text" class="form-control" :value="form.address_provider"
					placeholder="Enter Street Address" id="address_provider" name="address_provider"
					@change="onChangMedicalfacilitys39">
				<span class="error" v-if="errorss.address">{{ errorss.address[0] }}</span>
			</div>

			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Street Address Lane 2</label>
				<input type="text" class="form-control" :value="form.street_address_lane2 "
					placeholder="Enter Street Address Lane 2" id="street_address_lane2" name="street_address_lane2"
					@change="onChangeStreetAddressLane2">
				<span class="error" v-if="errorss.street_address_lane2">{{ errorss.street_address_lane2[0] }}</span>
			</div>


			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">City</label>
				<input type="text" class="form-control" :value="form.city"
					placeholder="Enter City" id="city" name="city" @change="onChangeCity">
				<span class="error" v-if="errorss.city">{{ errorss.city[0] }}</span>
			</div>


			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">State / Province</label>
				<input type="text" class="form-control" :value="form.state_province"
					placeholder="Enter State / Province" id="state_province" name="state_province"
					@change="onChangeState">
				<span class="error" v-if="errorss.state_province">{{ errorss.state_province[0] }}</span>
			</div>


			<div class="col-md-2">
				<label for="validationCustom01" class="form-label">Postal /Zip code</label>
				<input type="text" class="form-control" :value="form.postal_code"
					placeholder="Enter Postal /Zip code" id="postal_code" name="postal_code" @change="onChangePostal">
				<span class="error" v-if="errorss.postal_code">{{ errorss.postal_code[0] }}</span>
			</div>

			<div class="col-md-6">
				<label for="validationCustom01" class="form-label">Employer Identification Number/ Tax
					Identification Number</label>
				<input type="text" class="form-control" :value="form.employeridentification"
					placeholder="Employer Identification Number/ Tax Identification Number" id="employeridentification"
					name="employeridentification" @change="onChangeIdentificationNumber">
				<span class="error" v-if="errorss.employeridentification">{{ errorss.employeridentification[0]
				}}</span>
			</div>

			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Provider's NPI Number</label>
				<input type="text" class="form-control" :value="form.providersnpi"
					placeholder="Enter Provider's NPI Number" id="providersnpi" name="providersnpi" @change="onChangeProvidersnpi">
				<span class="error" v-if="errorss.providersnpi">{{ errorss.providersnpi[0] }}</span>
			</div>








			<div class="col-md-6">

				
				<label class="custom-control custom-checkbox custom-control-md" style=" margin-top: 25px;">
					<input v-model="form.pleaseRead" type="checkbox" class="custom-control-input" name="pleaseRead"
						:value="form.pleaseRead == 1 ? 'Yes' : ''" >
					<span class="custom-control-label custom-control-label-md">Please read Cosmoj's Terms of
						Service</span>
				</label>


				<span class="error" v-if="errorss.pleaseRead">{{ errorss.pleaseRead[0] }}</span>
			</div>


			<div class="col-md-6">
				<label for="validationCustom01" class="form-label">Signer's Title
				</label>
				<input type="text" class="form-control" :value="form.signerstitle" placeholder="Enter Signer's Title"
					id="signerstitle" name="signerstitle" @change="onChangesignerstitle"></input>
				<span class="error" v-if="errorss.signerstitle">{{ errorss.signerstitle[0]
				}}</span>
			</div>

			<div class="col-md-12">
							 <label for="validationCustom01" class="form-label">Approval Step (Please review this submission)<span class="required">*</span></label>
							<textarea  v-model="form.description"  style="resize: none;" rows="5" name="description" id="description"  cols="50" class="form-control" @change="onChangedescription">{{response_details.description}}</textarea>
                             <span v-if="errorss.description">{{errorss.description[0]}}</span>
							</div>
						<div class="col-md-8">
							<label for="validationCustom01" class="form-label">Approval Status</label>
							<select v-model="form.approval_status" class="form-select border" id="approval_status"
								name="approval_status" @blur="onChangeapproval_status">

								<option selected disabled value="">Choose...</option>
								<option :selected="response_details.approval_status == 'Approve' ? 'selected' : ''" value="Approve">Approve</option>
								<option :selected="response_details.approval_status == 'Deny' ? 'selected' : ''" value="Deny">Deny</option>


							</select>
							<span class="error" v-if="errorss.approval_status">{{ errorss.approval_status[0] }}</span>
						</div>


			<div class="col-12">
				<button class="btn btn-primary pull-right" type="submit">Submit form</button>
			</div>
		</form>


	</div>
</template>
<script>
import Form from 'vform'
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
export default {
	props: ['lead_id'],
	data() {
		return {
			form: new Form({
				id: this.lead_id,
				formID : "221285138447155",
				medicalfacilitys: "",
				medicalfacilitys31: "",
				medicalfacilitys36: "",
				address_provider: "",
				street_address_lane2: "",
				city: "",
				state_province: "",
				postal_code: "",
				currentnumber: "",
				employeridentification: "",
				pleaseRead:"",
				providersnpi:"",
				signerstitle:"",
				
				description:"",
				approval_status:""


			}),
			errorss: [],

			success_msg: "",
			success: false,
			response_details: {},
			response_details_json: {},




		}
	},


	methods: {




		onChangMadicalFacilityName(e) {
			this.form.medicalfacilitys = e.target.value;
		},
		onChangmedicalfacilitys31(e) {
			this.form.medicalfacilitys31 = e.target.value;
		},

		onChangMedicalfacilitys36(e) {
			this.form.medicalfacilitys36 = e.target.value;
		},

		onChangMedicalfacilitys39(e) {
			this.form.address_provider = e.target.value;
		},
		onChangeStreetAddressLane2(e) {
			this.form.street_address_lane2 = e.target.value;
		},
		onChangeCity(e) {
			this.form.city = e.target.value;
		},

		onChangeState(e) {
			this.form.state_province = e.target.value;
		},

		onChangePostal(e) {
			this.form.postal_code = e.target.value;
		},

		onChangeIdentificationNumber(e) {
			this.form.employeridentification = e.target.value;
		},

		onChangeProvidersnpi(e) {
			this.form.providersnpi = e.target.value;
		},
		onChangesignerstitle(e) {
			this.form.signerstitle = e.target.value;
		},

			onChangedescription(e) {
			this.form.description = e.target.value;
		},
		onChangeapproval_status(e) {
			this.form.approval_status = e.target.value;
		},



		register() {



			const headers = {

				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),

				'Content-Type': 'multipart/form-data'

			};


			var url = this.$hostname + 'leads';
			this.form.post(this.$hostname + 'leads/insert', null, { headers }).then((response) => {

				if (response.data.success == false) {

					this.errorss = response.data.message

				} else {

					this.success = true

					this.success_msg = response.data.message

					setTimeout(function () {

						window.location.href = url;

					}, 1000);

				}


			});

		},





	},
	mounted() {


		const headers = { 'Content-Type': 'multipart/form-data' };
		axios.get(this.$hostname + 'leads/fetch_lead/' + this.lead_id).then((response) => {


			this.response_details_json = response.data;
			this.response_details = response.data.result;


			//console.log(this.response_details_json.medicalfacilitys39[1]);



			this.form.medicalfacilitys = response.data.result.medicalfacilitys;
			this.form.medicalfacilitys31 = this.response_details.medicalfacilitys31;
			this.form.medicalfacilitys36 = this.response_details_json.medicalfacilitys36[0];



			this.form.address_provider = this.response_details_json.medicalfacilitys39[0];

			this.form.street_address_lane2 = this.response_details_json.medicalfacilitys39[1];
			this.form.city = this.response_details_json.medicalfacilitys39[2];
			this.form.state_province = this.response_details_json.medicalfacilitys39[3];
			this.form.postal_code = this.response_details_json.medicalfacilitys39[4];
			this.form.employeridentification = this.response_details.employeridentification;
			this.form.pleaseRead = this.response_details.pleaseRead;
			this.form.providersnpi = this.response_details.providersnpi;
			this.form.signerstitle = this.response_details.signerstitle;
			this.form.description =this.response_details.description;
			this.form.approval_status =this.response_details.approval_status;











		})
	}
};
</script> 
<style>
</style>