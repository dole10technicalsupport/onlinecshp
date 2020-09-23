$(document).ready(function(){
    $("#province").change(function() {
        //alert( "Handler for .change() called." );
        var province = $("#province").val();
        //alert(province);
        if(province == "MISAMIS ORIENTAL"){
            $("#city").empty();
            $('#city').append('<option value="Cagayan de Oro City">Cagayan de Oro City (Capital)</option>');
            $('#city').append('<option value="Gingoog City">Gingoog City</option>');
            $('#city').append('<option value="El Salvador City">El Salvador City</option>');
            $('#city').append('<option value="Alubijid">Alubijid</option>');
            $('#city').append('<option value="Balingasag">Balingasag</option>');
            $('#city').append('<option value="Balingoan">Balingoan</option>');
            $('#city').append('<option value="Binuangan">Binuangan</option>');
            $('#city').append('<option value="Gitagum">Gitagum</option>');
            $('#city').append('<option value="Initao">Initao</option>');
            $('#city').append('<option value="Jasaan">Jasaan</option>');
            $('#city').append('<option value="Kinoguitan">Kinoguitan</option>');
            $('#city').append('<option value="Lagonglong">Lagonglong</option>');
            $('#city').append('<option value="Laguindingan">Laguindingan</option>');
            $('#city').append('<option value="Libertad">Libertad</option>');
            $('#city').append('<option value="Lugait">Lugait</option>');
            $('#city').append('<option value="Magsaysay">Magsaysay</option>');
            $('#city').append('<option value="Manticao">Manticao</option>');
            $('#city').append('<option value="Medina">Medina</option>');
            $('#city').append('<option value="Naawan">Naawan</option>');
            $('#city').append('<option value="Opol">Opol</option>');
            $('#city').append('<option value="Salay">Salay</option>');
            $('#city').append('<option value="Sugbongcogon">Sugbongcogon</option>');
            $('#city').append('<option value="Tagoloan">Tagoloan</option>');
            $('#city').append('<option value="Talisayan">Talisayan</option>');
            $('#city').append('<option value="Villanueva">Villanueva</option>');
        }else if(province == "MISAMIS OCCIDENTAL"){
            $("#city").empty();
            $('#city').append('<option value="Oroquieta City">Oroquieta City (Capital)</option>');
            $('#city').append('<option value="Ozamis City">Ozamis City</option>');
            $('#city').append('<option value="Tangub City">Tangub City</option>');
            $('#city').append('<option value="Aloran">Aloran</option>');
            $('#city').append('<option value="Baliangao">Baliangao</option>');
            $('#city').append('<option value="Bonifacio">Bonifacio</option>');
            $('#city').append('<option value="Calamba">Calamba</option>');
            $('#city').append('<option value="Clarin">Clarin</option>');
            $('#city').append('<option value="Concepcion">Concepcion</option>');
            $('#city').append('<option value="Don Victoriano Chiongbian">Don Victoriano Chiongbian</option>');
            $('#city').append('<option value="Jimenez">Jimenez</option>');
            $('#city').append('<option value="Lopez Jaena">Lopez Jaena</option>');
            $('#city').append('<option value="Panaon">Panaon</option>');
            $('#city').append('<option value="Plaridel">Plaridel</option>');
            $('#city').append('<option value="Sapang Dalaga">Sapang Dalaga</option>');
            $('#city').append('<option value="Sinacaban">Sinacaban</option>');
            $('#city').append('<option value="Tudela">Tudela</option>');
        }else if(province == "BUKIDNON"){
            $("#city").empty();
            $('#city').append('<option value="Valencia City">Valencia City</option>');
            $('#city').append('<option value="Malaybalay City">Malaybalay City</option>');
            $('#city').append('<option value="Talakag">Talakag</option>');
            $('#city').append('<option value="Sumilao">Sumilao</option>');
            $('#city').append('<option value="San Fernando">San Fernando</option>');
            $('#city').append('<option value="Quezon">Quezon</option>');
            $('#city').append('<option value="Pangantucan">Pangantucan</option>');
            $('#city').append('<option value="Maramag">Maramag</option>');
            $('#city').append('<option value="Manolo Fortich">Manolo Fortich</option>');
            $('#city').append('<option value="Malitbog">Malitbog</option>');
            $('#city').append('<option value="Libona">Libona</option>');
            $('#city').append('<option value="Lantapan">Lantapan</option>');
            $('#city').append('<option value="Kitaotao">Kitaotao</option>');
            $('#city').append('<option value="Kibawe">Kibawe</option>');
            $('#city').append('<option value="Kalilangan">Kalilangan</option>');
            $('#city').append('<option value="Kadingilan">Kadingilan</option>');
            $('#city').append('<option value="Impasug-ong">Impasug-ong</option>');
            $('#city').append('<option value="Don Carlos">Don Carlos</option>');
            $('#city').append('<option value="Dangcagan">Dangcagan</option>');
            $('#city').append('<option value="Damulog">Damulog</option>');
            $('#city').append('<option value="Cabanglasan">Cabanglasan</option>');
            $('#city').append('<option value="Baungon">Baungon</option>');
        }else if(province == "LANAO DEL NORTE"){
            $("#city").empty();
            $('#city').append('<option value="Tubod">Tubod (Capital)</option>');
            $('#city').append('<option value="Iligan City">Iligan City</option>');
            $('#city').append('<option value="Tangcal">Tangcal</option>');
            $('#city').append('<option value="Tagoloan">Tagoloan</option>');
            $('#city').append('<option value="Dimaporo">Dimaporo</option>');
            $('#city').append('<option value="Sultan Naga">Sultan Naga</option>');
            $('#city').append('<option value="Sapad">Sapad</option>');
            $('#city').append('<option value="Salvador">Salvador</option>');
            $('#city').append('<option value="Poona Piagapo">Poona Piagapo</option>');
            $('#city').append('<option value="Pantar">Pantar</option>');
            $('#city').append('<option value="Pantao Ragat">Pantao Ragat</option>');
            $('#city').append('<option value="Nunungan">Nunungan</option>');
            $('#city').append('<option value="Munai">Munai</option>');
            $('#city').append('<option value="Matungao">Matungao</option>');
            $('#city').append('<option value="Maigo">Maigo</option>');
            $('#city').append('<option value="Magsaysay">Magsaysay</option>');
            $('#city').append('<option value="Linamon">Linamon</option>');
            $('#city').append('<option value="Lala">Lala</option>');
            $('#city').append('<option value="Kolambugan">Kolambugan</option>');
            $('#city').append('<option value="Kauswagan">Kauswagan</option>');
            $('#city').append('<option value="Kapatagan">Kapatagan</option>');
            $('#city').append('<option value="Baroy">Baroy</option>');
            $('#city').append('<option value="Baloi">Baloi</option>');
            $('#city').append('<option value="Bacolod ">Bacolod </option>');
        }else if(province == "CAMIGUIN"){
            $("#city").empty();
            $('#city').append('<option value="Mambajao">Mambajao (Capital)</option>');
            $('#city').append('<option value="Sagay">Sagay</option>');
            $('#city').append('<option value="Mahinog">Mahinog</option>');
            $('#city').append('<option value="Guinsiliban">Guinsiliban</option>');
            $('#city').append('<option value="Catarman">Catarman</option>');
        }else{

        }

    });
});