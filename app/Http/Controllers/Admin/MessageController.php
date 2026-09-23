<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

class MessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->get();

        return view(
            'admin.messages.index',
            compact('messages')
        );
    }


    public function show(ContactMessage $message)
    {
        if (!$message->is_read) {
            $message->update([
                'is_read' => true,
            ]);
        }

        return view(
            'admin.messages.show',
            compact('message')
        );
    }


    public function destroy(ContactMessage $message)
    {
        $message->delete();

        return redirect()
            ->route('admin.messages.index')
            ->with(
                'success',
                'Message deleted successfully.'
            );
    }
}