<?php
namespace App\Console;
use App\Models\Notification;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $notifications = Notification::where('send_at', '<=', now())->where('sent', false)->get();
            foreach ($notifications as $notification) {
                Mail::to('recipient@example.com')->send(new NotificationMail($notification));
                $notification->sent = true;
                $notification->save();
            }
        })->everyMinute();
    }
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
