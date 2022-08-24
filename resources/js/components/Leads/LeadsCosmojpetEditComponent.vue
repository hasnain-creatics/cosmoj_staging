<template>
	<div>

		<div class="alert alert-success" v-if="success">{{ success_msg }}</div>


		<form class="row g-3 form newtopic" @submit.prevent="register" enctype="multipart/form-data">



			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Pet First Name</label>
				<input type="text" class="form-control" :value="form.pet_first_name" placeholder="Enter First Name"
					id="pet_first_name" name="pet_first_name" @change="onChangepet_firstname">

				<span class="error" v-if="errorss.first_name">{{ errorss.first_name[0] }}</span>
			</div>

			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Pet Last Name</label>
				<input type="text" class="form-control" :value="form.pet_last_name" placeholder="Enter Last Name"
					id="pet_last_name" name="pet_last_name" @change="onChangepet_last_name">
				<span class="error" v-if="errorss.pet_last_name">{{ errorss.pet_last_name[0] }}</span>
			</div>
			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Selet Pet Species</label>

				<select class="form-select border" id="petspecies" name="petspecies" @change="pet_species($event)"
					@blur="onChangepetspecies">

					<option selected disabled value="">Choose...</option>
					<option :selected="response_details.petspecies == 'Dog' ? 'selected' : ''" value="Dog">Dog</option>
					<option :selected="response_details.petspecies == 'Cat' ? 'selected' : ''" value="Cat">Cat</option>
					<option :selected="response_details.petspecies == 'Bird' ? 'selected' : ''" value="Bird">Bird
					</option>
					<option :selected="response_details.petspecies == 'Other' ? 'selected' : ''" value="Other">Other
					</option>


				</select>
				<span class="error" v-if="errorss.pet_species">{{ errorss.pet_species[0] }}</span>
			</div>
			<div class="col-md-4" v-if="other_species">
				<label for="validationCustom01" class="form-label">Please Write Your Pet's Species</label>
				<input type="text" class="form-control" :value="form.ifother" placeholder="Enter Your Pet's Species"
					id="ifother" name="ifother" @change="onChangeIfOther">
				<span class="error" v-if="errorss.ifother">{{ errorss.ifother[0] }}</span>

			</div>

			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Select Pet's Sex</label>

				<select class="form-select border" id="petssex" name="petssex" @blur="onChangePetssex">

					<option selected disabled value="">Choose...</option>
					<option :selected="response_details.petssex == 'Male' ? 'selected' : ''" value="Male">Male</option>
					<option :selected="response_details.petssex == 'Female' ? 'selected' : ''" value="Female">Female
					</option>



				</select>

				<span class="error" v-if="errorss.pet_gender">{{ errorss.pet_gender[0] }}</span>
			</div>

			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Pet Owner First Name</label>
				<input type="text" class="form-control" :value="form.onwer_first_nmae"
					placeholder="Enter Your Pet Onwer First Name" id="onwer_first_nmae" name="onwer_first_nmae"
					@change="onChangeonwer_first_nmae">
				<span class="error" v-if="errorss.onwer_first_nmae">{{ errorss.onwer_first_nmae[0] }}</span>
			</div>

			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Pet Owner Last Name</label>
				<input type="text" class="form-control" :value="form.onwer_last_nmae"
					placeholder="Enter Your Pet Onwer Last Name" id="onwer_last_nmae" name="onwer_last_nmae"
					@change="onChangeonwer_last_nmae">
				<span class="error" v-if="errorss.onwer_last_nmae">{{ errorss.onwer_last_nmae[0] }}</span>
			</div>
			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Email of Pet Owner</label>
				<input type="text" class="form-control" :value="form.emailof" placeholder="Enter Your Email"
					id="emailof" name="emailof" @change="onChangeEmail">
				<span class="error" v-if="errorss.email">{{ errorss.email[0] }}</span>
			</div>

			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Pet Owner Phone Number</label>
				<input type="text" class="form-control" :value="form.petowner" placeholder="Enter Your Phone Number"
					id="petowner" name="petowner" @change="onChangePhone_number">
				<span class="error" v-if="errorss.phone_number">{{ errorss.phone_number[0] }}</span>
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
				<label for="validationCustom01" class="form-label">Pet Owner's Date Of Birth</label>
				<input type="date" class="form-control" :value="form.petowners" placeholder="Enter Date of Birth"
					id="petowners" name="petowners" @change="onChange_Dob">
				<span class="error" v-if="errorss.dob">{{ errorss.dob[0] }}</span>
			</div>

			<div class="col-md-12">
				<label for="validationCustom01" class="form-label">What investment plan are you interested
					in ?</label>
				<select v-model="form.whatInvestment" class="form-select border" id="whatInvestment"
					name="whatInvestment" @blur="onChange_investment_plan">

					<option selected disabled value="">Choose...</option>
					<option :selected="response_details.whatInvestment == '1' ? 'selected' : ''" value="1">
						The Standard Pet Plan; Cash Management Investment Based on Fixed Monthly Amount-$15
						enrollment-$15/month-for 12 months Investment
					</option>
					<option :selected="response_details.whatInvestment == '2' ? 'selected' : ''" value="2">The Pet-Custo
						Plan; Cash Management Savings. Individual Elects Fixed
						Dollar Amount to Contribute Towards Pet(s)' savings (Individual must contribute more
						than $15 monthly)</option>

				</select>
				<span class="error" v-if="errorss.whatInvestment">{{ errorss.whatInvestment[0]
				}}</span>
			</div>

			<div class="col-md-12">
				<label for="validationCustom01" class="form-label">Select the date you'd prefer Cosmoj to
					withdraw funds from your account</label>
				<select v-model="form.selectThe24" class="form-select border" id="selectThe24" name="selectThe24"
					@blur="onChange_withdraw_funds">

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
				formID: "221278115891155",
				pet_first_name: "",
				pet_last_name: "",
				petspecies: "",
				ifother: "",
				petssex: "",
				onwer_first_nmae: "",
				onwer_last_nmae: "",

				emailof: "",
				petowner: "",
				street_address: "",

				street_address_lane2: "",
				city: "",
				state_province: "",
				postal_code: "",
				petowners: "",
				
				whatInvestment: "",
				selectThe24: "",

				pleaseRead: "",
				description: "",
				approval_status: ""


			}),
			errorss: [],
			other_species: false,
			success_msg: "",
			success: false,
			response_details: {},
			response_details_json: {},




		}
	},


	methods: {
		pet_species(event) {

			if (event.target.value == 'Other') {

				this.other_species = true;

			} else {

				this.other_species = false;
				//this.form.ifother = "";

			}

		},



		onChangepet_firstname(e) {
			this.form.pet_first_name = e.target.value;
		},

		onChangepet_last_name(e) {
			this.form.pet_last_name = e.target.value;
		},


		onChangepetspecies(e) {
			this.form.petspecies = e.target.value;
		},

		onChangeIfOther(e) {
			this.form.ifother = e.target.value;
		},

		onChangePetssex(e) {
			this.form.petssex = e.target.value;
		},


		onChangeonwer_first_nmae(e) {
			this.form.onwer_first_nmae = e.target.value;
		},
		onChangeonwer_last_nmae(e) {
			this.form.onwer_last_nmae = e.target.value;
		},

		onChangeEmail(e) {
			this.form.emailof = e.target.value;
		},

		onChangePhone_number(e) {
			this.form.petowner = e.target.value;
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
			this.form.petowners = e.target.value;


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



			this.form.pet_first_name = this.response_details_json.petname[0];
			this.form.pet_last_name = this.response_details_json.petname[1];
			this.form.petspecies = this.response_details.petspecies;

			if (this.form.petspecies == 'Other') {
				this.other_species = true;
			} else {
				this.other_species = false;

			}

			this.form.ifother = this.response_details.ifother;
			this.form.petssex = this.response_details.petssex;

			this.form.onwer_first_nmae = this.response_details_json.nameof[0];
			this.form.onwer_last_nmae = this.response_details_json.nameof[1];



			this.form.emailof = this.response_details.emailof;
			this.form.petowner = this.response_details_json.petowner[0];
			this.form.street_address = this.response_details_json.petowners18[0];
			this.form.street_address_lane2 = this.response_details_json.petowners18[1];
			this.form.city = this.response_details_json.petowners18[2];
			this.form.state_province = this.response_details_json.petowners18[3];
			this.form.postal_code = this.response_details_json.petowners18[4];
			this.form.petowners = this.response_details_json.petowners[2] + "-" + this.response_details_json.petowners[0] + "-" + this.response_details_json.petowners[1];
			this.form.doYou = this.response_details.doYou;

			this.form.whatInvestment = this.response_details.whatInvestment;
			this.form.selectThe24 = this.response_details.selectThe24;


			this.form.pleaseRead = this.response_details.pleaseRead;
			this.form.description = this.response_details.description;
			this.form.approval_status = this.response_details.approval_status;


			console.log(this.form.street_address);




		})
	}
};
</script> 
<style>
</style>