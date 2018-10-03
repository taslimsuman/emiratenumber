@if (session('message_info'))
    <div class="alert alert-info">
        {{ session('message_info') }}
    </div>
@endif

@if (session('message_red'))
    <div class="alert alert-danger">
        {{ session('message_red') }}
    </div>
@endif

@if (session('message_green'))
    <div class="alert alert-success">
        {{ session('message_green') }}
    </div>
@endif