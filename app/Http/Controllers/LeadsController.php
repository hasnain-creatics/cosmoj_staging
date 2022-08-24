<?php

namespace App\Http\Controllers;

use App\Models\Leads;
use Illuminate\Http\Request;
use App\Http\Requests\LeadsAddRequest;
use App\Models\Files;
use App\Models\Lead_Documents as LeadDocuments;
use App\Models\User; 
use App\Mail\LeadMail; 

use App\Models\Orders;
use App\Models\LeadTransfered;
use Spatie\Permission\Models\Role;
use App\Models\City;
use App\Http\Requests\UserAddRequest;
use App\Http\Requests\UserEditRequest;
use Auth;
use DB;
use Illuminate\Support\Facades\Mail;
use Validator;
class LeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct(){

        $this->middleware('permission:leads-add', ['only' => ['create','update']]);
         
        $this->middleware('permission:leads-edit', ['only' => ['edit','update']]);
        
        $this->middleware('permission:leads-delete', ['only' => ['destroy']]);

        $this->middleware('permission:leads-view', ['only' => ['index']]);
         
    }

    public function index(Request $request){
        


     if ($request->ajax()) {

            $data = new Leads();

            // $data = $data->select(

            //                     'leads.id',
            //                     'leads.company_name',
            //                     'leads.corporate_email_address',
            //                     'leads.corporate_number',
            //                     'leads.street_address',
            //                     'leads.city',
            //                     'leads.state_province',
            //                     'leads.identification_number',
            //                     'leads.number_employees',
            //                     'leads.employer_expenditure',
            //                     'leads.time_period',
            //                     'leads.frequency',
            //                     'leads.lead_id',
            //                     'leads.created_at',
            //                     'leads.form_type',
                                
                               

            //                     DB::raw('CONCAT(users.first_name," ",users.last_name) AS created_name')
                                
            //                 );


            $data = $data->select(

                                    'leads.id',
                                    'leads.submission_id',
                                    'leads.formID',
                                    'leads.ip',
                                    'leads.companysname',
                                    'leads.companyscorporate31',
                                    'leads.companyscorporate36',
                                    'leads.companyscorporate',
                                    'leads.currentnumber',
                                    'leads.selectan',
                                    'leads.selectthe48',
                                    'leads.selectthe',
                                    'leads.lead_id',
                                    'leads.approval_status',
                                    'leads.medicalfacilitys',
                                    'leads.medicalfacilitys31',
                                    'leads.medicalfacilitys36',
                                    'leads.medicalfacilitys39',
                                    'leads.name',
                                    'leads.email',
                                    'leads.address',
                                    'leads.phoneNumber',
                                    'leads.dateOf',
                                    'leads.petname',
                                    'leads.petspecies',
                                    'leads.nameof',
                                    'leads.emailof',
                                    'leads.petowner',
                                    'leads.petowners18',
                                    'leads.staffcode',
                                    
                                );

                                // if(isset($_GET['form_type'])&& !empty($_GET['form_type'])){
                                    $data = $data->where('leads.formID',$_GET['form_type']);         
                                // }else
                           

                         

                            // $data = $data->leftJoin('lead_transfers lt','lt.lead_id','=','leads.id');
  
                      
                                


                            if(isset($_GET['lead_id']) && !empty($_GET['lead_id'])){
                        
                                $lead_id = trim($_GET['lead_id']); 
                 
                                $data = $data->where('leads.lead_id',$lead_id);     
                        
                            }else 
                           
                            if(isset($_GET['email_pet'])&& !empty($_GET['email_pet'])){
       
                                $email_pet = $_GET['email_pet']; 
                                          
                                $data = $data->where('leads.emailof',$_GET['email_pet']);     
                        
                            }else 
                           
                            if(isset($_GET['email'])&& !empty($_GET['email'])){
       
                                $email = $_GET['email']; 
                                              
                                $data = $data->where('leads.companyscorporate31',$_GET['email']);     
                        
                            }else 
                           
                            if(isset($_GET['email_ind'])&& !empty($_GET['email_ind'])){
       
                                $email_ind = $_GET['email_ind']; 
                 
                                $data = $data->where('leads.email',$_GET['email_ind']);     
                        
                            }else 

                            if(isset($_GET['status'])&& !empty($_GET['status'])){
       
                                $status = $_GET['status']; 
                 
                                $data = $data->where('leads.approval_status',$_GET['status']);     
                        
                            }else 

                          
                            if(isset($_GET['date_start'])&& !empty($_GET['date_start'])){
       
                                $date_start = $_GET['date_start'] ." 00:00:00";
                                
                                $data = $data->where('leads.created_at','>=',$date_start);     
                        
                            }else 

                            if(isset($_GET['date_end'])&& !empty($_GET['date_end'])){
       
                                $date_end = $_GET['date_end'] ." 23:59:59";
                 
                                $data = $data->where('leads.created_at','<=',$date_end);     
                        
                            }else 

                            if(isset($_GET['name'])&& !empty($_GET['name'])){
       
                                $name = $_GET['name']; 

                                $data = $data->where('leads.company_name','LIKE','%'.$name.'%');     

                               // $data = $data->orWhere('leads.last_name','LIKE','%'.$name.'%');  

                            } 

                                // if($this->is_admin() != true){

                                //     $data = $data->where('leads.transfered_id',Auth::user()->id);
                                    
                                //     $data = $data->orWhere(function($q){
                
                                //         if(Auth::user()->roles[0]->type == 'manager'){
                                            
                                //            $q->where('users.assigned_to',Auth::user()->id);
                    
                                //         }else{
                                            
                                //             if(Auth::user()->is_lead){
                    
                                //                $q->where('users.lead_id',Auth::user()->id);
                             
                                //             }
                                //         }
                
                                //     });
                                  
                                // }
                


                
                  

                $data = $data->orderBy('leads.id','DESC');
                          
                return $this->table($data,'leads');   
            
        }

       return view('leads.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leads.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Leads $leads)
    {

        $rules['formID'] = '';
         $rules['companysname'] = '';
        
         $rules['companyscorporate31'] = '';
        
         $rules['companyscorporate36'] = '';
        
         $rules['companyscorporate'] = '';
         $rules['currentnumber'] = '';
         $rules['employeridentification'] = '';
         $rules['selectan'] = '';
         $rules['selectthe48'] = '';
         $rules['selectthe'] = '';
         $rules['medicalfacilitys'] = '';
         $rules['medicalfacilitys31'] = '';
         $rules['medicalfacilitys36'] = '';
        
         $rules['providersnpi'] = '';
         $rules['pleaseRead'] = '';
         $rules['signerstitle'] = '';
         $rules['description'] = '';
         $rules['approval_status'] = '';
         $rules['email'] = '';
         $rules['dateOf'] = '';
         $rules['doYou'] = '';
         $rules['whatInvestment'] = '';
         $rules['selectThe24'] = '';
         $rules['totalcost'] = '';
         $rules['paymentplan'] = '';
         $rules['whatInvestment'] = '';
         $rules['selecta15'] = '';
         $rules['staffcode'] = '';
         $rules['petspecies'] = '';
         $rules['ifother'] = '';
         $rules['petssex'] = '';
         $rules['emailof'] = '';
         

       

        // $validator = Validator::make( $request->all(), $rules);

        // if ( $validator->fails() ) 
        // {
            // $data = [
            //     'success' => false, 
            //     'message'=>$validator->errors()
            // ];

        // }else{
           
            
            $lead_update = $leads;

            // Cosmoj Pet Form
            $data_pet_name[]=$request->pet_first_name;
            $data_pet_name[]=$request->pet_last_name;
            $data_pet_onwer_name[]=$request->onwer_first_nmae;
            $data_pet_onwer_name[]=$request->onwer_last_nmae;
            $data_pet_onwer_phone[]=$request->petowner;
            $data_pet_onwer_address[]=$request->street_address;
            $data_pet_onwer_address[]=$request->street_address_lane2;
            $data_pet_onwer_address[]=$request->city;
            $data_pet_onwer_address[]=$request->state_province;
            $data_pet_onwer_address[]=$request->postal_code;
           

           
            if($request->petowners !='' && $request->petowners !=NULL)
             {
             $explode_dob_pet = explode('-',$request->petowners);
             $data_pet_dob[]=$explode_dob_pet[1];
             $data_pet_dob[]=$explode_dob_pet[2];
             $data_pet_dob[]=$explode_dob_pet[0];
             }

             else{
                $data_pet_dob[]=NULL;
             }
             $data_pet_f_name=json_encode($data_pet_name);
             $data_pet_onwer_act_name=json_encode($data_pet_onwer_name);
             $data_cli_phone_pet=json_encode($data_pet_onwer_phone);
             $data_address_pet_cli_=json_encode($data_pet_onwer_address);
             $data_cli_pet_dob=json_encode($data_pet_dob);
             





             // Individual Form
             $data_name[]=$request->first_name;
             $data_name[]=$request->last_name;

				
        if($request->formID=='202326521388049')
        {
             $data_phonenum[]=$request->countrycode;
             $data_phonenum[]=$request->area_code;
             $data_phonenum[]=$request->phoneNumber;
        }
        else if($request->formID=='220293678807061'){
            $data_phonenum[]=$request->phoneNumber;
        }

        //Employer Form ID
    

        else{
            $data_phonenum[]=NULL;
        }

       

             $data_address_cli[]=$request->street_address;
             $data_address_cli[]=$request->street_address_lane2;
             $data_address_cli[]=$request->city;
             $data_address_cli[]=$request->state_province;
             $data_address_cli[]=$request->postal_code;
             
             if($request->dateOf !='' && $request->dateOf !=NULL)
             {
             $explode_dob = explode('-',$request->dateOf);
             $actual_dob[]=$explode_dob[1];
             $actual_dob[]=$explode_dob[2];
             $actual_dob[]=$explode_dob[0];
             }

             else{
                $actual_dob[]=NULL;
             }
             $data_client_name=json_encode($data_name);
             $data_client_phone=json_encode($data_phonenum);
             $data_address_cli=json_encode($data_address_cli);
             $data_client_dob=json_encode($actual_dob);
             


             //Employer Form

            $data[]=$request->companyscorporate36;
            $address_array[]=$request->companyscorporate_address;
            $address_array[]=$request->street_address_lane2;
            $address_array[]=$request->city;
            $address_array[]=$request->postal_code;
            $address_array[]=$request->state_province;
          
            $data_phone_num=json_encode($data);
            $address=json_encode($address_array);

            // Medical provider

            $data_medical[]=$request->medicalfacilitys36;
            $address_array_medical[]=$request->address_provider;
            $address_array_medical[]=$request->street_address_lane2;
            $address_array_medical[]=$request->city;
            $address_array_medical[]=$request->postal_code;
            $address_array_medical[]=$request->state_province;

           $data_phone_num_medi=json_encode($data_medical);
           $address_med_provider=json_encode($address_array_medical);

            if(isset($request->id)){
            
                $lead_update = $leads->find($request->id);
            
            }else{

                $rules['created_by'] = Auth::user()->id;

            }
            
            foreach($rules as $key=>$value){
                
                $lead_update->{$key} = $request->$key;    

                if(isset($request->id)){

                  

                }else{

                    $lead_update['created_by'] = Auth::user()->id;

                  
                    
                }
               
             
                
              
                $lead_update->companyscorporate =  $address;
                $lead_update->phoneNumber = $data_client_phone;

                if($request->id){
                    
                    $lead_update->medicalfacilitys36 = $data_phone_num_medi;
                   $lead_update->companyscorporate36 =$data_phone_num;
                   // $lead_update->petowner = $request->petowner;




                   
                   

                }else{
                    $lead_update->medicalfacilitys36 = $data_phone_num_medi;
                    $lead_update->companyscorporate36 = $data_phone_num;
                   

                  
                   

                    $find_lead_id = $leads->orderBy('id','desc')->first();
            
                    $explode = explode('-',$find_lead_id->lead_id);
        
                 
        
                    $latest_lead_id = 'CLIENT-'.$explode[1]+1;
       
                    $lead_update->lead_id = $latest_lead_id;
       

                }
                
                $lead_update->medicalfacilitys39 =  $address_med_provider;
                $lead_update->name =  $data_client_name;
                $lead_update->address =  $data_address_cli;
                $lead_update->dateOf =  $data_client_dob;

                //Cosmj Pet Form insert
                $lead_update->petowner = $data_cli_phone_pet;
                $lead_update->petname = $data_pet_f_name;
                $lead_update->nameof = $data_pet_onwer_act_name;
                $lead_update->petowners18 = $data_address_pet_cli_;
                $lead_update->petowners = $data_cli_pet_dob;
                

            }
            
           
            $lead_update->save();
            
          // $lead_id = $lead_update->id;


          

          

          // $find_lead_id->lead_id = $latest_lead_id;


         
          

          
            


            if(isset($request->id)){

             //   $this->save_notification($lead_update,'lead_updated');

            }else{

              //  $this->save_notification($lead_update,'new_lead_added');

            }
            
            

            $data = [

                'success' => true, 

                'message'=>'Lead Updated Successfully'

            ];
       // }
        
        return response($data, 200)->header('Content-Type', 'text/plain');
    
    }

    public function all_docs(Leads $leads,$id){

        $all_docs = LeadDocuments::where('lead_id',$id)
                                    ->with('files')
                                    ->get();
       
        return view('modals.leads.lead_docs',compact('all_docs'));

    }


    public function add_emp(Leads $lead,$id){

      
        $lead_deatils= $lead->select('leads.*')->find($id);

        return view('modals.leads.add_employees_leads',compact('lead_deatils'));

    }

    public function edit_emp($id){

      
        $lead_employee_data = DB::table('employee_tbl')->where('id',$id)->get();
       

        return view('modals.leads.edit_employees_leads',compact('lead_employee_data'));

    }
    

    public function update_emp(Request $request)
    {
        
        $id=$request->input('tbl_id');
        $emp_id = $request->input('emp_id');
        $form_id = $request->input('form_id');
        $name_emp = $request->input('name_emp');
        $phone_number_emp = $request->input('phone_number_emp');
        $email = $request->input('email_emp');
        $created_at = date("Y-m-d h:i:s");
        $updated_at = date("Y-m-d h:i:s");

        $data=array('client_id'=>$emp_id,"form_id"=>$form_id,"name"=>$name_emp,"phone_number"=>$phone_number_emp,"email"=>$email,"created_by"=>Auth::user()->id,"created_at"=>$created_at,"updated_at"=>$updated_at);
       

        DB::table('employee_tbl')
            ->where('id', $id)
            ->update($data);
       
        return redirect()->route('leads.employer_form_view',$emp_id)->with('status',"Update successfully");



    }

    public function store_emp(Request $request)
    {
        

        $emp_id = $request->input('emp_id');
        $form_id = $request->input('form_id');
        $name_emp = $request->input('name_emp');
        $phone_number_emp = $request->input('phone_number_emp');
        $email = $request->input('email_emp');
        $created_at = date("Y-m-d h:i:s");
        $updated_at = date("Y-m-d h:i:s");

        $data=array('client_id'=>$emp_id,"form_id"=>$form_id,"name"=>$name_emp,"phone_number"=>$phone_number_emp,"email"=>$email,"created_by"=>Auth::user()->id,"created_at"=>$created_at,"updated_at"=>$updated_at);
        DB::table('employee_tbl')->insert($data);


       
        return redirect()->route('leads.employer_form_view',$emp_id)->with('status',"Insert successfully");



    }

    public function add_document(Leads $lead,$id){

      
        $lead_deatils= $lead->select('leads.*')->find($id);

        return view('modals.leads.add_doc_leads',compact('lead_deatils'));

    }

    public function add_employee(Leads $lead,$id){

      
        $lead_deatils= $lead->select('leads.*')->find($id);

        return view('modals.leads.add_email_leads',compact('lead_deatils'));

    }

    public function store_doc(Request $request){

        if ($request->file('files')) {
                
            $file = $request->file('files');
            $redirect_url = $request->input('route_name');
            
          //  dd($file);

            for($i=0;$i<count($file);$i++){

                $lead_file_name = 'leads-data-'.date('YmdHis').'.'.$file[$i]->getClientOriginalExtension();

                $original_file_name = $file[$i]->getClientOriginalExtension();

                $path = $file[$i]->storeAs("client_files/client_{$request->emp_id}", $lead_file_name);
        
                $leads_files          =  new Files();

                $leads_files->form_id = $request->form_id;
        
                $leads_files->client_id = $request->emp_id;
                $leads_files->title = $request->title;
                $leads_files->name = $lead_file_name;

                $leads_files->original_name = $file[$i]->getClientOriginalName();

                $leads_files->type = $file[$i]->getClientOriginalExtension();
                
                $leads_files->directory = url("storage/app/client_files/client_{$request->emp_id}");
    
                $leads_files->save();
                
               
                
               

            }
        }

        $data = [

            'success' => true, 

            'message'=>'File Uploaded Successfully'

        ];
    
       
        return response(['status'=>'success','message'=>'file Uploaded successfully'], 200)->header('Content-Type', 'text/plain');
     
    }
   

    public function delete_docs($id){

        $lead_file = Files::where('id',$id)->delete();

      
        
        return response(['status'=>'success','message'=>'file deleted successfully'], 200)->header('Content-Type', 'text/plain');
    }

    public function lead_transfers($id){

            $data = User::select(
                'users.id as user_id',
                'users.is_lead',
                'users.email',
                'users.lead_id as user_lead_id',
                'roles.name as role_name',
                DB::raw('CONCAT(users.first_name," ",users.last_name) AS name')
            );

            $data =  $data->leftJoin('roles','roles.id','=','users.designation');

            if($this->is_admin() != true){

                if(Auth::user()->roles[0]->type == 'manager'){

                    $data = $data->orWhere('users.assigned_to',Auth::user()->id);

                }else{
                    
                    if(Auth::user()->is_lead){

                        $data = $data->orWhere('users.lead_id',Auth::user()->id);
     
                    }
                }
            }

            $data = $data->where('users.designation','!=','NULL');

            $res['results'] = $data->orderBy('users.id','DESC')->get();      

            $res['lead_id'] = $id;

            $transfere_user_id = DB::table('lead_transfers')->select('user_id')->where('lead_id',$id)->first();
            
            $res['transfere_user_id'] = $transfere_user_id??null; 
            
            return view('modals.leads.leads_transfer',$res);
        }


    public function lead_transfer_update(Request $request){

        $check_if_already_exists = DB::table('lead_transfers')->where([

                                    'lead_id'=>$request->lead_id
            
                                    ])->first();
        
        DB::table('leads')->where('id',$request->lead_id)->update(['transfered_id'=>$request->user_id]);

        if($check_if_already_exists){
         
            if($check_if_already_exists->user_id == $request->user_id){

                return response(['status'=>'error',
                                'message'=>'this lead already transfers to the user'
                                ], 200)->header('Content-Type', 'text/plain');

            }

        }
        // LeadTransfered
        $transfer_lead = new LeadTransfered();
        $transfer_lead->lead_id = $request->lead_id;
        $transfer_lead->user_id = $request->user_id;
        $transfer_lead->created_by = Auth::user()->id;

        $this->save_notification($transfer_lead,'lead_transfered');
        // $transfer_lead =   DB::table('lead_transfers')->insert(         [
        //                                                                     'lead_id'=>$request->lead_id,
        //                                                                     'user_id'=>$request->user_id,
        //                                                                     'created_by'=>Auth::user()->id,
        //                                                                     'created_at'=>date('Y-m-d H:i:s')
        //                                                                 ]
                                                                        
        //                                                         );

        return response([
                         'status'=>'success',
                         'message'=>'lead transfered successfully'
                        ], 200)->header('Content-Type', 'text/plain');
    }

    public function lead_transfers_details($id){

        $leads_transfers_details['lead_details'] = DB::table('lead_transfers')
                            ->join('leads','leads.id','=','lead_transfers.lead_id')
                            ->join('users','users.id','=','lead_transfers.user_id')
                            ->join('users as u','u.id','=','lead_transfers.created_by')
                            ->join('users as us','us.id','=','leads.created_by')
                            ->select('lead_transfers.id',
                                     'users.first_name',
                                     'users.last_name',
                                     'u.first_name as f_name',
                                     'u.last_name  as l_name',
                                     'us.first_name as fs_name',
                                     'us.last_name as ls_name',
                                     'lead_transfers.created_at')->where('leads.id',$id)
                            ->orderBy('lead_transfers.id','DESC')
                            ->get();
                            $leads_transfers_details['lead_id'] = $id; 
                            return view('modals.leads.leads_transfer_details',$leads_transfers_details);
                            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leads  $leads
     * @return \Illuminate\Http\Response
     */
    public function show(Leads $leads)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leads  $leads
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('leads.edit',compact('id'));

    }

    public function madical_provider_edit($id)
    {
        return view('leads.madical_provider_edit',compact('id'));

    }

    public function individual_edit($id)
    {
        return view('leads.individual_edit',compact('id'));

    }
    public function medical_exp_edit($id)
    {
        return view('leads.madical_exp_edit',compact('id'));

    }

    public function cosmojpet_edit($id)
    {
        return view('leads.cosmojpet_edit',compact('id'));

    }

    
    public function medicalexpense_form_view(Leads $lead,$id)
    {


        $lead_deatils= $lead->select('leads.*')->find($id);
        // $lead_deatils= $lead->select('leads.*')->find($id);
       $lead_transaction = DB::table('transaction_tbl')->where('client_id',$id)->get();
       $lead_employee_list = DB::table('employee_tbl')->where('client_id',$id)->get();
       $lead_doc_list = DB::table('files')->where('client_id',$id)->get();

        $datas['lead_doc_list'] = $lead_doc_list;
       $datas['lead_employee_list'] = $lead_employee_list;
       $datas['lead_transaction'] = $lead_transaction;
        $datas['result'] = $lead_deatils;

        $datas['companyscorporate36'] = json_decode($lead_deatils->companyscorporate36);
        $datas['companyscorporate'] = json_decode($lead_deatils->companyscorporate);

        $datas['medicalfacilitys36'] = json_decode($lead_deatils->medicalfacilitys36);
        $datas['medicalfacilitys39'] = json_decode($lead_deatils->medicalfacilitys39);
       

        $datas['name'] = json_decode($lead_deatils->name);
        $datas['phoneNumber'] = json_decode($lead_deatils->phoneNumber);
        $datas['address'] = json_decode($lead_deatils->address);
        $datas['dateOf'] = json_decode($lead_deatils->dateOf);
        $datas['petname'] = json_decode($lead_deatils->petname);
        $datas['nameof'] = json_decode($lead_deatils->nameof);
        $datas['petowner'] = json_decode($lead_deatils->petowner);
        $datas['petowners18'] = json_decode($lead_deatils->petowners18);
        $datas['petowners'] = json_decode($lead_deatils->petowners);
       


        
        
       // return response($datas);
        return view('leads.medicalexpense_form_view',$datas);







    }
    public function employer_form_view(Leads $lead,$id)
    {


        $lead_deatils= $lead->select('leads.*')->find($id);
        // $lead_deatils= $lead->select('leads.*')->find($id);
       $lead_transaction = DB::table('transaction_tbl')->where('client_id',$id)->get();
       $lead_employee_list = DB::table('employee_tbl')->where('client_id',$id)->get();
       $lead_doc_list = DB::table('files')->where('client_id',$id)->get();

        $datas['lead_doc_list'] = $lead_doc_list;
       $datas['lead_employee_list'] = $lead_employee_list;
       $datas['lead_transaction'] = $lead_transaction;
        $datas['result'] = $lead_deatils;

        $datas['companyscorporate36'] = json_decode($lead_deatils->companyscorporate36);
        $datas['companyscorporate'] = json_decode($lead_deatils->companyscorporate);

        $datas['medicalfacilitys36'] = json_decode($lead_deatils->medicalfacilitys36);
        $datas['medicalfacilitys39'] = json_decode($lead_deatils->medicalfacilitys39);
       

        $datas['name'] = json_decode($lead_deatils->name);
        $datas['phoneNumber'] = json_decode($lead_deatils->phoneNumber);
        $datas['address'] = json_decode($lead_deatils->address);
        $datas['dateOf'] = json_decode($lead_deatils->dateOf);
        $datas['petname'] = json_decode($lead_deatils->petname);
        $datas['nameof'] = json_decode($lead_deatils->nameof);
        $datas['petowner'] = json_decode($lead_deatils->petowner);
        $datas['petowners18'] = json_decode($lead_deatils->petowners18);
        $datas['petowners'] = json_decode($lead_deatils->petowners);
       


        
        
       // return response($datas);
        return view('leads.employer_form_view',$datas);







    }
    

    public function individual_form_view(Leads $lead,$id)
    {


        $lead_deatils= $lead->select('leads.*')->find($id);
        
       $lead_transaction = DB::table('transaction_tbl')->where('client_id',$id)->get();
    //    $lead_employee_list = DB::table('employee_tbl')->where('client_id',$id)->get();
       $lead_doc_list = DB::table('files')->where('client_id',$id)->get();

        $datas['lead_doc_list'] = $lead_doc_list;
    //    $datas['lead_employee_list'] = $lead_employee_list;
       $datas['lead_transaction'] = $lead_transaction;
        $datas['result'] = $lead_deatils;

        $datas['companyscorporate36'] = json_decode($lead_deatils->companyscorporate36);
        $datas['companyscorporate'] = json_decode($lead_deatils->companyscorporate);

        $datas['medicalfacilitys36'] = json_decode($lead_deatils->medicalfacilitys36);
        $datas['medicalfacilitys39'] = json_decode($lead_deatils->medicalfacilitys39);
       

        $datas['name'] = json_decode($lead_deatils->name);
        $datas['phoneNumber'] = json_decode($lead_deatils->phoneNumber);
        $datas['address'] = json_decode($lead_deatils->address);
        $datas['dateOf'] = json_decode($lead_deatils->dateOf);
        $datas['petname'] = json_decode($lead_deatils->petname);
        $datas['nameof'] = json_decode($lead_deatils->nameof);
        $datas['petowner'] = json_decode($lead_deatils->petowner);
        $datas['petowners18'] = json_decode($lead_deatils->petowners18);
        $datas['petowners'] = json_decode($lead_deatils->petowners);
       


        
        
       // return response($datas);
        return view('leads.individual_form_view',$datas);







    }
  
    public function medicalprovider_form_view(Leads $lead,$id)
    {


        $lead_deatils= $lead->select('leads.*')->find($id);
        
       $lead_transaction = DB::table('transaction_tbl')->where('client_id',$id)->get();
       $lead_employee_list = DB::table('employee_tbl')->where('client_id',$id)->get();
       $lead_doc_list = DB::table('files')->where('client_id',$id)->get();

        $datas['lead_doc_list'] = $lead_doc_list;
        $datas['lead_employee_list'] = $lead_employee_list;
       $datas['lead_transaction'] = $lead_transaction;
        $datas['result'] = $lead_deatils;

        $datas['companyscorporate36'] = json_decode($lead_deatils->companyscorporate36);
        $datas['companyscorporate'] = json_decode($lead_deatils->companyscorporate);

        $datas['medicalfacilitys36'] = json_decode($lead_deatils->medicalfacilitys36);
        $datas['medicalfacilitys39'] = json_decode($lead_deatils->medicalfacilitys39);
       

        $datas['name'] = json_decode($lead_deatils->name);
        $datas['phoneNumber'] = json_decode($lead_deatils->phoneNumber);
        $datas['address'] = json_decode($lead_deatils->address);
        $datas['dateOf'] = json_decode($lead_deatils->dateOf);
        $datas['petname'] = json_decode($lead_deatils->petname);
        $datas['nameof'] = json_decode($lead_deatils->nameof);
        $datas['petowner'] = json_decode($lead_deatils->petowner);
        $datas['petowners18'] = json_decode($lead_deatils->petowners18);
        $datas['petowners'] = json_decode($lead_deatils->petowners);
       


        
        
       // return response($datas);
        return view('leads.medicalprovider_form_view',$datas);







    }
    
    
    public function cosmojpet_form_view(Leads $lead,$id)
    {


        $lead_deatils= $lead->select('leads.*')->find($id);
        
       $lead_transaction = DB::table('transaction_tbl')->where('client_id',$id)->get();
    //    $lead_employee_list = DB::table('employee_tbl')->where('client_id',$id)->get();
       $lead_doc_list = DB::table('files')->where('client_id',$id)->get();

        $datas['lead_doc_list'] = $lead_doc_list;
    //    $datas['lead_employee_list'] = $lead_employee_list;
       $datas['lead_transaction'] = $lead_transaction;
        $datas['result'] = $lead_deatils;

        $datas['companyscorporate36'] = json_decode($lead_deatils->companyscorporate36);
        $datas['companyscorporate'] = json_decode($lead_deatils->companyscorporate);

        $datas['medicalfacilitys36'] = json_decode($lead_deatils->medicalfacilitys36);
        $datas['medicalfacilitys39'] = json_decode($lead_deatils->medicalfacilitys39);
       

        $datas['name'] = json_decode($lead_deatils->name);
        $datas['phoneNumber'] = json_decode($lead_deatils->phoneNumber);
        $datas['address'] = json_decode($lead_deatils->address);
        $datas['dateOf'] = json_decode($lead_deatils->dateOf);
        $datas['petname'] = json_decode($lead_deatils->petname);
        $datas['nameof'] = json_decode($lead_deatils->nameof);
        $datas['petowner'] = json_decode($lead_deatils->petowner);
        $datas['petowners18'] = json_decode($lead_deatils->petowners18);
        $datas['petowners'] = json_decode($lead_deatils->petowners);
       


        
        
       // return response($datas);
        return view('leads.cosmojpet_form_view',$datas);







    }
    
    

    public function search_leads(Request $request){

        $leads = new Leads();

        if($this->is_admin() != true){

            $leads = $leads->join('users','users.id','=','leads.created_by')->where(function($query){

                $query->where('leads.transfered_id',Auth::user()->id);

                if(Auth::user()->roles[0]->type == 'manager'){

                    $query = $query->orWhere('users.assigned_to',Auth::user()->id);

                }else{
                    
                    if(Auth::user()->is_lead){

                        $query = $query->orWhere('users.lead_id',Auth::user()->id);
    
                    }
                }
            });
        }

        $leads = $leads->where('leads.lead_id','LIKE','%'.trim($request->lead).'%'); 

        $result = $leads->select('leads.*')->get();
        if($result){
            
            return response()->json([
                'status'=>'success',
                'result'=>$result
            ]);
            
        }else{
            
            return response()->json([
                'status'=>'success',
                'result'=>[]
            ]);
            
        }


    }

    public function fetch_lead(Leads $lead,$id){

        // if($this->is_admin() != true){

        //     $lead = $lead->join('users','users.id','=','leads.created_by')->where(function($query){

        //         $query->where('leads.transfered_id',Auth::user()->id);

        //         if(Auth::user()->roles[0]->type == 'manager'){

        //             $query = $query->orWhere('users.assigned_to',Auth::user()->id);

        //         }else{
                    
        //             if(Auth::user()->is_lead){

        //                 $query = $query->orWhere('users.lead_id',Auth::user()->id);
    
        //             }
        //         }
        //     });
        // }
        
        $lead_deatils= $lead->select('leads.*')->find($id);

        $datas['result'] = $lead_deatils;

        $datas['companyscorporate36'] = json_decode($lead_deatils->companyscorporate36);
        $datas['companyscorporate'] = json_decode($lead_deatils->companyscorporate);

        $datas['medicalfacilitys36'] = json_decode($lead_deatils->medicalfacilitys36);
        $datas['medicalfacilitys39'] = json_decode($lead_deatils->medicalfacilitys39);
       

        $datas['name'] = json_decode($lead_deatils->name);
        $datas['phoneNumber'] = json_decode($lead_deatils->phoneNumber);
        $datas['address'] = json_decode($lead_deatils->address);
        $datas['dateOf'] = json_decode($lead_deatils->dateOf);
        $datas['petname'] = json_decode($lead_deatils->petname);
        $datas['nameof'] = json_decode($lead_deatils->nameof);
        $datas['petowner'] = json_decode($lead_deatils->petowner);
        $datas['petowners18'] = json_decode($lead_deatils->petowners18);
        $datas['petowners'] = json_decode($lead_deatils->petowners);

        
        
        return response($datas);

    }



    public function convert_lead(Leads $lead,$id){
        

        $leads_transfers_details['lead_id'] = $id;

        $lead_orders = Orders::where('lead_id',$id)->get();

        $leads_transfers_details['orders'] = [];

        if(count($lead_orders)){

           $leads_transfers_details['orders'] = $lead_orders;

        }
        return view('modals.leads.convert_leads',$leads_transfers_details);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leads  $leads
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leads $leads)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leads  $leads
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
            $leads = new Leads();
            $leads->find($id)->delete();
            return response()->json(['status'=>'success','message'=>'Clients deleted successfully!']);
        
    }
}
