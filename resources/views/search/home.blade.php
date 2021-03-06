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

                    <form class="query" method="GET" action="search">
                        <div class="field is-grouped">
                            <p class="control is-expanded">
                                <input class="input is-medium" type="text" name="query" placeholder="Enter a URL ..." required>
                            </p>
                            <p class="control">
                                <button class="button is-primary is-medium">Search</button>
                            </p>
                        </div>
                    </form>

                </div>
                <div class="column"></div>
            </div>

        </div>
    </div>

@endsection