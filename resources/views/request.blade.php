<x-guest-layout>
    
    {{-- New Code UI --}}
    <div
    class="container h-screen bg-slate-200 flex flex-col justify-center items-center"
    >
    <form action="/requests" method="POST"
    class="flex flex-col"
    >
    @csrf
    <input
    class="my-2 rounded-lg border-slate-200	"
    type="text"
    placeholder="Fullname"
    required
    minlength="4"
    maxlength="255"
    name="fullname"
    id="fullname"
    />
    <input
    class="my-2 rounded-lg border-slate-200	"

    type="email"
    placeholder="Email"
    name="email"
    id="email"
    />
    <input
    class="my-2 rounded-lg border-slate-200	"

    type="text"
    placeholder="Phone"
    name="phone"
    id="phone"
    required
    />
    <div>
        <input
    class="my-2 rounded-lg border-slate-200	"

    type="text"
    placeholder="Mahala"
    name="mahala"
    id="mahala"
    required
    />
    <input
    class="my-2 rounded-lg border-slate-200	"

    type="text"
    placeholder="Zokak"
    name="zokak"
    id="zokak"
    required
    />
    <input
    class="my-2 rounded-lg border-slate-200	"

    type="text"
    placeholder="Dar"
    name="dar"
    id="dar"
    required
    />
    </div>
    
    <input
    class="my-2 rounded-lg border-slate-200	"

    type="text"
    placeholder="Nearest Point"
    name="nearest_point"
    id="nearest_point"
    required
    />
    
    <select
     name="gover_id"
    class="my-2 rounded-lg border-slate-200	"
     
     >
        @foreach ($govers as $gover)
            <option value="{{$gover->id}}">{{$gover->name}}</option>
        @endforeach
    </select>
    <select
    class="my-2 rounded-lg border-slate-200	"
    name="center_id">
        @foreach ($centers as $center)
            <option value="{{$center->id}}">{{$center->name}}</option>
        @endforeach
    </select>
    <select
    class="my-2 rounded-lg border-slate-200	"
    name="sector_id">
        @foreach ($sectors as $sector)
        <option value="{{$sector->id}}">{{$sector->name}}</option>
    @endforeach
    </select>

    <input
    class="bg-blue-500"
    type="submit"
    placeholder="Submit"

    />
    </form>
    @if($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    @if(session()->has('msg'))
    <p style="background-color:green;">{{session()->get('msg')}}</p>
    @endif
    </div>
    
</x-guest-layout>