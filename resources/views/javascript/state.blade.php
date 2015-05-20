<table class="table table-bordered">
    <thead>
    <tr>
        <th>Course</th>
        <th>Dates</th>
        <th>Status</th>
        <th>Sponsor</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($schedules as $schedule)
    <tr>
        <td>{{ $schedule->course->name }}</td>
        <td>{{ \App\Helpers\DateHelper::displayRange($schedule->start, $schedule->end) }}</td>
        @if ($schedule->scheduleStatus->name == 'Register')
            <td>{!! link_to($schedule->url, 'Register', ['target' => '_new', 'class' => 'btn btn-warning btn-xs']) !!}</td>
        @else
            <td>{{ $schedule->scheduleStatus->name }}</td>
        @endif
        @if (!$schedule->has_sponsor)
            <td>{!! link_to('http://e-hazard.com/sandbox/about-e-hazard/advertising-class-sponsor.php', 'Apply') !!}</td>
        @elseif (empty($schedule->sponsor_url))
            <td>{{ $schedule->sponsor_name }}</td>
        @else
            <td>{!! link_to($schedule->sponsor_url, $schedule->sponsor_name, ['target' => '_new']) !!}</td>
        @endif
    </tr>
    @endforeach
    </tbody>
</table>