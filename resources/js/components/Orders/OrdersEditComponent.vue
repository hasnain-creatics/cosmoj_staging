<template>
	<div>
		<div class="alert alert-success" v-if="success">{{ success_msg }}</div>
		<!-- <form class="row g-3" @submit.prevent="orderCreate" enctype="multipart/form-data"> -->
		<form class="row g-3" @submit.prevent="orderCreate" method="post" enctype="multipart/form-data">

			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Lead</label>
				<input type="text" class="form-control" placeholder="Enter Customer Name" id="Customer_Name"
					:value="lead" :readOnly="true" v-if="upsell == 'no'">
				<!-- <input type="text" class="form-control" placeholder="Enter Customer Name" id="Customer_Name"
					:value="lead" v-else> -->
				<div v-else>
					<input type="text" class="form-control" @keyup="search_lead"  placeholder="Enter Lead" id="customer_lead" autoComplete="off" >
						<div v-if="show_listing_div" class="lead_suggest" style="
																		position: absolute;
																		width: 95%;
																		background: #fff;
																		max-height: 160px;
																		overflow: auto;
																		z-index:3;
																	" @focus="handleFocus" @focusout="handleFocusOut" tabindex="0">
							<ul>
								<li v-for="(re, index) in leads_result" :key="index" @click="leadDetails($event, re.lead_id)"
									class="leads_listing">
									{{ re.lead_id }}
								</li>

							</ul>
						</div>
				</div>



			</div>
			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Customer Name</label>
				<input type="text" class="form-control" :value="form.customer_name" placeholder="Enter Customer Name"
					id="Customer_Name" @change="customerName" name="Customer_Name">
				<span :class="'error'" v-if="errorss.customer_name">{{ errorss.customer_email[0] }}</span>
			</div>
			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Customer Email</label>
				<input type="text" class="form-control" @change="customerEmail" :value="form.customer_email"
					placeholder="Enter Customer Email" id="customer_email" name="customer_email">
				<span :class="'error'" v-if="errorss.customer_email">{{ errorss.customer_email[0] }}</span>
			</div>

			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Select Customer Type</label>
				<select @change="customer_type" class="form-select border" id="customer_type" name="customer_type">
					<option selected disabled value="">Choose...</option>

					<option :selected="form.customer_type == 'EXISTING' ? 'selected' : ''" value="EXISTING">Existing
					</option>
					<option :selected="form.customer_type == 'REFFERAL ' ? 'selected' : ''" value="REFFERAL">Refferral
					</option>
					<option :selected="form.customer_type == 'NEW' ? 'selected' : ''" value="NEW">New</option>
				</select>
				<span :class="'error'" v-if="errorss.customer_type">{{ errorss.customer_type[0] }}</span>
			</div>

			<!--End First Row-->

			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Title</label>
				<input type="text" class="form-control" @change="change_title" :value="form.title"
					placeholder="Enter Title" id="order_title" name="order_title">
				<span :class="'error'" v-if="errorss.title">{{ errorss.title[0] }}</span>
			</div>
			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Word Count</label>
				<input type="number" class="form-control" @change="change_word" :value="form.word_count"
					placeholder="Enter Word Count" id="word_count" name="word_count">
				<span :class="'error'" v-if="errorss.word_count">{{ errorss.word_count[0] }}</span>
			</div>

			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Select Subject</label>
				<select @change="change_subject" class="form-select border" :value="form.subject_id" id="subject"
					name="subject">

					<option v-for="subject in all_subjects" :key="subject.id" :value="subject.id">{{ subject.name }}
					</option>

				</select>
				<span :class="'error'" v-if="errorss.subject_id">{{ errorss.subject_id[0] }}</span>
			</div>

			<!--End Second Row-->


			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Deadline</label>
				<input type="datetime-local" @change="change_deadline" :value="deadline" class="form-control"
					id="deadline" name="deadline">

			</div>

			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Select Payment Status</label>
				<select class="form-select border" @change="change_payment_status" id="payment_status"
					name="payment_status">
					<option :selected="form.payment_status == 'PAID' ? 'selected' : ''" value="PAID">Paid</option>
					<option :selected="form.payment_status == 'UNPAID' ? 'selected' : ''" value="UNPAID">UnPaid</option>
					<option :selected="form.payment_status == 'PARTIALLY PAID' ? 'selected' : ''" value="PARTIALLY PAID">
						Partially Paid</option>
				</select>
				<span :class="'error'" v-if="errorss.payment_status">{{ errorss.payment_status[0] }}</span>
			</div>

			<div class="col-md-4" v-if="form.payment_status == 'UNPAID'">
				<label for="validationCustom01" class="form-label">Select Issue</label>
				<select v-model="form.issue" class="form-select border" id="issue" name="lead_issue_id">
					<option selected disabled value="">Choose...</option>
					<option v-for="(links, index) in all_issues" :key="index" :value="links.id"
						:selected="form.issue == links.id ? 'selected' : ''">{{ links.issue }}</option>
					<option value="other" :selected="form.issue == 'other' ? 'selected' : ''">Other</option>
				</select>
				<span class="error" v-if="errorss.issue">{{ errorss.issue[0] }}</span>
			</div>

			<div class="col-md-4" v-if="form.payment_status == 'UNPAID' && form.issue == 'other'">
				<label for="validationCustom01" class="form-label">Add Reason</label>
				<textarea class="form-control" v-model="form.reason" name="" id=""></textarea>
				<span class="error" v-if="errorss.reason">{{ errorss.reason[0] }}</span>
			</div>

			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Select Currency</label>
				<select class="form-select border" @change="currencyRates" id="currency" name="currency">
					<option selected disabled value="">Choose...</option>
					<option v-for="currency in all_currency"
						:selected="(form.currency_id == currency.id ? 'selected' : '')" :key="currency.id"
						:data-rate="currency.rate" :value="currency.id">{{ currency.currency }}</option>
				</select>
				<span :class="'error'" v-if="errorss.currency_id">{{ errorss.currency_id[0] }}</span>
			</div>

			<!--End Third Row-->
			<div class="col-md-4">
				<label for="validationCustom01" class="form-label">Order Amount </label>
				<input type="number" @keyup="change_amount" :readonly="true" class="form-control"
					placeholder="Enter Order Amount" id="order_amount" name="order_amount" :value="form.amount" v-if="upsell == 'no'">
				<input type="number" @keyup="change_amount" class="form-control"
					placeholder="Enter Order Amount" id="order_amount" name="order_amount" :value="form.amount" v-else>

				<span :class="'error'" v-if="errorss.amount">{{ errorss.amount[0] }}</span>
			</div>

			<div class="col-md-4" v-if=partial>
				<label for="validationCustom01" class="form-label">Received Amount</label>
				<input type="number" @keyup="change_receive_amount" :value="form.amount_received" class="form-control"
					placeholder="Enter Received Amount" id="Received" name="Received">
				<span :class="'error'" v-if="errorss.amount_received">{{ errorss.amount_received[0] }}</span>
			</div>

			<div class="col-md-12">
				<label for="validationCustom01" class="form-label">Amount in Dollar</label>
				<input type="text" class="form-control" :value="form.dollar_amount" :readonly="true"  v-if="upsell == 'no'">
				<input type="text" class="form-control" :value="form.dollar_amount" v-else>
				<span :class="'error'" v-if="errorss.amount_doller">{{ errorss.amount_doller[0] }}</span>
			</div>

			<!--End Forth Row-->



			<div class="col-md-6">
				<label for="validationCustom01" class="form-label">Notes <span class="">*</span></label>
				<textarea style="resize: none;" @change="change_notes" rows="5" name="Notes" id="Notes"
					:value="form.notes" cols="50" class="form-control"></textarea>
				<span :class="'error'" v-if="errorss.notes">{{ errorss.notes[0] }}</span>
			</div>


			<div class="col-md-6">
				<label for="validationCustom01" class="form-label">Notes by Writer<span class="">*</span></label>
				<textarea style="resize: none;" @change="change_additional_notes" :value="form.additional_notes"
					rows="5" name="Notes_by_writer" id="Notes_by_writer" cols="50"
					class="form-control">												</textarea>
				<span :class="'error'" v-if="errorss.additional_notes">{{ errorss.additional_notes[0] }}</span>
			</div>

			<!--End Fifth Row-->
			<div class="col-md-6">
				<label for="validationCustom01" class="form-label">Website</label>
				<select name="" class="form-select border" @change="customerWebsite" id="">
					<option value=""></option>
					<option :value="web.name" v-for="web in websites" :key="web.id"
						:selected="web.id == form.website ? 'selected' : ''">
						{{ web.name }}
					</option>
				</select>

				<span :class="'error'" v-if="errorss.website">{{ errorss.website[0] }}</span>
			</div>


			<div class="col-md-6">


				<label class="custom-control custom-checkbox custom-control-md" style=" margin-top: 25px;">
					<input v-model="form.is_urgent" type="checkbox" class="custom-control-input" name="is_urgent"
						:value="form.is_urgent == 1 ? 'Yes' : ''">
					<span class="custom-control-label custom-control-label-md">Is Urgent?</span>
				</label>
			</div>




			<div class="col-12  upload_docs">
				<label for="validationCustom01" class="form-label">Order Document</label>
				<div class="form-group mb-0">
					<vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions" @vdropzone-complete="afterUploadCompleteFiles" @vdropzone-removed-file="removeFile"></vue-dropzone>
				</div>
			</div>

			<div class="col-12 upload_invoice">
				<label for="validationCustom01" class="form-label">Order Invoice</label>
				<div class="form-group mb-0">
	 					<vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions" @vdropzone-complete="afterUploadCompleteInvoice" @vdropzone-removed-file="removeFileInvoice"></vue-dropzone>
						<span :class="'error'" style="margin-left:280px;" v-if="errorss.invoice_files">{{ errorss.invoice_files }}</span>
				</div>
			</div>

			<div class="col-12" v-if=btn_disabled>
				<button class="btn btn-primary pull-right submt_button" type="submit">Submit form</button>
			</div>
			<div class="col-12" v-if=submit_message>
				<div class="pull-right ">
					<!-- Order Processing..... -->
					Order Processing <img style="width:100px;" src="https://fiverr-res.cloudinary.com/images/t_main1,q_auto,f_auto,q_auto,f_auto/attachments/delivery/asset/c49c83ef51b0c4230f8f39560b8250a3-1596267998/navy_for-light_bg/make-animated-logo-loader-for-your-website.gif" alt="">
				</div>
				
			</div>
		</form>
	</div>

</template>

<script>
// import Form from 'vform'
import { Form } from 'vform'

import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
export default {
	props: ['id','upsell'],
	data() {
		return {
			selected: '',
				search_lead_form: new Form({
				lead: ""
			}),
			leads_result: [],
			show_listing_div: false,
			selected_lead: "",
			form: new Form({
				customer_name: "",
				customer_email: "",
				customer_type: "",
				title: "",
				word_count: "",
				subject_id: "",
				deadline: "",
				payment_status: "",
				currency_id: "",
				amount: 0,
				amount_received: "",
				notes: "",
				additional_notes: "",
				website: "",
				is_urgent: "",
				files: [],
				invoice_files: [],
				id: this.id,
				dollar_amount: 0,
				issue: "",
				reason: "",
			}),
			errorss: [],
			issue_view: false,
			success_msg: "",
			success: false,
			all_issues: [],
			btn_disabled: true,
			all_subjects: [],
			all_currency: [],
			partial: false,
			currency_rate: 0,
			lead_name: "",
			lead_email: "",
			lead_website: "",
			show_lead: false,
			lead: "",
			websites: [],
			deadline: "",
			submit_message: false,
				 dropzoneOptions: {
									url: this.$api+'checking_files',
	
					thumbnailWidth: 150,
	
			
					 maxFiles: 1000,
					timeout: 100000,
					maxFilesize: 100,
					paramName: 'images',
					addRemoveLinks: true,
					uploadMultiple: true,
					parallelUploads: 1000,

					maxThumbnailFilesize: 100,
					headers: { "My-Awesome-Header": "header value" }
				}
	
		};
	},
	
  components:{
   vueDropzone: vue2Dropzone
  },
	async mounted() {

		this.all_subjects_method();

		this.all_currency_method();

		this.all_websites_method();

		this.fetch_order(this.id);

	},

	methods: {
	afterUploadCompleteInvoice: async function(response){
		if(response.status == 'success'){
			this.form.invoice_files.push(response);
		}else{
			console.log('upload failes');
		}
	},
	removeFileInvoice: async function( file, error, xhr){
		for(var i = 0 ;i<this.form.invoice_files.length;i++){
				if(this.form.invoice_files[i].upload.uuid == file.upload.uuid){
					this.form.invoice_files.splice(i, 1);
				}
		}

	},

	
	afterUploadCompleteFiles: async function(response){
		if(response.status == 'success'){
			this.form.files.push(response);
		}else{
			console.log('upload failes');
		}
	},
	removeFile: async function( file, error, xhr){
		for(var i = 0 ;i<this.form.files.length;i++){
				if(this.form.files[i].upload.uuid == file.upload.uuid){
					this.form.files.splice(i, 1);
				}
		}

	},


		select_all_active_issues() {
			axios.get(this.$hostname + 'issue/select_all_active_issues').then((response) => {
				this.all_issues = response.data;
			})
		},

			async search_lead(e) {
		
			if (e.target.value.trim() == "") {

				this.show_listing_div = false;

				this.leads_result = []

			} else {

				this.selected_lead = e.target.value;

				this.search_lead_form.lead = e.target.value;

				const headers = {

					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),

					'Content-Type': 'multipart/form-data'

				};


				await this.search_lead_form.post(this.$hostname + 'leads/search_leads', null, { headers }).then((response) => {
					if (response.data.status == 'success') {
						this.show_listing_div = true;
						if (response.data.result) {

							this.leads_result = response.data.result

						}

					}
				});
			}
		// this.selected_lead = e.target.value.trim();
			// console.log(e.target.value);

		},
		handleFocus() {
			this.show_listing_div = true;

		},
		handleFocusOut() {
			this.show_listing_div = false;


		},

		async fetch_order(id) {

			var order_response = await fetch(this.$hostname + "orders/fetch_order/" + id);

			var order_ = await order_response.json();

			this.order = order_;

			this.lead = this.order.data.lead_id ? 'LEAD-' + this.order.data.lead_id : 'N/A';

			this.lead_name = this.order.data.customer_name;

			this.lead_email = this.order.data.customer_email;
			if(this.upsell =='yes'){
				$('#customer_lead').val(this.lead);
			}
			
			this.form.customer_name = this.order.data.customer_name;
			this.form.customer_email = this.order.data.customer_email;
			this.form.customer_type = this.order.data.customer_type;
			this.form.title = this.order.data.title;
			this.form.word_count = this.order.data.word_count;
			this.form.subject_id = this.order.data.subject_id;
			this.form.deadline = this.order.data.deadline;
			this.form.payment_status = this.order.data.payment_status;
			this.form.currency_id = this.order.data.currency_id;
			this.form.amount = this.order.data.amount;
			this.form.amount_received = this.order.data.amount_received;
			this.form.notes = this.order.data.notes;
			this.form.additional_notes = this.order.data.additional_notes;
			this.form.website = this.order.data.website;
			this.form.is_urgent = this.order.data.is_urgent;
			this.form.id = this.order.data.id;
			this.form.dollar_amount = this.order.data.dollar_amount;
			this.form.issue = this.order.data.issue;
			this.form.reason = this.order.data.additional_notes;
			this.form.payment_status == 'PARTIALLY PAID' ? this.partial = true : this.partial = false;
			if (this.form.payment_status == 'UNPAID') {
				this.select_all_active_issues();
			}
			this.deadline = this.order.deadline;

			this.currency_rate = this.order.data.currency.rate;

			this.form.dollar_amount = isNaN((this.form.amount / this.currency_rate).toFixed(2)) == true ? '0' : (this.form.amount / this.currency_rate).toFixed(2)

		},

		async all_currency_method() {

			var currency_response = await fetch(this.$hostname + "currency/get_all_active_currency");

			var currency_ = await currency_response.json();

			this.all_currency = currency_;



		},
		async all_subjects_method() {

			var response = await fetch(this.$hostname + "subjects/get_all_active_subjects");

			var subjects_ = await response.json();

			this.all_subjects = subjects_;
		},
		async all_websites_method() {

			if (this.lead_id) {

				// this.leadDetails(this.lead_id,this.lead);			

			}

			var website_response = await fetch(this.$hostname + "websites/get_active_website");

			var website_data = await website_response.json();

			this.websites = website_data;

		},
		async leadDetails(e, lead = null) {

			var leeed = "";
			if(this.upsell == 'yes'){

				this.selected_lead = lead;

				this.show_listing_div = false;
				$('#customer_lead').val(lead);

			}	
			if (lead) {

				var leeed = lead;
				var lead_id = lead.split('-')[1];

			} else {

				var lead_id = e.target.value.split('-')[1];

				var leeed = e.target.value;

			}
			try {

				var lead_response = await fetch(this.$hostname + 'leads/fetch_lead/' + lead_id);

				var lead_ = await lead_response.json();

				this.lead_record = lead_;

				this.lead_name = this.form.customer_name = this.lead_record.first_name + ' ' + this.lead_record.last_name

				this.lead_email = this.form.customer_email = this.lead_record.email

				this.lead_website = this.form.website = this.lead_record.url

				this.show_lead = true;

				this.lead = leeed;

				this.form.lead_id = lead_id;

			} catch (error) {

				alert('no lead foung against this reference');

				this.form = {};

				this.lead_name = "";

				this.lead_email = "";

				this.lead_website = "";

				this.lead = "";

			}

		},
		async customerName(e) {

			this.form.customer_name = e.target.value;

			this.lead_name = this.form.customer_name;
		},

		async customerEmail(e) {

			this.form.customer_email = e.target.value;
			this.lead_email = this.form.customer_email;
		},

		async customerWebsite(e) {

			this.form.website = e.target.value;
			//   console.log(this.form)
			// this.lead_name = this.form.customer_name;
			// this.lead_email = this.form.customer_email;
			// console.log(this.form);
		},

		async currencyRates(e) {

			this.currency_rate = e.target.selectedOptions[0].getAttribute("data-rate");

			this.form.currency_id = e.target.value;

		},

		async change_payment_status(e) {

			this.form.payment_status = e.target.value;

			this.form.payment_status == 'PARTIALLY PAID' ? this.partial = true : this.partial = false;

			if (this.form.payment_status == 'UNPAID') {

				this.select_all_active_issues();

			}

		},

		async customer_type(e) {

			this.form.customer_type = e.target.value;

		},

		async change_title(e) {

			this.form.title = e.target.value;

		},

		async change_word(e) {

			this.form.word_count = e.target.value;
		},
		async change_subject(e) {

			this.form.subject_id = e.target.value;

		},
		async change_deadline(e) {

			this.form.deadline = e.target.value;

		},
		async change_amount(e) {
			this.form.amount = e.target.value;
			this.form.dollar_amount = isNaN((this.form.amount / this.currency_rate).toFixed(2)) == true ? '0' : (this.form.amount / this.currency_rate).toFixed(2);

		},
		async change_receive_amount(e) {

			if (parseFloat(this.form.dollar_amount) < parseFloat(e.target.value)) {
				alert('receive amount must be less then or equal to the order amount');
				e.target.value = 0;
			}
			this.form.amount_received = e.target.value;

		},

		async change_amount_dollar(e) {

			this.form.amount_received = (this.form.amount / this.currency_rate).toFixed(2)

		},
		async change_notes(e) {

			this.form.notes = e.target.value;

		},

		async change_additional_notes(e) {

			this.form.additional_notes = e.target.value;
		},

		async orderCreate() {
			this.btn_disabled = false;
			this.submit_message = true;
			this.form.dollar_amount = isNaN((this.form.amount / this.currency_rate).toFixed(2)) == true ? '0' : (this.form.amount / this.currency_rate).toFixed(2)

			const headers = {

				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),

				'Content-Type': 'multipart/form-data'

			};

		if(this.upsell == 'yes'){

			delete this.form.id;

			delete this.form.order_id;
			
		}

		await this.form.post(this.$hostname + 'orders/insert',null, {headers}).then((response) => {

				var redirect_url = this.$hostname + 'orders';

				if (response.data.success == false) {

					this.errorss = response.data.message
					this.btn_disabled = true;
					this.submit_message = false;

				} else {

					this.success = true

					this.success_msg = response.data.message

					this.btn_disabled = false;
					this.submit_message = false;

					window.scrollTo(0,0);

					setTimeout(function(){

						window.location.href = redirect_url;


					},1000);

				}


			});

		},

		async processFile(event) {

			let file = event.target.files;

			let reader = new FileReader();

			this.form.files = event.target.files;

		},

		async processInvoice(event) {

			let file = event.target.files;

			let reader = new FileReader();

			// this.form.invoice_files = event.target.files;

		}
	},

};
</script>
<style>
.leads_listing {
	padding: 10px;
	cursor: pointer;
}

.leads_listing:hover {
	text-decoration: underline;
	background-color: lightgray;
}
</style>