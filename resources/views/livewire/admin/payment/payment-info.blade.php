<x-admin.details-table>
    <x-slot name="details">
    <style type="text/css">
        .table > thead tr th {
            background: #ffffff;
            color: #000039;
        }
    </style>
    <div class="row">
            <div class="col-md-6">
                <div class="kt-section">
                    <h1>Payment Details</h1>
                    <div class="kt-section__content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><b>Total Amount :</b></th>
                                    <th>{{isset($details->total_amount)?$details->total_amount:""}}</th>
                                </tr>
                                <tr>
                                    <th><b>Card Number:</b></th>
                                    <th>{{isset($details->card_number)?$details->card_number:""}}</th>
                                </tr>
                               
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="kt-section">
                    <div class="kt-section__content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><b>Hospital Name:</b></th>
                                    <th>{{$details->user->first_name}} {{$details->user->last_name}}</th>
                                </tr>
                                                       
                            </thead>
                        </table>
                    </div>
                </div>
            </div>            
        </div>

      

        <div class="row">
            <div class="col-md-6">
                <div class="kt-section">
                    <div class="kt-section__content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><b>Total Amount:</b></th>
                                    <th>{{$details->total_amount}}</th>
                                </tr>
                                <tr>
                                    <th><b>Discount Amount:</b></th>
                                    <th>{{$details->jobdetails->discount_amount}}</th>
                                </tr>
                                <tr>
                                    <th><b>Promo Code:</b></th>
                                    <th>{{$details->jobdetails->promo_code}}</th>
                                </tr>                                
                            </thead>
                        </table>
                    </div>
                </div>
            </div>            
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="kt-section">
                    <div class="kt-section__content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><b>Job Status:</b></th>
                                    @if ($details->jobdetails->job_status == 1)
                                    <th>Ongoing</th>
                                    @elseif ($details->jobdetails->job_status == 2)
                                    <th>Upcoming</th>
                                    @else
                                    <th>Closed</th>
                                    @endif
                                </tr>
                                <tr>
                                    <th><b>Payment Status:</b></th>
                                    @if ($details->jobdetails->payment_status == 1)
                                    <th>In-Progres</th>
                                    @elseif ($details->jobdetails->payment_status == 2)
                                    <th>Completed</th>
                                    @else
                                    <th>Failed</th>
                                    @endif
                                </tr>                               
                            </thead>
                        </table>
                    </div>
                </div>
            </div>            
        </div>
    </x-slot>
</x-admin.details-table>