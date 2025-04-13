<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use App\Http\Requests\EmailTemplateRequest;
use Illuminate\Http\Request;

class EmailTemplateController extends Controller
{
    public function index(Request $request)
    {
        $query = EmailTemplate::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        $emailTemplates = $query->paginate(10);
        return view('admin.email-templates.index', compact('emailTemplates'));
    }

    public function create()
    {
        return view('admin.email-templates.create');
    }

    public function store(EmailTemplateRequest $request)
    {
        try {
            // Filter out empty values from variables array
            $variables = array_filter($request->variables ?? [], function($value) {
                return !empty(trim($value));
            });

            EmailTemplate::create([
                'name' => $request->name,
                'subject' => $request->subject,
                'content' => $request->content,
                'variables' => $variables,
                'is_active' => true,
            ]);

            return redirect()->route('admin.email-templates.index')
                ->with('success', 'Email template created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to create email template. Please try again.');
        }
    }

    public function edit($id)
    {
        $emailTemplate = EmailTemplate::findOrFail($id);
        return view('admin.email-templates.edit', compact('emailTemplate'));
    }

    public function update(EmailTemplateRequest $request, $id)
    {
        try {
            $emailTemplate = EmailTemplate::findOrFail($id);
            
            // Filter out empty values from variables array
            $variables = array_filter($request->variables ?? [], function($value) {
                return !empty(trim($value));
            });

            $emailTemplate->update([
                'name' => $request->name,
                'subject' => $request->subject,
                'content' => $request->content,
                'variables' => $variables,
            ]);

            return redirect()->route('admin.email-templates.index')
                ->with('success', 'Email template updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update email template. Please try again.');
        }
    }

    public function destroy($id)
    {
        try {
            $emailTemplate = EmailTemplate::findOrFail($id);
            $emailTemplate->delete();

            return redirect()->route('admin.email-templates.index')
                ->with('success', 'Email template deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to delete email template. Please try again.');
        }
    }

    public function show($id)
    {
        $emailTemplate = EmailTemplate::findOrFail($id);
        return view('admin.email-templates.show', compact('emailTemplate'));
    }

    public function toggleStatus($id)
    {
        $emailTemplate = EmailTemplate::findOrFail($id);
        $emailTemplate->update(['is_active' => !$emailTemplate->is_active]);

        return redirect()->back()
            ->with('success', 'Email template status updated successfully.');
    }

    public function preview($id)
    {
        $emailTemplate = EmailTemplate::findOrFail($id);
        return view('admin.email-templates.preview', compact('emailTemplate'));
    }
}