<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'service' => 'nullable|string|max:100',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ], [
            'name.required' => 'الاسم مطلوب',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'البريد الإلكتروني غير صحيح',
            'subject.required' => 'موضوع الرسالة مطلوب',
            'message.required' => 'تفاصيل المشروع مطلوبة',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'يرجى تصحيح الأخطاء المشار إليها.');
        }

        try {
            ContactRequest::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'service_type' => $request->service,
                'subject' => $request->subject,
                'message' => $request->message,
                'status' => 'pending'
            ]);

            return back()->with('success', 'تم إرسال رسالتك بنجاح! سنتواصل معك في أقرب وقت.');
            
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'حدث خطأ في إرسال الرسالة. يرجى المحاولة مرة أخرى.');
        }
    }
}
