<template>
  <div class="col-lg-6">
    <div class="card">
      <div class="card-header bg-secondary monthly-table-card monthly-delivery">
        <h3 class="card-title text-white"> This Month Deliverable</h3>
        <div class="card-options">
          <a
            href="javascript:void(0);"
            class="card-options-collapse me-2 text-white"
            data-bs-toggle="card-collapse"
            ><i class="fe fe-chevron-up"></i
          ></a>
          <a
            href="javascript:void(0);"
            class="card-options-remove text-white"
            data-bs-toggle="card-remove"
            ><i class="fe fe-x"></i
          ></a>
        </div>
      </div>
      <div class="card-body">
        <!-- sale_order_uploaded_document -->

              <!-- <dashboard-table-component :result="result" :total_record="total_record"></dashboard-table-component> -->
 <table
          class="table table-bordered text-nowrap dataTable no-footer"
          id="urgent_task_dashboard_table"
          role="grid"
          aria-describedby="example1_info"
        >
          <thead>
            <tr>
              <th>S.no</th>
              <th>OrderID</th>
              <th>Title</th>
              <th>Word Count</th>
              <th>Deadline</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(results, index) in result" :key="index">
              <td>{{index+=1}}</td>
              <td>{{results.order_id }}</td>
              <td>{{results.title }}</td>
              <td>{{results.word_count }}</td>
              <td>{{results.deadline }}</td>
              
              <td>
                <!-- <a :href="$hostname+'writers/task_details/'+results.id"><i class="fa fa-edit"></i></a> -->
              </td>
            </tr>
          </tbody>
          <tfoot>
              <tr>
                  <td colspan="6">Total Records: {{total_record}}</td>
                  
              </tr>
          </tfoot>
        </table>             
        <ul class="pagination">
        <li
          v-for="(links, index) in page_links"
          :key="index"
          class="paginate_button page-item"
          :data-url="links.label"
          @click="page_links_method(links.url)"
          :class="current_page == links.label ? 'active' : ''"
        >
          <i class="page-link" v-html="links.label"></i>
        </li>
      </ul>

      </div>
    
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      s_no: 1,
      result: [],
      page_links: "",
      url: this.$hostname + "dashboard/monthly_deliverable?page=1",
      current_page : 1,
      total_record: 0,
    };
  },
  methods: {

    async load_card_details(ele){
      console.log(ele);
    },
    async page_links_method(ele) {

        this.url = ele

        this.fetch_urgent_record(this.url);

    },
    async fetch_urgent_record(url) {
      await axios

        .get(url)

        .then((response) => {

          this.result = response.data.data;

          this.page_links = response.data.links;

          this.current_page = response.data.current_page;

          this.total_record = response.data.total;

        });
    },
  },
  
  async mounted() {

    this.fetch_urgent_record(this.url);
//    this.interval = setInterval(() =>this.fetch_urgent_record(this.url), 5000);
  },
};
</script>