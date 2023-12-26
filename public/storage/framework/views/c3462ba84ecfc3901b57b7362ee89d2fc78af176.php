<style>
    table.dataTable thead .sorting_asc:after {
    /* content: "\e155"; */
    content: "\f0ec" !important;
    font-family: 'FontAwesome' !important;
    rotate: 90deg !important;
    font-size: 15px !important;
    }
    table.dataTable thead .sorting_desc:after {
    /* content: "\e155"; */
    content: "\f0ec" !important;
    font-family: 'FontAwesome' !important;
    rotate: -90deg !important;
    transition: 0.3s;
    font-size: 15px !important;
    }
    table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after {
        top: 24px !important;
        font-size: 15px !important;
        /* right: 38px !important; */
    }
    .dt-buttons {
    position: relative;
    float: left;
    display: none  !important;
    }
</style>

<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?>
        <div class="alert <?php echo e(Session::get('alert-class', 'alert-info'), false); ?> alert-dismissible fade show">
            <?php echo e(session('success'), false); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="alert <?php echo e(Session::get('alert-class', 'alert-info'), false); ?> alert-danger  fade show">
            <?php echo e(session('error'), false); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="box stf_outer_body stf_outer_page_load" style="display:none">
        <div class="row "style="display: flex; margin-left: 0;">
            <div class=""style="width: 96%; ">
                <div class="box-header with-border">
                    <form action="<?php echo e(url('admin/stylist/customer_request'), false); ?>" method="get">
                        <?php
                            $revela_status = '';
                            $action_status = '';
                            $page_no = 1;
                            $search_booking_status = '';
                            $search_company_id = 0;
                            $search_box_input = '';
                            $search_company_label = 'Company';
                            $search_app_date_label = 'Date';
                            $revel_status_label = 'Reveal Status';
                            $action_status_label = 'Action';
                            if (isset($_GET['page'])) {
                                $page_no = $_GET['page'];
                            }
                            if (isset($filter_values['search_company_name'])) {
                                $search_company_label = $filter_values['search_company_name'];
                                $company_id = $filter_values['search_company_id'];
                            }
                            if (isset($filter_values['search_app_date_ids'])) {
                                $search_app_date_label = $filter_values['search_app_date_text'];
                            }
                            if (isset($filter_values['search_reveal_status_text'])) {
                                $revel_status_label = $filter_values['search_reveal_status_text'];
                            }
                            if (isset($filter_values['search_box_text'])) {
                                $search_box_input = $filter_values['search_box_text'];
                            }
                            if (isset($filter_values['action_status_text'])) {
                                $action_status_label = $filter_values['action_status_text'];
                            }                           
                        ?>
                        <input type="hidden" name="page" value="<?php echo e($page_no, false); ?> ">
                        
                        <input type="hidden" name="company_id" value="<?php echo e($search_company_id, false); ?> ">
                        <input type="hidden" name="reveal_status" value="<?php echo e($revela_status, false); ?> ">
                        <input type="hidden" name="action_status" value="<?php echo e($action_status, false); ?> ">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="col-md-6 stf_outer_body-input ">
                                <div class="form">
                                    <i class="fa fa-search" style="top: 15px;"></i>
                                    <input type="text" class="form-control form-input-1" name="search_box" value="<?php echo e($search_box_input, false); ?>" style="/*border-radius: 7px !important;*/">
                                </div>
                            </div>
                        </div>
                        <div class="stf_dropdown_with_submenu">
                            <div class="dropdown1 dropdown">
                                <button type="button" onclick="stfTopSubMenuShowHide(this)" class="dropbtn reveal_status_label"><?php echo e($revel_status_label, false); ?> <i class="fa fa-angle-down" aria-hidden="true" style="font-size:14px; margin-left:5px;"></i></button>
                                <div class="dropdown-content style_cr_filter_drop_down">
                                    <a href="javascript:void(0)" onclick="stfCustomerRequestFilter(this,'reveal_status','','All')">All</a>
                                    <a href="javascript:void(0)" onclick="stfCustomerRequestFilter(this,'reveal_status','not_started','Not started')">Not started</a>
                                    <a href="javascript:void(0)" onclick="stfCustomerRequestFilter(this,'reveal_status','draft','Draft')">Draft</a>
                                    <a href="javascript:void(0)" onclick="stfCustomerRequestFilter(this,'reveal_status','awaiting_response','Awaiting response')">Awaiting response</a>
                                    <a href="javascript:void(0)" onclick="stfCustomerRequestFilter(this,'reveal_status','preparing_order','Preparing order')">Preparing order</a>
                                    <a href="javascript:void(0)" onclick="stfCustomerRequestFilter(this,'reveal_status','dispatched','Dispatched')">Dispatched</a>
                                    <a href="javascript:void(0)" onclick="stfCustomerRequestFilter(this,'reveal_status','return_initiated','Return Initiated')">Return Initiated</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <button type="button" onclick="stfTopSubMenuShowHide(this)" class="dropbtn action_status_label"> <?php echo e($action_status_label, false); ?><i class="fa fa-angle-down" aria-hidden="true" style="font-size:14px; margin-left:5px;"></i></button>
                                <div class="dropdown-content myDropdown  style_cr_filter_drop_down">
                                    <a href="javascript:void(0)" onclick="stfCustomerRequestFilter(this,'action_status','','All')">All</a>
                                    <a href="javascript:void(0)" onclick="stfCustomerRequestFilter(this,'action_status','Call Upcoming','Call Upcoming')"> Call Upcoming</a>
                                    <a href="javascript:void(0)" onclick="stfCustomerRequestFilter(this,'action_status','Create Reveal','Create Reveal')"> Create Reveal</a>
                                    <a href="javascript:void(0)" onclick="stfCustomerRequestFilter(this,'action_status','Urgent Reveal','Urgent Reveal')"> Urgent Reveal</a>
                                    <a href="javascript:void(0)" onclick="stfCustomerRequestFilter(this,'action_status','Relax','Relax')"> Relax</a>
                                    <a href="javascript:void(0)" onclick="stfCustomerRequestFilter(this,'action_status','Get Reveal Ready','Get Reveal Ready')"> Get Reveal Ready</a>
                                </div>
                            </div>
                            <div class="dropdown myDropdown">
                                <button type="button" onclick="stfTopSubMenuShowHide(this)" class="dropbtn company_id_label"><?php echo e($search_company_label, false); ?> <i class="fa fa-angle-down" aria-hidden="true" style="font-size:14px; margin-left:5px;"></i></button>
                                <div class="dropdown-content style_cr_filter_drop_down">
                                    <?php
                                        $html_company_list = '';
                                        $html_company_list .= '<a href="javascript:void(0)" onclick="stfCustomerRequestFilter(this,\'company_id\',0,\'All\')">All</a>';
                                        if ($employerOnboarding) {
                                            foreach ($employerOnboarding as $employerOnboarding_info) {
                                                $company_name = $employerOnboarding_info['company_name'];
                                                $company_id = $employerOnboarding_info['id'];
                                                $html_company_list .= '<a href="javascript:void(0)" onclick="stfCustomerRequestFilter(this,\'company_id\',\'' . $company_id . '\',\'' . $company_name . '\')">' . $company_name . '</a>';
                                            }
                                        }
                                        echo $html_company_list;
                                    ?>
                                </div>
                            </div>
                            <button class="dropbtn ">Search</button>
                        </div>
                    </form>
                </div> <!-- /.box-header -->
                <div class="box-body stf_table_hide_serarch_bar">
                    <table class="table table-hover table-no-sort" id="stf_request_list">
                        <thead>
                            <tr class="stf_outer_body_table_style articles">
                                <th><h3>Profile</h3></th>
                                <th><h3>Name</h3></th>
                                <th><h3>Company</h3></th>
                                <th class="c-text-center"><h3>Task Due</h3></th>
                                <th class="c-text-center"><h3>Reveal Status</h3></th>
                                <th class="c-text-center"><h3>Days Left</h3></th>
                                <th class="c-text-center"><h3>Action Status</h3></th>
                                <th class="c-text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($list->count() > 0): ?>
                                <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $reveal_status_button = '';
;                                       $reveal_status = 'not_started';
                                        $reveal_status = $info->status;
                                        $reveal_status_text_new = ucwords(str_replace('_', ' ', $reveal_status));
                                        $reveals_info = $info->listJoinWithRevealsItems()->first();
                                        $stylist_call_complete = $info->statusHistory()->where('status', '=', 'call_complete')->first();

                                        $stylistUser = $info->stylistUser()->first();
                                        $company_name = '';
                                        if (isset($stylistUser)){
                                            $company_obj = $info->stylistUser->company()->first();
                                            if (isset($company_obj)){
                                                $company_name = $company_obj->company_name;
                                            }
                                        }
                                        $name = '';
                                        $profile_img_url = url('images/stylist/dummy-profile-pic.png');
                                        $customer_obj = $info->customer()->first();
                                        if (isset($customer_obj)) {
                                            $name = $customer_obj->name;
                                            $customer_image_obj = $info->customerImage()->first();
                                            if (isset($customer_image_obj)) {
                                                $profile_img_url = url('image/' . $customer_image_obj->path);
                                            }
                                        }
                                        $reveal_action_color = '';
                                        $reveal_action_btn = '';
                                        $reveal_status_button_class = '';
                                        $reveal_status_button_text = '';
                                        $reveal_action_status_text = '';
                                        $reveal_action_btn = '<a  href="' . url('admin/stylist/customer_request/' . $info->id) . '" title="Manage" class="custom-manage-reveal-btn">Manage <a>';
                                        if ($reveal_status == 'not_started') {
                                            $reveal_status_button_text = 'Not started';
                                            $reveal_action_status_text = 'Create reveal';
                                            $reveal_action_color = 'text-green';
                                        } elseif ($reveal_status == 'sent') {
                                            $reveal_status_button_text = 'Sent';
                                            $reveal_action_status_text = 'Relax';
                                            $reveal_action_color = 'text-blue';
                                        } elseif ($reveal_status == 'complete') {
                                            $reveal_status_button_text = 'complete';
                                            $reveal_action_status_text = 'Relax';
                                            $reveal_action_color = 'text-blue';
                                        } elseif ($reveal_status == 'draf') {
                                            $reveal_status_button_text = 'Draf';
                                            $reveal_status_button_class = 'text-warning-style-two';
                                        } elseif ($reveal_status == 'awaiting_response') {
                                            $reveal_status_button_text = 'Awaiting Response';
                                            $reveal_status_button_class = 'text-warning-style-two';
                                        } elseif ($reveal_status == 'preparing_order') {
                                            $reveal_status_button_text = 'Preparing Order';
                                            $reveal_action_status_text = 'Manage reveal';
                                            $reveal_status_button_class = 'text-warning-style-two';
                                        } elseif ($reveal_status == 'return_initiated') {
                                            $reveal_status_button_text = 'return_initiated';
                                            $reveal_action_status_text = 'Manage reveal';
                                            $reveal_status_button_class = 'text-warning-style-two';
                                        } elseif ($reveal_status == 'decline') {
                                            $reveal_status_button_text = 'Decline';
                                            $reveal_action_status_text = 'Create new reveal';
                                            $reveal_status_button_class = 'text-warning-style';
                                        } else {
                                            $reveal_status_button_text = 'In Progress';
                                            $reveal_status_button_text = $reveal_status_text_new;
                                            $reveal_action_status_text = 'Create reveal';
                                            $reveal_status_button_class = 'text-warning-style-two';
                                        }
                                        $days_left = '';
                                        $after_days1 = '';
                                        $crrunt_date = date('d/m');
                                        if (isset($stylist_call_complete)){
                                            $reveal_list = $info->reveal()->get();
                                            if ($reveal_list->isNotEmpty()){
                                                $reveal_has_not_draft = $info->reveal()->where('status', '!=', 'draft')->first();
                                                if (isset($reveal_has_not_draft)) {
                                                } else {
                                                    $reveal_status_button_text = 'draft';
                                                    $after_days1 = date('d/m', strtotime($stylist_call_complete->created_at . '+14 days'));
                                                    $fdate = date('Y-m-d', strtotime($stylist_call_complete->created_at . '+14 days'));
                                                    $tdate = date('Y-m-d');
                                                    $datetime1 = new DateTime($fdate);
                                                    $datetime2 = new DateTime($tdate);
                                                    $interval = $datetime1->diff($datetime2);
                                                    $days_left = $interval->format('%a');
                                                }
                                            } else {
                                                $after_days1 = date('d/m', strtotime($stylist_call_complete->created_at . '+14 days'));
                                                $fdate = date('Y-m-d', strtotime($stylist_call_complete->created_at . '+14 days'));
                                                $tdate = date('Y-m-d');
                                                $datetime1 = new DateTime($fdate);
                                                $datetime2 = new DateTime($tdate);
                                                $interval = $datetime1->diff($datetime2);
                                                $days_left = $interval->format('%a');
                                            }
                                        } else {
                                            $reveal_status_button_text = 'Not started';
                                            $reveal_action_status_text = 'Call Upcoming';
                                            $reveal_status_button_text = $reveal_status_text_new;
                                            $reveal_action_color = 'text-green';
                                        }
                                        $appointment_date = $info->appointment_date;
                                        $month = '';
                                        $month_date = '';
                                        if ($appointment_date != '') {
                                            $appointment_date_arr = explode('-', $appointment_date);
                                            if (isset($appointment_date_arr[1])) {
                                                $month = $appointment_date_arr[1];
                                            }
                                            if (isset($appointment_date_arr[0])) {
                                                $month_date = $appointment_date_arr[0];
                                            }
                                            if ($month == '') {
                                                $appointment_date_arr = explode('/', $appointment_date);
                                                if (isset($appointment_date_arr[1])) {
                                                    $month = $appointment_date_arr[1];
                                                }
                                                if (isset($appointment_date_arr[0])) {
                                                    $month_date = $appointment_date_arr[0];
                                                }
                                            }
                                        }
                                        // ---------------------------------------------------------------------------------
                                        $action_status ='';
                                        $action_status_info = '';
                                        $style_para = '';
                                        $today_date = date('d-m-Y');
                                        $appointment_date_action_status = $info->appointment_date;
                                        $appointment_create_date_action_status = date('d-m-Y', strtotime($info->created_at));
                                        $appointment_create_date_add_12_days = date('d-m-Y', strtotime($info->created_at. '+12 days'));
                                        $appointment_create_date_add_14_days = date('d-m-Y', strtotime($info->created_at. '+14 days'));
                                        $appointment_create_date_add_2_m  = date('d-m-Y', strtotime($info->created_at. '+2 months'));
                                        $appointment_create_date_add_2_m_17_d  = date('d-m-Y', strtotime($appointment_create_date_add_2_m. '17 days'));
                                        $appointment_create_date_add_27_days  = date('d-m-Y', strtotime($appointment_create_date_add_2_m_17_d. '10 days'));
                                        $appointment_create_date_add_last_3_days  = date('d-m-Y', strtotime($appointment_create_date_add_27_days. '3 days'));
                                        // -----------------------get order details---------------------------------------- 
                                        $booking_customer_id  = $info->customer_id;
                                        $get_order_data = $info->customer->orders()->latest()->first();
                                        $order_update_date  = '';
                                        $order_status_id_info = '';
                                        $cancel_data = '';
                                        if($get_order_data){
                                            $order_update_date = date('d-m-Y', strtotime($get_order_data->updated_at));
                                            $order_update_date_14_days = date('d-m-Y', strtotime($get_order_data->updated_at. '+14 days'));
                                            $order_update_date_7_weeks = date('d-m-Y', strtotime($get_order_data->updated_at. '+7 weeks'));
                                            $order_status_id_info   = $get_order_data->order_status_id;
                                            $cancel_data = $info->cancellation()->latest()->first();
                                            $cancel_create_date = '';
                                            if($cancel_data){
                                                $cancel_create_date =$cancel_data->created_at;
                                            }
                                        }

                                        // (strtotime($today_date) >= strtotime($appointment_create_date_add_2_months))
                                        // -----------------------get appointment date again----------------------------------------
                                    //     $appointment_create_date_add_2_months = date('d-m-Y', strtotime($info->created_at. '-2 months'));
                                    //     // $appointment_create_date_add_2_m_2_w = date('d-m-Y', strtotime($info->created_at. '-2 months 17 days'));

                                    //    echo  $appointment_create_date_add_2_months ;
                                    //    echo "<br>";

                                    //    if((strtotime($today_date) >= strtotime($appointment_create_date_add_2_months)) && (strtotime($today_date) <= strtotime($appointment_create_date_add_2_m_2_w)))
                                    //    {
                                    //         echo 'yes';
                                    //    }
                                    //    else {
                                    //         echo 'no';
                                    //    }
                                       

                                        // $get_reveal_ready =   strtotime($appointment_create_date_add_2_months) - strtotime($appointment_create_date_add_2_m_2_w);
                                        // $get_reveal_ready_1 =  round($get_reveal_ready / (60 * 60 * 24));
                                        // echo $get_reveal_ready_1;
                                       
                                        // $createreveal =   strtotime($appointment_2months_15days) - strtotime($appointment_2months_27days);
                                        // $createreveal_1 =  round($createreveal / (60 * 60 * 24));
                                        // // echo $createreveal_1;
                                       
                                        // $urgent_reveal =   strtotime($appointment_2months_27days) - strtotime($appointment_3month);
                                        // $urgent_reveal_1 =  round($urgent_reveal / (60 * 60 * 24));
                                        // // echo $urgent_reveal_1;


                                        // echo $appointment_create_date_add_2_months;


                                        // if((!isset($stylist_call_complete) || isset($stylist_call_complete)) && (($info->status == 'not_started') || $info->status != 'not_started')  && (!isset($reveals_info) || isset($reveals_info)) && (!isset($get_order_data) || isset($get_order_data)) && (!isset($cancel_data) || isset($cancel_data)) && )
                                        // {
                                            
                                        // 

                                        // $today_date = '29-05-2023';
                                        

                                        // if((!isset($stylist_call_complete) || isset($stylist_call_complete)) || (($info->status == 'not_started') || $info->status != 'not_started')  || (!isset($reveals_info) || isset($reveals_info)) || (!isset($get_order_data) || isset($get_order_data)) || (!isset($cancel_data) || isset($cancel_data)) &&  (strtotime($today_date) >= strtotime($appointment_create_date_add_2_m)) &&  (strtotime($today_date) <= strtotime($appointment_create_date_add_2_m_17_d)))
                                        
                                        // if((strtotime($today_date) >= strtotime($appointment_create_date_add_2_m)) &&  (strtotime($today_date) <= strtotime($appointment_create_date_add_2_m_17_d)))
                                        // {
                                        //     $action_status_info = 'GET REVEAL READY' ;
                                        //     $style_para = 'style="color: orange !important; font-weight:900;"';
                                        // }
                                        if((strtotime($today_date) >= strtotime($appointment_create_date_add_2_m)) && (strtotime($today_date) < strtotime($appointment_create_date_add_2_m_17_d)) ) 
                                        {
                                            $action_status_info = 'GET  REVEAL READY' ;
                                            $style_para = 'style="color: orange !important; font-weight:900;"';
                                        }
                                        elseif ((strtotime($today_date) >= strtotime($appointment_create_date_add_2_m_17_d)) && (strtotime($today_date) < strtotime($appointment_create_date_add_27_days)) ) {
                                            $action_status_info = 'CREATE REVEAL' ;
                                            $style_para = 'style="color: green !important; font-weight:900;"';
                                        }
                                        elseif ((strtotime($today_date) >= strtotime($appointment_create_date_add_2_m_17_d)) && (strtotime($today_date) <= strtotime($appointment_create_date_add_last_3_days)) ) {
                                            $action_status_info = 'URGENT REVEAL' ;
                                            $style_para = 'style="color: red !important; font-weight:900;"';
                                        }
                                        elseif(isset($get_order_data) && !isset($cancel_data)  && isset($reveals_info) && ($reveals_info->status != 'return_initiated') && (strtotime($today_date) >= strtotime($appointment_create_date_add_14_days)) && (strtotime($today_date) <= strtotime($order_update_date_7_weeks)))
                                        {
                                            $action_status_info = 'RELEX' ;
                                            $style_para = 'style="color: Green !important; font-weight:900;"';
                                        }
                                        elseif(isset($stylist_call_complete) && ($info->status == 'not_started')  && isset($reveals_info) && $reveals_info->status == 'draft' && ((strtotime($today_date) >= strtotime($appointment_create_date_add_14_days)) || (strtotime($today_date) <= strtotime($appointment_create_date_add_14_days)))   && ((strtotime($today_date) < strtotime($appointment_create_date_add_12_days)) || (strtotime($today_date) >= strtotime($appointment_create_date_add_12_days))))
                                        {   
                                            $action_status_info = 'DRAFT';
                                            $style_para = 'style="color: Green !important; font-weight:900;"';
                                        }
                                        elseif(isset($stylist_call_complete) && ($info->status == 'not_started')  && !isset($reveals_info) && (strtotime($today_date) <= strtotime($appointment_create_date_add_14_days)) && (strtotime($today_date) >= strtotime($appointment_create_date_add_12_days)))
                                        {
                                            $action_status_info = 'URGENT REVEAL';
                                            $style_para = 'style="color: red !important; font-weight:900;"';
                                        }
                                        elseif(isset($stylist_call_complete) && ($info->status == 'not_started')  && !isset($reveals_info) && (strtotime($today_date) < strtotime($appointment_create_date_add_12_days))) {
                                            $action_status_info = 'CREATE REVEAL';
                                            $style_para = 'style="color: Green !important; font-weight:900;"';
                                        }
                                        elseif(!isset($stylist_call_complete) && ($info->status == 'not_started')  && !isset($reveals_info))
                                        {
                                            $action_status_info = 'CALL UPCOMING';
                                            $style_para = 'style="color: Green !important; font-weight:900;"';
                                        }
                                        else {
                                            $action_status_info = '';
                                            $style_para = 'style="color: Green !important; font-weight:900;"';
                                        }
                                        

                                        $action_status.= '<span '.$style_para.'>'.$action_status_info.'</span>';
                                        // ---------------------------------------------------------------------------------
                                        $reveal_status_button .= ' <td class="c-text-left"><span class="badge badge-pill badge-warning  text-warning-style ' . $reveal_status . '_status_btn  ' . $reveal_status_button_class . '">' . $reveal_status_button_text . '</span></td>';
                                    ?>
                                    <tr class="stf_outer_body_table_style">
                                        <td><div class="stf_outer_body_img"><img src="<?php echo e($profile_img_url, false); ?>" alt="" style="border-radius:500%"></div></td>
                                        <td class="c-text-left"> <?php echo e($name, false); ?>  </td>
                                        <td class="c-text-left"> <?php echo e($company_name, false); ?> </td>
                                        <td class="c-text-left">
                                            <?php if( ($reveal_status == 'not_started') && ($reveal_action_status_text == 'Create reveal')): ?>
                                                <?php echo e($after_days1, false); ?>

                                            <?php elseif(($reveal_status == 'not_started')  ): ?>
                                            <?php echo e($month_date . '/' . $month, false); ?>

                                            <?php elseif((($reveal_status == 'not_started') && ($reveal_action_status_text == 'Create reveal') && ($reveal_status_button_text == 'draft'))): ?>
                                                <?php echo e($after_days1, false); ?>

                                            <?php else: ?>
                                                <?php echo e(' ', false); ?>

                                            <?php endif; ?>
                                        </td>
                                        <?php echo $reveal_status_button; ?>

                                        <td class="c-text-left">
                                            <?php if( ($reveal_status == 'not_started')  || ($reveal_action_status_text == 'Create reveal') || $crrunt_date == $after_days1 || ($reveal_status_button_text == 'draft')): ?>
                                                <?php echo e($days_left . ' Days', false); ?>

                                            <?php else: ?>
                                            <?php echo e('0 Days', false); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td class="c-text-left">
                                            <?php echo $action_status; ?>

                                        </td>
                                        <td><?php echo $reveal_action_btn; ?> </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <?php echo e($list->links(), false); ?>

                </div> <!-- /.box-body -->
            </div> <!-- /.box -->
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-style'); ?>
    <style>
        #DataTables_Table_0 .c-text-left {
            text-align: left !important
        }

        #DataTables_Table_0 .c-text-center {
            text-align: center !important
        }
    </style>
<?php $__env->startSection('page-script'); ?>
    <?php echo $__env->make('admin.stylist_form.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        jQuery(document).ready(function() {

        });

        function stf_select_stylist_form(obj) {
            console.log(jQuery(obj).val());
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\hype-dappr\resources\views/admin/stylist_form/customer_request_list.blade.php ENDPATH**/ ?>