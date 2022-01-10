<x-guest-layout>
    
    {{-- New Code UI --}}
    <div
    class="container h-screen bg-slate-200 flex justify-center items-center"
    >
    <form action="/requests" method="POST"
    class="bg-white flex flex-col"
    >
    @csrf
    <input
    type="text"
    placeholder="Fullname"
    required
    name="fullname"
    id="fullname"
    />
    <input
    type="email"
    placeholder="Email"
    name="email"
    id="email"
    />
    <input
    type="text"
    placeholder="Phone"
    name="phone"
    id="phone"
    required
    />
    <div>
        <input
    type="text"
    placeholder="Mahala"
    name="mahala"
    id="mahala"
    required
    />
    <input
    type="text"
    placeholder="Zokak"
    name="zokak"
    id="zokak"
    required
    />
    <input
    type="text"
    placeholder="Dar"
    name="dar"
    id="dar"
    required
    />
    </div>
    
    <input
    type="text"
    placeholder="Nearest Point"
    name="nearest_point"
    id="nearest_point"
    required
    />
    
    <select name="govers">
        @foreach ($govers as $gover)
            <option value="{{$gover->id}}">{{$gover->name}}</option>
        @endforeach
    </select>
    <select name="centers">
        @foreach ($centers as $center)
            <option value="{{$center->id}}">{{$center->name}}</option>
        @endforeach
    </select>
    <select name="sectors">
        @foreach ($sectors as $sector)
        <option value="{{$sector->id}}">{{$sector->name}}</option>
    @endforeach
    </select>

    <input
    type="submit"
    placeholder="Submit"

    />
    </form>

    </div>

</x-guest-layout>