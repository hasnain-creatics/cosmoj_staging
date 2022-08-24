<template>



  <div class="col-sm-12">

    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-pills">

          <li class="nav-item" v-if="employer_form">
            <a class="nav-link" href="#" :class="cards.Employer_Form ? 'active' : ''"
              @click="load_card_details('Employer_Form')">Employer Form </a>
          </li>
          &nbsp;
          <li class="nav-item" v-if="individual_form">
            <a class="nav-link" href="#" :class="cards.Individual_Form ? 'active' : ''"
              @click="load_card_details('Individual_Form')">Individual Form</a>
          </li> &nbsp;
          <li class="nav-item" v-if="cosmoj_petttt">
            <a class="nav-link" href="#" :class="cards.cosmoj_pet ? 'active' : ''"
              @click="load_card_details('cosmoj_pet')">Cosmoj-Pet</a>
          </li>
          &nbsp;
          <li class="nav-item" v-if="medical_providerr">
            <a class="nav-link" href="#" :class="cards.Medical_Provider ? 'active' : ''"
              @click="load_card_details('Medical_Provider')">Medical Provider</a>
          </li>
          &nbsp;
          <li class="nav-item" v-if="medical_expense_formm">
            <a class="nav-link" href="#" :class="cards.Medical_Expense_Form ? 'active' : ''"
              @click="load_card_details('Medical_Expense_Form')">Medical Expense Form</a>
          </li>

        </ul>
      </div>
    </div>
    <br>






    <div v-if="employer_form && cards.Employer_Form">
      <div class="row">
        <div class="col-md-4">
          <div class="input-group mb-4">
            <input type="text" v-model="filter.lead_id" class="form-control input-text" name="lead_id"
              placeholder="Reference No" aria-describedby="basic-addon2" id="filter_lead_id" />
          </div>
        </div>
        <div class="col-md-4">
          <div class="input-group mb-4">
            <input type="text" v-model="filter.email" class="form-control input-text" name="email" placeholder="Email"
              aria-describedby="basic-addon2" id="filter_email" />
          </div>
        </div>
        <div class="col-md-4">
          <div class="input-group mb-4">
            <select v-model="filter.status" class="form-control input-text" name="status" placeholder="Status"
              aria-describedby="basic-addon2" id="filter_status">
              <option selected disabled value="">Status</option>
              <option value="Approve">Approve</option>
              <option value="Deny">Deny</option>
             
            </select>
          </div>
        </div>
        <!-- <div class="col-md-4" v-if="more_filter">
          <div class="input-group mb-4">
            <input type="text" v-model="filter.name" class="form-control input-text" name="name"
              placeholder="Agent Name" aria-describedby="basic-addon2" id="filter_name" />
          </div>
        </div>
        <div class="col-md-4" v-if="more_filter">
          <div class="input-group mb-4">
            <input type="text" v-model="filter.url" class="form-control input-text" name="url" placeholder="Website URL"
              aria-describedby="basic-addon2" id="url" />
          </div>
        </div>

        <div class="col-md-6" v-if="more_filter">
          <div class="input-group mb-4">
            <input type="date" v-model="filter.date_start" class="form-control input-text" name="date_start"
              placeholder="Website date_start" aria-describedby="basic-addon2" id="date_start" />
          </div>
        </div>
        <div class="col-md-6" v-if="more_filter">
          <div class="input-group mb-4">
            <input type="date" v-model="filter.date_end" class="form-control input-text" name="date_end"
              placeholder="Website date_end" aria-describedby="basic-addon2" id="date_end" />
          </div>
        </div> -->
        <div class="row">



          <div class="col-md-1">
            <div class="input-group mb-1">
              <button class="btn btn-outline-primary" id="filter" @click="filter_button" type="button">
                <i class="fa fa-search"></i> Filter
              </button>
            </div>

          </div>

          <div class="col-md-1" v-if="less_filter">
            <div class="input-group mb-1">
              <button class="btn btn-outline-primary" id="more" @click="add_button" type="button">
                <i class="fa fa-plus"></i> More
              </button>
            </div>

          </div>


          <div class="col-md-1" v-if="less_filterbutton">
            <div class="input-group mb-1">
              <button class="btn btn-outline-primary" id="more" @click="less_button" type="button">
                <i class="fa fa-minus"></i> Less
              </button>
            </div>

          </div>




          <div class="col-md-2">
            <div class="input-group mb-2">
              <button class="btn btn-outline-primary" id="reset" type="button" @click="reset_button">
                <i class="fa fa-undo"></i> Reset
              </button>
            </div>
          </div>
        </div>
      </div>
      <table class="table table-bordered text-nowrap dataTable no-footer" id="example1" role="grid"
        aria-describedby="example1_info">
        <thead>
          <tr role="row">
            <th class="wd-15p border-bottom-0" tabindex="0">S.No</th>

            <th class="wd-15p border-bottom-0" tabindex="0">Ref No.</th>

            <th class="wd-15p border-bottom-0" tabindex="0">company Name</th>

            <th class="wd-15p border-bottom-0" tabindex="0">Email</th>

            <th class="wd-15p border-bottom-0" tabindex="0">Phone</th>

            <th class="wd-15p border-bottom-0" tabindex="0">Address</th>

            <th class="wd-15p border-bottom-0" tabindex="0">City</th>
            <th class="wd-15p border-bottom-0" tabindex="0">Form Type</th>
            <th class="wd-15p border-bottom-0" tabindex="0">Status</th>

            <!-- <th class="wd-15p border-bottom-0" tabindex="0">Created By</th>
          <th class="wd-15p border-bottom-0" tabindex="0">Created At</th> -->
            <th class="wd-15p border-bottom-0" tabindex="0">Action</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>




    <div class="row">
      <leads-cosmoj-pet-list-component v-if="cosmoj_petttt && cards.cosmoj_pet"></leads-cosmoj-pet-list-component>
      <!-- <leads-list-component v-if="cards.Employer_Form"></leads-list-component> -->
      <leads-individual-list-component v-if="individual_form && cards.Individual_Form"></leads-individual-list-component>
      <leads-madecial-expenses-list-component v-if="medical_expense_formm && cards.Medical_Expense_Form">
      </leads-madecial-expenses-list-component>
      <leads-medical-provider-list-component v-if="medical_providerr && cards.Medical_Provider"></leads-medical-provider-list-component>

    </div>
  </div>



</template>
<script>

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
      cards: {


        cosmoj_pet: false,
        Employer_Form: true,
        Individual_Form: false,
        Medical_Expense_Form: false,
        Medical_Provider: false,


      },

      filter: {
        lead_id: "",
        email: "",
        status: "",
        name: "",
        url: "",
        date_start: "",
        date_end: "",
        form_type: "220293270578054"
      },
      more_filter: false,
      less_filter: true,
      less_filterbutton: false,
      filter_url: this.$hostname + "leads",
      filtered_url: ""
    };
  },
  methods: {

    filter_button() {
      
      var filter_array = {};
      filter_array.lead_id = "";
      if (this.filter.lead_id) {
        filter_array.lead_id = this.filter.lead_id;
      }
      filter_array.email = "";
      if (this.filter.email) {
        filter_array.email = this.filter.email;
      }
      filter_array.status = "";
      if (this.filter.status) {
        filter_array.status = this.filter.status;
      }
      filter_array.name = "";
      if (this.filter.name) {
        filter_array.name = this.filter.name;
      }
      filter_array.url = "";
      if (this.filter.url) {
        filter_array.url = this.filter.url;
      }

      filter_array.date_start = "";
      if (this.filter.date_start) {
        filter_array.date_start = this.filter.date_start;
      }

      filter_array.date_end = "";
      if (this.filter.date_end) {
        filter_array.date_end = this.filter.date_end;
      }


      filter_array.form_type = "";
      if (this.filter.form_type) {
        filter_array.form_type = this.filter.form_type;
      }
    
      const u = new URLSearchParams(filter_array).toString();
      this.filtered_url = this.filter_url + "?" + u;
      this.dataTables(this.filtered_url);
    },


    reset_button() {
      this.filter.lead_id = "";
      this.filter.email = "";
      this.filter.status = "";
      this.filter.name = "";
      this.filter.url = "";
      this.filter.date_start = "";
      this.filter.date_end = "";
      this.dataTables(this.filter_url + "?form_type=" + this.filter.form_type);
    },

    add_button() {

      this.more_filter = true;
      this.less_filter = false;
      this.less_filterbutton = true;


    },


    less_button() {

      this.more_filter = false;
      this.less_filter = true;
      this.less_filterbutton = false;
      this.filter.name = "";
      this.filter.url = "";


    },



    async load_card_details(ele) {

      this.cards.cosmoj_pet = false;
      this.cards.Employer_Form = false;
      this.cards.Individual_Form = false;
      this.cards.Medical_Expense_Form = false;
      this.cards.Medical_Provider = false;

      if (ele == "cosmoj_pet") {

        this.cards.cosmoj_pet = true;

      }
      if (ele == "Employer_Form") {
        this.cards.Employer_Form = true;
        this.dataTables(this.filter_url + "?form_type=" + this.filter.form_type);
      }

      if (ele == "Individual_Form") {
        this.cards.Individual_Form = true;
      }
      if (ele == "Medical_Expense_Form") {
        this.cards.Medical_Expense_Form = true;

      }
      if (ele == "Medical_Provider") {
        this.cards.Medical_Provider = true;

      }



    },




    dataTables(search_url) {
      // search_url = this.filtered_url;

      $(document).ready(function () {
        $("#example1").DataTable({
          processing: true,
          serverSide: true,
          ajax: search_url,
          destroy: true,
          "order": [[1, "desc"]],
          columns: [
            {
              data: 'id',
              render: function (data, type, row, meta) {
                return meta.row + 1;
              }
            },
            { data: "lead_id", name: "lead_id" },
            { data: "companysname", name: "companysname" },
            { data: "companyscorporate31", name: "companyscorporate31" },
            { data: "companyscorporate36", name: "companyscorporate36" },
            { data: "companyscorporate", name: "companyscorporate" },
            { data: "city", name: "city" },
            { data: "formID", name: "formID" },
            { data: "approval_status", name: "approval_status" },


            {
              data: "action",
              name: "action",
              orderable: false,
              searchable: false,
            },
          ],
          filter: false,
          sort: true,
        });
      });
    }
  },
  mounted() {
    console.log(this.medical_providerr)
   // console.log(this.filter_url + "?form_type=" + this.filter.form_type);

   

    this.dataTables(this.filter_url + "?form_type=" + this.filter.form_type);
  },


};

</script>

<style>
</style>

