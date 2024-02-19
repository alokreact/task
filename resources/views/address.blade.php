        <div class="select-box" style="margin-top:20px">
            <label for="district">Select District</label>

            <select name="district" class="form-control select" id="district">
                    @forelse ($districs as $distric)

                        <option value="{{$distric->id}}">{{$distric->district_name}}</option>    
                    @empty
                        <option>No District Found</option>    
                    @endforelse
            </select>
        </div>


        <div class="select-box" style="margin-top:20px">
            <label for="district">Select Mandal:</label>      
            <select name="mandal" class="form-control select" id="mandal">
            </select>
      </div>

      <div class="select-box" style="margin-top:20px">
        <label for="district">Select Village</label>    
        
        <select name="village" class="form-control select" id="village">
        </select>
  </div>

     
  
  