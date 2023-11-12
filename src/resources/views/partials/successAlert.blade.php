@if (\Session::has('success'))
    <div id="successMsg" class="alertSuccess">
        {!! \Session::get('success') !!}
    </div>
@endif
