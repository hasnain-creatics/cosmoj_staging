<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\LeadsController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\NoticeBoardController;
use App\Http\Controllers\KnowledgeController;
use App\Http\Controllers\OrderMessageController;
use App\Http\Controllers\InternalNotificationsController;
use App\Http\Controllers\DepartmentsController;
use App\Events\NotificationEvent;
use Pusher\Pusher;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::fallback(function () {

    return redirect('admin/home');

});

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();


Route::group(['prefix'=>'admin','middleware'=>['auth','logs']],function(){
    
    Route::get('/chat', [App\Http\Controllers\ChatsController::class, 'index']);

    Route::get('/messages', [App\Http\Controllers\ChatsController::class, 'fetchMessages']);
    
    Route::get('/fetch_my_message/{id}', [App\Http\Controllers\ChatsController::class, 'fetch_my_message']);
    
    Route::post('/messages', [App\Http\Controllers\ChatsController::class, 'sendMessage']);


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::get('/dashboard/countes', [App\Http\Controllers\HomeController::class, 'writer_dashboard_counters'])->name('dashboard.counts');
    
    Route::get('/dashboard/writer_urgent_tasks', [App\Http\Controllers\HomeController::class, 'writer_urgent_tasks'])->name('dashboard.writer_urgent_tasks');
    
    Route::get('/dashboard/inprogress_task', [App\Http\Controllers\HomeController::class, 'inprogress_task'])->name('dashboard.inprogress_task');

    Route::get('/dashboard/unassigned_task', [App\Http\Controllers\HomeController::class, 'writer_unassigned_tasks'])->name('dashboard.unassigned_task');

    Route::get('/dashboard/new_task', [App\Http\Controllers\HomeController::class, 'writer_new_tasks'])->name('dashboard.new_task');

    Route::get('/dashboard/qa_required_task', [App\Http\Controllers\HomeController::class, 'qa_required_task'])->name('dashboard.qa_required_task');

    Route::get('/dashboard/writer_feedback_tasks', [App\Http\Controllers\HomeController::class, 'writer_feedback_tasks'])->name('dashboard.writer_feedback_tasks');

    Route::get('/dashboard/sale_urgent_orders', [App\Http\Controllers\HomeController::class, 'sale_urgent_orders'])->name('dashboard.sale_urgent_orders');
    
    Route::get('/dashboard/sale_pending_orders', [App\Http\Controllers\HomeController::class, 'sale_pending_orders'])->name('dashboard.sale_pending_orders');
    
    Route::get('/dashboard/sale_qa_approved_orders', [App\Http\Controllers\HomeController::class, 'sale_qa_approved_orders'])->name('dashboard.sale_qa_approved_orders');
    
    Route::get('/dashboard/sale_qa_rejected_orders', [App\Http\Controllers\HomeController::class, 'sale_qa_rejected_orders'])->name('dashboard.sale_qa_rejected_orders');

    Route::get('/dashboard/today_deliverable', [App\Http\Controllers\HomeController::class, 'today_deliverable'])->name('dashboard.today_deliverable');

    Route::get('/dashboard/monthly_deliverable', [App\Http\Controllers\HomeController::class, 'monthly_deliverable'])->name('dashboard.monthly_deliverable');

    Route::get('/dashboard/rating_details', [App\Http\Controllers\HomeController::class, 'rating_details'])->name('dashboard.rating_details');

    Route::get('/dashboard/todays_leads', [App\Http\Controllers\HomeController::class, 'todays_leads'])->name('dashboard.todays_leads');

    Route::get('/dashboard/monthly_leads', [App\Http\Controllers\HomeController::class, 'monthly_leads'])->name('dashboard.monthly_leads');

    Route::get('/dashboard/todays_orders', [App\Http\Controllers\HomeController::class, 'todays_orders'])->name('dashboard.todays_orders');
    
    Route::get('/dashboard/monthly_orders', [App\Http\Controllers\HomeController::class, 'monthly_orders'])->name('dashboard.monthly_orders');
    
    Route::group(['prefix'=>'roles'],function(){

        Route::get('/', [RolesController::class,'index']);

        Route::get('/get_roles',[RolesController::class,'get_roles'])->name('get_roles');

        Route::get('/get_single_role/{id}',[RolesController::class,'show']);
        
        Route::get('/add',[RolesController::class,'create'])->name('role.add');
        
        Route::get('/edit/{id}',[RolesController::class,'edit']);
        
        Route::post('/update',[RolesController::class,'update']);    
    
    });

    Route::group(['prefix'=>'roles/permissions'],function(){

        Route::get('/{id}',[RolesController::class,'role_permissions'])->name('roles.permission');

        Route::get('/get_role_permissions/{id}',[RolesController::class,'get_role_permissions']);

        Route::post('/update_permission',[RolesController::class,'update_permmission']);
        
    });

    Route::group(['prefix'=>'user'],function(){

        Route::get('/',[UserController::class,'index'])->name('user.index');

        Route::get('/get_users',[UserController::class,'get_users']);

        Route::get('/get_all_users',[UserController::class,'get_all_users']);

        Route::get('/fetch_all_active_users',[UserController::class,'fetch_all_active_users']);
        
        Route::get('/fetch_all_sales_agent',[UserController::class,'fetch_all_sales_agent'])->name('roles.sales_agents');

        Route::post('/check_email_exists',[UserController::class,'check_email_exists'])->name('check_email_exists');

        Route::get('/add',[UserController::class,'create'])->name('user.add');
        
        Route::get('/add/{id}',[UserController::class,'edit'])->name('user.edit');

        Route::post('/update',[UserController::class,'update'])->name('user.update');

        Route::get('/fetch_designation',[UserController::class,'fetch_all_designation'])->name('fetch_all_designation');

        Route::get('/fetch_cities',[UserController::class,'fetch_cities'])->name('fetch_cities');

        Route::get('/fetch_managers/{id}',[UserController::class,'fetch_managers']);
        
        Route::get('/fetch_leads/{id}',[UserController::class,'fetch_leads']);

        Route::get('/delete/{id}',[UserController::class,'destroy'])->name('user.delete');
        
        Route::get('/status_update/{id}',[UserController::class,'status_update']);

        Route::get('/show/{id}',[UserController::class,'show']);

        Route::get('/profile',[UserController::class,'profile']);
        
        Route::post('/profile_update',[UserController::class,'profile_update'])->name('user.profile_update');

    });

    Route::group(['prefix'=>'orders'],function(){

        Route::get('/',[OrdersController::class,'index'])->name('orders.home');

        Route::get('/all_docs/{id}',[OrdersController::class,'all_docs'])->name('orders.all_docs');

        Route::get('/delete_doc/{id}',[OrdersController::class,'delete_doc'])->name('orders.delete_doc');
  
        Route::get('/add',[OrdersController::class,'create'])->name('orders.add');

        Route::get('/add/{id}',[OrdersController::class,'edit'])->name('orders.edit');

        Route::get('/lead/{id}',[OrdersController::class,'order_lead'])->name('orders.lead.edit');
       
        
        Route::get('/delete/{id}',[OrdersController::class,'destroy'])->name('orders.delete');

        Route::get('/fetch_order/{id}',[OrdersController::class,'fetch_order'])->name('orders.fetch_order');
        
        Route::get('/order_timline/{id}',[OrdersController::class,'order_timline'])->name('orders.order_timline');

        Route::post('/insert',[OrdersController::class,'store']);

        Route::post('/change_order_status/{id}',[OrdersController::class,'change_order_status']);

        Route::get('/add_feedback/{id}',[OrdersController::class,'add_feedback'])->name('orders.add_feedback');

        Route::get('/fetch_all_feedback/{id}',[OrdersController::class,'fetch_all_feedback'])->name('orders.fetch_all_feedback');

        Route::post('/add_feedback',[OrdersController::class,'store_feedback'])->name('orders.store_feedback');

        Route::get('/order_full_details/{id}',[OrdersController::class,'order_full_details'])->name('orders.order_full_details');

        Route::get('/order_status_details/{id}',[OrdersController::class,'order_status_details'])->name('orders.order_status_details');

        Route::post('/failed_reason/{id}',[OrdersController::class,'failed_reason'])->name('orders.failed_reason');

        Route::post('/update_payment_status/{id}',[OrdersController::class,'update_payment_status'])->name('orders.update_payment_status');
        // failed_reason
        
        Route::get('/add/{id}/upsell',[OrdersController::class,'order_upsell'])->name('orders.order_upsell');

    });

    Route::group(['prefix'=>'delivery'],function(){

        Route::get('/',[OrdersController::class,'delivery'])->name('delivery.index');

    });


    Route::group(['prefix'=>'leads'],function(){

        Route::get('/',[LeadsController::class,'index'])->name('leads.home');
       
        Route::post('/search_leads',[LeadsController::class,'search_leads'])->name('leads.search_leads');
        Route::get('/add',[LeadsController::class,'create'])->name('leads.add');

        Route::get('/view/{id}',[LeadsController::class,'show'])->name('leads.view');

        Route::post('/insert',[LeadsController::class,'store']);
        Route::get('/addmadical/{id}',[LeadsController::class,'madical_provider_edit'])->name('leads.madical_provider_edit');
        Route::get('/addindividual/{id}',[LeadsController::class,'individual_edit'])->name('leads.individual_edit');
        Route::get('/addMedExpen/{id}',[LeadsController::class,'medical_exp_edit'])->name('leads.madical_exp_edit');
        Route::get('/addCosmojpet/{id}',[LeadsController::class,'cosmojpet_edit'])->name('leads.cosmojpet_edit');
        Route::get('/viewEmployerDetails/{id}',[LeadsController::class,'employer_form_view'])->name('leads.employer_form_view');
        Route::get('/viewIndividualDetails/{id}',[LeadsController::class,'individual_form_view'])->name('leads.individual_form_view');
        Route::get('/viewCosmojPetDetails/{id}',[LeadsController::class,'cosmojpet_form_view'])->name('leads.cosmojpet_form_view');
        Route::get('/viewMedicalProviderDetails/{id}',[LeadsController::class,'medicalprovider_form_view'])->name('leads.medicalprovider_form_view');
        Route::get('/viewMedicalexpenseDetails/{id}',[LeadsController::class,'medicalexpense_form_view'])->name('leads.medicalexpense_form_view');
     
        Route::post('/employee_add_form',[LeadsController::class,'store_emp'])->name('employee_add_form.add');
        Route::post('/employee_edit_form',[LeadsController::class,'update_emp'])->name('employee_edit_form.edit');
        Route::post('/document_add_form',[LeadsController::class,'store_doc'])->name('document_add_form.add');
        
        
        Route::get('/add/{id}',[LeadsController::class,'edit'])->name('leads.edit');


        Route::get('/delete/{id}',[LeadsController::class,'destroy'])->name('leads.delete');

        Route::get('/fetch_lead/{id}',[LeadsController::class,'fetch_lead'])->name('leads.fetch_lead');
        
        Route::get('/all_docs/{id}',[LeadsController::class,'all_docs'])->name('leads.all_docs');

        Route::get('/add_employee/{id}',[LeadsController::class,'add_emp'])->name('leads.add_emp');
        Route::get('/edit_employee/{id}',[LeadsController::class,'edit_emp'])->name('leads.edit_emp');
        Route::get('/add_dco/{id}',[LeadsController::class,'add_document'])->name('leads.add_document');
        Route::get('/add_email/{id}',[LeadsController::class,'add_employee'])->name('leads.add_employee');
      
        
        Route::group(['prefix'=>'docs'],function(){

            Route::get('/delete/{id}',[LeadsController::class,'delete_docs'])->name('leads.docs.delete');
    
        });
        
        Route::get('/lead_transfers/{id}',[LeadsController::class,'lead_transfers']);

        Route::post('/lead_transfers',[LeadsController::class,'lead_transfer_update']);

        Route::get('/lead_transfers_details/{id}',[LeadsController::class,'lead_transfers_details']);

        Route::get('/convert_lead/{id}',[LeadsController::class,'convert_lead']);

    });

    Route::group(['prefix'=>'issue'],function(){

        route::get('/select_all_active_issues',[IssueController::class,'select_all_active_issues'])->name('issues.select_all_active_issues');

        Route::get('/',[IssueController::class,'index'])->name('issue.home');

        Route::get('/add',[IssueController::class,'create'])->name('issue.add');

        Route::post('/add',[IssueController::class,'store'])->name('issue.create');

        Route::get('/add/{id}',[IssueController::class,'edit'])->name('issue.edit');

        Route::get('/delete/{id}',[IssueController::class,'destroy'])->name('issue.delete');

        Route::get('/issues',[IssueController::class,'get_all_issues'])->name('issue.get_all_issues');

        Route::get('/fetch_issue/{id}',[IssueController::class,'get_issue'])->name('issue.get_issue');

    });

    

    Route::group(['prefix'=>'subjects'],function(){

        Route::get('/',[SubjectsController::class,'index'])->name('subjects.home');

        Route::get('/add',[SubjectsController::class,'create'])->name('subjects.add');

        Route::post('/add',[SubjectsController::class,'store'])->name('subjects.create');

        Route::get('/add/{id}',[SubjectsController::class,'edit'])->name('subjects.edit');

        Route::get('/delete/{id}',[SubjectsController::class,'destroy'])->name('subjects.delete');

        Route::get('/get_all_subjects',[SubjectsController::class,'get_all_subjects'])->name('subjects.get_all_subjects');

        Route::get('/get_subject/{id}',[SubjectsController::class,'get_subject'])->name('subjects.get_issue');
        Route::get('/get_all_active_subjects',[SubjectsController::class,'get_all_active_subjects'])->name('subjects.get_all_active_subjects');



    });

    

    Route::group(['prefix'=>'currency'],function(){

        Route::get('/',[CurrencyController::class,'index'])->name('currency.home');

        Route::get('/add',[CurrencyController::class,'create'])->name('currency.add');

        Route::post('/add',[CurrencyController::class,'store'])->name('currency.create');

        Route::get('/add/{id}',[CurrencyController::class,'edit'])->name('currency.edit');

        Route::get('/delete/{id}',[CurrencyController::class,'destroy'])->name('currency.delete');

        Route::get('/get_all_subjects',[CurrencyController::class,'get_all_subjects'])->name('currency.get_all_subjects');

        Route::get('/get_subject/{id}',[CurrencyController::class,'get_subject'])->name('currency.get_issue');

        Route::get('/sync',[CurrencyController::class,'sync'])->name('currency.sync');
        Route::get('/get_all_active_currency',[CurrencyController::class,'get_all_active_currency'])->name('currency.get_all_active_currency');

        

    });



    Route::group(['prefix'=>'websites'],function(){

        Route::get('/',[WebsiteController::class,'index'])->name('website.index');

        Route::get('/add',[WebsiteController::class,'create'])->name('website.add');

        Route::post('/add',[WebsiteController::class,'store'])->name('website.create');

        Route::get('/add/{id}',[WebsiteController::class,'edit'])->name('website.edit');

        Route::get('/delete/{id}',[WebsiteController::class,'destroy'])->name('website.delete');

        Route::get('/get_single_website/{id}',[WebsiteController::class,'get_single_website'])->name('website.get_single_website');

        Route::get('/get_website',[WebsiteController::class,'get_website'])->name('website.get_website');

        Route::get('/get_active_website',[WebsiteController::class,'get_active_website'])->name('website.get_active_website');
      
    });



    // Route::group(['prefix'=>'noticeboard'],function(){

    //     Route::get('/',[NoticeBoardController::class,'index'])->name('noticeboard.index');
    //     Route::get('/add',[NoticeBoardController::class,'create'])->name('noticeboard.add');
    //     Route::get('/add/{id}',[NoticeBoardController::class,'edit'])->name('noticeboard.edit');
    //     Route::post('/update',[NoticeBoardController::class,'update'])->name('noticeboard.update');
    //     Route::get('/get_users_notice/{id}',[NoticeBoardController::class,'get_users_notice'])->name('noticeboard.get_users_notice');
    //     Route::get('/get_selected_departments/{id}',[NoticeBoardController::class,'get_selected_departments'])->name('noticeboard.get_selected_departments');
       

       
    // });




    Route::group(['prefix'=>'noticeboard'],function(){

        Route::get('/',[NoticeBoardController::class,'index'])->name('noticeboard.index');
        Route::get('/add',[NoticeBoardController::class,'create'])->name('noticeboard.add');
        Route::get('/add/{id}',[NoticeBoardController::class,'edit'])->name('noticeboard.edit');
        Route::post('/update',[NoticeBoardController::class,'update'])->name('noticeboard.update');
        Route::get('/get_users_department/{id}',[NoticeBoardController::class,'get_users_department'])->name('noticeboard.get_users_department');
        
        Route::get('/get_users_notice/{id}',[NoticeBoardController::class,'get_users_notice'])->name('noticeboard.get_users_notice');

        Route::get('/active_departments_selected/{id}',[NoticeBoardController::class,'active_departments_selected'])->name('noticeboard.active_departments_selected');
       

       
    });


    Route::group(['prefix'=>'knowledge'],function(){


        Route::get('/upload/{id}', [KnowledgeController::class, 'upload'])->name('knowledge.upload');
        Route::get('/video_listing/{id}', [KnowledgeController::class, 'video_listing'])->name('knowledge.video_listing');
        Route::get('/video_listing', [KnowledgeController::class, 'video_listing'])->name('knowledge.video_listings');
        Route::get('/play_video/{id}', [KnowledgeController::class, 'play_video'])->name('knowledge.play_video');

        Route::post('/',[KnowledgeController::class,'store'])->name('knowledge.add');

        

    });


    Route::group(['prefix'=>'writers'],function(){

        Route::get('/',[WriterController::class,'index'])->name('writers.index');
        
        Route::get('/writers_assiged_lists/{id}',[WriterController::class,'writers_assiged_lists'])->name('writers.writers_assiged_lists');

        Route::post('/change_status/{id}',[WriterController::class,'change_status'])->name('writers.change_status');

        Route::post('/check_user_assignments/{id}',[WriterController::class,'check_user_assignments'])->name('writers.check_user_assignments');

        Route::post('/assigned_user/{id}',[WriterController::class,'assigned_user'])->name('writers.change_statuses');
      
        Route::get('/task_details/{id}',[WriterController::class,'task_details'])->name('writers.task_details');
        
        Route::get('/fetch_order/{id}',[WriterController::class,'fetch_order'])->name('writers.fetch_order');
        
        Route::get('/fetch_all_writers',[WriterController::class,'fetch_all_writers'])->name('writers.fetch_all_writers');
        
        Route::post('/task_update/{id}',[WriterController::class,'task_update'])->name('writers.task_update');

        Route::post('/task_status_update/{id}',[WriterController::class,'task_status_update'])->name('writers.task_status_update');

        Route::post('/user_task_details_update/{id}',[WriterController::class,'user_task_details_update'])->name('writers.user_task_details_update');
   
        Route::post('/delete_assigned_user',[WriterController::class,'delete_assigned_user'])->name('writers.delete_assigned_user');
        
        Route::get('/user_ratings/{user_id}/{order_id}',[WriterController::class,'user_ratings'])->name('writers.user_ratings');
   
        Route::get('/delete_doc/{id}',[WriterController::class,'delete_doc'])->name('writers.delete_doc');


        Route::post('/submit_ratings',[WriterController::class,'submit_ratings'])->name('writers.submit_ratings');

        
     });


     Route::group(['prefix'=>'order_message'],function(){

        Route::get('/order_message_list/{id}',[OrderMessageController::class,'order_message_list'])->name('order_message.order_message_list');

        Route::post('/send',[OrderMessageController::class,'store'])->name('order_message.add');

        Route::get('/fetch_messages/{id}',[OrderMessageController::class,'fetch_messages'])->name('order_message.fetch_messages');

     });

     Route::group(['prefix'=>'notifications'],function(){

        Route::get('/notification_list',[InternalNotificationsController::class,'notification_list'])->name('notifications.notification_list');

        Route::get('/fetch_new_notifications',[InternalNotificationsController::class,'fetch_new_notifications'])->name('notifications.fetch_new_notifications');       
        
        Route::get('/check_some_notifications',[InternalNotificationsController::class,'check_some_notifications'])->name('notifications.check_some_notifications');    
        
        Route::get('/notify_notification',[InternalNotificationsController::class,'notify_notification'])->name('notifications.notify_all');   
            
        Route::get('/notify_notification/{id}',[InternalNotificationsController::class,'notify_notification'])->name('notifications.notify_notification');       
        
        
     });

     Route::group(['prefix'=>'departments'],function(){

        Route::get('/active_departments',[DepartmentsController::class,'fetch_active_department'])->name('departments.active_departments');

     });


     Route::group(['prefix'=>'messages'],function(){

        Route::get('/',[OrderMessageController::class,'index'])->name('messages.index');

        Route::get('/fetch_order_list',[OrderMessageController::class,'fetch_order_list'])->name('messages.fetch_order_list');

        Route::get('/fetch_order_message/{id}',[OrderMessageController::class,'fetch_order_message']);

     });

});
// Route::view('/roles', [RolesController::class, 'index']);
