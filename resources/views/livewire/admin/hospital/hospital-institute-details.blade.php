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
                    <h1>hospital profile</h1>
                    <div class="kt-section__content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><b>Name  :</b></th>
                                    <th>{{$hospital->full_name}}</th>
                                </tr>
                                <tr>
                                    <th><b>Email   :</b></th>
                                    <th>{{$hospital->email}}</th>
                                </tr>
                                <tr>
                                    <th><b>Phone   :</b></th>
                                    <th>{{$hospital->phone}}</th>
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
                                    <th>{{isset($hospital->country->country_name)?$hospital->country->country_name:''}}</th>
                                </tr>
                                <tr>
                                    <th><b>State :</b></th>
                                    <th>{{isset($hospital->state->state_name)?$hospital->state->state_name:''}}</th>
                                </tr>
                                <tr>
                                    <th><b>City :</b></th>
                                    <th>{{isset($hospital->city->city_name)?$hospital->city->city_name:''}}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
   
        <div class="col-md-6">
                <div class="kt-section">
                    <div class="kt-section__content">
                        <table class="table">
                            <thead>
                                <tr>
                                    {{-- <th><b>Hospital Profile Picture:</b><br>
                                    @if(isset($hospital->profile_photo_path))
                                        <img src="{{ Storage::url($hospital->profile_photo_path) }}" alt="">
                                    @else
                                        <img src="{{ $model_image->getUrl() }}" style="width: 100px; height:100px;" /><br/>
                                    @endif
                                    </th> --}}
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>

        
    </x-slot>
</x-admin.details-table>