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
                                    <th><b>Employee Name  :</b></th>
                                    <th>{{isset($details->user->full_name)?$details->user->full_name:""}}</th>
                                </tr>
                                <tr>
                                    <th><b>Project Name   :</b></th>
                                    <th>{{isset($details->projects->project_name)?$details->projects->project_name:""}}</th>
                                </tr>
                               
                            </thead>
                        </table>
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
                                    <th><b>Job Name:</b></th>
                                    <th>{{$details->job_name}}</th>
                                </tr>
                               
                                <tr>
                                    <th><b>Hour:</b></th>
                                    <th>{{$details->hour}}</th>
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
                                    <th><b>Hiring Budget:</b></th>
                                    <th>{{$details->hiring_budget}}</th>
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