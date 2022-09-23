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
                    <h1>Nurse profile</h1>
                    <div class="kt-section__content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><b>Name  :</b></th>
                                    <th>{{$nurse->full_name}}</th>
                                </tr>
                                <tr>
                                    <th><b>Email   :</b></th>
                                    <th>{{$nurse->email}}</th>
                                </tr>
                                <tr>
                                    <th><b>Phone   :</b></th>
                                    <th>{{$nurse->phone}}</th>
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
                                    <th><b>Country :</b></th>
                                    <th>{{isset($nurse->country->country_name)?$nurse->country->country_name:''}}</th>
                                </tr>
                                <tr>
                                    <th><b>State :</b></th>
                                    <th>{{isset($nurse->state->state_name)?$nurse->state->state_name:''}}</th>
                                </tr>
                                <tr>
                                    <th><b>City :</b></th>
                                    <th>{{isset($nurse->city->city_name)?$nurse->city->city_name:''}}</th>
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
                <h1>Nurse info</h1>
                    <div class="kt-section__content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><b>License Number  :</b></th>
                                    <th>{{isset($nurse->licence_number)?$nurse->licence_number:''}}</th>
                                </tr>
                                <tr>
                                    <th><b>License Type:</b></th>
                                    <th>{{isset($nurse->licence_type)?$nurse->licence_type:''}}</th>
                                </tr>
                                <tr>
                                    <th><b>Experience Year :</b></th>
                                    <th>{{isset($nurse->experience_year)?$nurse->experience_year:''}}</th>
                                </tr>
                                <tr>
                                    <th><b>Experience Month :</b></th>
                                    <th>{{isset($nurse->experience_month)?$nurse->experience_month:''}}</th>
                                </tr>
                                <tr>
                                    <th><b>Experience:</b></th>
                                    <th>{{isset($nurse->experience)?$nurse->experience:''}}</th>
                                </tr>
                                <tr>
                                    <th><b>Gender:</b></th>
                                    <th>{{isset($nurse->gender)?$nurse->gender:''}}</th>
                                </tr>
                                <tr>
                                    <th><b>Salary:</b></th>
                                    <th>{{isset($nurse->salary)?$nurse->salary:''}}</th>
                                </tr>
                                <tr>
                                    <th><b>Date of Birth:</b></th>
                                    <th>{{isset($nurse->date_of_birth)?$nurse->date_of_birth:''}}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
                 
            <div class="col-md-6">
                <div class="kt-section">
                    <div class="kt-section__content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><b>Nurse Profile Picture:</b><br>
                                    @if(isset($nurse->profile_photo_path))
                                        <img src="{{ Storage::url($nurse->profile_photo_path) }}" alt="">
                                    @else
                                        <img src="{{ $model_image->getUrl() }}" style="width: 100px; height:100px;" /><br/>
                                    @endif                                   
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>           
        </div>        
    </x-slot>
</x-admin.details-table>