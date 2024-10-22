<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Multiple Dependency</title>
</head>
<body>
    <div class="container mt-4 mb-3 pd-3">
        <h2 class="text-bold text-center mb-2">Laravel Ajax Multiple Dependency</h2>
        <hr>
        <div class="row justify-content-center mt-2 mb-2 pd-2">
            <div class="col-md-6">
                <form action="#" method="POST">
                    @csrf
                    <div class="form-group mt-2 mb-2 pd-2">
                        <select name="region_id" id="region" class="form-control">
                            <option value="">Select Region</option>
                            @foreach ($region as $region)
                                <option value="{{ $region->id }}">{{ $region->region_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-2 mb-2 pd-2">
                        <select name="country_id" id="country" class="form-control">
                            <option value="">Select Country</option>
                        </select>
                    </div>

                    <div class="form-group mt-2 mb-2 pd-2">
                        <select name="city_id" id="city" class="form-control">
                            <option value="">Select City</option>
                        </select>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>





{{-- AJAX CDN --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

{{-- bootstrap Js cdn   --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        //Ajax Call when region selected 
        $('#region').change(function(){
            var region_id = $(this).val();
            // console.log(region_id);
            $.ajax({
                type: 'GET',
                url: '{{ route('getCountry') }}',
                data: {region_id: region_id},
                success: function(data){
                    console.log(data);
                    // $('#country').empty();
                    // $('#city').empty();
                    $('#country').empty().append('<option value="">Select a country</option>');
                    $('#city').empty().append('<option value="">Select a city</option>');
                    $.each(data, function(key, value) {
                        $('#country').append('<option value="'+value.id+'">'+value.country_name+'</option>');
                    })
                },
                error: function(error){
                    console.log(error);
                }
            })
        })

        //Ajax call when Country selected
        $('#country').change(function(){
            var country_id = $(this).val();
            var region_id = $('#region').val();
            $.ajax({
                type: 'GET',
                url: '{{ route('getCity') }}',
                data: {
                    country_id: country_id,
                    region_id: region_id
                },
                success: function(data){
                    console.log(data);
                    // $('#city').empty();
                    $('#city').empty().append('<option value="">Select a city</option>');
                    $.each(data, function(key, value) {
                        $('#city').append('<option value="'+value.id+'">'+value.city_name+'</option>');
                    });
                },
                error: function(error){
                    console.log(error);
                }
            })
        })
    })
</script>

</body>
</html>