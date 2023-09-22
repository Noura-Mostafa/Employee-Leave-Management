<?php

namespace App\Listeners;

use App\Events\RequestResponse;
use App\Models\LeaveRequest;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\RequestResponseNotification;

class SendNotificationToMember
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
    public function handle(RequestResponse $event): void
    {
        $employees = $event->leaveRequest->user()->where('role' , 'employee')->get();

        foreach ($employees as $employee) {
            $employee->notify(new RequestResponseNotification($event->leaveRequest));
        }
    }
}
