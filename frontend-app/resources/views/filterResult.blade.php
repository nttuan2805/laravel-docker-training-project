@if(!count($result))
    <table id="motobikeResult">
        <tr>
            <td  class="notdata">The result is empty</td>
        </tr>
    </table>
@else
    @foreach ($result as $chunk)
    <table class="motobikeResult">
        @foreach($chunk as $rows)
            <tr>
                @foreach($rows as $cols)
                <td>
                    <a href=""><img src="{{ $cols['model_image_url'] }}"></a>
                    <div class="motobikeInfo">
                        <h4>{{ $cols['model_hyouji'] }} ({{ $cols['model_count'] }})</h4>
                        <p>{{ $cols['model_kakaku_min'] }} - {{ $cols['model_kakaku_max'] }} </p>
                    </div>
                </td>
                @endforeach
            </tr>
        @endforeach
    </table>
    @endforeach
@endif