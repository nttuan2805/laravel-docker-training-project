$(document).ready(function(){
    getDataResult();

    // $('td#kanaPrefix a').click(function(event){
    //     var kanaPrefix = $(this).attr("href");
    //     event.preventDefault();
    //     $('td#kanaPrefix a').removeClass( "filter" );

    //     if (kanaPrefix == $('#kanaPrefixFilter').val())
    //     {
    //         $('#kanaPrefixFilter').val('');
    //         $('a.namePrefixLink').removeClass('disableLink');
    //     }
    //     else
    //     {
    //         $('a.namePrefixLink').addClass('disableLink');
    //         $('#kanaPrefixFilter').val(kanaPrefix);
    //         $(this).addClass('filter');
    //     }

    //     getDataResult();
    // });
});

function getDataResult()
{
    kanaPrefix = $('#kanaPrefixFilter').val();
    namePrefix = $('#namePrefixFilter').val();
    motoDisplace = $('#motoDisplacement').val();
    modelMakerCode = $('#modelMakerCode').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: '/filterMotobike',
        data:{kana:kanaPrefix, name:namePrefix},
        success: function (data) {
            $('#response').html(data);
        }
    });
}