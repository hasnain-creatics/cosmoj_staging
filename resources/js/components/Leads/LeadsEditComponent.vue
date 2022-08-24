<template>
	<div>

		<div class="alert alert-success" v-if="success">{{ success_msg }}</div>

		<form class="row g-3 form newtopic" @submit.prevent="register" enctype="multipart/form-data">


			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Company's Name</label>
				<input type="text" class="form-control" placeholder="Enter Company Name"
					:value="form.companysname" id="companysname" name="companysname"
					@change="onChangeCompanyName">


				<span class="error" v-if="errorss.company_name">{{ errorss.company_name[0] }}</span>
			</div>

			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Company's Corporate Email Adress</label>
				<input type="text" class="form-control" placeholder="Enter Corporate Email Address"
					:value="form.companyscorporate31" id="companyscorporate31"
					name="companyscorporate31" @change="onChangeCorporateEmail">
				<span class="error" v-if="errorss.companyscorporate31">{{ errorss.companyscorporate31[0]
				}}</span>
			</div>
			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Company's Corporate Number</label>
				<input type="text" class="form-control" placeholder="Enter Corporate Number"
					:value="form.companyscorporate36" id="companyscorporate36" name="companyscorporate36"
					@change="onChangeCorporateNumber">
				<span class="error" v-if="errorss.companyscorporate36">{{ errorss.companyscorporate36[0] }}</span>
			</div>

			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Company's Corporate Address</label>
				<input type="text" class="form-control" :value="form.companyscorporate_address"
					placeholder="Enter Street Address" id="companyscorporate_address" name="companyscorporate_address"
					@change="onChangeStreetAddress">
				<span class="error" v-if="errorss.companyscorporate">{{ errorss.companyscorporate[0] }}</span>
			</div>

			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Street Address Lane 2</label>
				<input type="text" class="form-control" :value="form.street_address_lane2"
					placeholder="Enter Street Address Lane 2" id="street_address_lane2" name="street_address_lane2"
					@change="onChangeStreetAddressLane2">
				<span class="error" v-if="errorss.street_address_lane2">{{ errorss.street_address_lane2[0] }}</span>
			</div>


			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">City</label>
				<input type="text" class="form-control" :value="form.city" placeholder="Enter City"
					id="city" name="city" @change="onChangeCity">
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
				<label for="validationCustom01" class="form-label">Employer Identification Number/ Tax Identification
					Number</label>
				<input type="text" class="form-control" :value="form.employeridentification"
					placeholder="Employer Identification Number/ Tax Identification Number" id="employeridentification"
					name="employeridentification" @change="onChangeIdentificationNumber">
				<span class="error" v-if="errorss.employeridentification">{{ errorss.employeridentification[0] }}</span>
			</div>



			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Current Number of Employees</label>
				<input type="text" class="form-control" :value="form.currentnumber"
					placeholder="Current Number of Employees" id="currentnumber" name="currentnumber"
					@change="onChangeNumberEmployees">
				<span class="error" v-if="errorss.currentnumber">{{ errorss.currentnumber[0] }}</span>
			</div>

			<div class="col-md-3">
				<label for="validationCustom01" class="form-label">Select An Employer Expenditure</label>
				<select v-model="form.selectan" class="form-select border" id="selectan"
					name="selectan" @blur="onChangeEmployerExpenditure">

					<option selected disabled value="">Choose...</option>
					<option
						:selected="response_details.selectan == 'Employer Contribution Option' ? 'selected' : ''"
						value="Employer Contribution Option">Employer Contribution Option</option>
					<option
						:selected="response_details.selectan == 'Employer Front-Loading Option' ? 'selected' : ''"
						value="Employer Front-Loading Option">Employer Front-Loading Option</option>
					<option :selected="response_details.selectan == 'Employee Plan Option' ? 'selected' : ''"
						value="Employee Plan Option">Employee Plan Option</option>



				</select>
				<span class="error" v-if="errorss.selectan">{{ errorss.selectan[0] }}</span>
			</div>


			<div class="col-md-5">
				<label for="validationCustom01" class="form-label">Select The Time Period Your Company Will
					Enroll</label>
				<select v-model="form.selectthe" class="form-select border" id="selectthe" name="selectthe"
					@blur="onChangeTimePeriod">

					<option selected disabled value="">Choose...</option>
					<option :selected="response_details.selectthe == 'January 1st-15th' ? 'selected' : ''"
						value="January 1st-15th">January 1st-15th</option>
					<option :selected="response_details.selectthe == 'April 1st-15th' ? 'selected' : ''"
						value="April 1st-15th">April 1st-15th</option>
					<option :selected="response_details.selectthe == 'July 1st-15th' ? 'selected' : ''"
						value="July 1st-15th">July 1st-15th</option>
					<option :selected="response_details.selectthe == 'October 1st-15th' ? 'selected' : ''"
						value="October 1st-15th">October 1st-15th</option>
					<option
						:selected="response_details.selectthe == 'Enroll Company the Subsequent Term' ? 'selected' : ''"
						value="Enroll Company the Subsequent Term">Enroll Company the Subsequent Term</option>

				</select>
				<span class="error" v-if="errorss.selectthe">{{ errorss.selectthe[0] }}</span>
			</div>


			<div class="col-md-8">
				<label for="validationCustom01" class="form-label">Select the frequency the company would prefer Cosmoj
					to withdraw funds from corporate business account?</label>
				<select v-model="form.selectthe48" class="form-select border" id="selectthe48" name="selectthe48"
					@blur="onChangeFrequency">

					<option selected disabled value="">Choose...</option>
					<option :selected="response_details.selectthe48 == 'Monthly' ? 'selected' : ''" value="Monthly">Monthly</option>
					<option :selected="response_details.selectthe48 == 'Quarterly' ? 'selected' : ''" value="Quarterly">Quarterly</option>
					<option :selected="response_details.selectthe48 == 'Bi-Annually' ? 'selected' : ''" value="Bi-Annually">Bi-Annually</option>


				</select>
				<span class="error" v-if="errorss.selectthe48">{{ errorss.selectthe48[0] }}</span>
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
				formID : "220293270578054",
				companysname: "",
				companyscorporate31: "",
				companyscorporate36: "",
				companyscorporate_address: "",
				street_address_lane2: "",
				city: "",
				state_province: "",
				postal_code: "",
				currentnumber: "",
				employeridentification: "",
				selectan: "",
				selectthe48: "",
				selectthe: "",
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




		onChangeCompanyName(e) {
			this.form.companysname = e.target.value;
		},
		onChangeCorporateEmail(e) {
			this.form.companyscorporate31 = e.target.value;
		},

		onChangeCorporateNumber(e) {
			this.form.companyscorporate36 = e.target.value;
		},

		onChangeStreetAddress(e) {
			this.form.companyscorporate_address = e.target.value;
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

		onChangeNumberEmployees(e) {
			this.form.currentnumber = e.target.value;
		},
		onChangeEmployerExpenditure(e) {
			this.form.selectan = e.target.value;
		},
		onChangeTimePeriod(e) {
			this.form.selectthe = e.target.value;
		},

		onChangeFrequency(e) {
			this.form.selectthe48 = e.target.value;
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
			

			//console.log(this.response_details.selectan);

			this.form.companysname 		  = response.data.result.companysname;
			this.form.companyscorporate31 = this.response_details.companyscorporate31;
			this.form.companyscorporate36 = this.response_details_json.companyscorporate36[0];



			this.form.companyscorporate_address = this.response_details_json.companyscorporate[0];
			this.form.street_address_lane2 = this.response_details_json.companyscorporate[1];
			this.form.city = this.response_details_json.companyscorporate[2];
			this.form.state_province = this.response_details_json.companyscorporate[3];
			this.form.postal_code = this.response_details_json.companyscorporate[4];
			this.form.employeridentification = this.response_details.employeridentification;
			this.form.currentnumber = this.response_details.currentnumber;
			this.form.selectan = this.response_details.selectan;
			this.form.selectthe = this.response_details.selectthe;
			this.form.selectthe48 =this.response_details.selectthe48;
			this.form.description =this.response_details.description;
			this.form.approval_status =this.response_details.approval_status;

			
		








		})
	}
};
</script> 
<style>
</style>