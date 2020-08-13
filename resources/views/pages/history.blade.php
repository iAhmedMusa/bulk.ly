@extends('layouts.app')
@section('content')
<div class="container-fluid app-body">
    <div class="card">
        <div class="card-header">
            <h5>Recent Post Sent To Buffer</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <form class="input-group" method="get" action="{{'/search'}}">
                    <div class="row">
                        <input type="text" name="search" class="form-control" placeholder="search" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="row">
                        <label for="date">Date:</label>
                        <input type="date" name="date" class="form-control">
                    </div>
                    <div class="row">
                        <label for="group">Groups</label>
                        <select name="group" class="form-control">
                            <option disabled selected>All Groups</option>
                            {{--  @foreach($groups as $group)  --}}
                                <option> Name </option>
                            {{--  @endforeach  --}}
                        </select>
                    </div>
                </form>
            </div>
            @if(count($buffer) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Group Name</th>
                        <th>Group Type</th>
                        <th>Account Name</th>
                        <th>Post Text</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buffer as $item)
                    <tr>
                        <td>{{ optional($item->groupInfo)->name }}</td>
                        <td>{{ optional($item->groupInfo)->type }}</td>
                        <td>
                            <img src="{{ optional($item->accountInfo)->avatar }}"
                                style="width: 50px; height: 50px; border-radius: 50%;">
                        </td>
                        <td>{{ $item->post_text }}</td>
                        <td>{{ $item->created_at->format('d F Y h:i e') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{ $buffer->links() }}
            </div>
            @else
            <h4 class="text-center">No data found</h4>
            @endif
        </div>
    </div>
</div>
@endsection