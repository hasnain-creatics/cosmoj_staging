/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
import {
    Button,
    HasError,
    AlertError,
    AlertErrors,
    AlertSuccess
  } from 'vform/src/components/bootstrap5'
  // 'vform/src/components/bootstrap4'
  // 'vform/src/components/tailwind'
  
  Vue.component(Button.name, Button)
  Vue.component(HasError.name, HasError)
  Vue.component(AlertError.name, AlertError)
  Vue.component(AlertErrors.name, AlertErrors)
  Vue.component(AlertSuccess.name, AlertSuccess)

Vue.component('dashboard-component', require('./components/DashboardComponent.vue').default);   
Vue.component('roles-list-component', require('./components/Roles/RolesListComponent.vue').default);   
Vue.component('roles-add-component', require('./components/Roles/RoleAddComponent.vue').default);   
Vue.component('roles-edit-component', require('./components/Roles/RoleEditComponent.vue').default);   
Vue.component('roles-permission-component', require('./components/Roles/RolePermissionComponent.vue').default);   
Vue.component('user-list-component', require('./components/Users/UserListComponent.vue').default);   
Vue.component('leads-add-component', require('./components/Leads/LeadsAddComponent.vue').default);  
Vue.component('leads-edit-component', require('./components/Leads/LeadsEditComponent.vue').default);
Vue.component('leads-medicalprovider-edit-component', require('./components/Leads/LeadsMedicalProviderEditComponent.vue').default);
Vue.component('leads-individual-edit-component', require('./components/Leads/LeadsIndividualEditComponent.vue').default);
Vue.component('leads-medicalexp-edit-component', require('./components/Leads/MedicalExpenEditComponent.vue').default);
Vue.component('leads-cosmojpet-edit-component', require('./components/Leads/LeadsCosmojpetEditComponent.vue').default);

Vue.component('leads-list-component', require('./components/Leads/LeadsListComponent.vue').default); 
Vue.component('leads-cosmoj-pet-list-component', require('./components/Leads/CosmojPetFormListComponent.vue').default);  
Vue.component('leads-individual-list-component', require('./components/Leads/IndividualFormListComponent.vue').default);  
Vue.component('leads-madecial-expenses-list-component', require('./components/Leads/MedicalExpenseFormListComponent.vue').default);  
Vue.component('leads-medical-provider-list-component', require('./components/Leads/MedicalProviderFormListComponent.vue').default);  






Vue.component('issue-list-component', require('./components/Issues/IssueListComponent.vue').default);  
Vue.component('issue-add-component', require('./components/Issues/IssueAddComponent.vue').default);  
Vue.component('issue-edit-component', require('./components/Issues/IssueEditComponent.vue').default);  



Vue.component('orders-list-component', require('./components/Orders/OrdersListComponent.vue').default);  
Vue.component('orders-add-component', require('./components/Orders/OrdersAddComponent.vue').default);  
Vue.component('orders-edit-component', require('./components/Orders/OrdersEditComponent.vue').default);  
Vue.component('delivery-list-component', require('./components/Orders/DeliveryListComponent.vue').default);  

Vue.component('subjects-list-component', require('./components/Subjects/SubjectsListComponent.vue').default);  
Vue.component('subjects-add-component', require('./components/Subjects/SubjectsAddComponent.vue').default);  
Vue.component('subjects-edit-component', require('./components/Subjects/SubjectsEditComponent.vue').default);  

Vue.component('currency-list-component', require('./components/Currency/CurrencyListComponent.vue').default);  
Vue.component('currency-add-component', require('./components/Currency/CurrencyAddComponent.vue').default);  
Vue.component('currency-edit-component', require('./components/Currency/CurrencyEditComponent.vue').default);  



Vue.component('website-list-component', require('./components/Websites/WebsiteListComponent.vue').default);  
Vue.component('website-add-component', require('./components/Websites/WebsiteAddComponent.vue').default);  
Vue.component('website-edit-component', require('./components/Websites/WebsiteEditComponent.vue').default);  
// Vue.component('currency-add-component', require('./components/Currency/CurrencyAddComponent.vue').default);  
// Vue.component('currency-edit-component', require('./components/Currency/CurrencyEditComponent.vue').default);  


Vue.component('writers-list-component', require('./components/Writers/WritersListComponent.vue').default);  
Vue.component('task-details-component', require('./components/Writers/TaskDetailsComponent.vue').default);  
Vue.component('task-timeline-component', require('./components/TaskTimeline/TaskTimelineComponent.vue').default);  
Vue.component('rating-modal-component',require('./components/Writers/RatingModalComponent.vue').default);


// dashboard

Vue.component('dashboard-count-component',require('./components/Dashboard/DashboardCountComponent.vue').default);
Vue.component('dashboard-table-component',require('./components/Dashboard/DashboardTableComponent.vue').default);
Vue.component('urgent-task-component',require('./components/Dashboard/UrgentTaskComponent.vue').default);
Vue.component('sale-urgent-orders-component',require('./components/Dashboard/SaleUrgentOrdersComponent.vue').default);
Vue.component('new-task-component',require('./components/Dashboard/NewTaskComponent.vue').default);
Vue.component('inprogress-task-component',require('./components/Dashboard/InprogressTaskComponent.vue').default);
Vue.component('feedback-task-component',require('./components/Dashboard/FeedbackTaskComponent.vue').default);
Vue.component('required-qa-component',require('./components/Dashboard/RequiredQAComponent.vue').default);
Vue.component('unassigned-component',require('./components/Dashboard/UnassignedComponent.vue').default);
Vue.component('pending-component',require('./components/Dashboard/PendingComponent.vue').default);
Vue.component('qa-approved-component',require('./components/Dashboard/QaApprovedComponent.vue').default);
Vue.component('qa-rejected-component',require('./components/Dashboard/QaRejectedComponent.vue').default);

Vue.component('todays-deliverable-component',require('./components/Dashboard/TodaysDeliverableComponent.vue').default);
Vue.component('monthly-deliverable-component',require('./components/Dashboard/MonthlyDeliverableComponent.vue').default);
Vue.component('monthly-leads-component',require('./components/Dashboard/MonthlyLeadsComponent.vue').default);
Vue.component('monthly-orders-component',require('./components/Dashboard/MonthlyOrdersComponent.vue').default);
Vue.component('todays-leads-component',require('./components/Dashboard/TodaysLeadsComponent.vue').default);
Vue.component('todays-orders-component',require('./components/Dashboard/TodaysOrdersComponent.vue').default);


Vue.component('modal-component',require('./components/Writers/ModalComponent.vue').default);

Vue.component('notifications-list-component',require('./components/Notifications/NotificationsListComponent.vue').default);



Vue.component('chat-messages', require('./components/ChatMessages.vue').default);
Vue.component('chat-form', require('./components/ChatForm.vue').default);
Vue.component('chat-box', require('./components/ChatBox.vue').default);

import VueToast from 'vue-toast-notification';
// Import one of the available themes
//import 'vue-toast-notification/dist/theme-default.css';
import 'vue-toast-notification/dist/theme-sugar.css';

Vue.use(VueToast);

/**
 * 
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 Vue.prototype.$hostname = 'http://staging.digiwiser.co/cosmoj/admin/';
 //Vue.prototype.$hostname = 'http://staging.digiwiser.co/com/admin/';
 Vue.prototype.$api = 'http://staging.digiwiser.co/cosmoj/api/';
 
//  this.$hostname+'websites';
const app = new Vue({
    el: '#app',
});