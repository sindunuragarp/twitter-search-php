@extends("layouts.master")

@section("content")

    <div class="hero-body">
        <div class="container has-text-centered">

            <div class="columns">
                <div class="column"></div>
                <div class="column is-5">

                    <a href=".">
                        <div class="title mb-medium">
                            Twitter URL Search
                        </div>
                    </a>

                    <form class="query mb-medium" method="GET" action="search">
                        <div class="field is-grouped">
                            <p class="control is-expanded">
                                <input class="input is-medium" type="text" name="query" placeholder="Enter a software name" value="{{$data["query"]}}" required>
                            </p>

                            <p class="control">
                                <button class="button is-primary is-medium">Search</button>
                            </p>
                        </div>
                    </form>

                    <div class="sub has-text-left">
                        <div class="found">Finished in {{$data["time"]}} seconds</div>
                    </div>

                    <hr/> <!-- ------------------------------------------------------------------------------------- -->

                    <div class="has-text-center">
                        @foreach ($data["results"] as $key => $row)
                            <div>
                                <blockquote class="twitter-tweet has-text-left" >
                                    <p>{{ $row["text"] }}</p>
                                    --- <a href = "{{ $row["statusUrl"] }}">{{ $row["userName"] }}</a> ({{ $row["date"] }})

                                    <hr/>
                                    @foreach ($row["urls"] as $url)
                                        <div><a href = {{ $url->expanded_url }}>{{ $url->expanded_url }}</a></div>
                                    @endforeach
                                </blockquote>
                            </div>
                        @endforeach
                    </div>

                    <hr/> <!-- ------------------------------------------------------------------------------------- -->

                </div>
                <div class="column"></div>
            </div>

        </div>
    </div>

@endsection