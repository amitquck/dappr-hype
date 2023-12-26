<?php $__env->startSection('content'); ?>
    <?php
        $loader_html = stylistGetLoader();
        $all_steps = ['gtky' => 'Getting to Know you', 'call' => '15 min call', 'reveals' => 'Reveals', 'feedback' => 'Feedback', 'return_period' => 'Return Period', 'complete' => 'Complete'];
        $completed_steps = ['gtky', 'call', 'revels', 'feedback', 'return_period', 'complete'];
        $completed_steps = ['gtky', 'call', 'revels'];
        $add_plus_img = url('images/stylist/add-plus.jpg?2');
        $revels_html_item = '';
        $revel_name = '';
        if (isset($data['revels_html_item_html'])) {
            $revels_html_item = $data['revels_html_item_html'];
        }
        $due_date = 0;
        if (isset($data['appointments_details']['appointment_date'])) {
            $appointment_date = $data['appointments_details']['appointment_date'];
            $due_date = 0;
            $now_time = time();
            $appointment_date = strtotime($appointment_date);
            if ($appointment_date >= $now_time) {
                $due_date = $appointment_date - $now_time;
                $due_date = round($due_date / (60 * 60 * 24));
            }
        }
        $dummy_price_random = get_formated_price($budget_price, config('system_settings.decimals', 2));
        $total_budget_price = $dummy_price_random;
        $user_name = '';
        $user_email = '';
        $user_dob = '';
        $newDate = '';
        if (isset($data['appointments_details']['customer'])) {
            $user_name = $data['appointments_details']['customer']['name'];
        }
        if (isset($data['appointments_details']['customer'])) {
            $user_email = $data['appointments_details']['customer']['email'];
        }
        if (isset($data['appointments_details']['customer'])) {
            $user_dob = $data['appointments_details']['customer']['dob'];
            $originalDate = $user_dob;
            $newDate = date('d-m-Y', strtotime($originalDate));
        }
        $merchant_id = $data['appointments_details']['merchant_id'];
        $booking_id = $data['appointments_details']['id'];
        $user_desc = '';
        $profile_img_url = $data['profile_img_url'];
        $heading_text = '';
        if (isset($data['user_info'])) {
            $user_desc = $data['user_info']['description'];
            $user_name = $data['user_info']['name'];
            $created_at = $data['user_info']['created_at'];
            $created_at_timestamp = strtotime($created_at);
            $created_at_new_formate = date('M-Y', $created_at_timestamp);
            $heading_text =
                ucwords($user_name) .
                ' has been a member since ' .
                $created_at_new_formate .
                ' - They have ' .
                $due_date .
                " days
remaining for their reveal";
            $heading_text =
                "<div class='line-container'>
    <div class='px-4 mt-5'>
        <div class='row'>
            <div class='col-md-12 line-heading overview_heading'>
                <h4>" .
                $heading_text .
                "
                </h4>
            </div>
        </div>
    </div>
</div>";
        }
        
        echo $loader_html;
    ?>

    <div class="container-fluid stf_outer_body stylist_reveals_section stf_outer_page_load" style="display:none">


        <input type="hidden" name="request_id" value="<?php echo e($data['request_id'], false); ?>">
        <input type="hidden" name="add_product_to_alernative_or_item" value="">

        <div class="row">
            <div class="col-lg-9">

                <?php
                    echo $heading_text;
                ?>


                <div class='line-container' style="display:none">
                    <div class="col-md-12 line-heading overview_heading">
                        <h4>Overview</h4>
                    </div>
                    <div class='progress-line'>
                        <div class='progress' style="width: 50%;">

                        </div>
                        <?php
                            
                            $setps_html = '';
                            $current_class_status = true;
                            foreach ($all_steps as $step_info_key => $step_info) {
                                $completed_class = ' ';
                            
                                $current_class = 'current';
                            
                                if (in_array($step_info_key, $completed_steps)) {
                                    $completed_class = ' completed ';
                                    $current_class = ' ';
                                } else {
                                    if ($current_class_status) {
                                        $current_class_status = false;
                                    } else {
                                        $current_class = ' ';
                                    }
                                }
                            
                                $setps_html .=
                                    "<div class='status'>
                        <div class='dot " .
                                    $completed_class .
                                    $current_class .
                                    "'></div>
                        <p>" .
                                    $step_info .
                                    "</p>
                    </div>";
                            }
                            echo $setps_html;
                        ?>

                    </div>

                </div>


                <?php if(isset($customer_question_details)): ?>
                    <div class="border_bottom px-4 mt-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="Getting-dapp-dash d-flex m-2">
                                    <span>
                                        <b>Getting to know you</b>
                                        <p class="ml-4">Completed on <?php echo e($customer_question_details->created_at, false); ?>

                                        </p>
                                    </span>
                                    <div class="dash-butn text-center mt-2">
                                        <Span class="stf_anchor_btn"
                                            onclick="stfViewCustomerQuestions(<?php echo e($booking_customer_id, false); ?>)">VIEW RESPONSE<i
                                                class="/*fas fa-angle-right*/"></i></Span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if($stylist_user_compnay_id != 0): ?>
                    <div class="border_bottom px-4 mt-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="Getting-dapp-dash d-flex m-2">
                                    <span>
                                        <p class="ml-4"><b>Company Information<b></p>
                                    </span>
                                    <div class="dash-butn text-center mt-2">
                                        <Span class="stf_anchor_btn"
                                            onclick="companydetailsview(<?php echo e($stylist_user_compnay_id, false); ?>)">VIEW COMPANY
                                            GUIDE<i class="/*fas fa-angle-right*/"></i></Span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <?php
                        echo '';
                    ?>
                <?php endif; ?>

                <?php if(isset($stylist_call_complete)): ?>
                    <a data-link="<?php echo e(url('admin/stylist/customer_request_response/load_history/' . $booking_id), false); ?> "
                        class="ajax-modal-btn dash-butn text-center mt-2 stf_anchor_btn"
                        style="cursor: pointer;margin-top:10px">Mail History</a>
                    <div class="px-4 mt-5 revels_html_section">
                        <div class="line-heading-tow mb-3">
                            <div class="line-heading mb-3">
                                <h4>Reveal</h4>
                                <p class="ml-4">Create new reveals and alter draft reveals</p>
                            </div>
                            <span class="stf_hide_section "><a class="stf_add_tag_btn_item" href="javascript:void(0)"
                                    onclick="stfGetRevealItemsHtmlAjax(0)"><span><i class="fa fa-plus"></i>Add a
                                        Reveal</span></a><span>
                        </div>
                        <div class="row justify-content-md-center">
                            <div class="col-md-11 align-self-center">
                                <div class="owl-dappr-slider ">
                                    <div class="owl-carousel  product-slider owl-theme stf_owl_carousel_slider_reveals">
                                        <?php echo $revels_html_item; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <?php
                    $stylist_call_complete_html =
                        '<a href="' .
                        url('admin/stylist/booking_call_complete/' . $booking_id) .
                        '"
                                                                title="Mark as Call Complete " class="custom-manage-reveal-btn">CALL COMPLETED</i><a>';
                    ?>
                    <div class="px-4 mt-5 revels_html_section">
                        <div class="line-heading-tow mb-3">
                            <div class="line-heading mb-3">
                                <h4>Call Not Completed</h4>
                                <p class="ml-4">Your call with client has not yet been completed, therefore you cannot
                                    complete a reveal. If you have completed the call please select 'Call Completed' to be
                                    able to create a reveal.</p>
                            </div>
                        </div>
                        <div class="row justify-content-md-center">
                            <div class="col-md-11 align-self-center">
                                <div class="" style="text-align: center;    margin: 39px 0 0;">
                                    <?php echo $stylist_call_complete_html; ?>

                                </div>
                            </div>
                        </div>

                    </div>
                <?php endif; ?>
                <?php if($new_booking_status == 'not_started'): ?>
                    <?php echo e(' ', false); ?>

                <?php else: ?>
                    <div class=" px-4 mt-5">
                        <div class="line-heading mb-3">
                            <h4>Purchase History</h4>
                            <!--p class="ml-4">22 January Stylish Brand</p-->

                        </div>
                        <div class="owl-dappr-slider">
                            <!-- Nav pills -->
                            <ul class="nav nav-pills" role="tablist">
                                <li class="nav-item active">
                                    <a class="nav-link " data-toggle="pill" href="#bought_section">Bought</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#declined_section">Declined</a>
                                </li>
                                
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content style-tab-content">
                                <div id="bought_section" class="row tab-pane active">
                                    <?php
                                        $buy_html = '';
                                        
                                        if (is_array($buy_products) && count($buy_products)) {
                                            foreach ($buy_products as $buy_product_info) {
                                                $buy_product_img_src = '';
                                                $buy_product_obj = $buy_product_info['product_obj'];
                                                $buy_inventory_obj = $buy_product_info['inventory_obj'];
                                                $price = 0;
                                                if ($buy_inventory_obj) {
                                                    $price = $buy_inventory_obj->current_sale_price();
                                                    foreach ($buy_inventory_obj->images as $img) {
                                                        $buy_product_img_src = url('') . '/image/' . $img->path;
                                                        break;
                                                    }
                                                }
                                                if ($buy_product_img_src == '') {
                                                    foreach ($buy_product_obj->images as $img) {
                                                        $buy_product_img_src = url('') . '/image/' . $img->path;
                                                        break;
                                                    }
                                                }
                                                if ($buy_product_img_src == '') {
                                                    $buy_product_img_src = url('images/stylist/product-placeholder.jpg');
                                                }
                                                $price = get_formated_price($price, config('system_settings.decimals', 2));
                                                $cancel_item_hide = '';
                                        
                                                $force_hie = '';
                                                
                                                if (isset($item_cancel_item_hide->items) && in_array($buy_inventory_obj->id, $item_cancel_item_hide->items)) {
                                                    $exchnage_return_option = $item_cancel_item_hide->exchnage_return_option;
                                                    $exchnage_return_option_decde = json_decode($exchnage_return_option, true);
                                                    foreach ($exchnage_return_option_decde as $key => $value) {
                                                        $force_hie = '';
                                                        if ($buy_inventory_obj->id == $key && $value == 'exchange') {
                                                            $cancel_item_hide = 'display:block';
                                                        } elseif ($buy_inventory_obj->id == $key && $value == 'refund') {
                                                            $cancel_item_hide = 'display:none';
                                                        } else {
                                                            $force_hie = 'display:block';
                                                        }
                                        
                                                       
                                                    }
                                                }
                                                $buy_html .=
                                                    '<div class="col-md-2 img-product-1 " style= "' .
                                                    $cancel_item_hide .
                                                    '">
                                        <div class="rounded">
                                            <img src="' .
                                                    $buy_product_img_src .
                                                    '" alt="" style="width: 100%;">
                                        </div>
                                        <div class="articles-two">
                                            <h3>' .
                                                    $buy_product_obj->name .
                                                    '</h3>
                                            <h3>' .
                                                    $price  .
                                                    '</h3>
                                        </div>
                                    </div>';
                                            }
                                        }
                                        echo $buy_html;
                                    ?>
                                </div>
                                <div id="declined_section" class="row tab-pane fade">

                                    <?php
                                        $buy_html = '';
                                        
                                        if (is_array($buy_products) && count($buy_products)) {
                                            foreach ($buy_products as $buy_product_info) {
                                                $buy_product_img_src = '';
                                                $buy_product_obj = $buy_product_info['product_obj'];
                                                $buy_inventory_obj = $buy_product_info['inventory_obj'];
                                                $price = 0;
                                                if ($buy_inventory_obj) {
                                                    $price = $buy_inventory_obj->current_sale_price();
                                                    foreach ($buy_inventory_obj->images as $img) {
                                                        $buy_product_img_src = url('') . '/image/' . $img->path;
                                                        break;
                                                    }
                                                }
                                                if ($buy_product_img_src == '') {
                                                    foreach ($buy_product_obj->images as $img) {
                                                        $buy_product_img_src = url('') . '/image/' . $img->path;
                                                        break;
                                                    }
                                                }
                                                if ($buy_product_img_src == '') {
                                                    $buy_product_img_src = url('images/stylist/product-placeholder.jpg');
                                                }
                                                $price = get_formated_price($price, config('system_settings.decimals', 2));
                                                $cancel_item_hide = '';
                                        
                                                $force_hie = '';
                                                $return_boolean = false;
                                                if (isset($item_cancel_item_hide->items) && in_array($buy_inventory_obj->id, $item_cancel_item_hide->items)) {
                                                    $exchnage_return_option = $item_cancel_item_hide->exchnage_return_option;
                                                    $exchnage_return_option_decde = json_decode($exchnage_return_option, true);
                                                    foreach ($exchnage_return_option_decde as $key => $value) {
                                                        if ($buy_inventory_obj->id == $key && $value == 'refund') {
                                                            // $cancel_item_hide = 'display:block';
                                                            $return_boolean = true;
                                                        }
                                                        //elseif ($buy_inventory_obj->id == $key && $value == 'exchange') {
                                                        //     // $cancel_item_hide = 'display: none';
                                                        //     $return_boolean = false;
                                                        // }
                                                    }
                                                }
                                                if ($return_boolean) {
                                                    $cancel_item_hide = 'display:block';
                                                } else {
                                                    $cancel_item_hide = 'display:none';
                                                }
                                                // $buy_html .= '<div class="col-md-2 img-product-1 " style= "'.$cancel_item_hide.'"><div class="rounded"><img src="'.$buy_product_img_src.'" alt="" style="width: 100%;"></div><div class="articles-two"><h3>'.$buy_product_obj->name.'</h3><h3>'.$price.'</h3></div></div>';
                                        
                                                $buy_html .= '<div class="col-md-2 img-product-1" style= "' . $force_hie . '' . $cancel_item_hide . '"><div class="rounded "><img src="' . $buy_product_img_src . '" alt=""  style="width: 100%;"></div><div class="articles-two"><h3>' . $buy_product_obj->name . '</h3><h3>' . $product_brand_name . '</h3><h3>' . $price . '</h3></div><div></div></div>';
                                                // . $product_obj->name .<h3>' '</h3>
                                                // $buy_html .= '<div class="row mt-4" style= "'.$cancel_item_hide.'"><div class="col-md-2 img-product-1"><div class="rounded "><img src="' . $buy_product_img_src . '" alt=""  style="width: 100%;"></div></div> <div class="col-md-5 img-product-1 " style= "'.$cancel_item_hide.'"><div class="rounded "><h4>Cancel</h4></div></div></div> <div class="row"><div class="col-md-4 articles-two" style= "'.$cancel_item_hide.'"><h3>' . $buy_product_obj->name . '</h3><h3>' . $price . '</h3></div></div>';
                                            }
                                        }
                                    ?>

                                    <?php echo $decline_html; ?>

                                    <?php echo $buy_html; ?>



                                </div>
                                


                            </div>
                        </div>

                    </div>
                <?php endif; ?>
            </div>

            <div class="col-lg-3 pr-0 ">
                <div class="dappr-box  align-items-center">
                    <div class="card align-card-dappr-box">
                        <div class="card-dappr">
                            <div class="row">
                                <div class=" col-md-6 dappr-img-dash">
                                    <img src="<?php echo e(url($profile_img_url), false); ?>" alt="">
                                </div>
                                <div class="col-md-12  person-info mb-2 articles">
                                    <h3><?php echo e($user_name, false); ?> </h3>
                                    <h3 style="line-height: 20px;"><?php echo e($employe_onboarding_company_name, false); ?></h3>
                                    <h3><?php echo e($newDate, false); ?></h3>
                                    <h3 style="line-height: 20px;"><?php echo e($user_email, false); ?></h3>
                                    <br>
                                    <!-- <?php echo e($booking_customer_id, false); ?> -->
                                    <?php if(!empty($booking_customer_id) && !empty($customer_details) && $booking_customer_id == $customer_details->id): ?>
                                        <?php if($customer_details->starrating > 0): ?>
                                            <?php for($i = 1; $i < 6; $i++): ?>
                                                <span class="rating_starcount" starnum="<?php echo e($i, false); ?>"
                                                    cust_id="<?php echo e($customer_details->id, false); ?>"><i
                                                        class="far fa-star  <?php if($i <= $customer_details->starrating): ?> <?php echo e('fa-solid', false); ?> <?php endif; ?> "></i></span>
                                            <?php endfor; ?>
                                        <?php elseif($customer_details->starrating == 0): ?>
                                            <?php for($i = 1; $i < 6; $i++): ?>
                                                <span class="rating_starcount" starnum="<?php echo e($i, false); ?>"
                                                    cust_id="<?php echo e($customer_details->id, false); ?>"><i
                                                        class="far fa-star"></i></span>
                                            <?php endfor; ?>
                                        <?php endif; ?>

                                    <?php endif; ?>
                                    <!-- <span><i class="far fa-star fa-solid"></i></span> -->

                                </div>
                                <p></p>

                            </div>
                            <div class="button-drapp">
                                <!-- <Span><?php echo e('Budget: ' . $total_budget_price, false); ?></Span> -->
                                <Span><?php echo e('Budget: ' . '$ ' . number_format(round($budget_price)), false); ?></Span>


                            </div>
                            <p></p>
                            <div class="mt-2">
                                <p><?php echo e($user_desc, false); ?></p>
                            </div>
                            <div class="stf_close_btn user_tag_list_ul">
                                <?php echo $user_tag_list_html; ?>

                            </div>
                            <div class="stf_add_tag_btn">
                                <a><i class="fa fa-plus"
                                        onclick="stfAddTagToUser(<?php echo e($booking_customer_id, false); ?>,'this')"></i><input
                                        type="text" placeholder="Add a tag" name="add_tag_to_user"></a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="align-card-dappr-box-s card">
                    <div class="card-dappr">
                        <div class="line-heading-box-s articles">
                            <!-- <h3>Product Name</h3> -->
                            <h3>Additional Notes</h3>
                            <!-- <h3>2 May 2022</h3> -->
                            <h3><?php echo e($user_name, false); ?></h3>
                        </div>
                        <!-- <div class="text-justify mt-2">
                                <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                    been the
                                    industry's standard dummy text ever since the 1500s
                                </h5>
                            </div>   -->
                        <div class="text-justify mt-2">
                            <?php $__currentLoopData = $note; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $note_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <h5><?php echo e($note_value->notes, false); ?></h5>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="stf_add_tag_btn">
                            <a><i class="fa fa-plus"
                                    onclick="stfAddNoteToUser(<?php echo e($booking_customer_id, false); ?>,<?php echo e($merchant_id, false); ?>,<?php echo e($booking_id, false); ?>,'this')"></i>Add
                                Notes<input type="text" placeholder="Add a Note" name="add_note_to_user"></a>
                        </div>
                        <br>
                    </div>
                </div>

            </div>

        </div>
    </div>



    <div class="stf_outer_body container mar-top-body reveal_add_items_section stf_product_window_hide_class"
        style="display:none">

    </div>

    <div class="stf_outer_body container  stf_products_list_section stf_product_window_show_class" style="display:none">

    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-style'); ?>
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.6.3/css/all.css" />

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-script'); ?>
    <?php echo $__env->make('admin.stylist_form.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
    <script src="//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        stfOWLCarouselSliderCall('stf_owl_carousel_slider_reveals');

        $(".rating_starcount").on('click', function() {
            starnum = $(this).attr('starnum');
            cust_id = $(this).attr('cust_id');
            var token = '<?php echo e(csrf_token(), false); ?>';
            if (starnum != '' && cust_id != '') {
                $.ajax({
                    url: '<?php echo e(url('admin/stylist/customer_request/ratings'), false); ?>',
                    method: 'POST',
                    data: {
                        starnum: starnum,
                        cust_id: cust_id,
                        CSRF: token
                    },
                    dataType: 'html',
                    success: function(response) {
                        if (response == 1) {
                            console.log('rating upated successfully');
                            location.reload();
                        } else {
                            console.log('rating not upated successfully');
                        }
                    },
                    error: function(response) {
                        alert('Error: ' + response);
                    }
                });
            }

        });

        function stfAddNoteToUser(customerid, merchantid, bookingid, obj) {
            var note_name = jQuery('input[name="add_note_to_user"]').val();
            var token = '<?php echo e(csrf_token(), false); ?>';
            if (note_name == '') {
                return false;
            }
            $.ajax({
                url: '<?php echo e(url('admin/stylist/customer_request/addnote'), false); ?>',
                method: 'POST',
                data: {
                    customerid: customerid,
                    merchantid: merchantid,
                    bookingid: bookingid,
                    note_name: note_name,
                    CSRF: token
                },
                dataType: 'html',
                success: function(response) {
                    if (response == 1) {
                        console.log('Product note upated successfully');
                        jQuery('input[name="add_note_to_user"]').val('');
                        location.reload();
                    } else {
                        console.log('Product note not upated successfully');
                    }
                },
                error: function(response) {
                    alert('Error: ' + response);
                }
            });

        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dappr\hype-dappr\resources\views/admin/stylist_form/customer_request_type_form_details.blade.php ENDPATH**/ ?>