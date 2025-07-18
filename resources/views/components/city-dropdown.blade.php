<select id="citySelect" name="city_id">
    <option value="" style="display: block">City</option>
    @foreach ($cities as $city)
        <option value="{{ $city->id }}" data-parent="{{ $city->state_id }}" @selected( $selected === $city->id ) >
            {{ $city->name }}
        </option>    
    @endforeach

</select>