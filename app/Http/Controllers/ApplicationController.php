<?php

namespace App\Http\Controllers;

use App\Filters\ApplicationFilter;
use App\Http\Resources\ApplicantResource;
use App\Models\Application;
use App\Models\InterviewInfo;
use App\Models\Position;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function cvdeck(ApplicationFilter $filter)
    {
        $applications =  Application::cvdeck()->filter($filter)->get();
        $positions=Position::orderBy('name','desc')->pluck('name','slug');
        return view('admin.application.cvdeck', compact('applications','positions'));
    }
    public function screening(ApplicationFilter $filter)
    {
        $applications =  Application::screening()->filter($filter)->get();
        $positions=Position::orderBy('name','desc')->pluck('name','slug');
        return view('admin.application.screening', compact('applications','positions'));
    }
    public function interview(ApplicationFilter $filter)
    {
        $applications =  Application::interview()->filter($filter)->get();
        $positions=Position::orderBy('name','desc')->pluck('name','slug');
        return view('admin.application.interview', compact('applications','positions'));
    }
    public function shortlisted(ApplicationFilter $filter)
    {
        $applications =  Application::shortlisted()->filter($filter)->get();
        $positions=Position::orderBy('name','desc')->pluck('name','slug');
        return view('admin.application.shortlisted', compact('applications','positions'));
    }
    public function offer(ApplicationFilter $filter)
    {
        $applications =  Application::offer()->filter($filter)->get();
        $positions=Position::orderBy('name','desc')->pluck('name','slug');
        return view('admin.application.offer', compact('applications','positions'));
    }
    public function hire(ApplicationFilter $filter)
    {
        $applications =  Application::hire()->filter($filter)->get();
        $positions=Position::orderBy('name','desc')->pluck('name','slug');
        $title="Hire List";
        return view('admin.application.hire', compact('applications','title','positions'));
    }
    public function reject(ApplicationFilter $filter)
    {
        $applications =  Application::reject()->filter($filter)->get();
        $positions=Position::orderBy('name','desc')->pluck('name','slug');
        return view('admin.application.reject', compact('applications','positions'));
    }

    public function show($applicant)
    {
        return new ApplicantResource(Application::findOrFail($applicant));
    }

    public function applicantStatus($applicant, $status, Request $request)
    {
        $application = Application::findOrFail($applicant);
        $application->status=$status;

        if ($status == config('vacancy.application.interview')) {
            $application->interview = date('Y-m-d h:i:s');
            $this->storeInterviewInfo($application->id, $request);
        }
        $application->save();

        $requiredEmployeeState = "";
        if ($status == config('vacancy.application.hire')) {
            if ($application->vacancy->hire_count < $application->vacancy->required_employee) {

                $requiredEmployeeState = $application->vacancy->required_employee - $application->vacancy->hire_count . " <strong>" . $application->position->name . " </strong> ( ".$application->vacancy->location->name . " ) still need to be appointed.";

            } elseif ($application->vacancy->hire_count == $application->vacancy->required_employee) {

                $requiredEmployeeState = "The number of " . $application->position->name . " to be appointed has been filed.";
            }
        }

        return redirect()->back()->with('success', 'Updated')->with('requiredEmployeeState', $requiredEmployeeState);
    }
    private function storeInterviewInfo($applicationId, Request $request)
    {
        $interviewInfo = new InterviewInfo();
        $interviewInfo->application_id = $applicationId;
        $interviewInfo->date = $request->interview;
        $interviewInfo->from = $request->from;
        $interviewInfo->to = $request->to;
        return $interviewInfo->save();
    }
}
