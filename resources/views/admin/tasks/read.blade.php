@extends("layouts.layout")

@section('page_title', 'Task - ' . $task->name)

@section('css')
    <style>

    </style>
@stop

@section("content")
    <div class="row">
        <div class="col-sm-12">
            <div class="element-wrapper">
                <h6 class="element-header">
                    Task - {{ $task->name }}
                </h6>
                <div class="element-box">
                    <h6>Primary Key</h6>
                    <p>{{ $task->pkey }}</p>
                    <hr>
                    <h6>Name</h6>
                    <p>{{ $task->name }}</p>
                    <hr>
                    <h6>List</h6>
                    <p>{{ $task->list }}</p>
                    <hr>
                    <h6>Account</h6>
                    <p>{{ $task->account }}</p>
                    <hr>
                    <h6>Archived</h6>
                    <p>@if($task->archived) archived @else not archived @endif</p>
                    <hr>
                    <h6>Created at</h6>
                    <p>{{ $task->created }}</p>
                    <hr>
                    <h6>Due to</h6>
                    <p>{{ $task->due->format('Y-m-d') }}</p>
                    <hr>
                    @if($task->status)
                    <h6>Status</h6>
                    <p>{{ $task->status }}</p>
                    <hr>
                    @endif
                    @if($task->user_id)
                    <h6>User</h6>
                    <p>{{ $task->user_id }}</p>
                    <hr>
                    @endif
                    @if($task->inquiry_id)
                    <h6>Inquiry</h6>
                    <p>{{ $task->inquiry_id }}</p>
                    <hr>
                    @endif
                    <h6>Notes</h6>
                    <p>@if($task->notes) {{ $task->notes }} @else no notes @endif</p>
                </div>
            </div>
        </div>
    </div>
@stop