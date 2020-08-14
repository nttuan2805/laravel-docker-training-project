<table>
<tr>
    <th>頭文字</th>
    <td id="kanaPrefix">
        @foreach ($kanaPrefixHeader as $kanaPrefix)
            @switch($kanaPrefix)
                @case('a')
                    @php ($kanaJP = 'ア')
                    @break
                @case('ka')
                    @php ($kanaJP = 'カ')
                    @break
                @case('sa')
                    @php ($kanaJP = 'サ')
                    @break
                @case('ta')
                    @php ($kanaJP = 'タ')
                    @break
                @case('na')
                    @php ($kanaJP = 'ナ')
                    @break
                @case('ha')
                    @php ($kanaJP = 'ハ')
                    @break
                @case('ma')
                    @php ($kanaJP = 'マ')
                    @break
                @case('ya')
                    @php ($kanaJP = 'ヤ')
                    @break
                @case('ra')
                    @php ($kanaJP = 'ラ')
                    @break
                @default
                    @php ($kanaJP = 'ワ')
                    @break
            @endswitch

            @if (in_array($kanaPrefixHasModel, $kanaPrefix))
                @php ($hasOrNotdisabled = 'class=disabled')
            @else
                @php ($hasOrNotdisabled = '')
            @endif
            <a class="kanaPrefixLink" href='{{ kanaPrefix }}' {{ $hasOrNotdisabled }}>{{ $kanaJP }}行&nbsp;&nbsp;&nbsp;&nbsp;</a>
        @endforeach
        {% endfor %}
    </td>
</tr>
</table>

<div id="response">

</div>