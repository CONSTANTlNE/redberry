<option value="">აირჩიეთ ქალაქი</option>
@foreach($cities as $city)
    <option value="{{ $city['id'] }}">{{ $city['name'] }}</option>
@endforeach