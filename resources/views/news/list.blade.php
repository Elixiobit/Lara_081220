@include('blocks.menu')

@forelse ($news as $id => $item)
    @php
        $url = route('news::card', ['id' => $id]);
    @endphp

    <div>
        <a href='{{$url}}'>{{$item['title']}}</a>
    </div>
    @empty
        Новостей нет
    @endforelse
