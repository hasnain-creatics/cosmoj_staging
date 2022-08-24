<template>
	<div>

		<div class="alert alert-success" v-if="success">{{ success_msg }}</div>

		<form class="row g-3 form newtopic" @submit.prevent="register" enctype="multipart/form-data">



			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">First Name</label>
				<input type="text" class="form-control" placeholder="Enter First Name" id="first_name" name="first_name"
					:value="form.first_name" @change="onChangename">

				<span class="error" v-if="errorss.first_name">{{ errorss.first_name[0] }}</span>
			</div>

			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Last Name</label>
				<input type="text" class="form-control" :value="form.last_name" @change="onChangeLastname"
					placeholder="Enter Last Name" id="last_name" name="last_name">
				<span class="error" v-if="errorss.last_name">{{ errorss.last_name[0] }}</span>
			</div>
			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Email</label>
				<input type="text" class="form-control" v-model="form.email" placeholder="Enter Your Email" id="email"
					name="email">
				<span class="error" v-if="errorss.email">{{ errorss.email[0] }}</span>
			</div>


			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Country Code</label>
				<input type="text" class="form-control" :value="form.countrycode" placeholder="Enter Country Code"
					id="countrycode" name="countrycode" @change="onChangeCountrycode">
				<span class="error" v-if="errorss.countrycode">{{ errorss.countrycode[0] }}</span>
			</div>



			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Area Code</label>
				<input type="text" class="form-control" :value="form.area_code" placeholder="Enter Area Code"
					id="area_code" name="area_code" @change="onChangeArea_code">
				<span class="error" v-if="errorss.area_code">{{ errorss.area_code[0] }}</span>
			</div>
			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Phone Number</label>
				<input type="text" class="form-control" :value="form.phoneNumber" placeholder="Enter Your Phone Number"
					id="phoneNumber" name="phoneNumber" @change="onChangePhone_number">
				<span class="error" v-if="errorss.phoneNumber">{{ errorss.phoneNumber[0] }}</span>
			</div>




			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Address</label>
				<input type="text" class="form-control" :value="form.street_address" placeholder="Enter Street Address"
					id="street_address" name="street_address" @change="onChangeStreetAddress">
				<span class="error" v-if="errorss.street_address">{{ errorss.street_address[0] }}</span>
			</div>

			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Street Address Lane 2</label>
				<input type="text" class="form-control" :value="form.street_address_lane2"
					placeholder="Enter Street Address Lane 2" id="street_address_lane2" name="street_address_lane2"
					@change="onChangestreet_address_lane2">
				<span class="error" v-if="errorss.street_address_lane2">{{ errorss.street_address_lane2[0]
				}}</span>
			</div>


			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">City</label>
				<input type="text" class="form-control" :value="form.city" placeholder="Enter City" id="city"
					name="city" @change="onChangeCity">
				<span class="error" v-if="errorss.city">{{ errorss.city[0] }}</span>
			</div>


			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">State / Province</label>
				<input type="text" class="form-control" :value="form.state_province"
					placeholder="Enter State / Province" id="state_province" name="state_province"
					@change="onChangestate_province">
				<span class="error" v-if="errorss.state_province">{{ errorss.state_province[0] }}</span>
			</div>


			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Postal /Zip code</label>
				<input type="text" class="form-control" :value="form.postal_code" placeholder="Enter Postal /Zip code"
					id="postal_code" name="postal_code" @change="onChangepostal_code">
				<span class="error" v-if="errorss.postal_code">{{ errorss.postal_code[0] }}</span>
			</div>
			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Date Of Birth</label>
				<input type="date" class="form-control" :value="form.dateOf" placeholder="Enter Date of Birth"
					id="dateOf" name="dateOf" @change="onChange_Dob">
				<span class="error" v-if="errorss.dateOf">{{ errorss.dateOf[0] }}</span>
			</div>



			<div class="col-md-8">
				<label for="validationCustom01" class="form-label">Provider/Professional Performing Your
					Procedure</label>

				<select v-model="form.providerprofessionalperforming" class="form-select border"
					id="providerprofessionalperforming" name="providerprofessionalperforming" @blur="onChangeprocedure">

					<option selected disabled value="">Choose...</option>
					<option
						:selected="response_details.providerprofessionalperforming == 'ABC Medical Practice' ? 'selected' : ''"
						value="ABC Medical Practice">ABC Medical Practice</option>



				</select>



				<span class="error" v-if="errorss.procedure">{{ errorss.procedure[0] }}</span>
			</div>

			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Total Cost </label>
				<input type="text" class="form-control" v-model="form.totalcost" placeholder="Enter Total Cost"
					id="totalcost" name="totalcost" @change="onChangeTotalcost">
				<span class="error" v-if="errorss.totalcost">{{ errorss.totalcost[0] }}</span>
			</div>

			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Payment Plan Duration</label>
				<select v-model="form.paymentplan" class="form-select border" id="paymentplan" name="paymentplan"
					@blur="onChangepaymentplan">

					<option selected disabled value="">Choose...</option>
					<option :selected="response_details.paymentplan == '6 months' ? 'selected' : ''" value="6 months">6
						months</option>
					<option :selected="response_details.paymentplan == '12 months' ? 'selected' : ''" value="12 months">
						12 months</option>
					<option :selected="response_details.paymentplan == '18 months' ? 'selected' : ''" value="18 months">
						18 months</option>
					<option :selected="response_details.paymentplan == '24 months' ? 'selected' : ''" value="24 months">
						24 months</option>



				</select>
				<span class="error" v-if="errorss.paymentplan">{{ errorss.paymentplan[0]
				}}</span>
			</div>


			<div class="col-md-8">
				<label for="validationCustom01" class="form-label">Select the date you'd prefer Cosmoj to
					withdraw funds from your account</label>
				<select v-model="form.selecta15" class="form-select border" id="selecta15" name="selecta15"
					@blur="onChange_withdraw_funds">

					<option selected disabled value="">Choose...</option>
					<option :selected="response_details.selecta15 == '1st of the month' ? 'selected' : ''"
						value="1st of the month">1st of the month</option>


				</select>
				<span class="error" v-if="errorss.selectThe24">{{ errorss.selectThe24[0] }}</span>
			</div>


			<div class="col-md-6">


				<label class="custom-control custom-checkbox custom-control-md" style=" margin-top: 25px;">
					<input v-model="form.pleaseRead" type="checkbox" class="custom-control-input" name="pleaseRead"
						:value="form.pleaseRead == 1 ? 'Yes' : ''">
					<span class="custom-control-label custom-control-label-md">Please read Cosmoj's Terms of
						Service</span>
				</label>


				<span class="error" v-if="errorss.term_condition">{{ errorss.term_condition[0] }}</span>
			</div>



			<div class="col-md-6">
				<label for="validationCustom01" class="form-label">Staff Code</label>
				<input type="text" class="form-control" v-model="form.staffcode" placeholder="Enter Staff Code"
					id="staffcode" name="staffcode" @change="onChangeStaffcode">
				<span class="error" v-if="errorss.staffcode">{{ errorss.staffcode[0] }}</span>
			</div>


			<div class="col-md-12">
				<label for="validationCustom01" class="form-label">Approval Step (Please review this submission)<span
						class="required">*</span></label>
				<textarea v-model="form.description" style="resize: none;" rows="5" name="description" id="description"
					cols="50" class="form-control"
					@change="onChangedescription">{{ response_details.description }}</textarea>
				<span v-if="errorss.description">{{ errorss.description[0] }}</span>
			</div>
			<div class="col-md-8">
				<label for="validationCustom01" class="form-label">Approval Status</label>
				<select v-model="form.approval_status" class="form-select border" id="approval_status"
					name="approval_status" @blur="onChangeapproval_status">

					<option selected disabled value="">Choose...</option>
					<option :selected="response_details.approval_status == 'Approve' ? 'selected' : ''" value="Approve">
						Approve</option>
					<option :selected="response_details.approval_status == 'Deny' ? 'selected' : ''" value="Deny">Deny
					</option>


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
				formID: "202326521388049",
				first_name: "",
				last_name: "",
				email: "",
				countrycode: "",
				area_code: "",
				phoneNumber: "",
				street_address: "",

				street_address_lane2: "",
				city: "",
				state_province: "",
				postal_code: "",
				providerprofessionalperforming: "",
				dateOf: "",
				totalcost: "",
				paymentplan: "",
				whatInvestment: "",
				selecta15: "",
				staffcode: "",

				pleaseRead: "",
				description: "",
				approval_status: ""

			}),
			errorss: [],

			success_msg: "",
			success: false,
			response_details: {},
			response_details_json: {},




		}
	},


	methods: {





		onChangename(e) {
			this.form.first_name = e.target.value;
		},
		onChangeLastname(e) {
			this.form.last_name = e.target.value;
		},

		onChangeEmail(e) {
			this.form.email = e.target.value;
		},

		onChangeCountrycode(e) {
			this.form.countrycode = e.target.value;
		},
		onChangeArea_code(e) {
			this.form.area_code = e.target.value;
		},



		onChangePhone_number(e) {
			this.form.phoneNumber = e.target.value;
		},


		onChangeStreetAddress(e) {
			this.form.street_address = e.target.value;
		},
		onChangestreet_address_lane2(e) {
			this.form.street_address_lane2 = e.target.value;
		},
		onChangeCity(e) {
			this.form.city = e.target.value;
		},

		onChangestate_province(e) {
			this.form.state_province = e.target.value;
		},

		onChangepostal_code(e) {
			this.form.postal_code = e.target.value;
		},

		onChange_Dob(e) {
			this.form.dateOf = e.target.value;


		},

		onChangeprocedure(e) {
			this.form.providerprofessionalperforming = e.target.value;
		},
		onChangeTotalcost(e) {
			this.form.totalcost = e.target.value;
		},


		onChangepaymentplan(e) {
			this.form.paymentplan = e.target.value;
		},
		onChange_withdraw_funds(e) {
			this.form.selecta15 = e.target.value;
		},

		onChangeStaffcode(e) {
			this.form.staffcode = e.target.value;
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

			this.form.first_name = this.response_details_json.name[0];
			this.form.last_name = this.response_details_json.name[1];
			this.form.email = this.response_details.email;
			this.form.countrycode = this.response_details_json.phoneNumber[0];
			this.form.area_code = this.response_details_json.phoneNumber[1];
			this.form.phoneNumber = this.response_details_json.phoneNumber[2];
			this.form.street_address = this.response_details_json.address[0];
			this.form.street_address_lane2 = this.response_details_json.address[1];
			this.form.city = this.response_details_json.address[2];
			this.form.state_province = this.response_details_json.address[3];
			this.form.postal_code = this.response_details_json.address[4];
			this.form.dateOf = this.response_details_json.dateOf[2] + "-" + this.response_details_json.dateOf[0] + "-" + this.response_details_json.dateOf[1];

			this.form.providerprofessionalperforming = this.response_details.providerprofessionalperforming;
			this.form.totalcost = this.response_details.totalcost;
			this.form.paymentplan = this.response_details.paymentplan;

			this.form.whatInvestment = this.response_details.whatInvestment;
			this.form.selecta15 = this.response_details.selecta15;


			this.form.pleaseRead = this.response_details.pleaseRead;
			this.form.staffcode = this.response_details.staffcode;

			this.form.description = this.response_details.description;
			this.form.approval_status = this.response_details.approval_status;












		})
	}
};
</script> 
<style>
</style>