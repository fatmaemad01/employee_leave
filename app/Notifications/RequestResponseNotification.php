<?php

namespace App\Notifications;

use App\Models\LeaveRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;

class RequestResponseNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(protected LeaveRequest $leaveRequest)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [
            'database',
            'mail',
            // 'broadcast'
        ];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $leaveRequest = $this->leaveRequest;

        $content =  __('Your :type request was :status by:name', [
            'name'  => $leaveRequest->approver->first_name . ' ' . $leaveRequest->approver->last_name,
            'type' => __($leaveRequest->leave_type->name),
            'status' => __($leaveRequest->status)
        ]);


        return (new MailMessage)
            ->subject(__('Response of your :type Request', ['type' => $leaveRequest->type]))
            ->greeting(__('Hi :name', ['name' => $notifiable->first_name]))
            ->line($content)
            ->line('Hope good day for you ♥!');
    }

    public function toDatabase(object $notifiable): DatabaseMessage
    {
        $leaveRequest = $this->leaveRequest;

        $content =  __('Your :type request was :status by :name', [
            'name'  => $leaveRequest->approver->first_name . ' ' . $leaveRequest->approver->last_name,
            'type' => __($leaveRequest->leave_type->name),
            'status' => __($leaveRequest->status)
        ]);


        return (new DatabaseMessage([
            'title' => __(' :type Request :status', ['type' => $leaveRequest->type, 'status' => $leaveRequest->status]),
            'body' => $content,
            'link' =>  route('user.employee', Auth::id()),
            'request_id' => $leaveRequest->id
        ]));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
