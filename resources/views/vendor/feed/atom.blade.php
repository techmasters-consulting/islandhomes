<?=
    /* Using an echo tag here so the `<? ... ?>` won't get parsed as short tags */
    '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<feed xmlns="http://www.w3.org/2005/Atom">

    @foreach($items as $item)
        <entry type="{{ $item->author }}">
            <title>{{ $item->name }}</title>

            <images>{{ url($item->image) }}</images>
            <id>{{ $item->price }}</id>

                <name> {{ $item->author }}</name>

            <location type="html">
              {!! $item->location !!}
            </location>
            @if($item->__isset('enclosure'))
              <enclosure url="{{ url($item->enclosure) }}" length="{{ $item->enclosureLength }}" type="{{ $item->enclosureType }}" />
            @endif
            <category type="html">
                {!! $item->category ?? '' !!}
            </category>
            <period>{{ $item->period }}</period>
        </entry>
    @endforeach
</feed>
