<x-admin-layout title="Dashboard">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <x-slot name="subHeader">
        <x-admin.sub-header headerTitle="Dashboard">
            {{-- <x-admin.breadcrumbs>
                    <x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
            </x-admin.breadcrumbs> --}}
            <x-slot name="toolbar">
            </x-slot>
        </x-admin.sub-header>
</x-slot>

<div class="kt-portlet">
    <div class="kt-portlet__body kt-portlet__body--fit">
        <div class="row row-no-padding row-col-separator-xl">
            <div class="col-md-6 col-lg-6 col-xl-6">
                <x-admin.dashboard-count-widget>
                    <x-admin.dashboard-count-widget-item title="Total Users" description="Total Users available in this system" :count="$count['nurseCount']" href="{{ route('users.index') }}" />
                    <x-admin.dashboard-count-widget-item title="Total blocked Users" description="Total blocked users available in this system" :count="$count['blockedNurseCount'] " href="{{ route('users.index') }}" />
                </x-admin.dashboard-count-widget>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <x-admin.dashboard-count-widget>
                    <x-admin.dashboard-count-widget-item title="Total active Users" description="Total active users available in this system" :count="$count['activeNurseCount'] " href="{{ route('users.index') }}" />
                </x-admin.dashboard-count-widget>
            </div>
        </div>
    </div>
</div>

<div class="kt-portlet">
    <div class="kt-portlet__body kt-portlet__body--fit">
        <div class="row row-no-padding row-col-separator-xl">
            <div class="col-md-6 col-lg-6 col-xl-6">
                <x-admin.dashboard-count-widget>
                    <x-admin.dashboard-count-widget-item title="Total Projects" description="Total projects available in this system" :count="$count['hospitalCount']" href="{{ route('projects.index') }}" />
                    <x-admin.dashboard-count-widget-item title="Total blocked Projects" description="Total blocked projects available in this system" :count="$count['blockedHospitalCount'] " href="{{ route('projects.index') }}" />
                </x-admin.dashboard-count-widget>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <x-admin.dashboard-count-widget>
                    <x-admin.dashboard-count-widget-item title="Total active Projects" description="Total active projects available in this system" :count="$count['activeHospitalCount'] " href="{{ route('projects.index') }}" />
                </x-admin.dashboard-count-widget>
            </div>
        </div>
    </div>
</div>
<div class="kt-portlet">
    <div class="kt-portlet__body kt-portlet__body--fit">
        <div class="row row-no-padding row-col-separator-xl">
            <div class="col-md-6 col-lg-6 col-xl-6">
                <x-admin.dashboard-count-widget>
                    <x-admin.dashboard-count-widget-item title="Total Jobs" description="Total Jobs available in this system" :count="$count['jobCount']" href="{{ route('jobs.index') }}" />
                </x-admin.dashboard-count-widget>
            </div>
           
        </div>
    </div>
</div>
<div class="kt-portlet">
    <div class="kt-portlet__body kt-portlet__body--fit">
        <div class="row row-no-padding row-col-separator-xl">
            <div class="col-md-6 col-lg-6 col-xl-6">
                <x-admin.dashboard-count-widget>
                    <x-admin.dashboard-count-widget-item title="Total Apllied Jobs" description="Total Apllied Jobs available in this system" :count="$count['jobapplyCount']" href="{{ route('job-apply-details.index') }}" />
                </x-admin.dashboard-count-widget>
            </div>
           
        </div>
    </div>
</div>
<div class="row">
        <div class="col-md-6 col-lg-6 col-xl-6">
            <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Latest Users
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_widget4_tab1_content">
                            <div class="kt-widget4">
                                @if (count($nurses) > 0)
                                    @foreach ($nurses as $users)
                                        <div class="kt-widget4__item">
                                            <span
                                                class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">{{ substr(ucfirst($users->first_name), 0, 1) }}</span>
                                            <div class="kt-widget4__info">
                                                <a href="{{ route('users.show', ['user' => $users->id]) }}"
                                                    class="kt-widget4__username" title="Click to view user">
                                                    &nbsp;&nbsp;{{ $users->full_name }}
                                                </a>
                                                <p class="kt-widget4__text">
                                                    &nbsp;&nbsp; Joined on {{ $users->created_at->diffForHumans() }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="kt-widget4__item">
                                        <div class="kt-widget4__pic kt-widget4__pic--pic">
                                        </div>
                                        <div class="kt-widget4__info">
                                            No User record found.
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <a href="{{ route('users.index') }}" class="btn btn-label-brand btn-bold"
                                style="float: right;">View all User</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6">
            <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Latest Project
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_widget4_tab1_content">
                            <div class="kt-widget4">
                                @if (count($hospitals) > 0)
                                    @foreach ($hospitals as $users)
                                        <div class="kt-widget4__item">
                                            <span
                                                class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">{{ substr(ucfirst($users->first_name), 0, 1) }}</span>
                                            <div class="kt-widget4__info">
                                                <a href="{{ route('users.show', ['user' => $users->id]) }}"
                                                    class="kt-widget4__username" title="Click to view user">
                                                    &nbsp;&nbsp;{{ $users->full_name }}
                                                </a>
                                                <p class="kt-widget4__text">
                                                    &nbsp;&nbsp; Joined on {{ $users->created_at->diffForHumans() }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="kt-widget4__item">
                                        <div class="kt-widget4__pic kt-widget4__pic--pic">
                                        </div>
                                        <div class="kt-widget4__info">
                                            No Project record found.
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <a href="{{ route('projects.index') }}" class="btn btn-label-brand btn-bold"
                                style="float: right;">View all Project</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-6 col-xl-6">
            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-6">
            <canvas id="myChart2" style="width:100%;max-width:600px"></canvas>
        </div>
    </div>
    <script>
        var xValues = ["User", "Project", "Job", "JobApply"];
        var yValues = [{{ $count['nurseCount'] }}, {{ $count['hospitalCount'] }},{{ $count['jobCount'] }}, {{ $count['jobapplyCount'] }}];
        var barColors = [
        "#b91d47",
        "#00aba9",
        "#2b5797",
        "#e8c3b9",
        ];

        new Chart("myChart", {
        type: "doughnut",
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues
            }]
        },
        options: {
            title: {
            display: true,
            text: "User and Job management Chart"
            }
        }
        });
   
    var kValues = ["User", "Project", "Job", "JobApply"];
    var lValues = [{{ $count['nurseCount'] }}, {{ $count['hospitalCount'] }},{{ $count['jobCount'] }}, {{ $count['jobapplyCount'] }}];
    var barColors = ["brown", "green","blue","orange"];

    new Chart("myChart2", {
    type: "bar",
    data: {
        labels: kValues,
        datasets: [{
        backgroundColor: barColors,
        data: lValues
        }]
    },
    options: {
        legend: {display: false},
        title: {
        display: true,
        text: "User and Job management Chart"
        }
    }
    });

</script>
   
</x-admin-layout>