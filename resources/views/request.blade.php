@extends('layouts.guest')
@section('content')
    {{-- New Code UI --}}
    <div
    class="container h-screen bg-slate-200 flex flex-col justify-center items-center"
    >
    <form action="/requests" method="POST"
    class="flex flex-col bg-transparent"
    >
    @csrf
    <input
    class="mt-1 rounded-md border-transparent"
    type="text"
    placeholder="Fullname"
    required
    name="fullname"
    id="fullname"
    />
    <input
    class="mt-1 rounded-md border-transparent"
    type="email"
    placeholder="Email"
    name="email"
    id="email"
    />
    <input
    class="mt-1 rounded-md border-transparent"
    type="text"
    placeholder="Phone"
    name="phone"
    id="phone"
    required
    />
    <div>
        <input
        class="mt-1 rounded-md border-transparent"
    type="text"
    placeholder="Mahala"
    name="mahala"
    id="mahala"
    required
    />
    <input
    class="mt-1 rounded-md border-transparent"
    type="text"
    placeholder="Zokak"
    name="zokak"
    id="zokak"
    required
    />
    <input
    class="mt-1 rounded-md border-transparent"
    type="text"
    placeholder="Dar"
    name="dar"
    id="dar"
    required
    />
    </div>
    
    <input
    class="mt-1 rounded-md border-transparent"
    type="text"
    placeholder="Nearest Point"
    name="nearest_point"
    id="nearest_point"
    required
    />
    
    <select  class="mt-1 rounded-md border-transparent" name="gover_id">
        @foreach ($govers as $gover)
            <option value="{{$gover->id}}">{{$gover->name}}</option>
        @endforeach
    </select>
    <select  class="mt-1 rounded-md border-transparent" name="center_id">
        @foreach ($centers as $center)
            <option value="{{$center->id}}">{{$center->name}}</option>
        @endforeach
    </select>
    <select class="mt-1 rounded-md border-transparent" name="sector_id">
        @foreach ($sectors as $sector)
        <option value="{{$sector->id}}">{{$sector->name}}</option>
    @endforeach
    </select>

    <button
    class="bg-blue-500 hover:bg-blue-700 text-white mt-1 rounded-md border-transparent h-8"
    type="submit"
    placeholder="Submit">
    Submit
    </button>

    </form>
    @if ($errors->any())
    <div class="bg-red-300 p-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session()->has('message'))
    <div class="bg-orange-300 p-2">
        {{ session()->get('message') }}
    </div>
@endif
    </div>
@endsection