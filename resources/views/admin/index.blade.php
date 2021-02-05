@extends('admin.layouts.app')
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="#">{{__('lang.panel')}}</a></li>
@endsection
@section('title')
    {{__('lang.panel')}}
@endsection
@section('content')
    <style>
        .card-body{
            min-height: 135px;
        }
        .text-bold{
            font-weight: bold;
        }
    </style>
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">

            <div class="col-xl-3 col-sm-6" style="padding: 3px">
                <div class="card">
                    <div class="card-body widget-style-2">
                        <div class="media">
                            <div class="media-body align-self-center">
                                <h2 class="my-0"><span data-plugin="counterup">{{\App\Models\Admin::count()}}</span></h2>
                                <p class="text-bold mb-0"> {{__('lang.admins')}}</p>
                            </div>
                            <i class="fa fa-users text-primary bg-"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6" style="padding: 3px">
                <div class="card">
                    <div class="card-body widget-style-2">
                        <div class="media">
                            <div class="media-body align-self-center">
                                <h2 class="my-0"><span data-plugin="counterup">{{\App\Models\Group::count()}}</span></h2>
                                <p class="text-bold mb-0">{{__('lang.groups')}}</p>
                            </div>
                            <i class="fa fa-user-secret text-primary bg-"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6" style="padding: 3px">
                <div class="card">
                    <div class="card-body widget-style-2">
                        <div class="media">
                            <div class="media-body align-self-center">
                                <h2 class="my-0"><span data-plugin="counterup">{{\App\Models\Task::count()}}</span></h2>
                                <p class="text-bold mb-0">{{__('lang.tasks')}}</p>
                            </div>
                            <i class="fa fa-list text-primary bg-"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6" style="padding: 3px">
                <div class="card">
                    <div class="card-body widget-style-2">
                        <div class="media">
                            <div class="media-body align-self-center">
                                <h2 class="my-0"><span data-plugin="counterup">{{\App\Models\Attachment::count()}}</span></h2>
                                <p class="text-bold mb-0">{{__('lang.attachments')}}</p>
                            </div>
                            <i class="fa fa-file-text text-primary bg-"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end container-fluid -->
@endsection
