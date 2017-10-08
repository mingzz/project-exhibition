@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Project
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('projects.show_fields')
                    <a href="{!! route('projects.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('bar')
    @foreach($projects as $project)
        <li>
            <div>
                <strong style="color: white">{!! $project->title !!}</strong>

                {!! Form::open(['route' => ['projects.destroy', $project->id], 'method' => 'delete']) !!}
                <div class='btn-group' style="display: inline-block">
                    <a href="{!! route('projects.show', [$project->id]) !!}" class='btn btn-default btn-xs' style="background-color: transparent;border-color:transparent">
                        <i class="glyphicon glyphicon-eye-open" style=" color: white"></i>
                    </a>
                    <a href="{!! route('projects.edit', [$project->id]) !!}" class='btn btn-default btn-xs'  style="background-color: transparent;border-color:transparent">
                        <i class="glyphicon glyphicon-edit" style=" color: white"></i>
                    </a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
                <div style="display: inline-block">
                    <a href="{!! route('news.index', ['id' => $project->id]) !!}"><span>News</span></a>
                    <span>&nbsp;&nbsp;</span>
                    <a href="{!! route('publications.index', ['id' => $project->id]) !!}"><span>Publications</span></a>
                </div>
            </div>
        </li>
        <hr style="margin: 5px 0 5px 0 "/>
    @endforeach
@endsection