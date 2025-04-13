@extends('admin.layouts.app')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h5 class="text-dark font-weight-bold my-1 mr-5">
                        {{ str_replace("-", " ", ucfirst($type)) }} Management
                    </h5>
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.home') }}" class="text-muted">Dashboard</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <form action="{{ route('admin.lookup.index', $type) }}" method="get" class="mws-form" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card card-custom card-stretch card-shadowless">
                            <div class="card-header">
                                <div class="card-title"></div>
                                <div class="card-toolbar">
                                    <a href="javascript:void(0);" class="btn btn-primary dropdown-toggle mr-2" data-toggle="collapse" data-target="#collapseOne6">
                                        Search
                                    </a>
                                    <a href="{{ route('admin.lookup.add', $type) }}" class="btn btn-primary"> {{ trans("Add New") }} {{ str_replace("-", " ", ucfirst($type)) }}</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="accordion accordion-solid accordion-toggle-plus" id="accordionExample6">
                                    <div id="collapseOne6" class="collapse {{ !empty($searchVariable) ? 'show' : '' }}" data-parent="#accordionExample6">
                                        <div>
                                            <div class="row mb-6">
                                                <div class="col-lg-3 mb-lg-5 mb-6">
                                                    <label>Code</label>
                                                    <input type="text" class="form-control" name="code" placeholder="Code" value="{{ $searchVariable['code'] ?? '' }}">
                                                </div>
                                            </div>
                                            <div class="row mt-8">
                                                <div class="col-lg-12">
                                                    <button class="btn btn-primary btn-primary--icon" id="kt_search">
                                                        <span>
                                                            <i class="la la-search"></i>
                                                            <span>Search</span>
                                                        </span>
                                                    </button>
                                                    &nbsp;&nbsp;
                                                    <a href="{{ route('admin.lookup.index', $type) }}" class="btn btn-secondary btn-secondary--icon">
                                                        <span>
                                                            <i class="la la-close"></i>
                                                            <span>Clear Search</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                                <div class="dataTables_wrapper">
                                    <div class="table-responsive">
                                        <table class="table dataTable table-head-custom table-head-bg table-borderless table-vertical-center" id="taskTable">
                                            <thead>
                                                <tr class="text-uppercase">
                                                    <th class="{{ (($sortBy == 'code' && $order == 'desc') ? 'sorting_desc' : (($sortBy == 'code' && $order == 'asc') ? 'sorting_asc' : 'sorting')) }}">
                                                        <a href="{{ route('admin.lookup.index', $type, array('sortBy' => 'code', 'order' => ($sortBy == 'code' && $order == 'desc') ? 'asc' : 'desc', $query_string)) }}">Code</a>
                                                    </th>
                                                    <th class="{{ (($sortBy == 'created_at' && $order == 'desc') ? 'sorting_desc' : (($sortBy == 'created_at' && $order == 'asc') ? 'sorting_asc' : 'sorting')) }}">
                                                        <a href="{{ route('admin.lookup.index', $type, array('sortBy' => 'created_at', 'order' => ($sortBy == 'created_at' && $order == 'desc') ? 'asc' : 'desc', $query_string)) }}">Created On</a>
                                                    </th>
                                                    <th class="{{ (($sortBy == 'is_active' && $order == 'desc') ? 'sorting_desc' : (($sortBy == 'is_active' && $order == 'asc') ? 'sorting_asc' : 'sorting')) }}">
                                                        <a href="{{ route('admin.lookup.index', $type, array('sortBy' => 'is_active', 'order' => ($sortBy == 'is_active' && $order == 'desc') ? 'asc' : 'desc', $query_string)) }}">Status</a>
                                                    </th>
                                                    <th class="text-right">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(!$results->isEmpty())
                                                    @foreach($results as $result)
                                                        <tr>
                                                            <td>
                                                                <div class="text-dark-75 mb-1 font-size-lg">
                                                                    {{ $result->code }}
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-dark-75 mb-1 font-size-lg">
                                                                    {{ date(config("Reading.date_format"), strtotime($result->created_at)) }}
                                                                </div>
                                                            </td>
                                                            <td>
                                                                @if($result->is_active == 1)
                                                                    <span class="label label-lg label-light-success label-inline">Activated</span>
                                                                @else
                                                                    <span class="label label-lg label-light-danger label-inline">Deactivated</span>
                                                                @endif
                                                            </td>
                                                            {{-- <td class="text-right pr-2">
                                                                @if($result->is_active == 1)
                                                                    <a title="Click To Deactivate" href="{{ route($model . '.status', array($result->id, 1)) }}" class="btn btn-icon btn-light btn-hover-danger btn-sm">
                                                                        <span class="svg-icon svg-icon-md svg-icon-danger">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24">
                                                                                <g fill="none" stroke="none" fill-rule="evenodd">
                                                                                    <path d="M0 0h24v24H0z" fill="none"/>
                                                                                    <path d="M12 4.75L17.25 10H6.75z" fill="#000000"/>
                                                                                </g>
                                                                            </svg>
                                                                        </span>
                                                                    </a>
                                                                @else
                                                                    <a title="Click To Activate" href="{{ route($model . '.status', array($result->id, 0)) }}" class="btn btn-icon btn-light btn-hover-success btn-sm">
                                                                        <span class="svg-icon svg-icon-md svg-icon-success">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24">
                                                                                <g fill="none" stroke="none" fill-rule="evenodd">
                                                                                    <path d="M0 0h24v24H0z" fill="none"/>
                                                                                    <path d="M12 4.75L17.25 10H6.75z" fill="#000000"/>
                                                                                </g>
                                                                            </svg>
                                                                        </span>
                                                                    </a>
                                                                @endif
                                                                {{-- <a href="{{ route($model . '.edit', array($type, base64_encode($result->id))) }}" class="btn btn-icon btn-light btn-hover-primary btn-sm" title="Edit">
                                                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24">
                                                                            <g fill="none" stroke="none" fill-rule="evenodd">
                                                                                <path d="M0 0h24v24H0z" fill="none"/>
                                                                                <path d="M12 4.75L17.25 10H6.75z" fill="#000000"/>
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                </a>
                                                                <a href="{{ route($model . '.delete', ['enlokid' => base64_encode($result->id)]) }}" class="btn btn-icon btn-light btn-hover-danger btn-sm" title="Delete">
                                                                    <span class="svg-icon svg-icon-md svg-icon-danger">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24">
                                                                            <g fill="none" stroke="none" fill-rule="evenodd">
                                                                                <path d="M0 0h24v24H0z" fill="none"/>
                                                                                <path d="M12 4.75L17.25 10H6.75z" fill="#000000"/>
                                                                            </g>
                                                                        </svg>
                                                                    </span>
                                                                </a> --}}
                                                            </td> --}}
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="4">No Data Available</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="pagination pagination-primary">
                                        {{ $results->appends(request()->query())->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
