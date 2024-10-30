<div class="box box--stacked flex flex-col px-5 pb-6 pt-5">
    <a href="{{ route('hrms.company') }}" class="{{ Request::is('dashboard/hrms/company/show*') ? 'active' : '' }} flex items-center py-3 first:-mt-3 last:-mb-3 [&amp;.active]:text-primary [&amp;.active]:font-medium hover:text-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-building-2 mr-2"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/></svg>
        Profile Info
    </a>
    <a href="{{ route('hrms.applicants') }}" class="{{ Request::is('dashboard/hrms/applicants') ? 'active' : '' }} flex items-center py-3 first:-mt-3 last:-mb-3 [&amp;.active]:text-primary [&amp;.active]:font-medium hover:text-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text mr-2"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>
        Applicant
    </a>
    <a href="{{ route('hrms.branch') }}" class="{{ Request::is('dashboard/hrms/branch*') ? 'active' : '' }} flex items-center py-3 first:-mt-3 last:-mb-3 [&amp;.active]:text-primary [&amp;.active]:font-medium hover:text-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-git-branch-plus mr-2"><path d="M6 3v12"/><path d="M18 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/><path d="M6 21a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/><path d="M15 6a9 9 0 0 0-9 9"/><path d="M18 15v6"/><path d="M21 18h-6"/></svg>
        Branch
    </a>
    <a href="{{ route('hrms.currency') }}" class="{{ Request::is('dashboard/hrms/currency*') ? 'active' : '' }} flex items-center py-3 first:-mt-3 last:-mb-3 [&amp;.active]:text-primary [&amp;.active]:font-medium hover:text-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wallet mr-2"><path d="M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1"/><path d="M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4"/></svg>
        Currency
    </a>
    <a href="{{ route('hrms.designation') }}" class="{{ Request::is('dashboard/hrms/designation*') ? 'active' : '' }} flex items-center py-3 first:-mt-3 last:-mb-3 [&amp;.active]:text-primary [&amp;.active]:font-medium hover:text-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin-house mr-2"><path d="M15 22a1 1 0 0 1-1-1v-4a1 1 0 0 1 .445-.832l3-2a1 1 0 0 1 1.11 0l3 2A1 1 0 0 1 22 17v4a1 1 0 0 1-1 1z"/><path d="M18 10a8 8 0 0 0-16 0c0 4.993 5.539 10.193 7.399 11.799a1 1 0 0 0 .601.2"/><path d="M18 22v-3"/><circle cx="10" cy="10" r="3"/></svg>
        Designation
    </a>
    <a href="{{ route('hrms.department') }}" class="{{ Request::is('dashboard/hrms/department*') ? 'active' : '' }} flex items-center py-3 first:-mt-3 last:-mb-3 [&amp;.active]:text-primary [&amp;.active]:font-medium hover:text-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-template mr-2"><rect width="18" height="7" x="3" y="3" rx="1"/><rect width="9" height="7" x="3" y="14" rx="1"/><rect width="5" height="7" x="16" y="14" rx="1"/></svg>
        Department
    </a>
    <a href="{{ route('hrms.holidaydate') }}" class="{{ Request::is('dashboard/hrms/holiday-date*') ? 'active' : '' }} flex items-center py-3 first:-mt-3 last:-mb-3 [&amp;.active]:text-primary [&amp;.active]:font-medium hover:text-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-x-2 mr-2"><path d="M8 2v4"/><path d="M16 2v4"/><path d="M21 13V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8"/><path d="M3 10h18"/><path d="m17 22 5-5"/><path d="m17 17 5 5"/></svg>
        Holidays date
    </a>
    <a href="#" class="flex items-center py-3 first:-mt-3 last:-mb-3 [&amp;.active]:text-primary [&amp;.active]:font-medium hover:text-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-check-2 mr-2"><path d="M8 2v4"/><path d="M16 2v4"/><path d="M21 14V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8"/><path d="M3 10h18"/><path d="m16 20 2 2 4-4"/></svg>
        Holidays list
    </a>
    <a href="{{ route('hrms.jobs') }}" class="{{ Request::is('dashboard/hrms/jobs') ? 'active' : '' }} flex items-center py-3 first:-mt-3 last:-mb-3 [&amp;.active]:text-primary [&amp;.active]:font-medium hover:text-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-briefcase mr-2"><path d="M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/><rect width="20" height="14" x="2" y="6" rx="2"/></svg>
        Job
    </a>
    <a href="{{ route('hrms.leave-type') }}" class="{{ Request::is('dashboard/hrms/leave-type') ? 'active' : '' }} flex items-center py-3 first:-mt-3 last:-mb-3 [&amp;.active]:text-primary [&amp;.active]:font-medium hover:text-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-arrow-out-up-right mr-2"><path d="M21 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h6"/><path d="m21 3-9 9"/><path d="M15 3h6v6"/></svg>
        Leave type
    </a>
    <a href="{{ route('hrms.attendance.shiftrequest') }}" class="{{ Request::is('dashboard/hrms/shift-request-approver') ? 'active' : '' }} flex items-center py-3 first:-mt-3 last:-mb-3 [&amp;.active]:text-primary [&amp;.active]:font-medium hover:text-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-git-pull-request-create mr-2"><circle cx="6" cy="6" r="3"/><path d="M6 9v12"/><path d="M13 6h3a2 2 0 0 1 2 2v3"/><path d="M18 15v6"/><path d="M21 18h-6"/></svg>
        Shift request approver
    </a>
    <a href="{{ route('hrms.attendance.shifttype') }}" class="{{ Request::is('dashboard/hrms/shift-type') ? 'active' : '' }} flex items-center py-3 first:-mt-3 last:-mb-3 [&amp;.active]:text-primary [&amp;.active]:font-medium hover:text-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-door-open mr-2"><path d="M13 4h3a2 2 0 0 1 2 2v14"/><path d="M2 20h3"/><path d="M13 20h9"/><path d="M10 12v.01"/><path d="M13 4.562v16.157a1 1 0 0 1-1.242.97L5 20V5.562a2 2 0 0 1 1.515-1.94l4-1A2 2 0 0 1 13 4.561Z"/></svg>
        Shift type
    </a>
</div>