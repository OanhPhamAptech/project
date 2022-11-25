@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Xác nhận email của bạn') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Một đường dẫn xác nhận mới đã được gửi đến email của bạn') }}
                        </div>
                    @endif

                    {{ __('Để tiếp tục, kiểm tra email của bạn') }}
                    {{ __('Nếu bạn không nhận được đường dẫn xác nhận') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Nhấn vào đây để gửi lại') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
