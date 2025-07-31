<x-app-layout>

    <main>

        @if (session('msg'))
            <p style="color: green; font-weigth: 700">{{session('msg')}}</p>
        @endif

      <div class="container-small">
        <h1 class="car-details-page-title">Add new car</h1>
        <form
          action="{{ route('car.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="card add-new-car-form"
        >
          <div class="form-content">
            <div class="form-details">
              @csrf
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label>Maker</label>
                    <x-maker-dropdown :selected="request('maker_id')" />
                    @error('maker_id')
                      <p class="error-message">{{$message}}</p>
                    @enderror

                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label>Model</label>
                    <x-model-dropdown :maker-id="request('maker_id')" :selected="request('model_id')" />
                    @error('model_id')
                      <p class="error-message">{{$message}}</p>
                    @enderror
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label>Year</label>
                    <select name="year" >
                      <option value="">Year</option>
                      <option value="2024">2024</option>
                      <option value="2023">2023</option>
                      <option value="2022">2022</option>
                      <option value="2021">2021</option>
                      <option value="2020">2020</option>
                      <option value="2019">2019</option>
                      <option value="2018">2018</option>
                      <option value="2017">2017</option>
                      <option value="2016">2016</option>
                      <option value="2015">2015</option>
                      <option value="2014">2014</option>
                      <option value="2013">2013</option>
                      <option value="2012">2012</option>
                      <option value="2011">2011</option>
                      <option value="2010">2010</option>
                      <option value="2009">2009</option>
                      <option value="2008">2008</option>
                      <option value="2007">2007</option>
                      <option value="2006">2006</option>
                      <option value="2005">2005</option>
                      <option value="2004">2004</option>
                      <option value="2003">2003</option>
                      <option value="2002">2002</option>
                      <option value="2001">2001</option>
                      <option value="2000">2000</option>
                      <option value="1999">1999</option>
                      <option value="1998">1998</option>
                      <option value="1997">1997</option>
                      <option value="1996">1996</option>
                      <option value="1995">1995</option>
                      <option value="1994">1994</option>
                      <option value="1993">1993</option>
                      <option value="1992">1992</option>
                      <option value="1991">1991</option>
                      <option value="1990">1990</option>
                    </select>
                    @error('year')
                      <p class="error-message">{{$message}}</p>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Car Type</label>
                <div class="row">
                  <x-car-type-radio-btn />
                  @error('car_type_id')
                      <p class="error-message">{{$message}}</p>
                    @enderror
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" value="{{old('price')}}" placeholder="Price" />
                    @error('price')
                      <p class="error-message">{{$message}}</p>
                    @enderror
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label>Vin Code</label>
                    <input type="text" name="vin" value="{{ old('vin') }}" placeholder="Vin Code" />
                    @error('vin')
                      <p class="error-message">{{$message}}</p>
                    @enderror
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label>Mileage (ml)</label>
                    <input type="text" name="mileage" value="{{old('mileage')}}" placeholder="Mileage" />
                    @error('mileage')
                      <p class="error-message">{{$message}}</p>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Fuel Type</label>
                <div class="row">
                 <x-fuel-type-radio-btn />
                 @error('fuel_type_id')
                      <p class="error-message">{{$message}}</p>
                    @enderror
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label>State/Region</label>
                    <x-state-dropdown :selected="request('state_id')" />
                    @error('state_id')
                      <p class="error-message">{{$message}}</p>
                    @enderror
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label>City</label>
                    <x-city-dropdown :selected="request('city_id')" :state-id="request('state_id')" />
                    @error('city_id')
                      <p class="error-message">{{$message}}</p>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address"  value="{{old('address')}}" placeholder="Address" />
                    @error('address')
                      <p class="error-message">{{$message}}</p>
                    @enderror
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" value="{{old('phone')}}" placeholder="Phone" />
                    @error('phone')
                      <p class="error-message">{{$message}}</p>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col">
                    <label class="checkbox">
                      <input
                        type="checkbox"
                        name="air_conditioning"
                        value="1"
                      />
                      Air Conditioning
                    </label>

                    <label class="checkbox">
                      <input type="checkbox" name="power_windows" value="1" />
                      Power Windows
                    </label>

                    <label class="checkbox">
                      <input
                        type="checkbox"
                        name="power_door_locks"
                        value="1"
                      />
                      Power Door Locks
                    </label>

                    <label class="checkbox">
                      <input type="checkbox" name="abs" value="1" />
                      ABS
                    </label>

                    <label class="checkbox">
                      <input type="checkbox" name="cruise_control" value="1" />
                      Cruise Control
                    </label>

                    <label class="checkbox">
                      <input
                        type="checkbox"
                        name="bluetooth_connectivity"
                        value="1"
                      />
                      Bluetooth Connectivity
                    </label>
                  </div>
                  <div class="col">
                    <label class="checkbox">
                      <input type="checkbox" name="remote_start" value="1" />
                      Remote Start
                    </label>

                    <label class="checkbox">
                      <input type="checkbox" name="gps_navigation" value="1" />
                      GPS Navigation System
                    </label>

                    <label class="checkbox">
                      <input type="checkbox" name="heated_seats" value="1" />
                      Heated Seats
                    </label>

                    <label class="checkbox">
                      <input type="checkbox" name="climate_control" value="1" />
                      Climate Control
                    </label>

                    <label class="checkbox">
                      <input
                        type="checkbox"
                        name="rear_parking_sensors"
                        value="1"
                      />
                      Rear Parking Sensors
                    </label>

                    <label class="checkbox">
                      <input type="checkbox" name="leather_seats" value="1" />
                      Leather Seats
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Detailed Description</label>
                <textarea rows="10" name="description" > {{old('description')}} </textarea>
                @error('description')
                    <p class="error-message">{{$message}}</p>
                @enderror
              </div>    
              <div class="form-group">
                <label class="checkbox">
                  <input type="checkbox" name="published_at" value="1" />
                  Published
                </label>
              </div>
            </div>
            <div class="form-images">
              <div class="form-image-upload">
                <div class="upload-placeholder">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    style="width: 48px"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                    />
                  </svg>
                </div>
                <input  type="file" name="img"/>
                @error('img')
                    <p class="error-message" style="color: red">{{$message}}</p>
                @enderror
              </div>
              <div id="imagePreviews" class="car-form-images"></div>
            </div>
          </div>
          <div class="p-medium" style="width: 100%">
            <div class="flex justify-end gap-1">
              <button type="button" class="btn btn-default">Reset</button>
              <button class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </main>
</x-app-layout>
