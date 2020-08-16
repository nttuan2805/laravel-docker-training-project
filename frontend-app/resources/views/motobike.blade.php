@include('header')

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

            @if(in_array($kanaJP, $kanaPrefixHasModel))
                @php ($hasOrNotdisabled = '')
            @else
                @php ($hasOrNotdisabled = ', disabled')
            @endif

            <a class="kanaPrefixLink {{ $hasOrNotdisabled }}" href='{{ $kanaPrefix }}' >{{ $kanaJP }}行&nbsp;&nbsp;&nbsp;&nbsp;</a>
        @endforeach
        </td>
    </tr>
    <tr>
        <th>英数字</th>
        <td id="namePrefix">
        @foreach ($namePrefixHeader as $namePrefix)
            @if(in_array($namePrefix, $namePrefixHasModel))
                @php ($hasOrNotdisabled = '')
            @else
                @php ($hasOrNotdisabled = ', disabled')
            @endif

            <a class="namePrefixLink {{ $hasOrNotdisabled }}" href='{{ $namePrefix }}' >{{ $namePrefix }}&nbsp;&nbsp;&nbsp;&nbsp;</a>
        @endforeach
        </td>
    </tr>
    <th>排気量</th>
        <td id="motoDisplace">
        @foreach ($displacementHeader as $disp)
            @if(in_array($disp, $displacementHasModel))
                @php ($hasOrNotdisabled = '')
            @else
                @php ($hasOrNotdisabled = ', disabled')
            @endif

            <a class="motoDisplaceLink {{ $hasOrNotdisabled }}" href='{{ $disp }}' >{{ $disp }}&nbsp;&nbsp;&nbsp;&nbsp;</a>
        @endforeach
        </td>
    </tr>
    <th>メーカー</th>
        <td id="marker">
        @foreach ($markerHeader as $maker)
            @if(in_array($maker['model_maker_code'], $markerHasModel))
                @php ($hasOrNotdisabled = '')
            @else
                @php ($hasOrNotdisabled = ', disabled')
            @endif

            <a class="motoMarkerLink {{ $hasOrNotdisabled }}" href='{{ $maker['model_maker_code'] }}' >{{ $maker['model_maker_hyouji'] }}&nbsp;&nbsp;&nbsp;&nbsp;</a>
        @endforeach
        </td>
    </tr>
</table>

<input type="hidden" id="kanaPrefixFilter"  name="kanaPrefixFilter" value="0" />
<input type="hidden" id="namePrefixFilter"  name="namePrefixFilter" value="0" />
<input type="hidden" id="motoDisplacement"  name="motoDisplacement" value="0" />
<input type="hidden" id="modelMakerCode"    name="modelMakerCode"   value="0" />

<div id="response">

</div>

@include('footer')