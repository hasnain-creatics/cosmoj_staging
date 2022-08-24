<template>






	<div>

		<div class="alert alert-success" v-if="success">{{ success_msg }}</div>

		<div class="row">
			<div class="col-md-12">
				<ul class="nav nav-pills">
					
					<li class="nav-item" v-if="employer_form">
						
						<a href="#tab1" class="nav-link active" @click="formMethod('220293270578054')"
							data-bs-toggle="tab">Employer Form</a>

					</li>
					&nbsp;
					
					<li class="nav-item" v-if="individual_form">

						<a href="#tab2" class="nav-link " @click="formMethod('220293678807061')"
							data-bs-toggle="tab">Individual Form</a>

					</li> &nbsp;
					<li class="nav-item" v-if="cosmoj_petttt">

						<a href="#tab3" class="nav-link " @click="formMethod('221278115891155')"
							data-bs-toggle="tab">Cosmoj-Pet</a>

					</li> &nbsp;
					<li class="nav-item" v-if="medical_providerr">

						<a href="#tab4" class="nav-link " @click="formMethod('221285138447155')"
							data-bs-toggle="tab">Medical Provider</a>

					</li> &nbsp;

					<li class="nav-item" v-if="medical_expense_formm"> 

						<a href="#tab5" class="nav-link " @click="formMethod('202326521388049')"
							data-bs-toggle="tab">Medical Expense Form</a>

					</li> &nbsp;

					&nbsp;
				</ul>
			</div>
		</div>


		<br>

		<div class="panel-body tabs-menu-body">
			<div class="tab-content">
				<div class="tab-pane active " id="tab1" v-if="employer_form">

					<form class="row g-3 form newtopic" @submit.prevent="register" enctype="multipart/form-data">




						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Company's Name</label>
							<input type="text" class="form-control" v-model="form.companysname"
								placeholder="Enter Company Name" id="companysname" name="companysname">




							<span class="error" v-if="errorss.companysname">{{ errorss.companysname[0] }}</span>
						</div>

						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Company's Corporate Email Adress</label>
							<input type="text" class="form-control" v-model="form.companyscorporate31"
								placeholder="Enter Corporate Email Address" id="companyscorporate31"
								name="companyscorporate31">
							<span class="error" v-if="errorss.companyscorporate31">{{
									errorss.companyscorporate31[0]
							}}</span>
						</div>
						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Company's Corporate Number</label>
							<input type="text" class="form-control" v-model="form.companyscorporate36"
								placeholder="Enter Corporate Number" id="companyscorporate36"
								name="companyscorporate36">
							<span class="error" v-if="errorss.companyscorporate36">{{ errorss.companyscorporate36[0]
							}}</span>
						</div>

						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Company's Corporate Address</label>
							<input type="text" class="form-control" v-model="form.companyscorporate"
								placeholder="Enter Street Address" id="companyscorporate" name="companyscorporate">
							<span class="error" v-if="errorss.companyscorporate">{{ errorss.companyscorporate[0]
							}}</span>
						</div>

						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Street Address Lane 2</label>
							<input type="text" class="form-control" v-model="form.street_address_lane2"
								placeholder="Enter Street Address Lane 2" id="street_address_lane2"
								name="street_address_lane2">
							<span class="error" v-if="errorss.street_address_lane2">{{ errorss.street_address_lane2[0]
							}}</span>
						</div>


						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">City</label>
							<input type="text" class="form-control" v-model="form.city" placeholder="Enter City"
								id="city" name="city">
							<span class="error" v-if="errorss.city">{{ errorss.city[0] }}</span>
						</div>


						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">State / Province</label>
							<input type="text" class="form-control" v-model="form.state_province"
								placeholder="Enter State / Province" id="state_province" name="state_province">
							<span class="error" v-if="errorss.state_province">{{ errorss.state_province[0] }}</span>
						</div>


						<div class="col-md-2">
							<label for="validationCustom01" class="form-label">Postal /Zip code</label>
							<input type="text" class="form-control" v-model="form.postal_code"
								placeholder="Enter Postal /Zip code" id="postal_code" name="postal_code">
							<span class="error" v-if="errorss.postal_code">{{ errorss.postal_code[0] }}</span>
						</div>


						<div class="col-md-6">
							<label for="validationCustom01" class="form-label">Employer Identification Number/ Tax
								Identification Number</label>
							<input type="text" class="form-control" v-model="form.employeridentification"
								placeholder="Employer Identification Number/ Tax Identification Number"
								id="employeridentification" name="employeridentification">
							<span class="error" v-if="errorss.employeridentification">{{
									errorss.employeridentification[0]
							}}</span>
						</div>



						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Current Number of Employees</label>
							<input type="text" class="form-control" v-model="form.currentnumber"
								placeholder="Current Number of Employees" id="number_employees" name="currentnumber">
							<span class="error" v-if="errorss.currentnumber">{{ errorss.currentnumber[0] }}</span>
						</div>

						<div class="col-md-3">
							<label for="validationCustom01" class="form-label">Select An Employer Expenditure</label>
							<select v-model="form.selectan" class="form-select border" id="selectan" name="selectan">

								<option selected disabled value="">Choose...</option>
								<option value="Employer Contribution Option">Employer Contribution Option</option>
								<option value="Employer Front Loading Option">Employer Front-Loading Option</option>
								<option value="Employee Plan Option">Employee Plan Option</option>



							</select>
							<span class="error" v-if="errorss.selectan">{{ errorss.selectan[0]
							}}</span>
						</div>


						<div class="col-md-5">
							<label for="validationCustom01" class="form-label">Select The Time Period Your Company Will
								Enroll</label>
							<select v-model="form.selectthe" class="form-select border" id="selectthe" name="selectthe">

								<option selected disabled value="">Choose...</option>
								<option value="January 1st-15th">January 1st-15th</option>
								<option value="April 1st-15th">April 1st-15th</option>
								<option value="July 1st-15th">July 1st-15th</option>
								<option value="October 1st-15th">October 1st-15th</option>
								<option value="Enroll Company the Subsequent Term">Enroll Company the Subsequent Term
								</option>

							</select>
							<span class="error" v-if="errorss.selectthe">{{ errorss.selectthe[0] }}</span>
						</div>


						<div class="col-md-8">
							<label for="validationCustom01" class="form-label">Select the frequency the company would
								prefer Cosmoj to withdraw funds from corporate business account?</label>
							<select v-model="form.selectthe48" class="form-select border" id="selectthe48"
								name="selectthe48">

								<option selected disabled value="">Choose...</option>
								<option value="Monthly">Monthly</option>
								<option value="Quarterly">Quarterly</option>
								<option value="Bi-Annually">Bi-Annually</option>


							</select>
							<span class="error" v-if="errorss.selectthe48">{{ errorss.selectthe48[0] }}</span>
						</div>
						<div class="col-md-12">
							<label for="validationCustom01" class="form-label">Approval Step (Please review this
								submission)<span class="required">*</span></label>
							<textarea v-model="form.description" style="resize: none;" rows="5" name="description"
								id="description" cols="50" class="form-control"></textarea>
							<span v-if="errorss.description">{{ errorss.description[0] }}</span>
						</div>
						<div class="col-md-8">
							<label for="validationCustom01" class="form-label">Approval Status</label>
							<select v-model="form.approval_status" class="form-select border" id="approval_status"
								name="approval_status">

								<option selected disabled value="">Choose...</option>
								<option value="Approve">Approve</option>
								<option value="Deny">Deny</option>


							</select>
							<span class="error" v-if="errorss.approval_status">{{ errorss.approval_status[0] }}</span>
						</div>


						<div class="col-12">
							<button class="btn btn-primary pull-right" type="submit">Submit form</button>
						</div>
					</form>


				</div>
				<div class="tab-pane  " id="tab2" v-if="individual_form">


					<form class="row g-3 form newtopic" @submit.prevent="register" enctype="multipart/form-data">



						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">First Name</label>
							<input type="text" class="form-control" v-model="form.first_name"
								placeholder="Enter First Name" id="first_name" name="first_name">

							<span class="error" v-if="errorss.first_name">{{ errorss.first_name[0] }}</span>
						</div>

						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Last Name</label>
							<input type="text" class="form-control" v-model="form.last_name"
								placeholder="Enter Last Name" id="last_name" name="last_name">
							<span class="error" v-if="errorss.last_name">{{ errorss.last_name[0] }}</span>
						</div>
						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Email</label>
							<input type="text" class="form-control" v-model="form.email" placeholder="Enter Your Email"
								id="email" name="email">
							<span class="error" v-if="errorss.email">{{ errorss.email[0] }}</span>
						</div>

						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Phone Number</label>
							<input type="text" class="form-control" v-model="form.phoneNumber"
								placeholder="Enter Your Phone Number" id="phoneNumber" name="phoneNumber">
							<span class="error" v-if="errorss.phoneNumber">{{ errorss.phoneNumber[0] }}</span>
						</div>

						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Address</label>
							<input type="text" class="form-control" v-model="form.street_address"
								placeholder="Enter Street Address" id="street_address" name="street_address">
							<span class="error" v-if="errorss.street_address">{{ errorss.street_address[0] }}</span>
						</div>

						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Street Address Lane 2</label>
							<input type="text" class="form-control" v-model="form.street_address_lane2"
								placeholder="Enter Street Address Lane 2" id="street_address_lane2"
								name="street_address_lane2">
							<span class="error" v-if="errorss.street_address_lane2">{{ errorss.street_address_lane2[0]
							}}</span>
						</div>


						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">City</label>
							<input type="text" class="form-control" v-model="form.city" placeholder="Enter City"
								id="city" name="city">
							<span class="error" v-if="errorss.city">{{ errorss.city[0] }}</span>
						</div>


						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">State / Province</label>
							<input type="text" class="form-control" v-model="form.state_province"
								placeholder="Enter State / Province" id="state_province" name="state_province">
							<span class="error" v-if="errorss.state_province">{{ errorss.state_province[0] }}</span>
						</div>


						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Postal /Zip code</label>
							<input type="text" class="form-control" v-model="form.postal_code"
								placeholder="Enter Postal /Zip code" id="postal_code" name="postal_code">
							<span class="error" v-if="errorss.postal_code">{{ errorss.postal_code[0] }}</span>
						</div>


						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Date Of Birth</label>
							<input type="date" class="form-control" v-model="form.dateOf"
								placeholder="Enter Date of Birth" id="dateOf" name="dateOf">
							<span class="error" v-if="errorss.dateOf">{{ errorss.dateOf[0] }}</span>
						</div>



						<div class="col-md-8">
							<label for="validationCustom01" class="form-label">Do you have any dependents you'll be
								registering?</label>

							<select v-model="form.doYou" class="form-select border" id="doYou" name="doYou">

								<option selected disabled value="">Choose...</option>
								<option value="YES">YES</option>
								<option value="NO">NO</option>


							</select>



							<span class="error" v-if="errorss.doYou">{{ errorss.doYou[0] }}</span>
						</div>

						<div class="col-md-12">
							<label for="validationCustom01" class="form-label">What investment plan are you interested
								in ?</label>
							<select v-model="form.whatInvestment" class="form-select border" id="whatInvestment"
								name="whatInvestment">

								<option selected disabled value="">Choose...</option>
								<option value="1">The
									Apprentice Investment; Cash Management Investment Based on Fixed
									Monthly Amount-$36 enrollment-$36/month-for 36 months Investment</option>
								<option value="2">The Lux
									Package; Cash Management Savings Based on individual's annual
									income (Individual must contribute at least 4% of income)</option>
								<option value="3">The V-I-P
									Share; Portfolio Investment Product(s)</option>



							</select>
							<span class="error" v-if="errorss.whatInvestment">{{ errorss.whatInvestment[0]
							}}</span>
						</div>


						<div class="col-md-12">
							<label for="validationCustom01" class="form-label">Select the date you'd prefer Cosmoj to
								withdraw funds from your account</label>
							<select v-model="form.selectThe24" class="form-select border" id="selectThe24"
								name="selectThe24">

								<option selected disabled value="">Choose...</option>
								<option value="1st of every Month">1st of every Month</option>


							</select>
							<span class="error" v-if="errorss.selectThe24">{{ errorss.selectThe24[0] }}</span>
						</div>

						<div class="col-md-6">


							<label class="custom-control custom-checkbox custom-control-md" style=" margin-top: 25px;">
								<input v-model="form.pleaseRead" type="checkbox" class="custom-control-input"
									name="pleaseRead" :value="form.pleaseRead == 1 ? 'Yes' : ''">
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
						</div>
 -->


						<div class="col-12">
							<button class="btn btn-primary pull-right" type="submit">Submit form</button>
						</div>
					</form>




				</div>



				<div class="tab-pane  " id="tab3" v-if="cosmoj_petttt">


					<form class="row g-3 form newtopic" @submit.prevent="register" enctype="multipart/form-data">



						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Pet First Name</label>
							<input type="text" class="form-control" v-model="form.pet_first_name"
								placeholder="Enter First Name" id="pet_first_name" name="pet_first_name"
								>

							<span class="error" v-if="errorss.first_name">{{ errorss.first_name[0] }}</span>
						</div>

						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Pet Last Name</label>
							<input type="text" class="form-control" v-model="form.pet_last_name"
								placeholder="Enter Last Name" id="pet_last_name" name="pet_last_name"
								>
							<span class="error" v-if="errorss.pet_last_name">{{ errorss.pet_last_name[0] }}</span>
						</div>
						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Selet Pet Species</label>

							<select v-model="form.petspecies" class="form-select border" id="petspecies" name="petspecies"
								@change="pet_species($event)" >

								<option selected disabled value="">Choose...</option>
								<option  value="Dog">
									Dog</option>
								<option  value="Cat">
									Cat</option>
								<option 
									value="Bird">Bird
								</option>
								<option 
									value="Other">Other
								</option>


							</select>
							<span class="error" v-if="errorss.pet_species">{{ errorss.pet_species[0] }}</span>
						</div>
						<div class="col-md-4" v-if="other_species">
							<label for="validationCustom01" class="form-label">Please Write Your Pet's Species</label>
							<input type="text" class="form-control" v-model="form.ifother"
								placeholder="Enter Your Pet's Species" id="ifother" name="ifother"
								>
							<span class="error" v-if="errorss.ifother">{{ errorss.ifother[0] }}</span>

						</div>

						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Select Pet's Sex</label>

							<select v-model="form.petssex" class="form-select border" id="petssex" name="petssex" >

								<option selected disabled value="">Choose...</option>
								<option  value="Male">
									Male</option>
								<option 
									value="Female">Female
								</option>



							</select>

							<span class="error" v-if="errorss.pet_gender">{{ errorss.pet_gender[0] }}</span>
						</div>

						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Pet Owner First Name</label>
							<input type="text" class="form-control" v-model="form.onwer_first_nmae"
								placeholder="Enter Your Pet Onwer First Name" id="onwer_first_nmae"
								name="onwer_first_nmae" >
							<span class="error" v-if="errorss.onwer_first_nmae">{{ errorss.onwer_first_nmae[0] }}</span>
						</div>

						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Pet Owner Last Name</label>
							<input type="text" class="form-control" v-model="form.onwer_last_nmae"
								placeholder="Enter Your Pet Onwer Last Name" id="onwer_last_nmae" name="onwer_last_nmae"
								>
							<span class="error" v-if="errorss.onwer_last_nmae">{{ errorss.onwer_last_nmae[0] }}</span>
						</div>
						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Email of Pet Owner</label>
							<input type="text" class="form-control" v-model="form.emailof"
								placeholder="Enter Your Email" id="emailof" name="emailof" >
							<span class="error" v-if="errorss.email">{{ errorss.email[0] }}</span>
						</div>

						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Pet Owner Phone Number</label>
							<input type="text" class="form-control" v-model="form.petowner"
								placeholder="Enter Your Phone Number" id="petowner" name="petowner"
								>
							<span class="error" v-if="errorss.phone_number">{{ errorss.phone_number[0] }}</span>
						</div>




						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Address</label>
							<input type="text" class="form-control" v-model="form.street_address"
								placeholder="Enter Street Address" id="street_address" name="street_address"
								>
							<span class="error" v-if="errorss.street_address">{{ errorss.street_address[0] }}</span>
						</div>

						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Street Address Lane 2</label>
							<input type="text" class="form-control" v-model="form.street_address_lane2"
								placeholder="Enter Street Address Lane 2" id="street_address_lane2"
								name="street_address_lane2" >
							<span class="error" v-if="errorss.street_address_lane2">{{ errorss.street_address_lane2[0]
							}}</span>
						</div>


						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">City</label>
							<input type="text" class="form-control" v-model="form.city" placeholder="Enter City"
								id="city" name="city" >
							<span class="error" v-if="errorss.city">{{ errorss.city[0] }}</span>
						</div>


						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">State / Province</label>
							<input type="text" class="form-control" v-model="form.state_province"
								placeholder="Enter State / Province" id="state_province" name="state_province"
								>
							<span class="error" v-if="errorss.state_province">{{ errorss.state_province[0] }}</span>
						</div>


						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Postal /Zip code</label>
							<input type="text" class="form-control" v-model="form.postal_code"
								placeholder="Enter Postal /Zip code" id="postal_code" name="postal_code"
								>
							<span class="error" v-if="errorss.postal_code">{{ errorss.postal_code[0] }}</span>
						</div>


						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Pet Owner's Date Of Birth</label>
							<input type="date" class="form-control" v-model="form.petowners"
								placeholder="Enter Date of Birth" id="petowners" name="petowners">
							<span class="error" v-if="errorss.petowners">{{ errorss.petowners[0] }}</span>
						</div>

						<div class="col-md-12">
							<label for="validationCustom01" class="form-label">What investment plan are you interested
								in ?</label>
							<select v-model="form.whatInvestment" class="form-select border" id="whatInvestment"
								name="whatInvestment">

								<option selected disabled value="">Choose...</option>
								<option value="1">
									The Standard Pet Plan; Cash Management Investment Based on Fixed Monthly Amount-$15
									enrollment-$15/month-for 12 months Investment
								</option>
								<option value="2">
									The Pet-Custo
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
							<select v-model="form.selectThe24" class="form-select border" id="selectThe24"
								name="selectThe24">

								<option selected disabled value="">Choose...</option>
								<option value="1st of every Month">1st of every Month</option>


							</select>
							<span class="error" v-if="errorss.selectThe24">{{ errorss.selectThe24[0] }}</span>
						</div>

						<div class="col-md-6">



							<label class="custom-control custom-checkbox custom-control-md" style=" margin-top: 25px;">
								<input v-model="form.pleaseRead" type="checkbox" class="custom-control-input"
									name="pleaseRead" id="pleaseRead">
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
								<option value="$15">$15.00 /=</option>


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



						<div class="col-12">
							<button class="btn btn-primary pull-right" type="submit">Submit form</button>
						</div>
					</form>




				</div>
				<div class="tab-pane  " id="tab4" v-if="medical_providerr">


					<form class="row g-3 form newtopic" @submit.prevent="register" enctype="multipart/form-data">



						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Medical Facility's Name</label>
							<input type="text" class="form-control" v-model="form.medicalfacilitys"
								placeholder="Enter First Name" id="medicalfacilitys" name="medicalfacilitys">

							<span class="error" v-if="errorss.medicalfacilitys">{{ errorss.medicalfacilitys[0] }}</span>
						</div>


						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Medical Facility's Corporate
								Email</label>
							<input type="text" class="form-control" v-model="form.medicalfacilitys31"
								placeholder="Enter Your Email" id="medicalfacilitys31" name="medicalfacilitys31">
							<span class="error" v-if="errorss.medicalfacilitys31">{{ errorss.medicalfacilitys31[0]
							}}</span>
						</div>

						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Medical Facility's Corporate
								Number</label>
							<input type="text" class="form-control" v-model="form.medicalfacilitys36"
								placeholder="Enter Your Phone Number" id="medicalfacilitys36" name="medicalfacilitys36">
							<span class="error" v-if="errorss.medicalfacilitys36">{{ errorss.medicalfacilitys36[0]
							}}</span>
						</div>

						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Medical Facility's Corporate
								Address</label>
							<input type="text" class="form-control" v-model="form.medicalfacilitys39"
								placeholder="Enter Street Address" id="medicalfacilitys39" name="medicalfacilitys39">
							<span class="error" v-if="errorss.medicalfacilitys39">{{ errorss.medicalfacilitys39[0]
							}}</span>
						</div>

						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Street Address Lane 2</label>
							<input type="text" class="form-control" v-model="form.street_address_lane2"
								placeholder="Enter Street Address Lane 2" id="street_address_lane2"
								name="street_address_lane2">
							<span class="error" v-if="errorss.street_address_lane2">{{ errorss.street_address_lane2[0]
							}}</span>
						</div>


						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">City</label>
							<input type="text" class="form-control" v-model="form.city" placeholder="Enter City"
								id="city" name="city">
							<span class="error" v-if="errorss.city">{{ errorss.city[0] }}</span>
						</div>


						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">State / Province</label>
							<input type="text" class="form-control" v-model="form.state_province"
								placeholder="Enter State / Province" id="state_province" name="state_province">
							<span class="error" v-if="errorss.state_province">{{ errorss.state_province[0] }}</span>
						</div>


						<div class="col-md-2">
							<label for="validationCustom01" class="form-label">Postal /Zip code</label>
							<input type="text" class="form-control" v-model="form.postal_code"
								placeholder="Enter Postal /Zip code" id="postal_code" name="postal_code">
							<span class="error" v-if="errorss.postal_code">{{ errorss.postal_code[0] }}</span>
						</div>


						<div class="col-md-6">
							<label for="validationCustom01" class="form-label">Employer Identification Number/ Tax
								Identification Number</label>
							<input type="text" class="form-control" v-model="form.employeridentification"
								placeholder="Employer Identification Number/ Tax Identification Number"
								id="employeridentification" name="employeridentification">
							<span class="error" v-if="errorss.employeridentification">{{
									errorss.employeridentification[0]
							}}</span>
						</div>

						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Provider's NPI Number</label>
							<input type="text" class="form-control" v-model="form.providersnpi"
								placeholder="Enter Provider's NPI Number" id="providersnpi" name="providersnpi">
							<span class="error" v-if="errorss.providersnpi">{{ errorss.providersnpi[0] }}</span>
						</div>








						<div class="col-md-6">


							<label class="custom-control custom-checkbox custom-control-md" style=" margin-top: 25px;">
								<input v-model="form.pleaseRead" type="checkbox" class="custom-control-input"
									name="pleaseRead" id="pleaseRead">
								<span class="custom-control-label custom-control-label-md">Please read Cosmoj's Terms of
									Service</span>
							</label>


							<span class="error" v-if="errorss.pleaseRead">{{ errorss.pleaseRead[0] }}</span>
						</div>


						<div class="col-md-6">
							<label for="validationCustom01" class="form-label">Signer's Title
							</label>
							<input type="text" class="form-control" v-model="form.signerstitle"
								placeholder="Enter Signer's Title" id="signerstitle" name="signerstitle">
							<span class="error" v-if="errorss.signerstitle">{{ errorss.signerstitle[0]
							}}</span>
						</div>

						<div class="col-md-12">
							<label for="validationCustom01" class="form-label">Approval Step (Please review this
								submission)<span class="required">*</span></label>
							<textarea v-model="form.description" style="resize: none;" rows="5" name="description"
								id="description" cols="50" class="form-control"></textarea>
							<span v-if="errorss.description">{{ errorss.description[0] }}</span>
						</div>
						<div class="col-md-8">
							<label for="validationCustom01" class="form-label">Approval Status</label>
							<select v-model="form.approval_status" class="form-select border" id="approval_status"
								name="approval_status">

								<option selected disabled value="">Choose...</option>
								<option value="Approve">Approve</option>
								<option value="Deny">Deny</option>


							</select>
							<span class="error" v-if="errorss.approval_status">{{ errorss.approval_status[0] }}</span>
						</div>


						<div class="col-12">
							<button class="btn btn-primary pull-right" type="submit">Submit form</button>
						</div>
					</form>




				</div>

				<div class="tab-pane  " id="tab5" v-if="medical_expense_formm">


					<form class="row g-3 form newtopic" @submit.prevent="register" enctype="multipart/form-data">



						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">First Name</label>
							<input type="text" class="form-control" placeholder="Enter First Name" id="first_name"
								name="first_name" v-model="form.first_name">

							<span class="error" v-if="errorss.first_name">{{ errorss.first_name[0] }}</span>
						</div>

						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Last Name</label>
							<input type="text" class="form-control" v-model="form.last_name"
								placeholder="Enter Last Name" id="last_name" name="last_name">
							<span class="error" v-if="errorss.last_name">{{ errorss.last_name[0] }}</span>
						</div>
						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Email</label>
							<input type="text" class="form-control" v-model="form.email" placeholder="Enter Your Email"
								id="email" name="email">
							<span class="error" v-if="errorss.email">{{ errorss.email[0] }}</span>
						</div>


						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Country Code</label>
							<input type="text" class="form-control" v-model="form.countrycode"
								placeholder="Enter Country Code" id="countrycode" name="countrycode">
							<span class="error" v-if="errorss.countrycode">{{ errorss.countrycode[0] }}</span>
						</div>



						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Area Code</label>
							<input type="text" class="form-control" v-model="form.area_code"
								placeholder="Enter Area Code" id="area_code" name="area_code">
							<span class="error" v-if="errorss.area_code">{{ errorss.area_code[0] }}</span>
						</div>
						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Phone Number</label>
							<input type="text" class="form-control" v-model="form.phoneNumber"
								placeholder="Enter Your Phone Number" id="phoneNumber" name="phoneNumber">
							<span class="error" v-if="errorss.phoneNumber">{{ errorss.phoneNumber[0] }}</span>
						</div>




						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Address</label>
							<input type="text" class="form-control" v-model="form.street_address"
								placeholder="Enter Street Address" id="street_address" name="street_address">
							<span class="error" v-if="errorss.street_address">{{ errorss.street_address[0] }}</span>
						</div>

						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Street Address Lane 2</label>
							<input type="text" class="form-control" v-model="form.street_address_lane2"
								placeholder="Enter Street Address Lane 2" id="street_address_lane2"
								name="street_address_lane2">
							<span class="error" v-if="errorss.street_address_lane2">{{ errorss.street_address_lane2[0]
							}}</span>
						</div>


						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">City</label>
							<input type="text" class="form-control" v-model="form.city" placeholder="Enter City"
								id="city" name="city">
							<span class="error" v-if="errorss.city">{{ errorss.city[0] }}</span>
						</div>


						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">State / Province</label>
							<input type="text" class="form-control" v-model="form.state_province"
								placeholder="Enter State / Province" id="state_province" name="state_province">
							<span class="error" v-if="errorss.state_province">{{ errorss.state_province[0] }}</span>
						</div>


						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Postal /Zip code</label>
							<input type="text" class="form-control" v-model="form.postal_code"
								placeholder="Enter Postal /Zip code" id="postal_code" name="postal_code">
							<span class="error" v-if="errorss.postal_code">{{ errorss.postal_code[0] }}</span>
						</div>
						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Date Of Birth</label>
							<input type="date" class="form-control" v-model="form.dateOf"
								placeholder="Enter Date of Birth" id="dateOf" name="dateOf">
							<span class="error" v-if="errorss.dateOf">{{ errorss.dateOf[0] }}</span>
						</div>



						<div class="col-md-8">
							<label for="validationCustom01" class="form-label">Provider/Professional Performing Your
								Procedure</label>

							<select v-model="form.providerprofessionalperforming" class="form-select border"
								id="providerprofessionalperforming" name="providerprofessionalperforming">

								<option selected disabled value="">Choose...</option>
								<option value="ABC Medical Practice">ABC Medical Practice</option>



							</select>



							<span class="error" v-if="errorss.procedure">{{ errorss.procedure[0] }}</span>
						</div>

						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Total Cost </label>
							<input type="text" class="form-control" v-model="form.totalcost"
								placeholder="Enter Total Cost" id="totalcost" name="totalcost">
							<span class="error" v-if="errorss.totalcost">{{ errorss.totalcost[0] }}</span>
						</div>

						<div class="col-md-4">
							<label for="validationCustom01" class="form-label">Payment Plan Duration</label>
							<select v-model="form.paymentplan" class="form-select border" id="paymentplan"
								name="paymentplan">

								<option selected disabled value="">Choose...</option>
								<option value="6 months">6
									months</option>
								<option value="12months">
									12 months</option>
								<option value="18months">
									18 months</option>
								<option value="24months">
									24 months</option>



							</select>
							<span class="error" v-if="errorss.paymentplan">{{ errorss.paymentplan[0]
							}}</span>
						</div>


						<div class="col-md-8">
							<label for="validationCustom01" class="form-label">Select the date you'd prefer Cosmoj to
								withdraw funds from your account</label>
							<select v-model="form.selecta15" class="form-select border" id="selecta15" name="selecta15">

								<option selected disabled value="">Choose...</option>
								<option value="1st of the month">1st of the month</option>


							</select>
							<span class="error" v-if="errorss.selectThe24">{{ errorss.selectThe24[0] }}</span>
						</div>


						<div class="col-md-6">


							<label class="custom-control custom-checkbox custom-control-md" style=" margin-top: 25px;">
								<input v-model="form.pleaseRead" type="checkbox" class="custom-control-input"
									name="pleaseRead" id="pleaseRead">
								<span class="custom-control-label custom-control-label-md">Please read Cosmoj's Terms of
									Service</span>
							</label>


							<span class="error" v-if="errorss.term_condition">{{ errorss.term_condition[0] }}</span>
						</div>



						<div class="col-md-6">
							<label for="validationCustom01" class="form-label">Staff Code</label>
							<input type="text" class="form-control" v-model="form.staffcode"
								placeholder="Enter Staff Code" id="staffcode" name="staffcode">
							<span class="error" v-if="errorss.staffcode">{{ errorss.staffcode[0] }}</span>
						</div>




						<div class="col-12">
							<button class="btn btn-primary pull-right" type="submit">Submit form</button>
						</div>
					</form>
				</div>




			</div>
		</div>





	</div>
</template>
<script>
import Form from 'vform'
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
export default {

props:[
    "employer_form",
    "individual_form",
    "cosmoj_petttt",
    "medical_providerr",
    "medical_expense_formm"
  
  
  ],

	data() {
		return {
			form: new Form({
				formID: "220293270578054",
				companysname: "",
				companyscorporate31: "",
				companyscorporate36: "",
				companyscorporate: "",
				street_address_lane2: "",
				city: "",
				state_province: "",
				postal_code: "",
				currentnumber: "",
				employeridentification: "",
				selectan: "",
				selectthe48: "",
				selectthe: "",
				description: "",
				approval_status: "",
				medicalfacilitys: "",
				medicalfacilitys31: "",
				medicalfacilitys36: "",
				medicalfacilitys39: "",
				providersnpi: "",
				pleaseRead: "",
				signerstitle: "",
				dependents: "",
				investment_plan: "",
				withdraw_funds: "",
				term_condition: "",
				account_op_fee: "",
				payment_method: "",
				payment_status: "",
				pet_species: "",
				if_other: "",
				pet_gender: "",
				onwer_first_nmae: "",
				onwer_last_nmae: "",
				pet_investment_plan: "",
				npi_number: "",
				signer_title: "",
				country_code: "",
				area_code: "",
				procedure: "",
				total_cost: "",
				staff_code: "",
				paymnet_plan: "",
				first_name: "",
				last_name: "",
				email: "",
				countrycode: "",
				area_code: "",
				phoneNumber: "",
				street_address: "",


				providerprofessionalperforming: "",
				dateOf: "",
				totalcost: "",
				paymentplan: "",
				whatInvestment: "",
				selecta15: "",
				staffcode: "",
				pet_first_name: "",
				pet_last_name: "",
				petspecies: "",
				ifother: "",
				petssex: "",
				onwer_first_nmae: "",
				onwer_last_nmae: "",

				emailof: "",
				petowner: "",



			}),
			errorss: [],
			other_species: false,
			success_msg: "",
			success: false


		};
	},

	methods: {

		formMethod(ele) {


			this.form.reset();
			this.form.formID = ele;


		},
		register() {

			const headers = {

				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),

				'Content-Type': 'multipart/form-data'

			};

			var urls = this.$hostname + 'leads';

			this.form.post(this.$hostname + 'leads/insert', null, { headers }).then((response) => {

				if (response.data.success == false) {

					this.errorss = response.data.message

				} else {

					this.success = true

					this.success_msg = response.data.message

					setTimeout(function () {

						window.location.href = urls;

					}, 1000);

				}


			});

		},
		pet_species(event) {

			if (event.target.value == 'Other') {

				this.other_species = true;

			} else {

				this.other_species = false;
				this.form.ifother = "";

			}

		},
		// processFile(event) {
		// 	console.log('heree')
		// 	// let file = event.target.files;

		//   	// let reader = new FileReader();  

		// 	this.form.files = event.target.files;

		// 	console.log(this.form.files,12312312);




		// }
	},
	mounted() {
		//this.get_active_website();
	}

};
</script> 
<style>
</style>