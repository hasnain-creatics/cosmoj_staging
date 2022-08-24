<template>



  <div class="col-sm-12">

 

    <div class="row">
      <div class="col-md-4">
        <div class="input-group mb-4">
          <input type="text" v-model="filter.lead_id" class="form-control input-text" name="lead_id"
            placeholder="Reference No" aria-describedby="basic-addon2" id="filter_lead_id" />
        </div>
      </div>
      <div class="col-md-4">
        <div class="input-group mb-4">
          <input type="text" v-model="filter.email_pet" class="form-control input-text" name="email_pet" placeholder="Email"
            aria-describedby="basic-addon2" id="filter_email_pet" />
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
      <div class="col-md-4" v-if="more_filter">
        <div class="input-group mb-4">
          <input type="text" v-model="filter.name" class="form-control input-text" name="name" placeholder="Agent Name"
            aria-describedby="basic-addon2" id="filter_name" />
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
      </div>
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

          <th class="wd-15p border-bottom-0" tabindex="0">Pet Name</th>
            <th class="wd-15p border-bottom-0" tabindex="0">Pet Species</th>
           <th class="wd-15p border-bottom-0" tabindex="0">Pet Owner Name</th>

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



</template>
<script>

export default {
  data() {
    return {
      filter: {
        lead_id: "",
        email_pet: "",
        status: "",
        name: "",
        url: "",
        date_start: "",
        date_end: "",
        form_type: "221278115891155"
        
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
      filter_array.email_pet = "";
      if (this.filter.email_pet) {
        filter_array.email_pet = this.filter.email_pet;
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
      //this.dataTables(this.filter_url + "?form_type=" + this.filter.form_type);
      this.dataTables(this.filtered_url);
    },


    reset_button() {
      this.filter.lead_id = "";
      this.filter.email_pet = "";
      this.filter.status = "";
      this.filter.name = "";
      this.filter.url = "";
      this.filter.date_start = "";
      this.filter.date_end = "";
      //this.dataTables(this.filter_url);
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
           {data: 'id',
       render: function (data, type, row, meta) {
            return meta.row + 1;
       }
    },
           { data: "lead_id", name: "lead_id" },
            { data: "petname", name: "petname" },
             { data: "petspecies", name: "petspecies" },
             { data: "nameof", name: "nameof" },
              { data: "emailof", name: "emailof" },
          
            { data: "petowner", name: "petowner" },
            { data: "petowners18", name: "petowners18" },
            { data: "city_pet", name: "city_pet" },
             
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
    //this.dataTables(this.filtered_url);

    this.dataTables(this.filter_url + "?form_type=" + this.filter.form_type);
  },


};

</script>

<style>
</style>

