<template>
  <div class="col-sm-12">

      <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills">
   
                <li class="nav-item" v-if="show_tab">
                    <a class="nav-link" :class="new_tab ? 'active' : '' "  aria-current="page" href="#" @click="showNewTasks">New </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  :class="all_tab ? 'active' : '' " href="#"  @click="showAllTasks">All </a>
                </li>
                
            </ul>
        </div>
    </div>
<br>
    <div class="row">
      <div class="col-md-4">
        <div class="input-group mb-4">
          <input
            type="text"
            v-model="filter.order_id"
            class="form-control input-text"
            name="order_id"
            placeholder="Reference No"
            aria-describedby="basic-addon2"
            id="filter_order_id"
          />
        </div>
      </div>
   <div class="col-md-4">
        <div class="input-group mb-4">
          <input
            type="date"
            v-model="filter.deadline"
            class="form-control input-text"
            name="deadline"
            placeholder="Deadline"
            aria-describedby="basic-addon2"
            id="filter_deadline"
          />
        </div>
      </div>
      </div>
      
     <div class="row">
     
      <div class="col-md-1">
        <div class="input-group mb-1">
          <button
            class="btn btn-outline-primary"
            id="filter"
            @click="filter_button"
            type="button"
          >
            <i class="fa fa-search"></i> Filter
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
    <table
      class="writers_data_table table table-bordered text-nowrap dataTable no-footer"
      id="writers_data_table"
      role="grid"
      aria-describedby="example1_info"
    >
      <thead>

        <tr role="row">

          <th style="width:25px">S.No</th>
          <th style="width:60px">Ref No.</th>
          <th style="width:100px">Title</th>
          <th style="width:100px">Deadline</th>
          <th style="width:60px">Words</th>
          <th style="width:100px">Status</th>
          <th style="width:70px">Assigned To</th>
          <th style="width:70px">Team Lead</th>
          <th style="width:100px">Action</th>

        </tr>

      </thead>

      <tbody>

      </tbody>
    </table>
  </div>
</template>
<script>


export default {
  props:['show_tab'],
  data() {
    return {
      filter: {
        deadline: "",
        order_id:"",
        new_tab : this.show_tab ? true : false,
        all_tab : this.show_tab ? false : true,
      },
      filter_url : this.$hostname + "writers",
      filtered_url :this.$hostname + "writers?new_tab=true",
      new_tab: this.show_tab ? true : false,
      all_tab: this.show_tab ? false : true,
      new_tasks : 0,
      all_tasks : 0,
      filter_array : {},
      visible: false,
    }
  },
  methods: {
    
    filter_button() {

      var filter_array = this.filter_array;    

      filter_array.order_id = "";

      if(this.filter.order_id){

        filter_array.order_id = this.filter.order_id;

      }



      filter_array.deadline = "";

      if(this.filter.deadline){

        filter_array.deadline = this.filter.deadline;

      }

      // filter_array.customer_email = "";

      // if(this.filter.customer_email){

      //   filter_array.customer_email = this.filter.customer_email;

      // }

      // filter_array.payment_status = "";

      // if(this.filter.payment_status){

      //   filter_array.payment_status = this.filter.payment_status;

      // }

      // filter_array.name = "";

      // if(this.filter.name){
          
      //   filter_array.name = this.filter.name;

      // }

      filter_array.new_tab = this.new_tab == true ? 'new' : '';

      filter_array.all_tab = this.all_tab == true ? 'all' : '';

       const u = new URLSearchParams(filter_array).toString();

       this.filtered_url = this.filter_url+"?"+u;

       this.dataTables(this.filtered_url,this.visible);

    },

    reset_button(){

       var filter_array = this.filter_array;    

       this.filter.order_id="";
       
       this.filter_array.order_id="";

       this.filter.deadline="";
       
       this.filter_array.deadline="";

      if(this.new_tab){

        this.filter_array.new_tab = "new";   

      }

      if(this.all_tab){

        this.filter_array.all_tab = "all";   

      }
      
      const u = new URLSearchParams(filter_array).toString();

      this.filtered_url = this.filter_url+"?"+u;

      this.dataTables(this.filtered_url,this.visible);

    },
    dataTables(search_url,clmn_visible){
  
            $(document).ready(function () {

              $("#writers_data_table").DataTable({

                processing: true,

                serverSide: true,

                ajax: search_url,

                destroy: true,

                columns: [
                  
                  { data: "id", name: "id" },

                  { data: "order_id", name: "order_id" },

                  { data: "title", name: "title" },
                  
                  { data: "deadline", name: "deadline" },
                  
                  { data: "word_count", name: "word_count" },

                  { data: "order_status", name: "order_status" },

                  { data: "assign_to", 

                  render: function ( data, type, row ) {
                      
                    return clmn_visible == false ? data : "<i class='fa fa-eye' style='cursor:pointer' onClick='assigned_users_details("+row.id+")'></i>";
  
                  }
                  
                  },
                  { data: "team_lead", name: "team_lead" },
                  
                  {data: "action",name: "action",orderable: false,searchable: false}
                  
                ],
                filter: false,
                sort: false,
              
              });
            });
    },
    showNewTasks(){

        this.new_tab = true;

        this.all_tab = false;

      this.filter_array.new_tab = "new"

      this.filter_array.all_tab =   "";

       var u = new URLSearchParams(this.filter_array).toString();

       this.filtered_url = this.filter_url+"?"+u;

       this.visible = false;

       this.dataTables(this.filtered_url,this.visible);
       
    },
    
    showAllTasks(){
        
        this.visible = true;

        this.new_tab = false;

        this.all_tab = true;  
   
      this.filter_array.new_tab = ""

      this.filter_array.all_tab =   "all";

       var u = new URLSearchParams(this.filter_array).toString();

       this.filtered_url = this.filter_url+"?"+u;

       this.dataTables(this.filtered_url,this.visible);
       
    }
  },
  mounted() {
   
       this.show_tab == false ? this.showAllTasks() : '';
       
       this.dataTables(this.filtered_url,this.visible);
 
       this.interval = setInterval(() =>  this.dataTables(this.filtered_url,this.visible), 30000);
  },
};
</script>

<style>
.writers_data_table tbody tr td {
    white-space: pre-wrap;
    text-align:left ;
   
    word-wrap:break-word; 
    
}
.task_tables{margin-left:0px;padding:0px;background:lightblue;cursor:pointer}
.task_tables > p{margin:10px;text-align:center;font-weight:bold}
</style>

