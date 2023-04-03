<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <div class="">
                <h3>Leader Board</h3>
            </div>
            <div class="">

                <a href="{{route('main')}}" class="btn btn-primary ms-auto"><i class="fa-solid fa-play"></i> Main</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Points</th>

                </tr>
            </thead>
            <tbody>
                @if(isset($leader))
                @foreach ($leader as $l)
                    <tr>
                        <th scope="row">{{$l->id}}</th>
                        <td>{{$l->user->name}}</td>
                        <td>{{$l->points}}</td>
                        
                    </tr>
                @endforeach
                @else
                <tr>
                    <td>Data Note Found</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
