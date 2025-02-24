<option value="" disabled>Select State</option>
@foreach ($states as $state)
    <option {{ Auth::check() && optional(Auth::user()->address)->state === $state->name ? 'selected' : '' }}
        value="{{ strtolower($state->name) }}">
        {{ $state->name }}
    </option>
@endforeach
{{-- <option value="abia">Abia</option>
<option value="adamawa">Adamawa</option>
<option value="akwa-ibom">Akwa Ibom</option>
<option value="anambra">Anambra</option>
<option value="bauchi">Bauchi</option>
<option value="bayelsa">Bayelsa</option>
<option value="benue">Benue</option>
<option value="borno">Borno</option>
<option value="cross-river">Cross River</option>
<option value="delta">Delta</option>
<option value="ebonyi">Ebonyi</option>
<option value="edo">Edo</option>
<option value="ekiti">Ekiti</option>
<option value="enugu">Enugu</option>
<option value="gombe">Gombe</option>
<option value="imo">Imo</option>
<option value="jigawa">Jigawa</option>
<option value="kaduna">Kaduna</option>
<option value="kano">Kano</option>
<option value="katsina">Katsina</option>
<option value="kebbi">Kebbi</option>
<option value="kogi">Kogi</option>
<option value="kwara">Kwara</option>
<option value="lagos">Lagos</option>
<option value="nasarawa">Nasarawa</option>
<option value="niger">Niger</option>
<option value="ogun">Ogun</option>
<option value="ondo">Ondo</option>
<option value="osun">Osun</option>
<option value="oyo">Oyo</option>
<option value="plateau">Plateau</option>
<option value="rivers">Rivers</option>
<option value="sokoto">Sokoto</option>
<option value="taraba">Taraba</option>
<option value="yobe">Yobe</option>
<option value="zamfara">Zamfara</option>
<option value="fct">Federal Capital Territory (FCT)</option> --}}
