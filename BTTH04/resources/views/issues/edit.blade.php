@extends('layouts.app')

@section('content')
    <h2>Sửa Sự Cố</h2>
    <form action="{{ route('issues.update', $issue->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="computer_id">Tên máy tính:</label>
            <select name="computer_id" id="computer_id" class="form-control" required>
                <option value="">-- Chọn máy tính --</option>
                @foreach($computers as $computer)
                    <option value="{{ $computer->id }}" {{ (old('computer_id') ?? $issue->computer_id) == $computer->id ? 'selected' : '' }}>
                        {{ $computer->computer_name }} ({{ $computer->model }})
                    </option>
                @endforeach
            </select>
            @error('computer_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="reported_by">Người báo cáo sự cố:</label>
            <input type="text" name="reported_by" id="reported_by" class="form-control" value="{{ old('reported_by', $issue->reported_by) }}">
            @error('reported_by')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="reported_date">Thời gian báo cáo:</label>
            <input type="datetime-local" name="reported_date" id="reported_date" class="form-control" value="{{ old('reported_date', date('Y-m-d\TH:i', strtotime($issue->reported_date))) }}" required>
            @error('reported_date')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Mô tả chi tiết vấn đề:</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $issue->description) }}</textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="urgency">Mức độ sự cố:</label>
            <select name="urgency" id="urgency" class="form-control" required>
                <option value="">-- Chọn mức độ --</option>
                <option value="Low" {{ (old('urgency') ?? $issue->urgency) == 'Low' ? 'selected' : '' }}>Low</option>
                <option value="Medium" {{ (old('urgency') ?? $issue->urgency) == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="High" {{ (old('urgency') ?? $issue->urgency) == 'High' ? 'selected' : '' }}>High</option>
            </select>
            @error('urgency')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="status">Trạng thái hiện tại:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Open" {{ (old('status') ?? $issue->status) == 'Open' ? 'selected' : '' }}>Open</option>
                <option value="In Progress" {{ (old('status') ?? $issue->status) == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Resolved" {{ (old('status') ?? $issue->status) == 'Resolved' ? 'selected' : '' }}>Resolved</option>
            </select>
            @error('status')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Cập Nhật</button>
        <a href="{{ route('issues.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection
