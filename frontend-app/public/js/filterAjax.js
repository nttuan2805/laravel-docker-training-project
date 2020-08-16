$(document).ready(function(){
    getDataResult();

    $('.kanaPrefixLink').click(function(event){
        var kanaPrefix = $(this).attr("href");
        event.preventDefault();
        $('.kanaPrefixLink').removeClass( "filter" );

        if (kanaPrefix == $('#kanaPrefixFilter').val())
        {
            $('#kanaPrefixFilter').val('0');
            $('.namePrefixLink').removeClass('disableLink');
        }
        else
        {
            $('.namePrefixLink').addClass('disableLink');
            $('#kanaPrefixFilter').val(kanaPrefix);
            $(this).addClass('filter');
        }

        getDataResult();
    });

    $('.namePrefixLink').click(function(event){
        var namePrefix = $(this).attr("href");
        event.preventDefault();
        $('.namePrefixLink').removeClass( "filter" );

        if (namePrefix == $('#namePrefixFilter').val())
        {
            $('#namePrefixFilter').val('0');
            $('.kanaPrefixLink').removeClass('disableLink');
        }
        else
        {
            $('.kanaPrefixLink').addClass('disableLink');
            $('#namePrefixFilter').val(namePrefix);
            $(this).addClass('filter');
        }

        getDataResult();
    });

    $('.motoDisplaceLink').click(function(event){
        var motoDisplace = $(this).attr("href");
        event.preventDefault();
        $('.motoDisplaceLink').removeClass( "filter" );

        if (motoDisplace == $('#motoDisplacement').val())
        {
            $('#motoDisplacement').val('0');
        }
        else
        {
            $('#motoDisplacement').val(motoDisplace);
            $(this).addClass('filter');
        }

        getDataResult();
    });

    $('.motoMarkerLink').click(function(event){
        var marker = $(this).attr("href");
        event.preventDefault();
        $('.motoMarkerLink').removeClass( "filter" );

        if (marker == $('#modelMakerCode').val())
        {
            $('#modelMakerCode').val('0');
        }
        else
        {
            $('#modelMakerCode').val(marker);
            $(this).addClass('filter');
        }

        getDataResult();
    });
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
        data:{kana:kanaPrefix, name:namePrefix, disp:motoDisplace, maker:modelMakerCode},
        success: function (data) {
            $('#response').html(data);
        }
    });
}