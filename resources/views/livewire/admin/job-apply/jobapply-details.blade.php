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
                    <h1>In-Progress Details</h1>
                    <div class="kt-section__content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><b>Nurse Name  :</b></th>
                                    <th>{{isset($details->nurse->full_name)?$details->nurse->full_name:""}}</th>
                                </tr>
                                <tr>
                                    <th><b>Hospital Name   :</b></th>
                                    <th>{{isset($details->hospital->full_name)?$details->hospital->full_name:""}}</th>
                                </tr>
                               
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6 table-country">
                <div class="kt-section">
                    <div class="kt-section__content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><b>Location :</b></th>
                                    <th>{{$details->hospital_location}}</th>
                                </tr>
                                <tr>
                                    <th><b>Date :</b></th>
                                    <th>{!! \Carbon\Carbon::parse($details->job_post_date)->format('d M Y') !!}</th> 
                                </tr>
                                <tr>
                                    <th><b>Hospital Zip :</b></th>
                                    <th>{{$details->hospital_zipcode}}</th>
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
                                    <th>{{$details->hospital_name}}</th>
                                </tr>
                                <tr>
                                    <th><b>Hospital Location:</b></th>
                                    <th>{{$details->hospital_location}}</th>
                                </tr>
                                <tr>
                                    <th><b>Hospital Zipcode:</b></th>
                                    <th>{{$details->hospital_zipcode}}</th>
                                </tr>
                                <tr>
                                    <th><b>Hospital Country:</b></th>
                                    <th>{{isset($details->country->country_name)?$details->country->country_name:""}}</th>
                                </tr>
                                <tr>
                                    <th><b>Hospital State:</b></th>
                                    <th>{{isset($details->state->state_name)?$details->state->state_name:""}}</th>
                                </tr>
                                <tr>
                                    <th><b>Hospital city:</b></th>
                                    <th>{{isset($details->city->city_name)?$details->city->city_name:""}}</th>
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
                                    <th><b>Experience:</b></th>
                                    <th>{{$details->experience}}</th>
                                </tr>
                                <tr>
                                    <th><b>Employee Required:</b></th>
                                    <th>{{$details->employee_required}}</th>
                                </tr>
                                <tr>
                                    <th><b>Hiring Budget:</b></th>
                                    <th>{{$details->hiring_budget}}</th>
                                </tr>
                                <tr>
                                    <th><b>Hospital Phone:</b></th>
                                    <th>{{$details->hospital_phone}}</th>
                                </tr>
                                <tr>
                                    <th><b>Urgent Requirement:</b></th>
                                    @if ($details->urgent_requirement == 1)
                                    <th>Yes</th>                                   
                                    @else
                                    <th>No</th>
                                    @endif
                                </tr>
                                <tr>
                                    <th><b>Skills:</b></th>
                                    <th>{{$details->skills}}</th>
                                </tr>
                                <tr>
                                    <th><b>Additional Instructions:</b></th>
                                    <th>{{$details->additional_instructions}}</th>
                                </tr>
                                <tr>
                                    <th><b>Licence Type:</b></th>
                                    @if ($details->licence_type == 1)
                                    <th>CNA</th>                                   
                                    @else
                                    <th>LPN</th>
                                    @endif
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
                                    <th>{{$details->discount_amount}}</th>
                                </tr>
                                <tr>
                                    <th><b>Promo Code:</b></th>
                                    <th>{{$details->promo_code}}</th>
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
                                    @if ($details->job_status == 1)
                                    <th>Ongoing</th>
                                    @elseif ($details->job_status == 2)
                                    <th>Upcoming</th>
                                    @else
                                    <th>Closed</th>
                                    @endif
                                </tr>
                                <tr>
                                    <th><b>Payment Status:</b></th>
                                    @if ($details->payment_status == 1)
                                    <th>In-Progres</th>
                                    @elseif ($details->payment_status == 2)
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