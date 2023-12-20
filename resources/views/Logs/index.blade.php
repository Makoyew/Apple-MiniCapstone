@extends('base')

@include('navbar')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1 class="mb-0 text-white">Coffee Shop Log History</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover" style="background-color: #F5F5F5;">
            <thead class="thead-dark" style="background-color: #8B4513; color: white;">
                <tr>
                    <th class="text-center">Timestamp</th>
                    <th class="text-center">Log Entry</th>
                </tr>
            </thead>
            <tbody>
                @if ($logEntries->isEmpty())
                    <tr>
                        <td colspan="2" class="text-center" style="color: #8B4513;">No log entries found.</td>
                    </tr>
                @else
                    @foreach ($logEntries as $logEntry)
                        <tr>
                            <td class="text-center">{{ $logEntry->formattedCreatedAt }}</td>
                            <td class="text-center">{{ $logEntry->log_entry }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
