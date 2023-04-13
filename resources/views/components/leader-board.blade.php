<section class="leaderboard {{Route::is('leader-board') ? '':'pt-0'}}">
    <div class="container">
        <div class="row mt-5 ">
            <div class="col-12 mb-5 text-center">

                <h1>Top Players</h1>
            </div>
        </div>

        <div class="row text-capitalize justify-content-center">
            @if(count($topThree) > 1)
            <div class="col-sm-4" data-aos="zoom-in-up" data-aos-delay="200">
                <div class="leaderboard-card leaderboard-card--second">
                    <div class="leaderboard-card__top text-white"  style="background-color: #BACDDB">
                        <h3 class="text-center">{{$topThree[1]->points}}</h3>
                    </div>
                    <div class="leaderboard-card__body">
                        <div class="text-center">
                            <img src="{{$topThree[1]->user->avatar? $topThree[1]->user->avatar:Avatar::create($topThree[1]->user->name)->toBase64()}}" class="circle-img mb-2" alt="User Img">
                            <h5 class="mb-0">{{$topThree[1]->user->name}}</h5>
                            <p class="text-muted mb-0">{{"@".Str::slug($topThree[1]->user->name)}}</p>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <span><i class="fa-solid fa-pencil"></i> {{$topThree[1]->user->answer_from_users_count}} questions</span>
                                <button class="btn btn-outline-success btn-sm">Congratulate</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if(count($topThree) > 0)
            <div class="col-sm-4" data-aos="zoom-in-up" data-aos-delay="1">
                <div class="leaderboard-card leaderboard-card--first">
                    <div class="leaderboard-card__top text-white"  style="background-color: #FFD93D">
                        <h3 class="text-center">{{$topThree[0]->points}}</h3>
                    </div>
                    <div class="leaderboard-card__body">
                        <div class="text-center">
                            <img src="{{$topThree[0]->user->avatar? $topThree[0]->user->avatar:Avatar::create($topThree[0]->user->name)->toBase64()}}" class="circle-img mb-2" alt="User Img">
                            <h5 class="mb-0">{{$topThree[0]->user->name}}</h5>
                            <p class="text-muted mb-0">{{"@".Str::slug($topThree[0]->user->name)}}</p>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <span><i class="fa-solid fa-pencil"></i> {{$topThree[0]->user->answer_from_users_count}} questions </span>
                                <button class="btn btn-outline-success btn-sm">Congratulate</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if(count($topThree) > 2)
            <div class="col-sm-4" data-aos="zoom-in-up" data-aos-delay="300">
                <div class="leaderboard-card leaderboard-card--three">
                    <div class="leaderboard-card__top text-white"  style="background-color: #FFA559">
                        <h3 class="text-center">{{$topThree[2]->points}}</h3>
                    </div>
                    <div class="leaderboard-card__body">
                        <div class="text-center">
                            <img src="{{$topThree[2]->user->avatar? $topThree[2]->user->avatar:Avatar::create($topThree[2]->user->name)->toBase64()}}" class="circle-img mb-2" alt="User Img">
                            <h5 class="mb-0">{{$topThree[2]->user->name}}</h5>
                            <p class="text-muted mb-0">{{"@".Str::slug($topThree[2]->user->name)}}</p>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <span><i class="fa-solid fa-pencil"></i> {{$topThree[2]->user->answer_from_users_count}} questions </span>
                                <button class="btn btn-outline-success btn-sm">Congratulate</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>

        <h4>Top 5 Player</h4>

        <table class="table" >
            <thead>
                <tr>
                    <th>User</th>
                    <th>Correct Answers</th>
                    <th>Questions Complete</th>
                    <th>Congratulate</th>
                </tr>
            </thead>
            <tbody class="scroll-y h-100">
                @foreach($leaderboard as $key => $value)
                <tr data-aos="zoom-in-up" data-aos-delay="{{$key + 1}}">
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{$value->user->avatar? $value->user->avatar:Avatar::create($value->user->name)->toBase64()}}" class="circle-img circle-img--small mr-2" alt="User Img">
                            <div class="user-info__basic">
                                <h5 class="mb-0">{{$value->user->name}}</h5>
                                <p class="text-muted mb-0">{{"@".Str::slug($value->user->name)}}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-baseline">
                            <h4 class="mr-1">{{$value->points}}</h4>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-baseline">
                            <h4 class="mr-1">{{$value->user->answer_from_users_count}}</h4>
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-success btn-sm">Congratulate</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>