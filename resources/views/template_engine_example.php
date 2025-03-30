<div class="p-2">
    <h1>{{ title }}</h1>
    <p>{{ text1 }}</p>

    @if($user)
    <p>Welcome, {{ user }}</p>
    @else
    <p>Please log in.</p>
    @endif

    <ul>
        @foreach($items as $item)
        <li>{{ item }}</li>
        @endforeach
    </ul>
</div>
