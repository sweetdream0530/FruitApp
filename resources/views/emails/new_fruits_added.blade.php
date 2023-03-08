<p>New fruits added:</p>

<ul>
    @foreach ($new_fruits as $fruit)
        <li>{{ $fruit->name }}</li>
    @endforeach
</ul>