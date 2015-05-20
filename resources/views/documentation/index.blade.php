@extends('app')

@section('content')

    <h1 class="page-header">Documentation</h1>

    <p>To embed course schedules on a web page you need to include two elements: a <em>placeholder</em> and a <code>&lt;script&gt;</code>.</p>

    <p>The <em>placeholder</em> is a tag whose content will be replaced by the course schedule markup. While technically this can be any HTML tag with <code>id</code>, using a <code>div</code> is recommended. The placeholder must appear before the course schedule <code>&lt;script&gt;</code>. The placeholder must have an <code>id</code> attribute of <code>schedule-{parameter}</code>. Where <em>{parameter}</em> is the requested course schedule data.</p>

    <p>For example, a placeholder for the course 5 would be:</p>

    <pre><code>&lt;div id="schedule-5"&gt;&lt;/div&gt;</code></pre>

    <p>A placeholder for the courses in Kentucky would be:</p>

    <pre><code>&lt;div id="schedule-KY"&gt;&lt;/div&gt;</code></pre>

    <p>The course schedule <code>&lt;script&gt;</code> tag must appear after the placeholder. The <code>&lt;script&gt;</code> tag must have a <code>src</code> attribute of either <code>/course-schedule/{id}</code> or <code>/state-schedule/{code}</code>. Where <em>{id}</em> is the <em>ID</em> listed on the {!! link_to_route('courses.index', 'Courses') !!} page and <em>{code}</em> is the state abbreviation.</p>

    <p>Following from the examples above, the respective <code>&lt;script&gt;</code> tags would be:</p>

    <pre><code>&lt;script src="http://courses.e-hazard.com/course-schedule/5"&gt;&lt;/script&gt;</code></pre>

    <p>And:</p>

    <pre><code>&lt;script src="http://courses.e-hazard.com/state-schedule/KY"&gt;&lt;/script&gt;</code></pre>

@stop
