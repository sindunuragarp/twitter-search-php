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

                    <div class="res has-text-left">
                        @foreach ($data["results"] as $key => $row)
                            <div class="pub-content">
                                {!! $row["embed"]->html !!}
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