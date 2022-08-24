@extends('layouts.app')

@section('content')
<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0 text-primary"></h4>
    </div>
    <div class="page-rightheader">

    </div>
</div>

<div class="row">
    @if(Session::has('message'))
    <div class="alert alert-message">
        {{ Session::get('message') }}
        @php
        Session::forget('message');
        @endphp
    </div>
    @endif
    <?php $order_id = NULL?>
    @if(isset($_GET['order_id']))
        <?php $order_id = $_GET['order_id']?>
    @endif

    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-default-color">
                <div class="card-title">Orders Messages</div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                    <h5 class="order-list-chat"><b>Orders List </b></h5>
                        <div class="order_listings">
                         
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="order_messages">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('after_script')

<script>
    $(document).ready(function() {
        
        $.ajax({

            url: "{{route('messages.fetch_order_list')}}",
            method: "get",
            dataType: "json",
            beforeSend: function() {
                $('.order_listings').html('loading records....');
            },
            success: function(response) {

                if (response.status == 'success') {
                    
                    var html = "";

                    for (i = 0; i<response.data.length;i++){

                       
                        html +='<div class="col-sm-12 order_no order_'+response.data[i].sale_order_id+'"><span class="orderlist-text" onclick="fetch_messages('+response.data[i].sale_order_id+')"> ORDER-'+response.data[i].sale_order_id+' <span class="badge badge-gradient-danger"> New </span> <i class="angle fe fe-chevron-right"></i> </span></div>';


                    }

                    $('.order_listings').html(html);
                }
            }



        });
        var order_id = "{{$order_id}}";
        if(order_id){
            fetch_messages(order_id);
        }
        
    });

function fetch_messages(ele){


    $.ajax({

        url: "{{url('admin/order_message/order_message_list')}}/"+ele,
        method: "get",
        dataType: "html",
        beforeSend: function() {
            $('.order_messages').html('loading please wait....');
        },
        success: function(response) {

            $('.order_messages').html(response);

            $('#order_message_modal').removeClass('modal fade');
            $('#order_message_modal').addClass('order-message-custom');

            $('.modal-footer').html('');
            
        }



        });

}

</script>


@endsection