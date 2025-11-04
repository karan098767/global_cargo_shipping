<form action="{{route('ships.store')}}" method="post">
    @csrf
    @method('post')
    <h3>create new ship</h3>

    <label for="name">name</label>
    <input type='text' name='name' id='name'/>
    <br><br>

    <label for="registration_number">registration number</label>
     <input type='text'name=' registration_number' id='registration_number'/>
     <br><br>

     <label for='capacity'>capacity (in tonnes)</label>
      <input type='number' step='0.01' name='capacity_in_tonnes' id='capacity'/>
      <br><br>

      <label for='type'>type of ship</label>
      <select name='type' id='type'>
        <option value='cargo ship'> cargo ship</option>
        <option value='passenger ship'>passenger ship</option>
          <option value='military ship'>military ship</option>
            <option value= 'icebreaker'>icebreaker</option>
              <option value= 'fishing vessel'>fishing vessel</option> 
                <option value='barge ship'>barge ship</option>
      </select>
      <br><br>

       <label for='status'>status</label>
      <select name='status' id='status'>
        <option value='active'> active</option>
        <option value='under maintenance'>under maintenance</option>
          <option value='decomissioned'>decomissioned</option>
           
      </select>
      <br><br>

      <button type='submit'>add ship</button>

</form>

