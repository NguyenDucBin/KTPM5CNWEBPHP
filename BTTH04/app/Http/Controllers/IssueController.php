<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Computer;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Hiển thị danh sách các sự cố với phân trang.
     */
    public function index()
    {
        $issues = Issue::with('computer')->orderBy('reported_date', 'asc')->paginate(10);
        return view('issues.index', compact('issues'));
    }

    /**
     * Hiển thị form tạo mới sự cố. 
     */
    public function create()
    {
        $computers = Computer::where('available', true)->get();
        return view('issues.create', compact('computers'));
    }

    /**
     * Lưu sự cố mới vào cơ sở dữ liệu.
     */
    public function store(Request $request)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'nullable|string|max:50',
            'reported_date' => 'required|date',
            'description' => 'required|string',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        Issue::create($request->all());

        return redirect()->route('issues.index')->with('success', 'Sự cố đã được thêm mới thành công.');
    }

    /**
     * Hiển thị form chỉnh sửa sự cố.
     */
    public function edit(Issue $issue)
    {
        $computers = Computer::where('available', true)->get();
        return view('issues.edit', compact('issue', 'computers'));
    }

    /**
     * Cập nhật sự cố vào cơ sở dữ liệu.
     */
    public function update(Request $request, Issue $issue)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'nullable|string|max:50',
            'reported_date' => 'required|date',
            'description' => 'required|string',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        $issue->update($request->all());

        return redirect()->route('issues.index')->with('success', 'Sự cố đã được cập nhật thành công.');
    }

    /**
     * Xóa sự cố khỏi cơ sở dữ liệu.
     */
    public function destroy(Issue $issue)
    {
        $issue->delete();
        return redirect()->route('issues.index')->with('success', 'Sự cố đã được xóa thành công.');
    }
}
