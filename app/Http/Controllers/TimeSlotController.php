<?php

namespace App\Http\Controllers;

use App\Patient;
use App\TimeSlot;
use Illuminate\Http\Request;
use DateTime;
use Exception;

class TimeSlotController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(
            TimeSlot::all()
        );
    }

    public function show(int $id)
    {
        return response()->json((TimeSlot::query()->with(['patient', 'provider'])->find($id)));
    }

    public function getAvailabilities(Request $request)
    {
        $startDate = $request->get('startDate') ?? null;
        $endDate = $request->get('endDate') ?? null;
        $startDateTime = 0;
        $endDateTime = PHP_INT_MAX;

        if ($startDate) {
            try {
                $startDateTime = (new DateTime($startDate))->getTimestamp();
            } catch (Exception $e) {
                $startDateTime = 0;
            }
        }

        if ($endDate) {
            try {
                // This was a bit questionable, but if someone puts the same start date and
                // end date I wanted it to return the ones between midnight on the first day
                // to midnight on the day after
                $endDateTime = (new DateTime($endDate))->modify('+24 hours')->getTimestamp();
            } catch (Exception $e) {
                $endDateTime = PHP_INT_MAX;
            }
        }

        // Assuming the time interval the patient gives is for when the appointment STARTS
        return response()->json(
            TimeSlot::query()
                ->with(['patient', 'provider'])
                ->where('startDateTime', '>=', $startDateTime)
                ->where('startDateTime', '<=', $endDateTime)
                ->whereNull('patientId')
                ->get()
        );
    }

    public function getAppointments()
    {
        return response()->json(
            TimeSlot::query()
                ->with(['patient', 'provider'])
                ->whereNotNull('patientId')
                ->get()
        );
    }

    public function book(Request $request)
    {
        $patientUid = $request->get('patientUid');
        $availabilityId = $request->get('availabilityId');

        $patient = Patient::query()->where('uid', '=', $patientUid)->firstOrFail();

        $availability = TimeSlot::query()->findOrFail($availabilityId);

        if (isset($availability->patientId)) {
            abort(404, 'Availability already taken by another patient.');
        }

        $availability->patientId = $patient->id;
        $availability->save();

        return response()->json(['success' => 'success'], 200);
    }


}
