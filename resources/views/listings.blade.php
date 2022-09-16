<h1>{{$heading}}</h1>
@php   
        $test = 'Ashe';
@endphp
<!-- {{$test}} -->

@unless(count($listings) == 0)
@foreach ($listings as $listing)
            <h2>{{$listing['title']}}</h2>
            <p>{{$listing['description']}}</p>
@endforeach

@else
    <p>No listings found</p>
@endunless


@if(count($listings) == 0)
            <h4>No listings</h4>
@endif
