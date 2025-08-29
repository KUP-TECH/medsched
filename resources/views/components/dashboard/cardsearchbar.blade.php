
@props(['search_route', 'placeholder', 'type' => 'text'])


<form action="{{ route($search_route, ['search']) }}" method="get">
    <div class="form-group my-1">
        
        <div class="input-group">
            
            <input type="{{$type}}" class="form-control" name="search" id="search_bar" placeholder="{{$placeholder}}"
                value="{{ request()->input('search') }}">
            <button class=" btn btn-outline-secondary mb-0" type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
    </div>
    
</form>