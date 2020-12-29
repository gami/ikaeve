@extends('layouts.app')

@section('content')
        <div class="card-header">チーム詳細</div>
        <div class="card-body">
            <div class="container-fluid">
                <table class="table table-bordered">
                    <tr><th>大会名</th><td>{{ $data->event->name }}</tr>
                    <tr><th>チーム名</th><td>{{ $data->name }}@if($data->abstention == 1) (棄権) @endif</tr>
                    <tr><th>フレンドコード</th><td>
                      @if($data->friend_code) {{ substr($data->friend_code, 0, 4) }}-{{ substr($data->friend_code, 4, 4) }}-{{ substr($data->friend_code, 8, 4) }} @endif</tr>
                    <tr><th>代表メンバー</th><td>@if($data->member) <a href="{{ route('member.detail', ['id' => $data->member_id]) }}">{{ $data->member->name }}</a> @endif</tr>
                    @foreach($data::members($data->id) as $v => $member)
                      <tr><th>メンバー{{($v+1)}}</th><td><a href="{{ route('member.detail', ['id' => $member->id]) }}">{{ $member->name }}</a>
                        @if($member->twitter)
                            &nbsp;<a href="https://twitter.com/{{ $member->twitter }}" target="_blank"><i class="fab fa-twitter-square fa-2x"></i></a>
                        @endif
                        @if($member->discord)
                            &nbsp;<a href="https://discord.com/{{ $member->discord }}" target="_blank"><i class="fab fa-discord fa-2x"></i></a>
                        @endif</tr>
                    @endforeach
                    <tr><th>意気込みなど</th><td>{{ $data->note }}</tr>
                    <tr><th>申請日時</th><td>{{ $data->created_at }}</tr>
                </table>
              </div>
          </div>
@endsection
