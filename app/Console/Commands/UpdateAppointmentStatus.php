<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\Appointment;

class UpdateAppointmentStatus extends Command
{
    //Geçmiş Randevuları Kontrol etmek için

    protected $signature = 'appointments:update-status';
    protected $description = 'Update the status of past appointments';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $now = Carbon::now();

        Appointment::where('date', '<', $now->format('Y-m-d'))
            ->orWhere(function($query) use ($now) {
                $query->where('date', $now->format('Y-m-d'))
                    ->where('time', '<', $now->format('H:i'));
            })
            ->update(['active' => 0]);

        $this->info('Appointment statuses updated successfully.');
    }
}
