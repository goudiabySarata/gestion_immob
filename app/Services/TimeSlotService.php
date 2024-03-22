<?php
namespace App\Services;

use Carbon\Carbon;

class TimeSlotService
{
/**
* The start time for the time slots.
*
* @var string
*/
protected $startTime = '09:00';

/**
* The end time for the time slots.
*
* @var string
*/
protected $endTime = '17:00';

/**
* The duration of each time slot.
*
* @var int
*/
protected $duration = 30;

/**
* Generate time slots for a given day.
*
* @param string $date
* @return array
*/
public function generateTimeSlots($date)
{
    $timeSlots = [];

    $start = Carbon::createFromFormat('Y-m-d H:i', $date . ' ' . $this->startTime);
    $end = Carbon::createFromFormat('Y-m-d H:i', $date . ' ' . $this->endTime);

    while ($start < $end) {
        $timeSlots[] = [
        'start' => $start->format('H:i'),
        'end' => $start->copy()->addMinutes($this->duration)->format('H:i'),
        ];

        $start->addMinutes($this->duration);
    }

    return $timeSlots;
    }
}
