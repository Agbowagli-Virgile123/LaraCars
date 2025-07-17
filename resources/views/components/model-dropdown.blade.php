<select id="modelSelect" name="model_id">
    <option value="" style="display: block">Model</option>
    @foreach ($models as $model)
        <option value="{{ $model->id }}"  
                data-parent="{{ $model->maker_id }}"
                @selected($selected === $model->id) >
        {{ $model->name }}
        </option>  
    @endforeach
</select>

{{-- 
@once

    @push('scripts')

        <script>
            document.addEventListener('DOMContentLoaded', function(){
                const maker = document.getElementById('makerSelect');
                const model = document.getElementById('modelSelect');

                function Filter() {
                    const mid = maker.value;

                    model.value = '';

                    for(let opt of model.options){
                        const parent = opt.dataset.parent;

                        if(!parent || (mid && parent == mid)){
                            opt.style.display = 'block';
                        }else{
                            opt.style.display = 'none';
                        }
                    }
                }

                maker.addEventListener('change', Filter);
                Filter(); //Initial run to honor any pre-selected maker

            })
        </script>
        
    @endpush

@endonce --}}