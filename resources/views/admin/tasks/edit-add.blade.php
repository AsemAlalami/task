@extends("layouts.layout")

@section('page_title', isset($task->id)?'Edit task':'Create task')

@section('css')
    <style>

    </style>
@stop

@section("content")
    <div class="row">
        <div class="col-sm-12">
            <div class="element-wrapper">
                <h6 class="element-header">
                    @if(isset($task->id)) Update Task @else New Task @endif
                </h6>
                <div class="element-box">
                    <form role="form"
                          class="form-edit-add"
                          action="@if(isset($task->id)){{ route('tasks.update', $task) }}@else{{ route('tasks.store') }}@endif"
                          method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                    @if(isset($task->id))
                        {{ method_field("PUT") }}
                    @endif

                    <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" name="name" placeholder="Name"
                                   value="@if(isset($task->id)){{ old('name', $task->name) }}@else{{ old('name') }}@endif"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>List</label>
                            <input class="form-control" type="text" name="list" placeholder="List"
                                   value="@if(isset($task->id)){{ old('list', $task->list) }}@else{{ old('list') }}@endif"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Due to</label>
                            <input class="form-control" type="date" name="due"
                                   value="@if(isset($task->id)){{ old('due', $task->due->format('Y-m-d')) }}@else{{ old('due') }}@endif"
                                   required>
                        </div>

                        @if(isset($task->id))
                            <div class="form-group">
                                <input type="checkbox" name="archived" @if($task->archived) checked @endif">
                                <label>Archived</label>
                            </div>
                        @endif

                        <div class="form-group">
                            <label>Notes</label>
                            <textarea class="form-control" name="notes"
                                      placeholder="Notes">@if(isset($task->id)){{ old('notes', $task->notes) }}@else{{ old('notes') }}@endif</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary save">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop