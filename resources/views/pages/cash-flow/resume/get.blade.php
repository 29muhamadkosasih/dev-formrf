@extends('layouts/master')
@section('title', 'Resume')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="text-center">Tanggal Resume</h4>
            @foreach ($data as $item)
            <h5 class="text-center">{{ \Carbon\Carbon::parse($item->tgl_resume)->translatedFormat('l, j F Y') }}
                {{--
                <button type="button" class="btn rounded-pill btn-icon btn-label-secondary waves-effect">
                    <span class="ti ti-arrow-bar-to-left"></span>
                </button>
                {{ \Carbon\Carbon::parse($dataSebelumnya)->translatedFormat('l, j F Y') }} --}}
            </h5>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                {{-- <button class="btn btn-primary" type="button">Button</button> --}}

                <a href="{{ route('resume.pre-view', $item->id) }}" class="btn btn-primary">Next</a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection