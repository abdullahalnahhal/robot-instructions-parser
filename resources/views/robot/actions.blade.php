<form action="{{ route('robot.parse') }}" method='post'>
    @csrf
    @include('robot.fields')
</form>
