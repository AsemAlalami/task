@extends("layouts.layout")

@section('page_title', 'Tasks')

@section('css')

@stop

@section("content")
    <div class="row">
        <div class="col-sm-12">
            <div class="element-wrapper">
                <h6 class="element-header">
                    Tasks
                    <a href="{{ route('tasks.create') }}" class="btn btn-success" style="margin-left: 50px">
                        <i class="os-icon os-icon-common-03"></i><span>New</span>
                    </a>
                    <a href="{{ route('tasks.fetch') }}" onclick="show_loader()" class="btn btn-primary fetch"
                       style="margin-left: 10px">
                        <i class="os-icon os-icon-link-3"></i><span>Fetch From Server</span>
                    </a>
                </h6>
                <div class="element-box">
                    <div class="table-responsive">
                        <table class="table table-lightborder">
                            <thead>
                            <tr>
                                <th>
                                    Name
                                </th>
                                <th>
                                    List
                                </th>
                                <th class="text-center">
                                    Archived
                                </th>
                                <th>
                                    Created
                                </th>
                                <th>
                                    Due
                                </th>
                                <th>
                                    Operations
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td class="nowrap">
                                        {{ $task->name }}
                                    </td>
                                    <td>
                                        {{ $task->list }}
                                    </td>
                                    <td class="text-center">
                                        <div class="status-pill @if($task->archived) green @else red @endif"
                                             data-title="@if($task->archived) Archived @else Unarchived @endif"
                                             data-toggle="tooltip"></div>
                                    </td>
                                    <td>
                                        {{ $task->created }}
                                    </td>
                                    <td>
                                        {{ $task->due->format('Y-m-d') }}
                                    </td>
                                    <td>
                                        <a href="{{ route('tasks.show', $task) }}" title="Show"
                                           class="btn btn-sm btn-success pull-right">
                                            <i class="os-icon os-icon-ui-07"></i> <span
                                                    class="hidden-xs hidden-sm">Show</span>
                                        </a>

                                        <a href="{{ route('tasks.edit', $task) }}" title="Edit"
                                           class="btn btn-sm btn-primary pull-right">
                                            <i class="os-icon os-icon-ui-49"></i> <span
                                                    class="hidden-xs hidden-sm">Edit</span>
                                        </a>

                                        <a href="javascript:;" onclick="delete_task(this)" title="Delete"
                                           class="btn btn-sm btn-danger pull-right" data-id="{{ $task->id }}"
                                           id="delete-{{ $task->id }}">
                                            <i class="os-icon os-icon-ui-15"></i> <span class="hidden-xs hidden-sm">Delete</span>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="controls-below-table">
                    <div class="table-records-info">
                        All records {{ $tasks->total() }}
                    </div>
                    <div class="table-records-pages">
                        {{ $tasks->appends(['archived'=>@$_GET['archived']])->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Delete modal --}}
    <div class="modal modal-danger fade" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i
                                class="os-icon os-icon-ui-15"></i>Are you sure?</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('tasks.index') }}" id="delete_form" method="POST">
                        {{ method_field("DELETE") }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                               value="delete task">
                    </form>
                    <button type="button" class="btn btn-default pull-right"
                            data-dismiss="modal">cancel
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Modal -->
    <div id="loading" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" style="position: absolute;margin: auto;top: 0;bottom: 0;left: 0;right: 0;">

            <div id="loader" style="    position: absolute;left: 50%;top: 50%;">
                <svg width="80px" height="80px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"
                     preserveAspectRatio="xMidYMid" class="lds-ellipsis">
                    <!--circle(cx="16",cy="50",r="10")-->
                    <circle cx="84" cy="50" r="0" fill="#c0f6d2">
                        <animate attributeName="r" values="11;0;0;0;0" keyTimes="0;0.25;0.5;0.75;1"
                                 keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline" dur="1s"
                                 repeatCount="indefinite" begin="0s"></animate>
                        <animate attributeName="cx" values="84;84;84;84;84" keyTimes="0;0.25;0.5;0.75;1"
                                 keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline" dur="1s"
                                 repeatCount="indefinite" begin="0s"></animate>
                    </circle>
                    <circle cx="40.0957" cy="50" r="11" fill="#ff7c81">
                        <animate attributeName="r" values="0;11;11;11;0" keyTimes="0;0.25;0.5;0.75;1"
                                 keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline" dur="1s"
                                 repeatCount="indefinite" begin="-0.5s"></animate>
                        <animate attributeName="cx" values="16;16;50;84;84" keyTimes="0;0.25;0.5;0.75;1"
                                 keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline" dur="1s"
                                 repeatCount="indefinite" begin="-0.5s"></animate>
                    </circle>
                    <circle cx="16" cy="50" r="7.79567" fill="#fac090">
                        <animate attributeName="r" values="0;11;11;11;0" keyTimes="0;0.25;0.5;0.75;1"
                                 keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline" dur="1s"
                                 repeatCount="indefinite" begin="-0.25s"></animate>
                        <animate attributeName="cx" values="16;16;50;84;84" keyTimes="0;0.25;0.5;0.75;1"
                                 keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline" dur="1s"
                                 repeatCount="indefinite" begin="-0.25s"></animate>
                    </circle>
                    <circle cx="84" cy="50" r="3.20433" fill="#ffffcb">
                        <animate attributeName="r" values="0;11;11;11;0" keyTimes="0;0.25;0.5;0.75;1"
                                 keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline" dur="1s"
                                 repeatCount="indefinite" begin="0s"></animate>
                        <animate attributeName="cx" values="16;16;50;84;84" keyTimes="0;0.25;0.5;0.75;1"
                                 keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline" dur="1s"
                                 repeatCount="indefinite" begin="0s"></animate>
                    </circle>
                    <circle cx="74.0957" cy="50" r="11" fill="#c0f6d2">
                        <animate attributeName="r" values="0;0;11;11;11" keyTimes="0;0.25;0.5;0.75;1"
                                 keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline" dur="1s"
                                 repeatCount="indefinite" begin="0s"></animate>
                        <animate attributeName="cx" values="16;16;16;50;84" keyTimes="0;0.25;0.5;0.75;1"
                                 keySplines="0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1;0 0.5 0.5 1" calcMode="spline" dur="1s"
                                 repeatCount="indefinite" begin="0s"></animate>
                    </circle>
                </svg>
            </div>

        </div>
    </div>
@stop

@section('js')
    <script>
        var deleteFormAction;

        function delete_task(elm) {
            var form = $('#delete_form')[0];

            if (!deleteFormAction) { // Save form action initial value
                deleteFormAction = form.action;
            }

            form.action = deleteFormAction.match(/\/[0-9]+$/)
                ? deleteFormAction.replace(/([0-9]+$)/, $(this).data('id'))
                : deleteFormAction + '/' + $(elm).data('id');

            $('#delete_modal').modal('show');
        }

        function show_loader() {
            $('#loading').modal('show');
        }

    </script>
@stop