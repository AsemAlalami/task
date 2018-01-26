@extends("layouts.layout")
@section("content")
    <div class="row">
        <div class="col-sm-12">
            <div class="element-wrapper">
                <h6 class="element-header">
                    Dashboard
                </h6>
                <div class="element-content">
                    <div class="row">
                        <div class="col-sm-4">
                            <a class="element-box el-tablo">
                                <div class="label">
                                    Users
                                </div>
                                <div class="value">
                                    {{ $users_count }}
                                </div>
                                <div class="trending trending-up-basic">
                                    <span>12%</span><i class="os-icon os-icon-arrow-up2"></i>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a class="element-box el-tablo" href="{{ route('tasks.index', ['archived' => 1]) }}">
                                <div class="label">
                                    Archived Tasks
                                </div>
                                <div class="value">
                                    {{ $archived_tasks_count }}
                                </div>
                                <div class="trending trending-down-basic">
                                    <span>{{ round($archived_tasks_count/$tasks_count*100, 2) }}%</span><i
                                            class="os-icon os-icon-arrow-down"></i>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a class="element-box el-tablo" href="{{ route('tasks.index', ['archived' => 0]) }}">
                                <div class="label">
                                    Unarchived Tasks
                                </div>
                                <div class="value">
                                    {{ $unarchived_tasks_count }}
                                </div>
                                <div class="trending trending-down-basic">
                                    <span>{{ round($unarchived_tasks_count/$tasks_count*100) }}%</span><i
                                            class="os-icon os-icon-arrow-down"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <div class="element-wrapper">
                <h6 class="element-header">
                    New Tasks
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
                                <th>
                                    Created At
                                </th>
                                <th>
                                    Due To
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($new_tasks as $task)
                                <tr>
                                    <td>
                                        {{ $task->name }}
                                    </td>
                                    <td>
                                        {{ $task->list }}
                                    </td>
                                    <td>
                                        {{ $task->created }}
                                    </td>
                                    <td>
                                        {{ $task->due->format('Y-m-d') }}
                                    </td>
                                </tr>
                                <tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop