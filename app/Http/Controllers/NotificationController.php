<?php
namespace App\Http\Controllers;
use App\Models\Notification;
use App\Mail\NotificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class NotificationController extends Controller
{
    public function sendNotificationEmail($id)
    {
        $notification = Notification::find($id);
        if ($notification) {
            Mail::to('recipient@example.com')->send(new NotificationMail($notification));
            return response()->json(['message' => 'Email sent successfully!'], 200);
        }
        return response()->json(['message' => 'Notification not found'], 404);
    }
}
