{{-- Si une erreur existe --}}
@if(count($errors) > 0)

    <ul style="display: grid; margin:auto;  width: 500px;">

        {{-- Pour chaque erreur existante, tu me l'affiches --}}
        @foreach($errors->all() as $error)

            <li>{{$error}}</li>

        @endforeach

    </ul>

@endif