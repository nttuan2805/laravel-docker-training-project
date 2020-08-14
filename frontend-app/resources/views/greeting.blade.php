<html>
    <body>
    <table>
        <thead>
            <td>model_maker_code</td>
            <td>model_maker_hyouji</td>
            <td>model_maker_country</td>
        </thead>
        <tbody>
            @foreach ($allMotoBikes as $bike)
                <tr>
                    <td>{{ $bike->model_maker_code }}</td>
                    <td class="inner-table">{{ $bike->model_maker_hyouji }}</td>
                    <td class="inner-table">{{ $bike->model_maker_country }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </body>
</html>