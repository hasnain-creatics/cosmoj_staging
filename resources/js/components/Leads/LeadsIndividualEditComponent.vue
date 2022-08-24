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
				<input type="text" class="form-control" :value="form.email" placeholder="Enter Your Email" id="email"
					name="email" @change="onChangeEmail">
				<span class="error" v-if="errorss.email">{{ errorss.email[0] }}</span>
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
				<input type="date" class="form-control" :value="form.dateOf" placeholder="Enter Date of Birth" id="dateOf"
					name="dateOf" @change="onChange_Dob">
				<span class="error" v-if="errorss.dateOf">{{ errorss.dateOf[0] }}</span>
			</div>



			<div class="col-md-8">
				<label for="validationCustom01" class="form-label">Do you have any dependents you'll be
					registering?</label>

				<select v-model="form.doYou" class="form-select border" id="doYou" name="doYou"
					@blur="onChangedependents">

					<option selected disabled value="">Choose...</option>
					<option :selected="response_details.doYou == 'YES' ? 'selected' : ''" value="YES">YES</option>
					<option :selected="response_details.doYou == 'NO' ? 'selected' : ''" value="NO">NO</option>


				</select>



				<span class="error" v-if="errorss.doYou">{{ errorss.doYou[0] }}</span>
			</div>

			<div class="col-md-12">
				<label for="validationCustom01" class="form-label">What investment plan are you interested
					in ?</label>
				<select v-model="form.whatInvestment" class="form-select border" id="whatInvestment"
					name="whatInvestment" @blur="onChange_investment_plan">

					<option selected disabled value="">Choose...</option>
					<option :selected="response_details.whatInvestment == '1' ? 'selected' : ''" value="1">The
						Apprentice Investment; Cash Management Investment Based on Fixed
						Monthly Amount-$36 enrollment-$36/month-for 36 months Investment</option>
					<option :selected="response_details.whatInvestment == '2' ? 'selected' : ''" value="2">The Lux
						Package; Cash Management Savings Based on individual's annual
						income (Individual must contribute at least 4% of income)</option>
					<option :selected="response_details.whatInvestment == '3' ? 'selected' : ''" value="3">The V-I-P
						Share; Portfolio Investment Product(s)</option>



				</select>
				<span class="error" v-if="errorss.whatInvestment">{{ errorss.whatInvestment[0]
				}}</span>
			</div>


			<div class="col-md-12">
				<label for="validationCustom01" class="form-label">Select the date you'd prefer Cosmoj to
					withdraw funds from your account</label>
				<select v-model="form.selectThe24" class="form-select border" id="selectThe24"
					name="selectThe24" @blur="onChange_withdraw_funds">

					<option selected disabled value="">Choose...</option>
					<option :selected="response_details.selectThe24 == '1st of every Month' ? 'selected' : ''"
						value="1st of every Month">1st of every Month</option>


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


				<span class="error" v-if="errorss.pleaseRead">{{ errorss.pleaseRead[0] }}</span>
			</div>
			<!-- <div class="col-md-6">
				<label for="validationCustom01" class="form-label">Account Opening Fee</label>
				<select v-model="form.account_op_fee" class="form-select border" id="account_op_fee"
					name="account_op_fee">

					<option selected disabled value="">Choose...</option>
					<option value="$25">$25.00 /=</option>


				</select>
				<span class="error" v-if="errorss.account_op_fee">{{ errorss.account_op_fee[0] }}</span>
			</div>

			<div class="col-md-6">
				<label for="validationCustom01" class="form-label">Payment Method</label>
				<select v-model="form.payment_method" class="form-select border" id="payment_method"
					name="payment_method">

					<option selected disabled value="">Choose...</option>
					<option value="Debit_Or_Credit_Card">Debit Or Credit Card</option>
					<option value="PayPal">PayPal</option>


				</select>
				<span class="error" v-if="errorss.payment_method">{{ errorss.payment_method[0] }}</span>
			</div>
			<div class="col-md-6">
				<label for="validationCustom01" class="form-label">Payment Status</label>
				<select v-model="form.payment_status" class="form-select border" id="payment_status"
					name="payment_status">

					<option selected disabled value="">Choose...</option>
					<option value="Paid">Paid</option>
					<option value="UnPaid">UnPaid</option>


				</select>
				<span class="error" v-if="errorss.payment_status">{{ errorss.payment_status[0] }}</span>
			</div> -->
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
				formID: "220293678807061",
				first_name: "",
				last_name: "",
				email: "",
				phoneNumber: "",
				street_address: "",

				street_address_lane2: "",
				city: "",
				state_province: "",
				postal_code: "",
				dateOf: "",
				doYou: "",
				whatInvestment: "",
				selectThe24: "",
				
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

		onChangedependents(e) {
			this.form.doYou = e.target.value;
		},
		onChange_investment_plan(e) {
			this.form.whatInvestment = e.target.value;
		},
		onChange_withdraw_funds(e) {
			this.form.selectThe24 = e.target.value;
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



			this.form.first_name = this.response_details_json.name[0];
			this.form.last_name = this.response_details_json.name[1];

			

			this.form.email = this.response_details.email;
			this.form.phoneNumber = this.response_details_json.phoneNumber[0];
			this.form.street_address = this.response_details_json.address[0];
			this.form.street_address_lane2 = this.response_details_json.address[1];
			this.form.city = this.response_details_json.address[2];
			this.form.state_province = this.response_details_json.address[3];
			this.form.postal_code = this.response_details_json.address[4];
			this.form.dateOf = this.response_details_json.dateOf[2] + "-" + this.response_details_json.dateOf[0] + "-" + this.response_details_json.dateOf[1];
			this.form.doYou = this.response_details.doYou;
			
			this.form.whatInvestment = this.response_details.whatInvestment;
			this.form.selectThe24 = this.response_details.selectThe24;


			this.form.pleaseRead = this.response_details.pleaseRead;
			this.form.description =this.response_details.description;
			this.form.approval_status =this.response_details.approval_status;


console.log(this.form.street_address);




		})
	}
};
</script> 
<style>
</style>