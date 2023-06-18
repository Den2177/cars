<div class="notifications">
    @if($errors->any())
    <div class="notification err">
        @foreach($errors->all() as $message)
        <div class="message">{{$message}}</div>
        @endforeach
    </div>
    @endif
</div>
