<?php
namespace App\Datatables;
use Illuminate\Support\Facades\DB;
use DataTables;
// use Illuminate\Support\Facades\Gate;
use Auth;
use Carbon\Carbon;
use App\Models\User; 
use App\Models\Status;
use App\Models\OrderAssigns;
use App\Models\Orders;

class GlobalDatatables
{
    public $data;
    public $actions;
    public function __construct($data,$actions){
        $this->data = $data;
        $this->actions = $actions;
    }
    public function context()
    {
        $actions = $this->actions;
        return $this->{$actions}($this->data);
    }

    protected function users($data)
    {     
        return Datatables::of($data)
        
        ->editColumn('name',function($row){

            if($row->is_lead){

                return "<span class='table-name-text'>".$row->name." <span class='badge badge-gradient-Primary'> TL </span> </span>";

            }else{

                return "<span>".$row->name."</span>";

            }

        })
        ->editColumn('profile_image',function($row){

            if($row->profile_image){

                return '<img src="'.url('storage/app/'.$row->profile_image).'" style="width:50px;">';

            }else{

                return '<img src="'.url("public/assets/images/no_image.jpg").'" style="width:50px;">';
       
            }

        })
        ->editColumn('status',function($row){

            return '<label class="switch">
                <input '. (Auth::user()->roles[0]->name != 'Admin' ? "disabled" : "" ) .' type="checkbox" class="status_check_box "  data-set="'.$row->id.'" '.($row->status == 'ACTIVE' ? 'checked' : '').'>
                <span class="slider round"></span>
              </label>';

        })->addIndexColumn()->addColumn('action', function($row){

            $btn = "<form action='".route('user.delete',$row->id)."' class='delete_submit'>";

            if (Auth::user()->can('user-edit')):

                $btn .= "<a href='".route('user.edit',$row->id)."' class='fa fa-edit' aria-hidden='true' title='Edit'></a>&nbsp;";

            endif;
            
            if (Auth::user()->can('user-delete')):

                $btn .= "<i class='fa fa-trash' aria-hidden='true' onclick='userDelete(".$row->id.")' style='cursor:pointer' title='Delete'></i>";

            endif;


                $btn .= "<i class='fa fa-eye' aria-hidden='true' onclick='userView(".$row->id.")' style='cursor:pointer' title='View'></i>";

            $btn.="</form>";

            return $btn;
            
        })->rawColumns(['action','profile_image','status','name'])->make(true);
    }

    public function leads($data){

        return Datatables::of($data)->editColumn('lead_id',function($row){

           // return "<span  class='lead_id ".strtolower($row->id)."'  >".$row->lead_id."</span>";
           return "<span    >".$row->lead_id."</span>";

        })->editColumn('created_at',function($row){

            return date("d M Y H:i:s", strtotime($row->created_at));

        })->editColumn('companyscorporate36',function($row){
            if(isset (json_decode($row->companyscorporate36)[0])){

            return json_decode($row->companyscorporate36)[0];
            }

        })->editColumn('companyscorporate',function($row){
            if(isset (json_decode($row->companyscorporate)[0])){

            return json_decode($row->companyscorporate)[0];
            }

        })->editColumn('medicalfacilitys36',function($row){

             if(isset (json_decode($row->medicalfacilitys36)[0])){

                    return json_decode($row->medicalfacilitys36)[0];

             }

        })->editColumn('medicalfacilitys39',function($row){

            if(isset (json_decode($row->medicalfacilitys39)[0])){

                   return json_decode($row->medicalfacilitys39)[0];

            }

       })->editColumn('name',function($row){

        if(isset (json_decode($row->name)[0])){

               return json_decode($row->name)[0] ." ".json_decode($row->name)[1];

        }

   })->editColumn('name',function($row){

        if(isset (json_decode($row->name)[0])){

               return json_decode($row->name)[0] ." ".json_decode($row->name)[1];

        }

   })->editColumn('phoneNumber',function($row){

    if(isset (json_decode($row->phoneNumber)[0])){

           return json_decode($row->phoneNumber)[0];

    }

})->editColumn('dateOf',function($row){

    if(isset (json_decode($row->dateOf)[0])){

           return json_decode($row->dateOf)[0].'-'.json_decode($row->dateOf)[1].'-'.json_decode($row->dateOf)[2];

    }

})->editColumn('address',function($row){

    if(isset (json_decode($row->address)[0])){

           return json_decode($row->address)[0];

    }

})->editColumn('petname',function($row){

    if(isset (json_decode($row->petname)[0])){

           return json_decode($row->petname)[0] ." ".json_decode($row->petname)[1];

    }

})->editColumn('nameof',function($row){

    if(isset (json_decode($row->nameof)[0])){

           return json_decode($row->nameof)[0] ." ".json_decode($row->nameof)[1];

    }

})->editColumn('petowner',function($row){

    if(isset (json_decode($row->petowner)[0])){

           return json_decode($row->petowner)[0] ;

    }

})->editColumn('petowners18',function($row){

    if(isset (json_decode($row->petowners18)[0])){

           return json_decode($row->petowners18)[0] ;

    }

})->editColumn('formID',function($row){

            if($row->formID == '220293270578054')
            { 
                return "Employer Form";
            
            }

            if($row->formID == '221285138447155')
            { 
                return "Medical Provider";


            }
            if($row->formID == '220293678807061')
            { 
                return "Individual Form";


            }

            if($row->formID == '221278115891155')
            { 
                return "Cosmoj-Pet Form";


            }
            if($row->formID == '202326521388049')
            { 
                return "Medical Expense Form";


            }
            

            else{
            return $row->formID;
                }

        })->editColumn('approval_status',function($row){

            if($row->approval_status == 'Approve')
            { 
                
                return "<span class='badge bg-success-light border-success fs-15'>".$row->approval_status."</span>";
            
            }

            else{
                return "<span class='badge bg-danger-light border-danger fs-15'>".$row->approval_status."</span>";
                }

        })->editColumn('lead_status',function($row){

            return "<span  class='lead_status ".strtolower($row->lead_status)."'  >".$row->lead_status."</span>";

        })->editColumn('url',function($row){

            if($row->website_url){
                return "<a href='".$row->website_url->name."'>".$row->website_url->name."</a>";
            }else{
                return "N/A";
            }

        })->editColumn('issue',function($row){

            if($row->issue){
                
                return $row->issue;

            }else{

                return 'N/A';

            }

        })->addIndexColumn()->addColumn('city',function($row){
        
            if(isset(json_decode($row->companyscorporate)[2]))
            {
           
           
            return json_decode($row->companyscorporate)[2];
            }

        })->addIndexColumn()->addColumn('city_inv',function($row){
        
            if(isset(json_decode($row->address)[2]))
            {
           
           
            return json_decode($row->address)[2];
            }

        })->addIndexColumn()->addColumn('madical_provider_city',function($row){
            if(isset(json_decode($row->medicalfacilitys39)[2]))
            {
                
            return json_decode($row->medicalfacilitys39)[2];
        }
        })->addIndexColumn()->addColumn('city_pet',function($row){
            if(isset(json_decode($row->petowners18)[2]))
            {
                
            return json_decode($row->petowners18)[2];
        }
        })->addIndexColumn()->addColumn('phoneNumber_med_exp',function($row){
            if(isset(json_decode($row->phoneNumber)[0]) && isset(json_decode($row->phoneNumber)[1]))
            {
                
            
            return json_decode($row->phoneNumber)[0] ."-".json_decode($row->phoneNumber)[1]."-".json_decode($row->phoneNumber)[2];
        }
        })->addColumn('action', function($row){

            //$btn = "<form action='".route('leads.delete',$row->id)."' class='delete_submit'>";

           
           
            $btn="";

            if (Auth::user()->can('leads-view')):

               
               if($row->formID == '220293270578054')
                {
                    if (Auth::user()->can('employerform-detail')):
                    $btn .= "<a href='".route('leads.employer_form_view',$row->id)."' class='fa fa-info-circle' aria-hidden='true' title='Details'></a>&nbsp;";
                endif;
            }
                if($row->formID == '220293678807061')
                {
                    if (Auth::user()->can('individualform-detail')):
                    $btn .= "<a href='".route('leads.individual_form_view',$row->id)."' class='fa fa-info-circle' aria-hidden='true' title='Details'></a>&nbsp;";
                endif;
                }

                if($row->formID == '221278115891155')
                {
                    if (Auth::user()->can('cosmojpet-detail')):
                    $btn .= "<a href='".route('leads.cosmojpet_form_view',$row->id)."' class='fa fa-info-circle' aria-hidden='true' title='Details'></a>&nbsp;";
                endif;
                }

                if($row->formID == '221285138447155')
                {
                    if (Auth::user()->can('medicalprovider-detail')):
                    $btn .= "<a href='".route('leads.medicalprovider_form_view',$row->id)."' class='fa fa-info-circle' aria-hidden='true' title='Details'></a>&nbsp;";
                endif;
                }

                if($row->formID == '202326521388049')
                {
                    if (Auth::user()->can('medicalexpenseform-detail')):
                    $btn .= "<a href='".route('leads.medicalexpense_form_view',$row->id)."' class='fa fa-info-circle' aria-hidden='true' title='Details'></a>&nbsp;";
                endif;
                }
            
            endif;

            
        // ********************************************************************(delete)
                if (Auth::user()->can('leads-delete')):

                    if($row->formID == '221285138447155')
                    { 
                        if (Auth::user()->can('medicalprovider-delete')):
                            $btn .= "<i class='fa fa-trash' aria-hidden='true' onclick='leadDelete(".$row->id.")' style='cursor:pointer' title='Delete'></i>&nbsp;&nbsp;";
                    endif;
                    }
                    
                    else if($row->formID == '221278115891155')
                    { 
                        if (Auth::user()->can('cosmojpet-delete')):
                            $btn .= "<i class='fa fa-trash' aria-hidden='true' onclick='leadDelete(".$row->id.")' style='cursor:pointer' title='Delete'></i>&nbsp;&nbsp;";
                     endif;
                    
                    }
                   else if($row->formID == '220293678807061')
                    { 
                        if (Auth::user()->can('individualform-delete')):
                            $btn .= "<i class='fa fa-trash' aria-hidden='true' onclick='leadDelete(".$row->id.")' style='cursor:pointer' title='Delete'></i>&nbsp;&nbsp;";
                         endif;
                    }
                    else if($row->formID == '202326521388049')
                    { 
                        if (Auth::user()->can('medicalexpenseform-delete')):
                            $btn .= "<i class='fa fa-trash' aria-hidden='true' onclick='leadDelete(".$row->id.")' style='cursor:pointer' title='Delete'></i>&nbsp;&nbsp;";
                        endif;
                    }
                    
                    else if($row->formID == '220293270578054')
                    {
                    if (Auth::user()->can('employerform-delete')):
                        $btn .= "<i class='fa fa-trash' aria-hidden='true' onclick='leadDelete(".$row->id.")' style='cursor:pointer' title='Delete'></i>&nbsp;&nbsp;";
                    endif;
                
                }
                endif;


//***************************************************************************************** * (Edit)/
            if (Auth::user()->can('leads-edit')):

                if($row->formID == '221285138447155')
                { 
                    if (Auth::user()->can('medicalprovider-edit')):
                    $btn .= "<a href='".route('leads.madical_provider_edit',$row->id)."' class='fa fa-edit' aria-hidden='true' title='Edit'></a>&nbsp;";
                endif;
                }
                
                else if($row->formID == '221278115891155')
                { 
                    if (Auth::user()->can('cosmojpet-edit')):
                    $btn .= "<a href='".route('leads.cosmojpet_edit',$row->id)."' class='fa fa-edit' aria-hidden='true' title='Edit'></a>&nbsp;";
                 endif;
                
                }
               else if($row->formID == '220293678807061')
                { 
                    if (Auth::user()->can('individualform-edit')):
                    $btn .= "<a href='".route('leads.individual_edit',$row->id)."' class='fa fa-edit' aria-hidden='true' title='Edit'></a>&nbsp;";
                     endif;
                }
                else if($row->formID == '202326521388049')
                { 
                    if (Auth::user()->can('medicalexpenseform-edit')):
                    $btn .= "<a href='".route('leads.madical_exp_edit',$row->id)."' class='fa fa-edit' aria-hidden='true' title='Edit'></a>&nbsp;";
                    endif;
                }
                
                else if($row->formID == '220293270578054')
                {
                if (Auth::user()->can('employerform-edit')):
                $btn .= "<a href='".route('leads.edit',$row->id)."' class='fa fa-edit' aria-hidden='true' title='Edit'></a>&nbsp;";
                endif;
            
            }
            endif;
           
          //  $btn .= "&nbsp;&nbsp;<i class='fa fa-files-o' aria-hidden='true' onclick='leadDocs(".$row->id.")' style='cursor:pointer' title='Documents'></i>";

            if(Auth::user()->roles[0]->name == 'Admin' || Auth::user()->roles[0]->type == 'manager' || Auth::user()->is_lead){
          
            if (Auth::user()->can('leads-transfer')):

              //  $btn .= "&nbsp;&nbsp;<i class='fa fa-exchange' aria-hidden='true' onclick='transferLead(".$row->id.")' style='cursor:pointer' title='Transfer Lead'></i>";
            
            endif;
           
               // $btn .= "&nbsp;&nbsp;<i class='fa fa-info-circle' aria-hidden='true' onclick='transferLeadDetails(".$row->id.")' style='cursor:pointer' title='Lead Details'></i>";

            }
           // $btn .= "&nbsp;&nbsp;<i class='fa fa-shopping-cart' aria-hidden='true' onclick='redirect_lead(".$row->id.")' style='cursor:pointer' title='Make Order'></i>";
            return $btn;
            
        })->rawColumns(['action','phoneNumber_med_exp','city_pet','petowners18','petowner','nameof','petname','dateOf','city_inv','address','phoneNumber','name','approval_status','lead_status','lead_id','madical_provider_city','medicalfacilitys39','medicalfacilitys36','companyscorporate36','companyscorporate','city','created_at','url'])->make(true);
    }
    function custom_echo($x, $length)
    {
      if(strlen($x)<=$length)
      {
        return $x;
      }
      else
      {
        $y=substr($x,0,$length) . '...';
        return $y;
      }
    }
    public function orders($data){

        return Datatables::of($data)->editColumn('created_at',function($row){


                return date("d M Y H:i:s", strtotime($row->created_at));
                
        })
        ->editColumn('order_status',function($row){

            return (isset($row->order_status) ? $row->order_status : '');

        })->editColumn('deadline',function($row){


            return date("d M Y H:i:s", strtotime($row->deadline));
            
          })->addIndexColumn()->addColumn('action', function($row){

            $btn = "";

            if (Auth::user()->can('orders-edit')):

                $btn .= "<a href='".route('orders.edit',$row->id)."' class='fa fa-edit' aria-hidden='true' title='Edit'></a>&nbsp;";

            endif;
       
            // $btn .= "&nbsp;&nbsp;<i class='fa fa-files-o' aria-hidden='true' onclick='leadDocs(".$row->id.")' style='cursor:pointer' title='Documents'></i>";
            $btn .= "&nbsp;&nbsp;<i class='fa fa-files-o' aria-hidden='true' onclick='orderDocs(".$row->id.")' style='cursor:pointer' title='Order Documents'></i>";
           
            if(Auth::user()->roles[0]->name == 'Admin' || Auth::user()->roles[0]->type == 'manager' || Auth::user()->is_lead){

                // $btn .= "&nbsp;&nbsp;<i class='fa fa-exchange' aria-hidden='true' onclick='transferLead(".$row->id.")' style='cursor:pointer' title='Transfer Lead'></i>";

                // $btn .= "&nbsp;&nbsp;<i class='fa fa-info-circle' aria-hidden='true' onclick='transferLeadDetails(".$row->id.")' style='cursor:pointer' title='Lead Details'></i>";

            }
            
            $btn .= "&nbsp;&nbsp;<i class='fa fa-comments' aria-hidden='true' onclick='orderMessages(".$row->id.")' style='cursor:pointer' title='Order Messages'></i>";

            if($row->order_status == 'New')
            {
                $btn .= "&nbsp;&nbsp;<i class='fa fa-trash' aria-hidden='true' onclick='orderDelete(".$row->id.")' style='cursor:pointer' title='Delete'></i>";
            }
            //             
            // $btn .= "&nbsp;&nbsp;<a href=".route('orders.order_upsell',$row->id)." title='Upsell'><i  class='fa fa-bell' aria-hidden='true'  style='cursor:pointer'></i></a>";

            $btn .=" <i  class='fa fa-bell' aria-hidden='true'  style='cursor:pointer' onclick='upSell(".$row->id.")' title='Upsell Order'></i>";
            
            return $btn;
            
        })->rawColumns(['action','created_at','deadline','order_status'])->make(true);
    }


    public function ready_to_delivery($data){

        return Datatables::of($data)->editColumn('created_at',function($row){


                return date("d M Y H:i:s", strtotime($row->created_at));
                
        })->editColumn('order_status',function($row){

            return (isset($row->order_status) ? $row->order_status : '');

        })->editColumn('deadline',function($row){


            return date("d M Y H:i:s", strtotime($row->deadline));
            
          })->addIndexColumn()->addColumn('action', function($row){

            $btn = "";

            if (Auth::user()->can('orders-edit')):

                // $btn .= "<a href='".route('orders.edit',$row->id)."' class='fa fa-edit' aria-hidden='true' title='Edit'></a>&nbsp;";

            endif;
       
            // $btn .= "&nbsp;&nbsp;<i class='fa fa-files-o' aria-hidden='true' onclick='leadDocs(".$row->id.")' style='cursor:pointer' title='Documents'></i>";

            if(Auth::user()->roles[0]->name == 'Admin' || Auth::user()->roles[0]->type == 'manager' || Auth::user()->is_lead){

                // $btn .= "&nbsp;&nbsp;<i class='fa fa-exchange' aria-hidden='true' onclick='transferLead(".$row->id.")' style='cursor:pointer' title='Transfer Lead'></i>";

                // $btn .= "&nbsp;&nbsp;<i class='fa fa-info-circle' aria-hidden='true' onclick='transferLeadDetails(".$row->id.")' style='cursor:pointer' title='Lead Details'></i>";

            }
            if($row->order_status == "QA Approved"){

                // $btn .="&nbsp; <i class='fa fa-truck' title='Fast Deliver Order' onclick='deliver_order(this,".$row->id.")' style='cursor:pointer;' aria-hidden='true' ></i>";

            }

            if($row->order_status == 'Delivered'){

                $btn .="&nbsp; <i class='fa fa-comments-o' title='Add Feedback' onclick='add_feedback(".$row->id.")' style='cursor:pointer;' aria-hidden='true' ></i>";

                $btn .="&nbsp; <i class='fa fa-exclamation-triangle' title='Failed' onclick='order_fail(".$row->id.")' style='cursor:pointer;' aria-hidden='true' ></i>";

            }
            
            $btn .= "&nbsp;&nbsp;<i class='fa fa-info-circle' aria-hidden='true' onclick='OrderFullDetails(".$row->id.")' style='cursor:pointer' title='Task Details'></i>";
            $btn .= "&nbsp;&nbsp;<i class='fa fa-comments' aria-hidden='true' onclick='orderMessages(".$row->id.")' style='cursor:pointer' title='Order Messages'></i>";
            return $btn;
            
        })->rawColumns(['action','created_at','deadline','order_status'])->make(true);
    }

    public function writers($data){
        $all_writers = User::select('users.id',
                        DB::raw('CONCAT(users.first_name," ",users.last_name) AS name'),'users.is_lead','users.lead_id')
                        ->whereHas('roles', function($q){
                            $q->whereIn('roles.name', ['Writer']);
            })->withCount(['order_assigns'=>function($query){
                $query->where('order_assigns.status_id', '!=', 'QA Approved');
                $query->where('order_assigns.status_id', '!=', 'Completed');
                $query->where('order_assigns.status_id', '!=', 'Delivered');
            }])->get();
            
        return Datatables::of($data)->editColumn('order_status',function($row){

            $html = "";
           
            if($row->order_status){
       
                $html .="<select disabled class='form-select status_type_".$row->id."' onChange='change_order_status(this,".$row->id.")'>";
            
                if($row->order_status == 'New'){

                    $html .="<option value='New'  selected >New</option>";

                }else{

                    $html .="<option value='New' >New</option>";

                }
                
                if($row->order_status == 'Pending'){

                    $html .="<option value='Pending' selected >Pending</option>";

                }else{


                    $html .="<option value='Pending' >Pending</option>";


                }
                
                if($row->order_status == 'In Progress'){

                   $html .="<option value='In Progress' selected >In Progress</option>";


                }else{

                    $html .="<option value='In Progress' >In Progress</option>";
                    
                }
                
                if($row->order_status == 'Ready to QA'){

                    $html .="<option value='Ready to QA' selected >Ready to QA</option>";

                }else{

                    $html .="<option value='Ready to QA'>Ready to QA</option>";

                }
  
                    if($row->order_status == 'QA Approved'){

                        $html .="<option value='QA Approved' selected >QA Approved</option>";

                    }else{

                        $html .="<option value='QA Approved' >QA Approved</option>";

                    }

                    if($row->order_status == 'QA Rejected'){

                        $html .="<option value='QA Rejected' selected >QA Rejected</option>";

                    }else{

                        $html .="<option value='QA Rejected' >QA Rejected</option>";

                    }


                    if($row->order_status == 'QA In Progress'){

                        $html .="<option value='QA In Progress' selected >QA In Progress</option>";

                    }else{

                        $html .="<option value='QA In Progress' >QA In Progress</option>";

                    }

                   
                if($row->order_status == 'Feedback'){

                    $html .="<option value='Feedback' selected >Feedback</option>";

                }else{

                    $html .="<option value='Feedback'>Feedback</option>";

                }

                      
                if($row->order_status == 'Delivered'){

                    $html .="<option value='Delivered' selected >Delivered</option>";

                }else{

                    $html .="<option value='Delivered'>Delivered</option>";

                }

                if($row->order_status == 'Failed'){

                    $html .="<option value='Failed' selected >Failed</option>";

                }else{

                    $html .="<option value='Failed'>Failed</option>";

                }


                if($row->order_status == 'Completed'){

                    $html .="<option value='Completed' selected >Completed</option>";

                }else{

                    $html .="<option value='Completed'>Completed</option>";

                }


                if($row->order_status == 'Re-pending'){

                    $html .="<option value='Re-pending' selected >Re-pending</option>";

                }else{

                    $html .="<option value='Re-pending'>Re-pending</option>";

                }



                $html .="</select>";

            }
             
            return $html;

          })->editColumn('order_assigns',function($row){

                return $row->order_assigns;

          })->editColumn('assign_to',function($row) use ($all_writers){
         
            $html = "";

            $html .="<select class='form-select'  onChange='assign_writer(this,".$row->id.")'>";

            $html .="<option ''></option>";

            foreach($all_writers as $key=>$value){
                
                $html .="<option value=".$value->id.">".$value->name."(".$value->order_assigns_count.")</option>";
          
            }

            $html .="</select>";

            return $html;

          })->editColumn('deadline',function($row){

            return date("d M Y H:i:s", strtotime($row->deadline));
            
          })->editColumn('additional_notes',function($row){
            return $this->custom_echo($row->additional_notes,200);
        })->editColumn('notes',function($row){
            return $this->custom_echo($row->notes,200);
        })->editColumn('documents',function($row){
            return 'documents';
          })->addIndexColumn()->addColumn('action', function($row){

            $btn = "";
            $btn .= "<a href='".route('writers.task_details',$row->id)."' class='fa fa-edit' aria-hidden='true' title='Edit'></a>&nbsp;";
            $btn .= "&nbsp;&nbsp;<i class='fa fa-comments' aria-hidden='true' onclick='orderMessages(".$row->id.")' style='cursor:pointer' title='Order Messages'></i>";
            return $btn;
            
        })->addColumn('team_lead',function($row){
                    
            $manager = User::select('lead_id','assigned_to');

            $user_found = $manager->where('users.id',$row->created_by_user_id)->first();

            if($user_found){

                $user_id = "";

                if($user_found->lead_id){

                    $user_id = $user_found->lead_id;
                
                }else{

                    $user_id = $user_found->assigned_to;

                }
                        $lead = User::select('first_name','last_name')->where('id',$user_id)->first();

                        $name = "";

                        if(isset($lead->first_name) && isset($lead->last_name)){

                            $name = $lead->first_name . ' '. $lead->last_name;

                        }else{

                                $name = '-';

                        }

                        return strtoupper($name);
                    

            }else{

                return '-';

            }

            

        })->rawColumns(['action','created_at','deadline','order_status','documents','assign_to','order_assigns','notes','additional_notes','team_lead'])->make(true);
    }
}