<?php

namespace App\Listeners;

use App\Models\User;
use App\Models\LeaveRequest;
use App\Events\RequestCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\RequestCreatedNotification;

class SendNotificationToAdmin
{
    /**
     * Create the event listener.
     */
    public function __construct(public LeaveRequest $leaveRequest)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RequestCreated $event): void
    {
        $admins = User::where('role' , 'admin')->get();
        
        foreach ($admins as $admin) {
            $admin->notify(new RequestCreatedNotification($event->leaveRequest));
        }
        
    }
}
