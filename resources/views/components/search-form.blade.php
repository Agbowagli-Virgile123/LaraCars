      <!-- Find a car form -->
      <section class="find-a-car">
        <div class="container">
          <form
            action="{{route('car.search') }}"
            method="GET"
            class="find-a-car-form card flex p-medium"
          >
            <div class="find-a-car-inputs">
              <div>
                <x-maker-dropdown :selected="request('maker_id')" />
              </div>
              <div>
               <x-model-dropdown 
                :maker-id="request('maker_id')" 
                :selected="request('model_id')" />

              </div>
              <div>
                <x-state-dropdown :selected="request('state_id')" />
              </div>
              <div>
               
                <x-city-dropdown 
                    :selected="request('city_id')" 
                    :state-id="request('state_id')" />

              </div>
              <div>
                <x-car-type-dropdown :selected="request('car_type_id')" />
              </div>
              <div>
                <input type="number" placeholder="Year From" name="year_from" />
              </div>
              <div>
                <input type="number" placeholder="Year To" name="year_to" />
              </div>
              <div>
                <input
                  type="number"
                  placeholder="Price From"
                  name="price_from"
                />
              </div>
              <div>
                <input type="number" placeholder="Price To" name="price_to" />
              </div>
              <div>
                <x-fuel-type-dropdown :selected="request('fuel_type_id')" />
              </div>
            </div>
            <div>
              <button type="button" class="btn btn-find-a-car-reset">
                Reset
              </button>
              <button class="btn btn-primary btn-find-a-car-submit">
                Search
              </button>
            </div>
          </form>
        </div>
      </section>
      <!--/ Find a car form -->
